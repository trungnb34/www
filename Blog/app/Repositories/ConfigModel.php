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
            //echo "không là model"; die();
            //throw new ReporitoryExceptions("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        else
        {
            //echo "là model "; die();
        }
        return $this->model = $model;
    }
}