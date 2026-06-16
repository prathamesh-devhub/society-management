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
        Schema::create('settings', function (Blueprint $table) {
                    $table->id();

                    // Society Information
                    $table->string('society_name');
                    $table->string('registration_no')->nullable();
                    $table->text('address')->nullable();
                    $table->string('email')->nullable();
                    $table->string('phone')->nullable();

                    // Logo
                    $table->string('logo')->nullable();

                    // Bank Details
                    $table->string('bank_name')->nullable();
                    $table->string('account_no')->nullable();
                    $table->string('ifsc_code')->nullable();

                    // Maintenance Settings
                    $table->decimal('repair_rate', 8, 2)->default(0);
                    $table->decimal('sinking_rate', 8, 2)->default(0);
                    $table->decimal('building_rate', 8, 2)->default(0);

                    $table->decimal('electricity_charge', 8, 2)->default(0);
                    $table->decimal('water_charge', 8, 2)->default(0);
                    $table->decimal('service_charge', 8, 2)->default(0);
                    $table->decimal('lift_charge', 8, 2)->default(0);
                    $table->decimal('insurance_charge', 8, 2)->default(0);
                    $table->decimal('education_charge', 8, 2)->default(0);

                    // Late Payment
                    $table->decimal('interest_rate', 5, 2)->default(0);

                    $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
