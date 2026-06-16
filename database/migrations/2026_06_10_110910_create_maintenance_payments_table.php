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
        Schema::create('maintenance_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('maintenance_bill_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('payment_date');

            $table->decimal('amount',10,2);

            $table->string('payment_mode')->nullable();

            $table->string('reference_no')->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_payments');
    }
};
