<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Carbon\carbon;
use App\Jobs\DeleteFileJob;
// use Shred\Shred;


class FileController extends Controller
{
    //
    public function uploadparam(Request $request){
        $upload=Upload::create([
            'ip'=>$request->ip(),
            'maxdlcount'=>$request->dlcount,
            'dlcount'=>$request->dlcount,
            'dltime'=>$request->dltime
        ]);
        return response()->json(['uploadid'=>$upload->id]);

        
    }
    public function uploadfile(Request $request){
        $uploadname=$request->file->getClientOriginalName();

        // ==find file name & upload id
        $upload=explode(';',$uploadname);
        $filename=$upload['1'];
        $uploadid=$upload['0'];
        $basename=explode('.',$filename)['0'];
        $filetype=explode('.',$filename)['1'];

        // ===check if filename is repetious
        $filenameexist=Upload::whereFilename($filename)->get();
        $i=0;
        while(count($filenameexist)!=0){
         $i=$i+1;
         $filename=$basename."(".$i.").".$filetype;
        $filenameexist=Upload::whereFilename($filename)->get();

        }
        $request->file->move(public_path('assets/uploads'),$filename);
        $uploadrecord=Upload::find($uploadid);
        $uploadrecord->update([
            'filename'=>$filename,
            'status_id'=>1 //file is accessible
        ]);

        // == generate downloadid
        $alphabet='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $downloadid=substr(str_shuffle($alphabet),0,3);

        // ==check downloadid not exist
        $exist=Upload::whereDownloadid($downloadid)->get();

        while(count($exist)!=0){
        $downloadid=substr(str_shuffle($alphabet),0,3);
        $exist=Upload::whereDownloadid($downloadid)->get();
        }
        $uploadrecord->update([
            'downloadid'=>$downloadid
        ]);


        return response()->json(['dllink'=>$downloadid]);

    }

    public function downloadfile($x){ 
        //==$x is download id;
    $file=Upload::where('downloadid',$x)->first();
    // ===first find upload time to calculate expire time ====
    $uploadtime=$file->created_at;
    $expiretime=$uploadtime->addDay($file->dltime)->timestamp;
    // dd($expiretime->timestamp);
    $current_timestamp = Carbon::now()->timestamp;
    // dd($current_timestamp);
    if($current_timestamp<=$expiretime){
        if($file->dlcount!=0){
            $filename=$file->filename;
            $file->decrement('dlcount',1);
            $dlfile=  public_path()."/assets/uploads/".$filename;
            return response()->download($dlfile);
         }else{
             return response(view('files.expire',array('expire'=>'متاسفانه تعداد دفعات مجاز دانلود این فایل به پایان رسیده است')));
    
         }
    }else{
             return response(view('files.expire',array('expire'=>'متاسفانه زمان مجاز دانلود این فایل به پایان رسیده است')));
            
    }
    

 
    }
    public function expire(){
        return view('files.expire');
    }
    
    public function delete_file(){
        $dir=public_path()."/assets/uploads/test.pdf";
        $shred = new Shred\Shred(3); // $n (optional) <= Number of iterations. Default 3.

        $shred->shred($dir); // <= Overwrite and remove.
        // $shred->shred('folder/file.txt', false); // <= Only overwrite.
        
        // Check if remove
        if ($shred->shred($dir)) {
            // The file is truncated & removed.
            return "yes";
        } else {
            // Impossible to overwrite or remove the file. See filepath & file permissions.
            return "no";
        }
    }

    public function delete_file_queue(){
        dispatch(new DeleteFileJob);
        return "successful";
    }
}
