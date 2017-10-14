<?php

namespace App\Repositories;

use App\Repositories\Reporitorys;
use App\Repositories\Exceptions\ReporitoryExceptions;
use Illuminate\Database\Eloquent\Model;

class ConfigModel extends Reporitorys
{
    protected $model;


    public function __construct()
    {
        $this->makeModel();
    }

    public function makeModel()
    {
        $model = app()->make($this->model());

        if (!$model instanceof Model) {
            throw new ReporitoryExceptions("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }
}