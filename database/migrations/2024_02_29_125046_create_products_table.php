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
            $table->string('name')->required();
            $table->foreignIdFor(\App\Models\ProductCategory::class)->constrained('product_categories');
            $table->foreignIdFor(\App\Models\ProductBrand::class)->constrained('product_brands');
            $table->decimal('price',8,2)->required();
            $table->string('description')->required();
            $table->integer('total_rate')->required();
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
