<?php

namespace Keoby\LaravelPlans\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanSubscriptionUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'used',
    ];

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(PlanSubscription::class);
    }

    public function scopeCode($query, string $code)
    {
        return $query->where('code', $code);
    }
}
