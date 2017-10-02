<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\IPostTypeReporitory;
use App\Repositories\ConfigModel;
use Illuminate\Container\Container as App;

abstract class PostTypeReporitory extends ConfigModel implements IPostTypeReporitory
{
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

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

    abstract function model();
}