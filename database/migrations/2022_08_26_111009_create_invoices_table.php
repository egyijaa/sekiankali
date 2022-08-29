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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_item');
            $table->unsignedInteger('id_method');
            $table->foreign('id_item')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('id_method')->references('id')->on('methods')->onDelete('cascade');
            $table->string('kode')->unique();
            $table->date('tgl');
            $table->string('hargaSebelum');
            $table->string('hargaSesudah');
            $table->bigInteger('qty');
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
        Schema::dropIfExists('invoices');
    }
};
