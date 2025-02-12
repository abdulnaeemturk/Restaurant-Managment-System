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
        Schema::create('restaurant_orders', function (Blueprint $table) {
            $table->id();      
            $table->string('customer')->nullable()->comment('Defines the customer name');
            $table->integer('table_id')->nullable()->comment('defines table_id');
            $table->integer('plate')->nullable()->comment('defines plate number');
            $table->integer('status')->default(0)->nullable()->comment('defines Pending or paid');
            $table->string('paid_by')->nullable()->comment('defines Order Paid By Cash or bank or some cash and some bank');
            $table->text('description')->nullable()->comment('defines if there is discount');
            $table->string('reference')->nullable()->comment('defines if there is reference');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_orders');
    }
};
