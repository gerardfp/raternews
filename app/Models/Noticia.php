<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Noticia extends Model
{

    protected $fillable = ['titulo', 'cuerpo', 'enlace'];

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
