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
        Schema::table('opcion', function (Blueprint $table) {
            $table->foreign(['usuario_id'], 'opcion_usuario_id_fkey')->references(['id'])->on('usuarios')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opcion', function (Blueprint $table) {
            $table->dropForeign('opcion_usuario_id_fkey');
        });
    }
};
