<?php
namespace App\Repositories\ReporitoryObject;

use App\Repositories\Eloquents\PostTypeReporitory;

class PostType extends PostTypeReporitory
{
    public function model()
    {
        // TODO: Implement model() method.
        return \App\Models\PostType::class;
    }
}