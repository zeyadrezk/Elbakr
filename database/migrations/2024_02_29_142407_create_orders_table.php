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
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained('users');
            $table->decimal('total',15,2)->required();
            $table->foreignIdFor(\App\Models\Address::class)->constrained('addresses');
            $table->foreignIdFor(\App\Models\PromoCode::class)->constrained('Promo_codes');
            $table->decimal('discount_value',15,2)->nullable();
            $table->date('pay_date')->nullable();
            $table->string('payment_reference')->nullable();
            $table->enum('status',['pending','waiting','current','delivered'])->defaultValue('pending');
            $table->string('card')->nullable();
            $table->timestamps();
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
