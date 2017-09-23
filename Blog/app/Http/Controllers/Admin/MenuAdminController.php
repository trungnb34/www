<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\IMenuReporitory;
//use App\Repositories\ReporitoryInterface;

class MenuAdminController extends Controller
{
    protected $app;

    public function __construct(IMenuReporitory $app)
    {
        $this->app = $app;
    }

    public function index()
    {
        $data = $this->app->all();
        return view('admin.menu.list', ['data' => $data]);//->with('data' , $data);
    }

    public function change($id)
    {
        $this->app->changeStatus($id);
        return redirect()->route('listmenu');
    }
}
