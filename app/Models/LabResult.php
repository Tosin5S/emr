<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabResult extends Model
{
    use HasFactory;
    protected $table = 'lab_result';
    protected $fillable = ['test_id', 'result', 'date_released', 'patient_id', 'doctor_id', 'lab_tech_id'];
}
