<?php
namespace App\Repositories\Contracts;

use App\Repositories\ReporitoryInterface;

interface ILevelReporitory extends ReporitoryInterface
{
    public function changeStatusLevel($id);
}