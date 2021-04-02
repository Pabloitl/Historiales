<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_consulta';

    public $timestamps = false;

    protected $fillable = ['no_consulta', 'no_control', 'cedula', 'fecha_consulta', 'tipo_afeccion', 'cod_m'];
}
