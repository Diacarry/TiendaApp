<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); /* Identificador del producto */
            $table->timestamps();

            $table->string('name', 50); /* nombre del producto */
            $table->string('size', 1); /* tallas del producto */
            $table->string('observations', 100); /* observaciones del producto */
            $table->integer('quantity'); /* cantidad registrada del producto */
            $table->date('shipping_date'); /* fecha de embarque */

            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
