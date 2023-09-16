<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_cursodocente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')->on('docente')->onDelete("cascade");
            $table->bigInteger('curso_id')->unsigned();
            $table->timestamps();
            $table->foreign('curso_id')->references('id')->on('curso')->onDelete("cascade");
            $table->string('grado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacion_cursodocente');
    }
};
