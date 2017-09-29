<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ICategoryReporitory;
use App\Repositories\Contracts\IMenuReporitory;
use App\Http\Requests\AddCateAdminRequest;
use App\Http\Requests\EditCateAdminRequest;


class CategoryAdminController extends Controller
{
    private $cate;

    private $menu;

    /**
     * CategoryAdminController constructor.
     * @param ICategoryReporitory $app
     * @param IMenuReporitory $menu
     */
    public function __construct(ICategoryReporitory $cate, IMenuReporitory $menu)
    {
        $this->cate = $cate;
        $this->menu = $menu;
    }

    public function index()
    {
        $menus = $this->menu->all();
        $cates = $this->cate->all();
        return view('admin.category.list', ['cates' => $cates, 'menus' => $menus]);
    }

    public function getAdd()
    {
        $menus = $this->menu->all();
        $cates = $this->cate->all();
        return view('admin.category.add', ['menus' => $menus, 'cates' => $cates]);
    }
    public function postAdd(AddCateAdminRequest $request)
    {
        $cate = [
            'category_name' => $request->category_name,
            'parent_id'     => $request->parent_id,
            'menu_id'       => $request->menu_id,
            'slug'          => stripUnicode($request->category_name),
        ];
        if($this->cate->create($cate))
        {
            return redirect()->route('listcate')->with('log', 'Bạn đã thêm thành công');
        }
        return redirect()->route('ex404');
    }

    public function change($id)
    {
        if($this->cate->changeStatusCate($id))
        {
            return redirect()->route('listcate')->with('log', 'Bạn đã thay đổi thành công');
        }
        else
        {
            return redirect()->route('listcate')->with('log', 'Bạn đã thay đổi không thành công');
        }
    }

    public function filterByMenu(Request $request)
    {
        if($request->menu_id != 0)
        {
            $cates = $this->cate->showByMenu($request->menu_id);
            $menus = $this->menu->all();
            return view('admin.category.list', ['cates' => $cates, 'menus' => $menus, 'menu_id' => $request->menu_id]);
        }
        else
        {
            return redirect()->route('listcate');
        }
    }

    public function getEdit($id)
    {
        if($find = $this->cate->find($id))
        {
            $menus = $this->menu->all();
            $cates = $this->cate->all();
            //dd($find->toArray());
            return view('admin.category.edit', ['cateFind' => $find, 'cates' => $cates, 'menus' => $menus]);
        }
        return redirect()->route('ex404');
    }

    public function postEdit($id, EditCateAdminRequest $request)
    {
        if(checkToEditModel($this->cate, $id, $request->category_name, 'category_name'))
        {
            $data = [
                'category_name' => $request->category_name,
                'parent_id'     => $request->parent_id,
                'slug'          => stripUnicode($request->category_name),
                'menu_id'       => $request->menu_id,
            ];
            if($this->cate->update($data, $id))
            {
                return redirect()->route('listcate')->with('log', 'Bạn đã sửa thành công');
            }
        }
        else
        {
            echo "éo có được";
        }
    }

}
