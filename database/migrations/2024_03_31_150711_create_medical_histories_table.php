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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->date('diagnosis_date');
            $table->string('medication_name');
            $table->string('medication_dosage');
            $table->date('medication_start_date');
            $table->date('medication_end_date');
            $table->string('allergies');
            $table->date('immunisation_date');
            $table->string('immunisation_vaccine');
            $table->string('lab_result');
            $table->string('referring_doctor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
