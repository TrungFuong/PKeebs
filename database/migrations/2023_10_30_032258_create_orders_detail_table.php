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
        Schema::create('orders_detail', function (Blueprint $table) {
            $table->string('product_name');
            $table->float('product_price')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->string('product_image')->nullable();

            $table->unsignedBigInteger('orders_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();

            $table->foreign('orders_id')->references("id")->on('orders');
            $table->foreign('product_id')->references("id")->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_detail');
    }
};
