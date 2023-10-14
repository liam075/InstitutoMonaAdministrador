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
    vendedor_id Índice	int			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	3	estudiantes_id Índice	int			Sí	NULL			Cambiar Cambiar	Eliminar Eliminar
	4	comprobante_venta	varchar(20)	utf8mb3_unicode_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	5	fecha_venta	date			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	6	cursos_id Índice	int			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	7	se_entero	varchar(50)	utf8mb3_unicode_ci		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar
	8	comentario
    */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendedores_id')->consrained('vendedores')->cascadeOnDelete();
            $table->foreignId('estudiantes_id')->consrained('estudiantes')->cascadeOnDelete();
            $table->string('comprobante_venta');
            $table->date('fecha_venta');
            $table->foreignId('carreras_id')->consrained('carreras')->cascadeOnDelete();
            $table->foreignId('materias_id')->consrained('materias')->cascadeOnDelete();
            $table->foreignId('cursos_id')->consrained('cursos')->cascadeOnDelete();
            $table->string('se_entero');
            $table->string('comentario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
