<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use Carbon\carbon;

class FileController extends Controller
{
    //
    public function alluploads()
    {  $uploads=Upload::all();
        foreach($uploads as $upload){
        $fileuploadtime=$upload->created_at;
        $maxdltime=$fileuploadtime->addDay($upload->dltime);
        $current_timestamp = Carbon::now()->timestamp;
        if($current_timestamp>$maxdltime->timestamp){
            $upload->dlremaintime="-";
        }else{
            Carbon::setLocale('fa');
            $upload->dlremaintime=$maxdltime->diffforHumans();    
        }
        
        
        }
       return view('admin.files.alluploads',compact(['uploads']));


        

        // $dir=public_path()."/assets/uploads/mm";
        // if (is_dir($dir)) {
        //     $objects = scandir($dir);
        //     // dd($objects);
        //     foreach ($objects as $object) {
        //         // dd($object);
        //       if ($object != "." && $object != "..") {
        //         if (filetype($dir."/".$object) == "dir") 
        //            rrmdir($dir."/".$object); 
        //         else unlink   ($dir."/".$object);
        //       }
        //     }
        //     reset($objects);
        //     dd($objects);

        //     rmdir($dir);
        //   }elseif(is_file($dir)) {
        //         unlink( $dir);  
        //     }
    }
    
}
