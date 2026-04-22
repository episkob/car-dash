<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Immagine extends Model
{
    protected $table = 'immagini';

    protected $fillable = ['nome', 'path', 'disk'];

    public function annunci(): BelongsToMany
    {
        return $this->belongsToMany(Annuncio::class, 'annuncio_immagine');
    }
}
