<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('event', function (Blueprint $table) {
            $table->increments('id_evento');
            $table->string('nombre');
            $table->tinyInteger('numAlumnos');
            $table->Date('date');
            $table->TIME('start_time');
            $table->TIME('end_time');
            $table->integer('id_asignatura')->unsigned();
            $table->integer('id_profesor')->unsigned();
            $table->integer('id_sala')->unsigned();
            
            $table->timestamps();
        });
        
        
        Schema::table('event', function($table)
        {
            
            $table->foreign('id_asignatura')->references('id_asignatura')->on('subject')->onDelete('cascade');
            $table->foreign('id_profesor')->references('id_profesor')->on('teacher')->onDelete('cascade');
            $table->foreign('id_sala')->references('id_sala')->on('room')->onDelete('cascade');
        });
        

    }
     /*
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
