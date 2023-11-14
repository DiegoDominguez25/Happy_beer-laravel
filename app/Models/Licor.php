<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Licor extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre",
        "descripcion",
        "precio",
        "stock"
    ];

    /*
        Debido a la convención de nombres no tenemos que declarar una llave local y la otra forane
        para especificar a quien pertenece que
    */

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class/*,'licor_id','id'*/);
    }

    public function archivo(): HasOne
    {
        return $this->hasOne(Archivo::class);
    }
}
