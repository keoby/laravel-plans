<?php

namespace Keoby\LaravelPlans\Events;

use Keoby\LaravelPlans\Models\Plan;
use Keoby\LaravelPlans\Models\PlanSubscription;
use Carbon\Carbon;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpgradeSubscriptionUntil
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Model $model;

    public PlanSubscription $subscription;

    public Carbon $expiresOn;

    public bool $startFromNow;

    public ?Plan $oldPlan;

    public ?Plan $newPlan;

    /**
     * @param  Model  $model The model on which the action was done.
     * @param  PlanSubscription  $subscription PlanSubscription that was upgraded.
     * @param  Carbon  $expiresOn The date when the upgraded subscription expires.
     * @param  bool  $startFromNow Wether the current subscription is upgraded by extending now or is upgraded at the next cycle.
     * @param  Plan|null  $oldPlan The old plan.
     * @param  Plan|null  $newPlan The new plan.
     * @return void
     */
    public function __construct(Model $model, PlanSubscription $subscription, Carbon $expiresOn, bool $startFromNow, ?Plan $oldPlan, ?Plan $newPlan)
    {
        $this->model = $model;
        $this->subscription = $subscription;
        $this->expiresOn = $expiresOn;
        $this->startFromNow = $startFromNow;
        $this->oldPlan = $oldPlan;
        $this->newPlan = $newPlan;
    }
}
