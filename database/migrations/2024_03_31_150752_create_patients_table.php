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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sex');
            $table->date('dob');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->int('matric_number');
            $table->string('faculty');
            $table->string('department');
            $table->string('state_of_origin');
            $table->string('country');
            $table->string('blood_group');
            $table->string('genotype');
            $table->int('height');
            $table->int('weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
