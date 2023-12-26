<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudiantes extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    
    protected $fillable = [
        'nombre',
        'apellido',
        'documento_identidad',
        'fecha_nacimiento',
        'telefono',
        'correo_electronico',
        'direccion',
        'enfermedad',
        'telefono_emergencia',
        'tipo_pago',
        'kardek',
        'carreras_id',
        'materias_id',
        'cursos_id',
    ];
    public function cursos(): BelongsTo
    {
        return $this->belongsTo(Cursos::class);
    }
    public function carreras(): BelongsTo
    {
        return $this->belongsTo(Carreras::class);
    }
    public function materias(): BelongsTo
    {
        return $this->belongsTo(Materias::class);
    }
}
