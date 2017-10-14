<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\IStaticPageReporitory;
use Illuminate\Container\Container as App;
use App\Repositories\ConfigModel;

class StaticPageReporitory extends ConfigModel implements IStaticPageReporitory
{
    protected $app;
    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    public function model()
    {
        return \StaticPages::class;
    }
}