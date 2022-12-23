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
        Schema::table('compras', function (Blueprint $table) {
            $table->foreign(['cliente_id'], 'compras_cliente_id_fkey')->references(['id'])->on('clientes')->onDelete('CASCADE');
            $table->foreign(['paquete_id'], 'compras_paquete_id_fkey')->references(['id'])->on('paquetes')->onDelete('CASCADE');
            $table->foreign(['pago_id'], 'compras_pago_id_fkey')->references(['id'])->on('pagos')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->dropForeign('compras_cliente_id_fkey');
            $table->dropForeign('compras_paquete_id_fkey');
            $table->dropForeign('compras_pago_id_fkey');
        });
    }
};
