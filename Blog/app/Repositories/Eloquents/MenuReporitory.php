<?php
namespace App\Repositories\Eloquents;

use App\Repositories\ConfigModel;
use App\Repositories\Contracts\IMenuReporitory;
use Illuminate\Container\Container as App;


abstract class MenuReporitory extends ConfigModel implements IMenuReporitory
{
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    public function changeStatus($id)
    {
        if($find = $this->model->find($id))
        {
            $find->status_show = !$find->status_show;
            $find->save();
        }
        //$find = $this->model->find($id);

    }

    abstract function model();
}
