<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(1)->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('estado_id')->unsigned()->default(1);
            $table->foreign('estado_id')->references('id')->on('estados')
                ->onDelete('cascade');

            $table->string('nrDoc')->default(1);
            $table->string('referencia')->nullable();
            $table->string('remetente');
            $table->string('email')->nullable(); // E-mail do remetente
            $table->string('categoria');
            $table->string('origem');
            $table->string('assunto');
            $table->text('descricao')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('docs');
    }
}
