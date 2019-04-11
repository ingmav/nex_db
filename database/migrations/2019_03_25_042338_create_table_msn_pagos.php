<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMsnPagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MSN_PAGOS', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('MS_PROVEEDOR_ID');
            $table->string('FACTURA', 50);
            $table->date('FECHA');
            $table->decimal('MONTO_SIN_IVA', 15, 2);
            $table->decimal('MONTO_TOTAL', 15, 2);
            $table->timestamps();
            $table->softDeletes();
            
            $table->primary('id');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MSN_PAGOS');
    }
}
