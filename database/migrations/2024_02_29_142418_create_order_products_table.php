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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Order::class)->constrained('orders');
            $table->integer('quantity')->required();
            $table->decimal('total',15,2)->required();
            $table->foreignIdFor(\App\Models\Product::class)->constrained('products');
            $table->foreignIdFor(\App\Models\AddProduct::class)->constrained('add_products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
