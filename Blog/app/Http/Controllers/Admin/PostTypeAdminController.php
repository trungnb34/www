<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IPostTypeReporitory;
use App\Http\Requests\AddPostTypeAdminRequest;
use App\Http\Requests\EditPostTypeAdminRequest;

class PostTypeAdminController extends Controller
{
    private $posttype;

    public function __construct(IPostTypeReporitory $app)
    {
        $this->posttype = $app;
    }

    public function index()
    {
        $postTypes = $this->posttype->all();
        return view('admin.posttypes.list', ['postTypes' => $postTypes]);
    }

    public function change($id)
    {
        if($this->posttype->change($id))
        {
            return redirect()->route('listposttype')->with('log', 'Bạn đã thay đổi thàng công');
        }
        return redirect()->route('ex404');
    }

    public function getAdd()
    {
        return view('admin.posttypes.add');
    }

    public function postAdd(AddPostTypeAdminRequest $request)
    {
        $data = [
            'post_type_name' => $request->post_type_name,
            'status_show'    => $request->status_show,
        ];

        if($this->posttype->create($data))
        {
            return redirect()->route('listposttype')->with('log', 'Bạn đã thêm thành công');
        }
        return redirect()->route('listposttype')->with('log', 'Bạn đã thêm không thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getEdit($id)
    {
        if($find = $this->posttype->find($id))
        {
            return view('admin.posttypes.edit', ['postType' => $find]);
        }
        return redirect()->route('ex404');
    }

    /**
     * @param EditPostTypeAdminRequest $request
     */
    public function postEdit(EditPostTypeAdminRequest $request, $id)
    {
        if(checkToEditModel($this->posttype, $id, $request->post_type_name, 'post_type_name') && $this->posttype->find($id))
        {
            $data = [
                'post_type_name' => $request->post_type_name,
                'status_show'    => $request->status_show,
            ];

            if($this->posttype->update($data, $id))
            {
                return redirect()->route('listposttype')->with('log', 'Bạn đã thay đôi thành công');
            }
            return redirect()->route('listposttype')->with('log', 'Bạn đã thay đôi không thành công');
        }
        return redirect()->back()->with('log', 'Tên post type đã bị trùng');
    }
}
