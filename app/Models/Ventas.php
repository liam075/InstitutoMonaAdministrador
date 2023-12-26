<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ventas extends Model
{
    use HasFactory;
    protected $table = 'ventas';
    protected $fillable = [
        'vendedores_id',
        'estudiantes_id',
        'comprobante_venta',
        'fecha_venta',
        'carreras_id',
        'materias_id',
        'cursos_id',
        'se_entero',
        'comentario'
    ];
    public function estudiantes(): BelongsTo
    {
        return $this->belongsTo(Estudiantes::class);
    }

    public function vendedores(): BelongsTo
    {
        return $this->belongsTo(Vendedores::class);
    }

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
