<?php

namespace Keoby\LaravelPlans\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class StripeCustomerModel extends Model
{
    use HasUuids;

    protected $table = 'stripe_customers';
    protected $guarded = [];
    protected $dates = [];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
