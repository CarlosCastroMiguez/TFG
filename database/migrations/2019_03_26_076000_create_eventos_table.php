<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre');
            $table->TinyInteger('numAlumnos');
            $table->Date('date');
            $table->TIME('start_time');
            $table->TIME('end_time');
            $table->unsignedInteger('id_asignatura');
            $table->unsignedInteger('id_profesor');
            $table->unsignedInteger('id_sala');
            $table->unsignedInteger('id_simulador');
            
            $table->timestamps();
        });
        
        Schema::table('eventos', function($table){
            
            $table->foreign('id_asignatura')->references('id')->on('asignaturas')->onDelete('cascade');
            $table->foreign('id_profesor')->references('id')->on('profesors')->onDelete('cascade');
            $table->foreign('id_sala')->references('id')->on('salas')->onDelete('cascade');
            $table->foreign('id_simulador')->references('id')->on('simuladors')->onDelete('cascade');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
