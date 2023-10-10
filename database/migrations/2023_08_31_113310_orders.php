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
            $table->decimal('subtotal');
            $table->bigInteger('discount_id');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('CASCADE');
            $table->decimal('total');
            $table->string('currency');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('note')->nullable();
            $table->enum('status',['ordered','delivered','canceled'])->default('ordered');
            $table->bigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('CASCADE');
            $table->bigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('CASCADE');
            $table->bigInteger('shipping_id');
            $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('CASCADE');

            $table->timestamps();
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
