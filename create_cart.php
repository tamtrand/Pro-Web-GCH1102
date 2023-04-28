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
    Schema::create('carts', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('image');
        $table->decimal('price', 10, 2);
        $table->string('quantity');
        $table->string('size');
        $table->unsignedBigInteger('product_id');
        $table->timestamps();
       

        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
