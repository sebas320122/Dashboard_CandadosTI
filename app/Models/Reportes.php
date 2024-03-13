<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    protected $table = 'reportes';
    public $timestamps = false; 
    use HasFactory;

    protected $fillable = ['Candados','Registros','Usuario','Fecha','Valido'];
}
