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
        Schema::create('laborers', function (Blueprint $table) {
            $table->id();
            $table->string('test_type');
            $table->string('specimen');
            $table->date('date_ordered');
            $table->integer('patient_id');
            $table->integer('doctor_id');
            $table->integer('lab_tech_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laborers');
    }
};
