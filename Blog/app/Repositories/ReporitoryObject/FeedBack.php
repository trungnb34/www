<?php
namespace App\Repositories\ReporitoryObject;

use App\Repositories\Eloquents\FeedBackReporitory;

class FeedBack extends FeedBackReporitory
{
    public function model()
    {
        // TODO: Implement model() method.
        return \App\Models\FeedBack::class;
    }
}