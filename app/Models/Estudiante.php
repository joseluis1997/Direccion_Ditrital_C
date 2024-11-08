<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'unidad_educativa_id',
        'nivel',
        'grado',
        'paralelo',
        'cantidad_hombres',
        'cantidad_mujeres',
        'sexo',
        ];
    public function unidadEducativa() {
        return $this->belongsTo(UnidadesE::class,'unidad_educativa_id');
    }
}
