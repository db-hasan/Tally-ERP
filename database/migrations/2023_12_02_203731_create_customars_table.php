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
        Schema::create('customars', function (Blueprint $table) {
            $table->bigIncrements('customar_id');
            $table->string('customar_name',50)->nullable();
            $table->string('customar_phone',50)->nullable();
            $table->string('customer_address',255)->nullable();
            $table->integer('customar_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customars');
    }
};
