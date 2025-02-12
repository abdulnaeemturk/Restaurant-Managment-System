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
        Schema::create('restaurant_food', function (Blueprint $table) {
            $table->id();      
            $table->string('name')->nullable()->comment('Defines the name');
            $table->integer('price')->nullable()->comment('defines price');
            $table->integer('category_id')->default(0)->nullable()->comment('defines category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_food');
    }
};
