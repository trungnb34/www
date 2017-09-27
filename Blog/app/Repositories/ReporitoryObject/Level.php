<?php
namespace App\Repositories\ReporitoryObject;

use App\Repositories\Eloquents\LevelReporitory;

class Level extends LevelReporitory
{
    public function model()
    {
        return \App\Models\Level::class;
    }
}