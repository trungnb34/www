<?php
namespace App\Repositories\Contracts;

use App\Repositories\ReporitoryInterface;

interface IPostReporitory extends ReporitoryInterface
{
    public function showByCate($cate_id);
    public function showOnTopList();
    public function getAll();
    public function findPost($id);
    public function change($id);
    public function findByFieldSlug($slug);
    //public function addComment();
    //public function addVote();
}