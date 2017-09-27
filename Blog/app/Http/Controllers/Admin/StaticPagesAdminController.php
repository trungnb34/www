<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IStaticPageReporitory;
use App\Http\Requests\AddStaticPagesAdminRequest;

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
}
