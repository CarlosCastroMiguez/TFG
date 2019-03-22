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
            $table->unsignedInteger('id_asignatura');
            $table->foreign('id_asignatura')->references('id_asignatura')->on('subject')->onDelete('cascade');
            $table->unsignedInteger('id_profesor');
            $table->foreign('id_profesor')->references('id_profesor')->on('teacher')->onDelete('cascade');
            $table->unsignedInteger('id_sala');
            $table->foreign('id_sala')->references('id_sala')->on('room')->onDelete('cascade');
            
            $table->timestamps();
        });
        
        Schema::enableForeignKeyConstraints();

    }

     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
