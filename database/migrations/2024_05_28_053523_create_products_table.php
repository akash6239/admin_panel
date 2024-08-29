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
            $table->id();
            $table->string('product_name');
            $table->string('product_slug')->nullable();
            $table->string('sku')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('regular_price')->nullable();
            $table->string('product_category')->nullable();
            $table->string('product_packaging')->nullable();
            $table->string('product_composition')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_gallery')->nullable();
            $table->string('meta_image')->nullable();
            $table->string('status')->default('0');
            $table->longText('description')->nullable();
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
