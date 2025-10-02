<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    protected $primaryKey = 'ID_Horario';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'ID_Estudiante',
        'ID_Docente',
        'ID_Asignatura',
        'Dia',
        'HoraInicio',
        'HoraFin'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'ID_Estudiante');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'ID_Docente');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'ID_Asignatura');
    }
}
