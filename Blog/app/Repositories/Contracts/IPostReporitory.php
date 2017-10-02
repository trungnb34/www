<?php
namespace App\Repositories\Contracts;

use App\Repositories\ReporitoryInterface;

interface IPostReporitory extends ReporitoryInterface
{
    public function showByCate($cate_id);
    public function showOnTopList();
    //public function addComment();
    //public function addVote();
}