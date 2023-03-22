<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('duration')->default(30);
            $table->timestamps();
        });

        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->text('description')->nullable();
            $table->enum('type', ['feature', 'limit'])->default('feature');
            $table->integer('limit')->default(0);
            $table->timestamps();

            $table->foreignIdFor(\Keoby\LaravelPlans\Models\Plan::class)
                ->references('id')
                ->on('plans')
                ->onDelete('cascade');
        });

        Schema::create('plan_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method')->nullable()->default(null);
            $table->boolean('active')->default(false);

            $table->float('charging_price', 8, 2)->nullable();
            $table->string('charging_currency')->nullable();

            $table->boolean('is_recurring')->default(true);
            $table->unsignedInteger('recurring_each_days')->default(30);

            $table->timestamp('starts_on')->nullable();
            $table->timestamp('expires_on')->nullable();
            $table->timestamp('cancelled_on')->nullable();
            $table->nullableMorphs('model');
            $table->timestamps();

            $table->foreignIdFor(\Keoby\LaravelPlans\Models\Plan::class)
                ->references('id')
                ->on('plans')
                ->onDelete('cascade');
        });

        Schema::create('plan_subscription_usages', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->float('used', 9, 2)->default(0);
            $table->timestamps();

            $table->foreignIdFor(\Keoby\LaravelPlans\Models\PlanSubscription::class)
                ->references('id')
                ->on('subscriptions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
        Schema::dropIfExists('features');
        Schema::dropIfExists('plan_subscriptions');
        Schema::dropIfExists('plan_subscription_usages');
    }
};
