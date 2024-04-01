<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;
    protected $table = 'medical_history';
    protected $fillable = ['patient_id', 'diagnosis_date', 'medication_name', 'medication_dosage', 'medication_start_date', 'medication_end_date', 'allergies', 'immunisation_date', 'immunisation_vaccine', 'lab_result', 'referring_doctor'];
}
