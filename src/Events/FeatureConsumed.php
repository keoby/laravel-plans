<?php

namespace Keoby\LaravelPlans\Events;

use Keoby\LaravelPlans\Models\Feature;
use Keoby\LaravelPlans\Models\PlanSubscription;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FeatureConsumed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public PlanSubscription $subscription;

    public Feature $feature;

    public float $used;

    public float $remaining;

    /**
     * @param  PlanSubscription  $subscription PlanSubscription on which action was done.
     * @param  Feature  $feature The feature that was consumed.
     * @param  float  $used The amount used on this consumption.
     * @param  float  $remaining The amount remaining for this feature.
     * @return void
     */
    public function __construct(PlanSubscription $subscription, Feature $feature, float $used, float $remaining)
    {
        $this->subscription = $subscription;
        $this->feature = $feature;
        $this->used = $used;
        $this->remaining = $remaining;
    }
}
