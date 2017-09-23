<?php 
namespace App\Repositories;

use App\Repositories\Reporitorys;
use App\Repositories\Exceptions\ReporitoryExceptions;

class ConfigModel extends Reporitorys
{
    protected $model;
    
    protected $app;

    public function makeModel() {
        $model = $this->app->make($this->model());
        //dd($model);
 
        if (!$model instanceof Model)
        {
            //throw new ReporitoryExceptions("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }
}