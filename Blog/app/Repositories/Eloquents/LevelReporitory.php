<?php
namespace App\Repositories\Eloquents;

use App\Repositories\ConfigModel;
use App\Repositories\Contracts\ILevelReporitory;
use Illuminate\Container\Container as App;

class LevelReporitory extends ConfigModel implements ILevelReporitory
{
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

    public function model()
    {
        return \Level::class;
    }
}