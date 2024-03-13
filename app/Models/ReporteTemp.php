<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteTemp extends Model
{
    protected $table = 'reporte_temp';
    public $timestamps = false; 
    use HasFactory;

    protected $fillable = ['Candado', 'Area', 'Proceso', 
    'Registros', 'Usuario', 'Fecha'];
}
