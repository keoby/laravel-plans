<?php

namespace Keoby\LaravelPlans;

use Illuminate\Support\ServiceProvider;

class LaravelPlansServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
          $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations')
            ], 'laravel-plans-migrations');
    }
}
