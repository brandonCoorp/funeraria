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
        Schema::table('usuariofotofechas', function (Blueprint $table) {
            $table->foreign(['usuario_id'], 'usuariofotofecha_usuario_id_fkey')->references(['id'])->on('usuarios')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuariofotofechas', function (Blueprint $table) {
            $table->dropForeign('usuariofotofecha_usuario_id_fkey');
        });
    }
};
