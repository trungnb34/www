<?php
namespace App\Repositories\Eloquents;

use App\Repositories\ConfigModel;
use App\Repositories\Contracts\ICategoryReporitory;
use Illuminate\Container\Container as App;

abstract class CateroryReporitory extends ConfigModel implements ICategoryReporitory
{
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     *
     */
    public function showByMenu($menu_id)
    {
        return $this->model->where('menu_id', '=', $menu_id)->get();
    }

    public function changeStatusCate($id)
    {
        if($find = $this->model->find($id))
        {
            if($find->timeDelete == null)
            {
                // kiểm tra xem category có là parent_id của category khác đang hiển thị không
                $cateParentIds = $this->model->select('parent_id', 'timeDelete');
                foreach ($cateParentIds as $cateParentId)
                {
                    if($cateParentId['parent_id'] == $id && $cateParentId['timeDelete'] == null)
                    {
                        return 0; // trả về 0 là cate có cate con vẫn hiển thị
                    }
                }
                $find->timeDelete = date('Y-m-d H:i:s');
            }
            else
            {
                $find->timeDelete = null;
            }
            if($find->save())
            {
                return 1; // return 1 mean success when save data
            }
            else
            {
                return 2; // return 1 mean not success when save data
            }
        }
        return 3; // dont find id in model
    }

    public function getAllCateMenu()
    {
        return $this->model->join('menu', 'categorys.menu_id', '=', 'menu.id')
                    ->get();
    }

    abstract function model();
}