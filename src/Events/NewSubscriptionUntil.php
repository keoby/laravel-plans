<?php

namespace Keoby\LaravelPlans\Events;

use Keoby\LaravelPlans\Models\PlanSubscription;
use Carbon\Carbon;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewSubscriptionUntil
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Model $model;

    public PlanSubscription $subscription;

    public Carbon $expiresOn;

    /**
     * @param  Model  $model The model that subscribed.
     * @param  PlanSubscription  $subscription PlanSubscription the model has subscribed to.
     * @param  Carbon  $expiresOn The date when the subscription expires.
     * @return void
     */
    public function __construct(Model $model, PlanSubscription $subscription, Carbon $expiresOn)
    {
        $this->model = $model;
        $this->subscription = $subscription;
        $this->expiresOn = $expiresOn;
    }
}
