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
        Schema::create('paqueteservicio', function (Blueprint $table) {
            $table->integer('paquete_id');
            $table->integer('servicio_id');
            $table->string('cod_servicio', 20)->nullable();

            $table->primary(['paquete_id', 'servicio_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paqueteservicio');
    }
};
