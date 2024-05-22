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
            $table->enum('type', ['haircut', 'other']);
            $table->decimal('total_price', 10, 2);
            $table->enum('service_status', ['wait', 'decline', 'wait confirmation','verified'])->default('wait');
            $table->boolean('payment_status')->default(false);
            $table->tinyInteger('rating')->nullable()->default(null);
            $table->string('comment', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

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
