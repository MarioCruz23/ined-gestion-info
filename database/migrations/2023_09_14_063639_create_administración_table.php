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
        Schema::create('administración', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigoadmon');
            $table->string('nombreact');
            $table->string('fecha'); 
            $table->string('descripcion');
            $table->string('archivo');
            $table->bigInteger('docente_id')->unsigned();
            $table->timestamps();
            $table->foreign('docente_id')->references('id')->on('docente')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
