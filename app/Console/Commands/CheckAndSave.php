<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Proxy;
use App\Check;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
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
        $records = Proxy::where('status', 'enabled')->get();
        $client = new Client();
        $allresponses =array();
        $total = count($records);
        //$total = 5;
        echo "\n";
        echo $total * 3;
        echo "\n";
        $requests = function ($total, $records) {
            for ($i = 0; $i < $total; $i++) {
                $ip = $records[$i]->ip;
                $port = $records[$i]->port;
                yield new Request('GET', 'https://www.youtube.com/', ['proxy' => 'https://'.$ip.':'.$port]);
                yield new Request('GET', 'https://www.google.com/', ['proxy' => 'https://'.$ip.':'.$port]);
                yield new Request('GET', 'http://pravda.com.ua/', ['proxy' => 'https://'.$ip.':'.$port]);
            }
        };
        $pool = new Pool($client, $requests($total, $records), [
            'concurrency' => 5,
            'fulfilled' => function ($response, $index) use (&$allresponses){
            // this is delivered each successful response
            $object = new \stdClass();
            $object->index=$index;
            $object->status="passed";
            array_push($allresponses,$object);
            },
            'rejected' => function ($reason, $index) use (&$allresponses){
            // this is delivered each failed request
            $object = new \stdClass();
            $object->index=$index;
            $object->status="passed";
            array_push($allresponses,$object);
            },
        ]);
        // Initiate the transfers and create a promise
        $promise = $pool->promise();
        // Force the pool of requests to complete.
        $promise->wait();
        usort($allresponses, array($this, "cs"));
        $rec=0;
    for($i=3; $i < count($allresponses); $i+=3){
        $check = New Check;
        if($i > 3 && $i % 3 == 0){$rec++;}
        $check->proxy_id = $records[$rec]->id;
        $check->google_status = $allresponses[$i-2]->status;
        $check->youtube_status = $allresponses[$i-1]->status;
        $check->pravda_status = $allresponses[$i]->status;
        if($check->google_status == $check->youtube_status && $check->youtube_status == $check->pravda_status){
            $check->final_status = 'passed';
        }else{$check->final_status = 'failed';}
        echo $check->proxy_id;
        echo ':';
        echo $check->youtube_status;
        echo ':';
        echo $check->youtube_status;
        echo ':';
        echo $check->final_status;
        echo "\n";
        if($check->proxy_id) {
            $check->save();
        }
    }

    }
    //custom sort
    function cs($a,$b) {
        return $a->index > $b->index;
    }


}
