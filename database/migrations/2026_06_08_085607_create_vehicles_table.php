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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('member_id')->constrained()->onDelete('cascade');
            $table->string('vehicle_number');
            $table->string('vehicle_type');
            $table->string('vehicle_brand')->nullable();
            $table->string('vehicle_color')->nullable();
            $table->string('parking_slot')->nullable();
            $table->string('ownership_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
