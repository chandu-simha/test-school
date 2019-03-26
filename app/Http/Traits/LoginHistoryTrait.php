<?php

namespace App\Http\Traits;

use App\LoginAttempt;
use App\LoginHistory;
use App\Http\Traits\UtilityTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

trait LoginHistoryTrait
{
	use UtilityTrait;

	public function loginHistory()
	{
		LoginHistory::create([
			'fkuserid'   => Auth::user()->userid,
	    	'session_id' => Session::getId(),
	    	'host'       => request()->getHttpHost(),
	    	'ip'         => $this->ip(),
	    	'agent'      => request()->userAgent(),
	    	'status'     => 1,
	    	'created'    => time(),
	    	'modified'   => time(),
		]);
	}
}