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
        Schema::create('restaurant_order_details', function (Blueprint $table) {
            $table->id();      
            $table->integer('order_id')->nullable()->comment('Defines the order_id');
            $table->integer('food_id')->nullable()->comment('defines food_id');
            $table->integer('piece')->nullable()->comment('defines piece');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_order_details');
    }
};
