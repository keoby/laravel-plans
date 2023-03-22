<?php

namespace Keoby\LaravelPlans\Events;

use Keoby\LaravelPlans\Models\PlanSubscription;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewSubscription
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Model $model;

    public PlanSubscription $subscription;

    /**
     * @param  Model  $model The model that subscribed.
     * @param  PlanSubscription  $subscription PlanSubscription the model has subscribed to.
     * @return void
     */
    public function __construct(Model $model, PlanSubscription $subscription)
    {
        $this->model = $model;
        $this->subscription = $subscription;
    }
}
