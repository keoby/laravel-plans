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
            $table->uuid('id')->primary()->unique()->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('price', 8, 2);
            $table->string('currency');
            $table->unsignedInteger('duration')->default(30);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('plan_features', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();
            $table->string('name');
            $table->string('code');
            $table->text('description')->nullable();
            $table->enum('type', ['feature', 'limit'])->default('feature');
            $table->integer('limit')->default(0);
            $table->timestamps();

            $table->foreignUuid('plan_id')
                ->references('id')
                ->on('plans')
                ->onDelete('cascade');
        });

        Schema::create('plan_subscriptions', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();
            $table->string('payment_method')->nullable()->default(null);
            $table->boolean('active')->default(false);

            $table->float('charging_price', 8, 2)->nullable();
            $table->string('charging_currency')->nullable();

            $table->boolean('is_recurring')->default(true);
            $table->unsignedInteger('recurring_each_days')->default(30);

            $table->timestamp('starts_on')->nullable();
            $table->timestamp('expires_on')->nullable();
            $table->timestamp('cancelled_on')->nullable();
            $table->nullableUuidMorphs('model');
            $table->timestamps();

            $table->foreignUuid('plan_id')
                ->references('id')
                ->on('plans')
                ->onDelete('cascade');
        });

        Schema::create('plan_subscription_usages', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();
            $table->string('code');
            $table->float('used', 9, 2)->default(0);
            $table->timestamps();

            $table->foreignUuid('subscription_id')
                ->references('id')
                ->on('plan_subscriptions')
                ->onDelete('cascade');
        });

        Schema::create('stripe_customers', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();

            $table->uuid('model_id');
            $table->string('model_type');

            $table->string('customer_id');

            $table->timestamps();
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
        Schema::dropIfExists('plan_features');
        Schema::dropIfExists('plan_subscriptions');
        Schema::dropIfExists('plan_subscription_usages');
        Schema::dropIfExists('stripe_customers');
    }
};
