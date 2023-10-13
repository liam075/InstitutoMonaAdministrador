<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudiantes extends Model
{
    use HasFactory;
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
