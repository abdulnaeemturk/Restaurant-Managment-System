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
        Schema::create('restaurant_tables', function (Blueprint $table) {
            $table->id();      
            $table->integer('location_id')->nullable()->comment('Defines the Representitive Number');
            $table->string('table_number')->nullable()->comment('defines table_number');
            $table->string('person_allocate')->nullable()->comment('defines person_allocate');
            $table->integer('reservation')->default(0)->nullable()->comment('defines reservation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_tables');
    }
};
