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
        Schema::create('restaurant_link_table_users', function (Blueprint $table) {
            $table->id(); 
            $table->integer('user_id')->nullable()->comment('User_id');
            $table->integer('table_id')->nullable()->comment('table_id');
            $table->integer('pin')->nullable()->comment('Pin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_link_table_users');
    }
};
