<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Proxy;
use App\Check;
use GuzzleHttp\Client;
use DB;

class CheckAndSave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checknsave';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run me and i will get all enabled proxies, check them and save into db';

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
     * @return mixed
     */
    public function handle()
    {
        DB::table('checks')->delete();
        $records=Proxy::all();
        foreach ($records as $record){

        }

    }
}
