<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Traits\loginHistoryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use loginHistoryTrait;
    
    /**
     * Set how many failed logins are allowed before being locked out.
     */
    public $maxAttempts = 1;

    /**
     * Set how many seconds a lockout will last.
     */
    public $decayMinutes = 30;

    public function username(){
        return 'username';
    }

    /**
    * Showing login form
    */
    public function showLoginForm()
    {
        return view('login');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        $this->loginHistory();
    }
}
