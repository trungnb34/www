<?php
namespace App\Repositories\Eloquents;

use App\Models\Menu;
use App\Repositories\ConfigModel;
use App\Repositories\Contracts\IMenuReporitory;
use Illuminate\Container\Container as App;


class MenuReporitory extends ConfigModel implements IMenuReporitory
{
    public function changeStatusMenu($id)
    {
        if($find = $this->model->find($id))
        {
            $find->status_show = !$find->status_show;
            $find->save();
            return true;
        }
        return false;
    }

     public function model() {
         return Menu::class;
     }
}
