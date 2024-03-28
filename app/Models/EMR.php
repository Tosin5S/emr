<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMR extends Model
{
    use HasFactory;
    protected $table = 'emr';
    protected $fillable = ['name', 'position'];
}
