<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\IPostReporitory;
use App\Repositories\ConfigModel;
use Illuminate\Container\Container as App;

abstract class PostReporitory extends ConfigModel implements IPostReporitory
{
    protected $app;

    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    

    abstract function model();
}
