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
        Schema::create('laboratory_technicians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sex');
            $table->date('dob');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('department');
            $table->string('marital_status');
            $table->string('state_of_origin');
            $table->string('country');
            $table->string('next_of_kin_name');
            $table->string('next_of_kin_phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratory_technicians');
    }
};
