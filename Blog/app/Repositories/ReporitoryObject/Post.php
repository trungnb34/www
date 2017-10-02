<?php
namespace App\Repositories\ReporitoryObject;

use App\Repositories\Eloquents\PostReporitory;

class Post extends PostReporitory
{
    public function model()
    {
        return \App\Models\Post::class;
    }
}