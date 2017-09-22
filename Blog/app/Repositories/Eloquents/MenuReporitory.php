<?php
namespace App\Repositories\Eloquents;

use App\Repositories\ConfigModel;
use Illuminate\Container\Container as App;


abstract class MenuReporitory extends ConfigModel
{
    protected $app;

    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract function model();
}
