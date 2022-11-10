<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbastecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abastecimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('products_id')->constrained('products');
            $table->foreignId('cantidad_id');
            $table->double('valor',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abastecimientos', function (Blueprint $table) {
            $table->dropForeign('abastecimientos_products_id_foreign');
        });
        Schema::table('abastecimientos', function (Blueprint $table) {
            $table->dropForeign('abastecimientos_cantidad_id_foreign');
        });
        Schema::dropIfExists('abastecimientos');
    }
}
