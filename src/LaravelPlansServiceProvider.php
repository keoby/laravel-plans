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
            __DIR__.'/../database/migrations/create_plans_table.php' => database_path('migrations/create_plans_table.php'),
            __DIR__.'/../database/migrations/create_features_table.php' => database_path('migrations/create_features_table.php'),
            __DIR__.'/../database/migrations/create_plan_subscriptions_table.php' => database_path('migrations/create_plan_subscriptions_table.php'),
            __DIR__.'/../database/migrations/create_plan_subscription_usages_table.php' => database_path('migrations/create_plan_subscription_usages_table.php'),
        ], 'migration');
    }
}
