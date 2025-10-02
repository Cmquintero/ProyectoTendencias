<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignaturas';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int'; 

    // Ajustado a los nombres de tu migración
    protected $fillable = ['NombreAsignatura', 'Creditos', 'codigo'];

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'ID_Asignatura', 'id');

    }
}
