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
        Schema::table('itemservicio', function (Blueprint $table) {
            $table->foreign(['servicio_id'], 'itemservicio_servicio_id_fkey')->references(['id'])->on('servicios')->onDelete('CASCADE');
            $table->foreign(['item_id'], 'itemservicio_item_id_fkey')->references(['id'])->on('items')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itemservicio', function (Blueprint $table) {
            $table->dropForeign('itemservicio_servicio_id_fkey');
            $table->dropForeign('itemservicio_item_id_fkey');
        });
    }
};
