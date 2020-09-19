<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     //the default value is to home
    //protected $redirectTo = RouteServiceProvider::HOME;
    //but we change to specific route for each user.
    public function redirectTo(){
        //ask if there is into t_worker
        //t_worker::where('id_worker',Auth::user()->id)->first();
        if(Auth::user()->role === 'R')
                return 'vResponsable/welcome';
        elseif(Auth::user()->role === 'E')
                return 'vDocente/welcome'; //otherwise return the docente view    
        elseif(Auth::user()->role === 'S') ////ask if there is into t_student : esto tenia antes elseif(t_student::find($id_user))
                return 'vAlumno/welcome';//if there is then return the view
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
