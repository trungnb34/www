<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExceptionController extends Controller
{
    public function get404()
    {
        return view('admin.exception.404');
    }
}
