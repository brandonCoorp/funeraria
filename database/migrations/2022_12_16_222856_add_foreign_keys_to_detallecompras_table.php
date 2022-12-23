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
        Schema::table('detallecompras', function (Blueprint $table) {
            $table->foreign(['compra_id'], 'detallecompras_compra_id_fkey')->references(['id'])->on('compras')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detallecompras', function (Blueprint $table) {
            $table->dropForeign('detallecompras_compra_id_fkey');
        });
    }
};
