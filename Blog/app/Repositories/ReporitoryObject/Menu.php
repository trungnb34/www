<?php
namespace App\Repositories\ReporitoryObject;

use App\Repositories\Eloquents\MenuReporitory;

class Menu extends MenuReporitory
{
    public function model()
    {
        return \App\Models\Menu::class;
    }
}