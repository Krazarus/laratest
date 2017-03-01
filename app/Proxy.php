<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proxy extends Model
{
    protected $table = 'proxies';

    protected $fillable = [
        'ip', 'port', 'location', 'speed', 'type', 'anon', 'status',
    ];
//relation, every proxy has one check
    public function check()
    {
        return $this->hasOne('App\Check', 'proxy_id');
    }
}
