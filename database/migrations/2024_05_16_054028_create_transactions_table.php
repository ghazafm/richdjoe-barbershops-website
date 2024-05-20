<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('kapster_id');
            $table->unsignedBigInteger('service_id');
            $table->decimal('total_price', 10, 2);
            $table->string('service_status', 4)->default('wait');
            $table->boolean('payment_status')->default(false);
            $table->integer('rating')->nullable()->default(null);
            $table->string('comment', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('kapster_id')->references('id')->on('kapsters');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
