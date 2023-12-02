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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('category',50)->nullable();
            $table->string('brand',50)->nullable();
            $table->string('unit',50)->nullable();
            $table->string('color',50)->nullable();
            $table->string('product_name',50)->nullable();
            $table->string('product_des',255)->nullable();
            $table->string('product_sku',50)->nullable();
            $table->string('manufacturing_cost',50)->nullable();
            $table->string('selling_price',50)->nullable();
            $table->string('product_quantity',50)->nullable();
            $table->string('product_image',255)->nullable();
            $table->integer('product_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
