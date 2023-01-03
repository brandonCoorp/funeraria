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
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign(['role_id'], 'usuarios_role_id_fkey')->references(['id'])->on('roles')->onDelete('CASCADE');
            $table->foreign(['persona_id'], 'usuarios_persona_id_fkey')->references(['id'])->on('personas')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('usuarios_role_id_fkey');
            $table->dropForeign('usuarios_persona_id_fkey');
        });
    }
};
