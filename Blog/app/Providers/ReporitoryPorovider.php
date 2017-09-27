<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ReporitoryPorovider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $binds = [
            //'App\Repositories\ReporitoryInterface' => 'App\Repositories\ReporitoryObject\Menu',
            'App\Repositories\Contracts\IMenuReporitory' => 'App\Repositories\ReporitoryObject\Menu',
            'App\Repositories\Contracts\ICategoryReporitory' => 'App\Repositories\ReporitoryObject\Category',
            'App\Repositories\Contracts\ILevelReporitory' => 'App\Repositories\ReporitoryObject\Level',
            'App\Repositories\Contracts\IStaticPageReporitory' => 'App\Repositories\ReporitoryObject\StaticPages',
        ];

        foreach($binds as $keys => $value)
        {
            $this->app->bind($keys, $value);
        }
    }
}
