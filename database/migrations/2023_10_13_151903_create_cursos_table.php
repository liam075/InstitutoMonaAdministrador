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
    titulo	varchar(70)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	3	status	varchar(100)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	4	descripcion	varchar(100)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	5	id_user Índice	int			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	6	post-name	varchar(50)	utf8mb4_general_ci		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	7	post-type	varchar(50)	utf8mb4_general_ci		Sí	NULL
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('status');
            $table->foreignId('user_id')->consrained('users')->cascadeOnDelete();
            $table->string('post-name');
            $table->string('post-type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
