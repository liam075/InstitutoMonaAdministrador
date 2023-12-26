<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Cursos extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    protected $fillable = [
        'titulo',
        'descripcion',
        'status',
        'user_id',
        'post-name',
        'post-type',
    ];
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
