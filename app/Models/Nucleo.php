<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nucleo extends Model
{
    //use HasFactory;
    protected $table = 'nucleos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombreNu',
        'codigo',
        'descripcionG',
    ];

    //relacionando de uno a muchos/
    //un nuclo tiene muchas unidades
  // public function Unidades(){
    //    return $this->hasMany(UnidadesE::class, 'id');
   //}
}
