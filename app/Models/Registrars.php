<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrars extends Model
{
    use HasFactory;
    protected $table = 'registrars';
    protected $fillable = ['registrar_id', 'name', 'sex', 'dob', 'address', 'phone_number', 'email', 'marital_status', 'state_of_origin', 'country', 'next_of_kin_name', 'next_of_kin_phone_number'];
}
