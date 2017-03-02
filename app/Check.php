<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    //
    protected $table = 'checks';

    protected $fillable = [
        'proxy_id', 'google_status', 'youtube_status', 'pravda_status', 'final_status'
    ];

    public function proxy()
    {
        return $this->belongsTo('App\Proxy');
    }
}
