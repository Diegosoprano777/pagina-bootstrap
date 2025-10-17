<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspaciosTable extends Migration
{
    public function up()
    {
        Schema::create('espacios', function (Blueprint $table){
            $table->id();
            $table->string ('nombre');
            $table->enum('tipo', ['cancha', 'salon', 'gimnasio', 'otro']);

            $table->unsignedInteger('aforo');
            $table->string('ubicacion');
            $table->boolean('requiere_instructor')->default(false);
            $table->timestamps();

            $table->unique(['nombre', 'ubicacion']);
            
            $table->index('tipo');
            $table->index('ubicacion');
        });
    }
    
    public function down()
    {
    Schema::dropIfExist('espacios');
    }
}