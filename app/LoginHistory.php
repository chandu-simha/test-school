<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    protected $table = 'login_history';
    public $timestamps = false;

    protected $fillable = [
    	'fkuserid',
    	'session_id',
    	'source',
    	'host',
    	'ip',
    	'agent',
    	'status',
    	'created',
        'modified'
    ];
}
