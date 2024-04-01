<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = ['patient_id', 'name', 'sex', 'dob', 'address', 'phone_number', 'email', 'matric_number', 'faculty', 'department', 'state_of_origin', 'country', 'blood_group', 'genotype', 'height', 'weight'];
}
