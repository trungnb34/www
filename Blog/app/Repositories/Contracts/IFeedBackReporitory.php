<?php
namespace App\Repositories\Contracts;

use App\Repositories\ReporitoryInterface;

interface IFeedBackReporitory extends ReporitoryInterface
{
    public function isReaded($id);

    public function readedAll();

    public function getAll();

    public function getDetail($id);

    public function getNotRead();

    public function getFeedBackByMouth();

    public function getFeedBacKByWeek();
}