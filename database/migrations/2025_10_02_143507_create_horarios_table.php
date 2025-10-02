<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('ID_Horario');

            $table->unsignedBigInteger('ID_Estudiante');
            $table->unsignedBigInteger('ID_Docente');
            $table->unsignedBigInteger('ID_Asignatura');

            $table->string('Dia', 20);
            $table->time('HoraInicio');
            $table->time('HoraFin');
            $table->timestamps();

            $table->foreign('ID_Estudiante')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->foreign('ID_Docente')->references('id')->on('docentes')->onDelete('cascade');
            $table->foreign('ID_Asignatura')->references('id')->on('asignaturas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
