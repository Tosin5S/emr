<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = ['doctor_id', 'name', 'sex', 'dob', 'address', 'phone_number', 'email', 'department', 'marital_status', 'state_of_origin', 'country', 'next_of_kin_name', 'next_of_kin_phone_number'];
}
