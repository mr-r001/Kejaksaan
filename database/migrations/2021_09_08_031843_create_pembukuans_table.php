<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembukuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembukuans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('biodata_id');
            $table->string('locus', 100);
            $table->unsignedSmallInteger('kecamatan_id');
            $table->string('ket', 100)->nullable();
            $table->timestamps();

            $table->foreign('biodata_id')->references('id')->on('biodata_w_n_i_s')->onDelete('cascade');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembukuans');
    }
}
