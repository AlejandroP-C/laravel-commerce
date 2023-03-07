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
        Schema::create('commerce_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commerce_id');
            $table->unsignedBigInteger('products_id');


            $table->foreign('commerce_id')->references('id')->on('commerces')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commerces_products');
    }
};
