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
        Schema::create('ask_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\AskPriceCategory::class)->constrained('ask_price_categories');
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('email')->required();
            $table->string('phone')->required();
            $table->string('message')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ask_prices');
    }
};
