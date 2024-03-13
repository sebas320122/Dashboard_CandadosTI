<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candados extends Model
{
    protected $table = 'candados';
    public $timestamps = false; 
    use HasFactory;

    protected $fillable = [
        'Columna',
        'Nombre',
        'Area',
        'Proceso',
        'Sistema',
        'Descripcion',
        'Consulta'
    ];
}
