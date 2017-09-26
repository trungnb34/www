<?php
namespace App\Repositories\ReporitoryObject;

use App\Repositories\Eloquents\CateroryReporitory;

class Category extends CateroryReporitory
{
    public function model()
    {
        return \App\Models\Category::class;
    }
}