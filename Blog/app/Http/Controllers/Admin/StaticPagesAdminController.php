<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IStaticPageReporitory;
use App\Http\Requests\AddStaticPagesAdminRequest;
use App\Http\Requests\EditStaticPagesAdminRequest;

class StaticPagesAdminController extends Controller
{
    private $staticPage;

    public function __construct(IStaticPageReporitory $app)
    {
        $this->staticPage = $app;
    }

    public function index()
    {
        $staticPages = $this->staticPage->all();
        return view('admin.staticpages.list', ['staticPages' => $staticPages]);
    }

    public function getAdd()
    {
        return view('admin.staticpages.add');
    }

    public function postAdd(AddStaticPagesAdminRequest $request)
    {
        $data = [
            'title'         => $request->title,
            'content'       => $request->contentText,
            'slug'          => stripUnicode($request->title),
            'status_show'   => $request->status_show,
        ];
        if($this->staticPage->create($data))
        {
            return redirect()->route('liststatic')->with('log', 'Bạn đã thêm thành công');
        }
        return redirect()->route('ex404');
    }

    public function delete($id)
    {
        if($this->staticPage->find($id))
        {
            $this->staticPage->delete($id);
            return redirect()->route('liststatic')->with('log', 'Bạn đã xóa thành công');
        }
        return redirect()-route('ex404');
    }

    public function getEdit($id)
    {
        if($findStatic = $this->staticPage->find($id))
        {
            return view('admin.staticpages.edit', ['findStatic' => $findStatic]);
        }
        return redirect()->route('ex404');
    }
     public function postEdit(EditStaticPagesAdminRequest $request, $id)
     {
         if($this->staticPage->find($id))
         {
             $data = [
                 'title' => $request->title,
                 'content'=> $request->contentText,
                 'slug'  => stripUnicode($request->title),
                 'status_show' => $request->status_show,
             ];
             if($this->staticPage->update($data, $id) && checkToEditModel($this->staticPage, $id, $request->title, 'title'))
             {
                 return redirect()->route('liststatic')->with('log', 'Bạn thay đổi thành công');
             }
         }
         return redirect()->route('ex404');
     }

     public function detail($id)
     {
         if($find = $this->staticPage->find($id))
         {
             return view('admin.staticpages.detail', ['static' => $find]);
         }
         return redirect()->route('ex404');
     }
}
