<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    use HasFactory;
    protected $table = 'vendedores';
    protected $fillable = [
        'nombre',
        'apellido',
        'documento_identidad',
        'fecha_nacimiento',
        'direccion',
        'usuario',
        'contraseña',
        'ventas_hechas',
    ];
}
