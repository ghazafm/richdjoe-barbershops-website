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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kapster_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamp('schedule');
            $table->decimal('total_price', 10, 2);
            $table->enum('service_status', ['wait', 'decline','verified'])->default('wait');
            $table->enum('payment_status',['process','decline','verified'])->default('process');
            $table->tinyInteger('rating')->nullable()->default(null);
            $table->string('comment', 255)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kapster_id')->references('id')->on('kapsters');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['kapster_id']);
            $table->dropForeign(['service_id']);
            $table->dropColumn('rating');
        });

        Schema::dropIfExists('transactions');
    }
};
