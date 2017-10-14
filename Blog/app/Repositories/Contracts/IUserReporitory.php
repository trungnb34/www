<?php
namespace App\Repositories\Contracts;

use App\Repositories\ReporitoryInterface;

interface IUserReporitory extends ReporitoryInterface
{
    public function change($id);
}