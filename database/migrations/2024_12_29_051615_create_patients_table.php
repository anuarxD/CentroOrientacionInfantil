<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('psychologist_id')->nullable(); 
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro'])->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('tutor_nombre', 255)->nullable();
            $table->string('tutor_relacion', 50)->nullable();
            $table->string('tutor_telefono', 20)->nullable();
            $table->text('historial_medico')->nullable();
            $table->text('alergias')->nullable();
            $table->timestamps();
            
             $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('psychologist_id')->references('id')->on('psychologists')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
