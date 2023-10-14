<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /*
    nombre	varchar(50)	utf8mb3_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	3	apellido	varchar(50)	utf8mb3_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	4	documento_identidad	varchar(10)	utf8mb3_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	5	fecha_nacimiento	date			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	6	direccion	varchar(100)	utf8mb3_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	7	usuario	varchar(30)	utf8mb3_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	8	contraseña	varchar(50)	utf8mb3_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	9	ventas_hechas
     */
    public function up(): void
    {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('documento_identidad');
            $table->date('fecha_nacimiento');
            $table->string('direccion');
            $table->string('usuario');
            $table->string('contraseña');
            $table->integer('ventas_hechas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedores');
    }
};
