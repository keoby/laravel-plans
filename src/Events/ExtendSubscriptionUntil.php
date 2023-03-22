<?php

namespace Keoby\LaravelPlans\Events;

use Keoby\LaravelPlans\Models\PlanSubscription;
use Carbon\Carbon;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExtendSubscriptionUntil
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Model $model;

    public PlanSubscription $subscription;

    public Carbon $expiresOn;

    public bool $startFromNow;

    public ?Subscription $newSubscription;

    /**
     * @param  Model  $model The model on which the action was done.
     * @param  PlanSubscription  $subscription PlanSubscription that was extended.
     * @param  Carbon  $expiresOn The date when the subscription expires.
     * @param  bool  $startFromNow Wether the current subscription is extended or is created at the next cycle.
     * @param  PlanSubscription|null  $newSubscription Null if $startFromNow is true; The new subscription created in extension.
     * @return void
     */
    public function __construct(Model $model, PlanSubscription $subscription, Carbon $expiresOn, bool $startFromNow, ?PlanSubscription $newSubscription)
    {
        $this->model = $model;
        $this->subscription = $subscription;
        $this->expiresOn = $expiresOn;
        $this->startFromNow = $startFromNow;
        $this->newSubscription = $newSubscription;
    }
}
