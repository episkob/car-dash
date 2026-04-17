<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comune extends Model
{
    protected $table = 'comuni';

    protected $fillable = ['name', 'provincia_id'];

    public function provincia(): BelongsTo
    {
        return $this->belongsTo(Provincia::class);
    }

    public function citta(): HasMany
    {
        return $this->hasMany(Citta::class);
    }
}
