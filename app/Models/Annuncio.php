<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Annuncio extends Model
{
    protected $table = 'annunci';

    protected $fillable = ['titolo', 'testo', 'citta_id'];

    public function citta(): BelongsTo
    {
        return $this->belongsTo(Citta::class);
    }

    public function immagini(): BelongsToMany
    {
        return $this->belongsToMany(Immagine::class, 'annuncio_immagine');
    }
}
