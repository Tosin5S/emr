<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $table = 'prescription';
    protected $fillable = ['prescription_id', 'prescription_name', 'prescription_dosage', 'start_date', 'end_date', 'patient_id', 'doctor_id'];
}
