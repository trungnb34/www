<?php
namespace App\Repositories\Eloquents;

use App\Repositories\ConfigModel;
use App\Repositories\Contracts\ILevelReporitory;
use Illuminate\Container\Container as App;

abstract class LevelReporitory extends ConfigModel implements ILevelReporitory
{
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     *
     */
    public function changeStatusLevel($id)
    {
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