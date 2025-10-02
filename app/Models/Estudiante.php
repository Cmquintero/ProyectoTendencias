<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    // Agregar email a fillable
    protected $fillable = ['nombre', 'apellido', 'semestre', 'email'];

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'ID_Estudiante', 'id');
    }
}
