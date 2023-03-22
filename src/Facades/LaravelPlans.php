<?php

namespace Keoby\LaravelPlans\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Keoby\LaravelPlans\LaravelPlans
 */
class LaravelPlans extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Keoby\LaravelPlans\LaravelPlans::class;
    }
}
