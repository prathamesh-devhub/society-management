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
        Schema::create('maintenance_bills', function (Blueprint $table) {
            $table->id();

            $table->foreignId('member_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('bill_month');
            $table->integer('bill_year');

            $table->decimal('square_feet',10,2);

            $table->decimal('repair_amount',10,2)->default(0);
            $table->decimal('sinking_amount',10,2)->default(0);
            $table->decimal('building_amount',10,2)->default(0);

            $table->decimal('electricity_charge',10,2)->default(0);
            $table->decimal('water_charge',10,2)->default(0);
            $table->decimal('service_charge',10,2)->default(0);
            $table->decimal('lift_charge',10,2)->default(0);
            $table->decimal('insurance_charge',10,2)->default(0);
            $table->decimal('education_charge',10,2)->default(0);

            $table->decimal('current_bill_total',10,2)->default(0);

            $table->decimal('previous_due',10,2)->default(0);

            $table->decimal('interest_amount',10,2)->default(0);

            $table->decimal('advance_amount',10,2)->default(0);

            $table->decimal('grand_total',10,2)->default(0);

            $table->date('bill_date');
            $table->date('due_date');

            $table->enum('status', [
                'Unpaid',
                'Partially Paid',
                'Paid'
            ])->default('Unpaid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_bills');
    }
};
