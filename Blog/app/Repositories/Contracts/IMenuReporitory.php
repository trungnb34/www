<?php
namespace App\Repositories\Contracts;

use App\Repositories\ReporitoryInterface;

interface IMenuReporitory extends ReporitoryInterface
{
    public function changeStatusMenu($id);
}