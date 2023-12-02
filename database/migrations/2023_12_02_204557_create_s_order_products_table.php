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
        Schema::create('s_order_products', function (Blueprint $table) {
            $table->bigIncrements('s_order_id');
            $table->string('sales_id',50)->nullable();
            $table->string('product_id',50)->nullable();
            $table->string('customar_id',50)->nullable();
            $table->string('order_quantity',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_order_products');
    }
};
