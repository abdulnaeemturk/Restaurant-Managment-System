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
        Schema::create('temporary_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('food_id')->nullable()->comment('defines Food Information');
            $table->integer('piece')->nullable(1)->comment('defines Quantity');
            $table->integer('user_id')->nullable()->comment('defines Current User');
            $table->integer('status')->nullable(0)->comment('defines Current status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_orders');
    }
};
