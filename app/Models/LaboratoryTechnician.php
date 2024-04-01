<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryTechnician extends Model
{
    use HasFactory;
    protected $table = 'laboratory_technician';
    protected $fillable = ['lab_tech_id', 'name', 'sex', 'dob', 'address', 'phone_number', 'email', 'department', 'marital_status', 'state_of_origin', 'country', 'next_of_kin_name', 'next_of_kin_phone_number'];
}
