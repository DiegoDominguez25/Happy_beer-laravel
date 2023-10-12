<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BeLongsTo;

class BarcodeLicor extends Model
{
    use HasFactory;

    protected $guarded = [];

    /*
        Debido a la convención de nombres no tenemos que declarar una llave local y la otra forane
        para especificar a quien pertenece que
    */

    public function licor(): BelongsTo
    {
        return $this->belongsTo(Licor::class);
    }
}
