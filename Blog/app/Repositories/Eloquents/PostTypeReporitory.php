<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\IPostTypeReporitory;
use App\Repositories\ConfigModel;
use Illuminate\Container\Container as App;

class PostTypeReporitory extends ConfigModel implements IPostTypeReporitory
{
    public function change($id)
    {
        // TODO: Implement change() method.
        if($find = $this->model->find($id))
        {
            $find->status_show = !$find->status_show;
            $find->save();
            return true;
        }
        return false;
    }

    public function model()
    {
        return \PostType::class;
    }
}