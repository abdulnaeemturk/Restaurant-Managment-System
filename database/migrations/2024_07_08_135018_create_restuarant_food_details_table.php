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
        Schema::create('restaurant_food_details', function (Blueprint $table) {
            $table->id();      
            $table->integer('food_id')->nullable()->comment('Defines the food_id');
            $table->string('name')->nullable()->comment('defines name');
            $table->string('description')->nullable()->comment('defines Description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_food_details');
    }
};
