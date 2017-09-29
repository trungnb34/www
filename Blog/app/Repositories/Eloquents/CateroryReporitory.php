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
                $find->timeDelete = date('Y-m-d H:i:s');
                $cates = $this->model->get();
                foreach ($cates as $cate)
                {
                    if($cate->parent_id == $id)
                    {
                        $cate->timeDelete = date('Y-m-d H:i:s');
                        $cate->save();
                    }
                }
            }
            else
            {
                $find->timeDelete = null;
                $cates = $this->model->get();
                foreach ($cates as $cate)
                {
                    if($find->parent_id == $cate->id &&  $cate->timeDelete != null)
                    {
                        return false;
                    }

                    if($cate->parent_id == $id)
                    {
                        //if($find->parent_id == $cate->id)
                        $cate->timeDelete = null;
                        $cate->save();
                    }
                }
            }
            $find->save();
            return true;
        }
        return false; // dont find id in model
    }

    public function getAllCateMenu()
    {
        return $this->model->join('menu', 'categorys.menu_id', '=', 'menu.id')
                    ->get();
    }

    abstract function model();
}