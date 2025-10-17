<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreingId('espacio_id')->constrained('espacios')->onDelete('cascade');
            
            //Si no existe tabla users, se usa '->unsignedBigIntegert('usuarioID') en su lugar    
            $table->unsignedBigInteger('usuario_id')->nullable();

            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->enum('estado', ['pendiente', 'aprovada', 'rechazada', 'cancelada', ])->default('pendiente');
            $table->text('observaciones')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['espacio_id', 'fecha', 'hora_inicio']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
