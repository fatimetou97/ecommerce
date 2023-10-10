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
        Schema::create('order_options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_item_id')->unsigned();
            $table->foreign('order_item_id')->references('id')->on('order_items')->onDelete('cascade');
            $table->bigInteger('attribute_options_id');
            $table->foreign('attribute_options_id')->references('id')->on('attribute_options');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_options');
    }
};
