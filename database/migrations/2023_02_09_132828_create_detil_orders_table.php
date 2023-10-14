<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetilOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order');
            $table->string('jumlah');
            $table->string('satuan');
            $table->string('nama_barang');
            $table->string('harga');
            $table->string('total');
            $table->string('proses')->default('0');
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
        Schema::dropIfExists('detil_orders');
    }
}
