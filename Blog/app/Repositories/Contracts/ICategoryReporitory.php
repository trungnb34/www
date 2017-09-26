<?php
namespace App\Repositories\Contracts;

use App\Repositories\ReporitoryInterface;

interface ICategoryReporitory extends ReporitoryInterface
{
    public function showByMenu($id);

    public function changeStatusCate($id);

    public function getAllCateMenu();

}