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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('product_qty');
            $table->float('cart_total');
            $table->string('payment');
            $table->string('status');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('Customers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
