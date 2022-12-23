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
        Schema::table('paqueteservicio', function (Blueprint $table) {
            $table->foreign(['servicio_id'], 'paqueteservicio_servicio_id_fkey')->references(['id'])->on('servicios')->onDelete('CASCADE');
            $table->foreign(['paquete_id'], 'paqueteservicio_paquete_id_fkey')->references(['id'])->on('paquetes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paqueteservicio', function (Blueprint $table) {
            $table->dropForeign('paqueteservicio_servicio_id_fkey');
            $table->dropForeign('paqueteservicio_paquete_id_fkey');
        });
    }
};
