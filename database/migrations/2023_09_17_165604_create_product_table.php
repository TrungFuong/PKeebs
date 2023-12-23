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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->float('product_price')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->string('product_image')->nullable();
            $table->longText('product_description')->nullable();

            $table->unsignedBigInteger("category_id")->nullable();
            $table->unsignedBigInteger("manufacturer_id")->nullable();

            $table->foreign("category_id")->references("id")->on("category");
            $table->foreign("manufacturer_id")->references("id")->on("manufacturer");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
