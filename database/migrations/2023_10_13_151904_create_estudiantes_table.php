<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /*nombre	varchar(100)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	3	apellido	varchar(100)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	4	documento_identidad	varchar(20)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	5	telefono	varchar(10)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	6	correo_electronico	varchar(100)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	7	direccion	varchar(500)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	8	enfermedad	varchar(2)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	9	telefono_emergencia	varchar(10)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	10	tipo_pago	varchar(100)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	11	kardek	varchar(100)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	12	carrera	varchar(100)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	13	materia	varchar(100)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	14	curso */
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('documento_identidad');
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('correo_electronico');
            $table->string('direccion');
            $table->string('enfermedad');
            $table->string('telefono_emergencia');
            $table->string('tipo_pago');
            $table->foreignId('carrera_id')->consrained('carreras')->cascadeOnDelete();
            $table->foreignId('materias_id')->consrained('materias')->cascadeOnDelete();;
            $table->foreignId('cursos_id')->consrained('cursos')->cascadeOnDelete();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
