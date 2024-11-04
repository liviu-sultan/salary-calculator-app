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
        Schema::create('tax_bands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('annual_salary_range_min', 10, 2)->nullable();
            $table->decimal('annual_salary_range_max', 10, 2)->nullable();
            $table->decimal('rate', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_bands');
    }
};
