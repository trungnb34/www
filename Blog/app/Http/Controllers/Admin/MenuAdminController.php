<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\IMenuReporitory;
use App\Http\Requests\AddMenuAdminRequest;
use App\Http\Requests\EditMenuAdminRequest;
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
        return view('admin.menu.list', ['data' => $data]);
    }

    public function change($id)
    {
        $this->app->changeStatusMenu($id);
        return redirect()->route('listmenu');
    }

    public function getAdd()
    {
        return view('admin.menu.add');
    }

    public function postAdd(AddMenuAdminRequest $request)
    {
        $data = [
            'name_menu'     => $request->name_menu,
            'status_show'   => $request->status_show,
        ];
        if($this->app->create($data))
        {
            return redirect()->route('listmenu');
        }
        return redirect()->route('ex404');
    }

    public function getEdit($id)
    {
        if($find = $this->app->find($id))
        {
            return view('admin.menu.edit', ['data' => $find]);
        }
        return redirect()->route('ex404');
    }

    /**
     * @param $id
     */
    public function postEdit(EditMenuAdminRequest $request,$id)
    {
        if(checkToEditModel($this->app, $id, $request->name_menu, 'name_menu') && $this->app->find($id))
        {
            $data = [
                'name_menu'     => $request->name_menu,
                'status_show'   => $request->status_show,
            ];
            if($this->app->update($data, $id))
            {
                return redirect()->route('listmenu');
            }
            return redirect()->route('ex404');
        }
        else
        {
            return redirect()->back()->with('errorLog', 'Tên menu đã bị trùng');
        }
    }
}
