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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('order_total');
            $table->integer('tax_total');
            $table->integer('shipping_total');
            $table->text('order_date');
            $table->text('order_timestamp');
            $table->string('order_status')->default('pending');
            $table->text('delivery_address');
            $table->string('delivery_status')->default('pending');
            $table->text('delivery_date')->nullable();
            $table->text('delivery_timestamp')->nullable();
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->text('payment_date')->nullable();
            $table->text('payment_timestamp')->nullable();
            $table->integer('currency')->nullable();
            $table->text('transaction_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
