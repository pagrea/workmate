<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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

    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    use AuthenticatesUsers;

    protected function login(Request $request)
    {
        $username = $request->input('username1');
        $password = $request->input('password');
        $user = User::where('username', $username)->first();
          if (!$user) {
               
                return back()->withinput()->with('success','Your Information does not exist in HR Database');
            }
        if(Adldap::auth()->attempt($username, $password, $bindAsUser = true)) {

           $this->guard()->login($user, true);

            return redirect()->route('home');
        }

        else{
        return back()->withinput()->with('success','Invalid Username and Password');
    }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return view('auth.login');
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
