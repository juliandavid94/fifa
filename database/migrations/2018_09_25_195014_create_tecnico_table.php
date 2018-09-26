<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTecnicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();;
            $table->string('apellidos')->nullable();;
            $table->date('fecha_nacimiento')->nullable();;
            $table->integer('nacionalidad_id')->nullable();;
            $table->integer('rol_tecnico_id')->nullable();;
            $table->integer('equipo_id')->nullable();;
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
        Schema::dropIfExists('tecnico');
    }
}
