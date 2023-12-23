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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->autoIncrement;
            $table->date('created_at');
            $table->string('address');
            $table->string('phone');
            $table->string('name');
            $table->decimal('total');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status_id');

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
