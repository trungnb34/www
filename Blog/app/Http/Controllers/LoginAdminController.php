<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;

class LoginAdminController extends Controller
{
    public function getLogin()
    {
        if(Auth::check())
        {
            //return view();
        }
        return view('admin.login.login');
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
            return redirect()->route('');
        }
        else
        {
            return redirect()->route('getlogin')->with('errorLogin', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }
}
