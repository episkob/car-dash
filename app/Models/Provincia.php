<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provincia extends Model
{
    protected $table = 'province';

    protected $fillable = ['name', 'regione_id'];

    public function regione(): BelongsTo
    {
        return $this->belongsTo(Regione::class);
    }

    public function comuni(): HasMany
    {
        return $this->hasMany(Comune::class);
    }
}
