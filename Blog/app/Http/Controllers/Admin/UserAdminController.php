<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IUserReporitory;

class UserAdminController extends Controller
{
    private $user;

    public function __construct(IUserReporitory $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->paginate(100);
        return view('admin.user.list', ['users' => $users]);
    }

    public function change($id)
    {
        if($this->user->change($id))
        {
            return redirect()->back()->with('log', 'Bạn đã thay đổi thành công');
        }
        return redirect()->back()->with('log', 'Bạn đã thay đổi không thành công');
    }

    public function detail($id)
    {
        if($findUser = $this->user->find($id))
        {
            return view('admin.user.detail', ['findUser' => $findUser]);
        }
        return redirect()->route('ex404');
    }
}
