<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Area::class)->constrained('areas');
            $table->foreignIdFor(\App\Models\City::class)->constrained('cities');
            $table->foreignIdFor(\App\Models\Town::class)->constrained('towns');
            $table->string('street')->nullable();
            $table->string('building_num')->nullable();
            $table->string('landmark')->nullable();
            $table->foreignIdFor(\App\Models\User::class)->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
