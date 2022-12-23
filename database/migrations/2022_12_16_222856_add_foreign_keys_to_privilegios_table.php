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
        Schema::table('privilegios', function (Blueprint $table) {
            $table->foreign(['role_id'], 'privilegios_role_id_fkey')->references(['id'])->on('roles')->onDelete('CASCADE');
            $table->foreign(['permiso_id'], 'privilegios_permiso_id_fkey')->references(['id'])->on('permisos')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('privilegios', function (Blueprint $table) {
            $table->dropForeign('privilegios_role_id_fkey');
            $table->dropForeign('privilegios_permiso_id_fkey');
        });
    }
};
