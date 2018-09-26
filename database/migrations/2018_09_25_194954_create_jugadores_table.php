<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->increments('id');
            $table->text('foto')->nullable();;
            $table->string('nombre')->nullable();;
            $table->string('apellidos')->nullable();;
            $table->date('fecha_nacimiento')->nullable();;
            $table->integer('equipo_id')->nullable();;
            $table->integer('posicion_id')->nullable();;
            $table->integer('num_camiseta')->nullable();;
            $table->string('titular')->nullable();;
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
}
