<?php

namespace Keoby\LaravelPlans\Database\Factories;

use Keoby\LaravelPlans\Models\PlanSubscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class SubscriptionFactory extends Factory
{
    protected $model = PlanSubscription::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
