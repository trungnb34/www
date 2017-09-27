<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ILevelReporitory;
use App\Http\Requests\AddLevelAdminRequest;
use App\Http\Requests\EditLevelAdminRequest;

class LevelAdminController extends Controller
{
    private $level;

    public function __construct(ILevelReporitory $app)
    {
        $this->level = $app;
    }

    public function index()
    {
        $levels = $this->level->all();
        return view('admin.level.list', ['levels' => $levels]);
    }

    public function change($id)
    {
        if($this->level->changeStatusLevel($id))
        {
            return redirect()->route('listlevel')->with('log', "Bạn đã thay đổi thành công");
        }
    }
    public function getAdd()
    {
        return view('admin.level.add');
    }

    public function postAdd(AddLevelAdminRequest $request)
    {
        //dd($request->toArray());
        $data = [
            'level_name' => $request->level_name,
            'level'      => $request->level,
            'status_show'=> $request->status_show,
        ];
        if($this->level->create($data))
        {
            return redirect()->route('listlevel')->with('log', 'Bạn đã thêm thành công');
        }
        return redirect()->route('listlevel')->with('log', 'Bạn đã thêm không thành công');
    }

    public function getEdit($id)
    {
        if($levelFind = $this->level->find($id))
        {
            return view('admin.level.edit', ['levelFind' => $levelFind]);
        }
        return redirect()->route('ex404');
    }

    public function postEdit(EditLevelAdminRequest $request, $id)
    {
        if($levelFind = $this->level->find($id) && checkToEditModel($this->level, $id, $request->level_name, 'level_name'))
        {
            $data = [
                'level_name' => $request->level_name,
                'level'      => $request->level,
                'status_show'=> $request->status_show,
            ];
            if($this->level->update($data, $id))
            {
                return redirect()->route('listlevel')->with('log', 'Bạn đã cập nhật thành công');
            }
        }
        return redirect()->route('ex404');
    }
}
