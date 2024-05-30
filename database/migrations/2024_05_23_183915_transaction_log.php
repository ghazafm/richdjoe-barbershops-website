<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->unsignedBigInteger('kapster_id');
            $table->string('kapster_name');
            $table->unsignedBigInteger('service_id');
            $table->string('service_name');
            $table->timestamp('schedule');
            $table->decimal('total_price', 10, 2);
            $table->enum('service_status', ['wait', 'decline','verified'])->default('wait');
            $table->enum('payment_status', ['process','decline','verified'])->default('process');
            $table->tinyInteger('rating')->nullable()->default(null);
            $table->string('comment', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_logs');
    }
};
