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
        Schema::create('cart_accssories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Cart::class)->constrained('carts');
            $table->integer('quantity')->required();
            $table->foreignIdFor(\App\Models\Accessory::class)->constrained('accessories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_accssories');
    }
};
