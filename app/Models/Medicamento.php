<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $primaryKey = 'cod_m';

    public $timestamps = false;

    protected $fillable = ['cod_m', 'nombre', 'cantidad'];
}
