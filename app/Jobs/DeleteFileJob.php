<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Upload;
use Carbon\carbon;

class DeleteFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->queue = 'default'; //choose a queue name
        $this->connection = 'database';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $uploads=Upload::all();
        foreach($uploads as $upload){
        $fileuploadtime=$upload->created_at;
        $maxdltime=$fileuploadtime->addDay($upload->dltime);
        $current_timestamp = Carbon::now()->timestamp;
        if($current_timestamp>$maxdltime->timestamp || $upload->dlcount==0){
            $upload->update([
                "dlremaintime"=>0,
                "status_id"=>2 //file is wiped
            ]);
        //     $dir=public_path()."/assets/uploads/".$upload->filename;
        //     $shred = new Shred\Shred(3); // $n (optional) <= Number of iterations. Default 3.
    
        //     $shred->shred($dir); // <= Overwrite and remove.
        //     // $shred->shred('folder/file.txt', false); // <= Only overwrite.
            
        //     // Check if remove
        //     if ($shred->shred($dir)) {
        //         // The file is truncated & removed.
        //         return "yes";
        //     } else {
        //         // Impossible to overwrite or remove the file. See filepath & file permissions.
        //         return "no";
        //     }
        }   

            
        }
        
    }
}
