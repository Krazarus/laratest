<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Proxy;
use GuzzleHttp\Client;
use DB;

class ParseAndSave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parsensave';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run me and i will get all proxies and save them into db';

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
        //first clear table
        DB::table('proxies')->delete();
        //create new guzzle client
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://hidemy.name/',
            // You can set any number of default request options.
            'timeout'  => 100.0,
        ]);
        //get response
        $response = $client->request('GET', 'en/proxy-list/?type=s#list');
        //get response body
        $body = $response->getBody();
        // new Htmldom for parcing
        $html = new \Htmldom($body);
        //search all rows
        foreach($html->find('tr') as $tr) {
            //we have 7 columns, so i - is column counter
            $i=0;
            //create new db entity
            $record = new Proxy();
            //for each row find  columns
            //and then dependently on column number we delete backspaces and assign values
            foreach ($tr->find('td') as $td) {
                switch ($i) {
                    case 0:
                        $record->ip = str_replace('&nbsp;','',$td->plaintext);
                        $i++;
                        break;
                    case 1:
                        $record->port  = str_replace('&nbsp;','',$td->plaintext);
                        $i++;
                        break;
                    case 2:
                        $record->location = str_replace('&nbsp;','',$td->plaintext);
                        $i++;
                        break;
                    case 3:
                        $record->speed  = str_replace('&nbsp;','',$td->plaintext);
                        $i++;
                        break;
                    case 4:
                        $record->type = str_replace('&nbsp;','',$td->plaintext);
                        $i++;
                        break;
                    case 5:
                        $record->anon = str_replace('&nbsp;','',$td->plaintext);
                        $i++;
                        break;
                    default:
                        $i++;
                        break;

                }
            }
            //if everything ok, store in db
            if($record->ip) {
                $record->save();
            }
        }
    }
}
