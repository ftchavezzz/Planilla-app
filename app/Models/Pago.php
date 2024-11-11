<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion' 
    ];

    public function contratos() {
        return $this->belongsToMany(Contrato::class);
    }
}
