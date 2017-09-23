<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function getLogin()
    {
        if(Auth::check())
        {
            return redirect()->route('homeadmin');
        }
        return view('admin.login.login');
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('getlogin');
    }

    public function postLogin(LoginAdminRequest $request)
    {
        $login = [
            'email' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($login))
        {
            // Authentication passed...
            return redirect()->route('homeadmin');
        }
        else
        {
            return redirect()->route('getlogin')->with('errorLogin', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }
}
