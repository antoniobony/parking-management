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
        Schema::create('parking_durations', function (Blueprint $table) {
            $table->id();
            $table->datetime('parking_start');
            $table->datetime('parking_end')->nullable();
            $table->string('carNumber')->unique();
            $table->timestamps();
            $table->foreignIdFor(\App\Models\parking::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\driver::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_durations');
    }
};
