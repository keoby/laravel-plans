<?php

namespace Keoby\LaravelPlans\Events;

use Keoby\LaravelPlans\Models\PlanSubscription;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExtendSubscription
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Model $model;

    public PlanSubscription $subscription;

    public bool $startFromNow;

    public ?Subscription $newSubscription;

    /**
     * @param  Model  $model The model on which the action was done.
     * @param  PlanSubscription  $subscription PlanSubscription that was extended.
     * @param  bool  $startFromNow whether the current subscription is extended or is created at the next cycle.
     * @param  null|PlanSubscription  $newSubscription Null if $startFromNow is true; The new subscription created in extension.
     * @return void
     */
    public function __construct(Model $model, PlanSubscription $subscription, bool $startFromNow, ?PlanSubscription $newSubscription)
    {
        $this->model = $model;
        $this->subscription = $subscription;
        $this->startFromNow = $startFromNow;
        $this->newSubscription = $newSubscription;
    }
}
