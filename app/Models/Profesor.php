<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Profesor extends Model
{
    use HasRoles;
    use HasFactory;

    protected $table = 'profesores';
    protected $fillable = [
        'ci',
        'rda',
        'nombre',
        'apellidos',
        'celular',
        'correo',
        'pdf_path',
        'unidad_educativa_id'
    ];

    public function unidadEducativa()
    {
        return $this->belongsTo(UnidadesE::class,'unidad_educativa_id','id');
    }
    
}
