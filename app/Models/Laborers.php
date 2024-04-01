<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laborers extends Model
{
    use HasFactory;
    protected $table = 'laborers';
    protected $fillable = ['lab_order_id', 'test_type', 'specimen', 'date_ordered', 'patient_id', 'doctor_id', 'lab_tech_id'];
}
