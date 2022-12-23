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
        Schema::table('contratos', function (Blueprint $table) {
            $table->foreign(['compra_id'], 'contratos_compra_id_fkey')->references(['id'])->on('compras')->onDelete('CASCADE');
            $table->foreign(['cliente_id'], 'contratos_cliente_id_fkey')->references(['id'])->on('clientes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropForeign('contratos_compra_id_fkey');
            $table->dropForeign('contratos_cliente_id_fkey');
        });
    }
};
