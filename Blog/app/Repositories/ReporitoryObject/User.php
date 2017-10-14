<?php
namespace App\Repositories\ReporitoryObject;

use App\Repositories\Eloquents\UserReporitory;

class User extends UserReporitory
{
    public function model()
    {
        return \App\Models\User::class;
    }
}