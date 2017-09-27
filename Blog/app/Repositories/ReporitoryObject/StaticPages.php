<?php
namespace App\Repositories\ReporitoryObject;

use App\Repositories\Eloquents\StaticPageReporitory;

class StaticPages extends StaticPageReporitory
{
    public function model()
    {
        return \App\Models\StaticPages::class;
    }
}