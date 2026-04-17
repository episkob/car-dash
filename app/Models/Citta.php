<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Citta extends Model
{
    protected $table = 'citta';

    protected $fillable = ['name', 'type', 'comune_id'];

    public function comune(): BelongsTo
    {
        return $this->belongsTo(Comune::class);
    }
}
