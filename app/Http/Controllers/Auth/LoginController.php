<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = "/id";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return('username');
    }

      // ========================== FUNGSI BARU =========================================

      public function postlogin(Request $request)
      {
          //mengecek apakah data sudah diterima / blm
          // dd($request->all());
          if(Auth::attempt($request->only('username', 'password'))){
              return redirect('/id');
          }
          // kenapa garis miring? karena newLogin sudah diubah jadi index
          return redirect('/');
      }
  
      // ========================== FUNGSI BARU =========================================
  
      public function logout(Request $request)
      {
          Auth::logout();
          return redirect('/');
      }


}
