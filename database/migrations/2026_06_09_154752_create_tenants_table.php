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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();


            $table->foreignId('member_id')
              ->constrained()
              ->cascadeOnDelete();

            $table->string('name');

            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('aadhaar_no')->nullable();
            $table->string('occupation')->nullable();

            $table->date('agreement_start');
            $table->date('agreement_end');

            $table->string('id_proof')->nullable();
            $table->string('agreement_copy')->nullable();
            $table->string('police_verification')->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
