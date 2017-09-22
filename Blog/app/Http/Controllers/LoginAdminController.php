<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;

class LoginAdminController extends Controller
{
    public function getLogin()
    {
        return view('admin.login.login');
    }

    public function postLogin(LoginAdminRequest $request)
    {

    }
}
