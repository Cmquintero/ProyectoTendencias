<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nombre', 'apellido', 'especialidad', 'tipo'];


   public function horarios() {
    return $this->hasMany(Horario::class, 'ID_Docente', 'id');
}
}
