<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\DeleteFileJob;
use App\Models\Upload;

class DeleteFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $uploads=Upload::all();
        dispatch(new DeleteFileJob($uploads));
        return 0;
    }
}
