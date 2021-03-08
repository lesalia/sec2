<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinoDocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destino_doc', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('doc_id')->unsigned();
            $table->foreign('doc_id')->references('id')->on('docs')->onDelete('cascade');

            $table->integer('destino_id')->unsigned();
            $table->foreign('destino_id')->references('id')->on('destinos')->onDelete('cascade');

            $table->string('observacao')->nullable();
            $table->string('ficheiro');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destino_doc');
    }
}
