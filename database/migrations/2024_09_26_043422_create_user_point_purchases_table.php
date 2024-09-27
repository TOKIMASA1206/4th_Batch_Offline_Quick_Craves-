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
        Schema::create('user_point_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('point_purchase_id')->constrained('point_purchases')->onDelete('cascade');
            $table->double('amount_paid');
            $table->integer('points_received');
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->timestamp('payment_approve_date')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_point_purchases');
    }
};
