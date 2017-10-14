<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\IUserReporitory;
use App\Repositories\ConfigModel;
use Illuminate\Container\Container as App;

class UserReporitory extends ConfigModel implements IUserReporitory
{
    public function model()
    {
        return \User::class;
    }

    public function change($id)
    {
        // TODO: Implement change() method.
        if($find = $this->model->find($id))
        {
            $find->activate = !$find->activate;
            $find->save();
            return true;
        }
        return false;
    }
}
