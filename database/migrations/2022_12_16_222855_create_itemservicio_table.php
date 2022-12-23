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
        Schema::create('itemservicio', function (Blueprint $table) {
            $table->integer('item_id');
            $table->integer('servicio_id');
            $table->integer('cantidad')->nullable();
            $table->string('cod_item', 20)->nullable();

            $table->primary(['item_id', 'servicio_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemservicio');
    }
};
