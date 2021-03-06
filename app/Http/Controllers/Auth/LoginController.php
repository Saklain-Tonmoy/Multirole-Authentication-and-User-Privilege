<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo;


    protected function authenticated(Request $request, $user)
    {
        if(Auth::check() && Auth::user()->role_id == 1) {
            // dd('admin');
            // return redirect('/admin/dashboard');
            $this->redirectTo = route('admindashboard');
        } elseif(Auth::check() && Auth::user()->role_id == 2) {
            // return redirect('/manager/dashboard');
            $this->redirectTo = route('managerdashboard');
        } elseif(Auth::check() && Auth::user()->role_id == 3) {
            // return redirect('user/dashboard');
            $this->redirectTo = route('userdashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');

        

        $this->middleware('guest')->except('logout');
    }
}
