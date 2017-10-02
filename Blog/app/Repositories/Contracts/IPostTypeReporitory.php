<?php
namespace App\Repositories\Contracts;

use App\Repositories\ReporitoryInterface;

interface IPostTypeReporitory extends ReporitoryInterface
{
    public function change($id);
}