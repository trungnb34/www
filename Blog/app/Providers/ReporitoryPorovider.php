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
            'App\Repositories\ReporitoryInterface' => 'App\Repositories\ReporitoryObject\Menu',
        ];

        foreach($binds as $keys => $value)
        {
            $this->app->bind($keys, $value);
        }
    }
}
