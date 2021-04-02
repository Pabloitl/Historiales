<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_control';

    public $timestamps = false;

    protected $fillable = ['no_control', 'nombre', 'sexo', 'carrera'];
}
