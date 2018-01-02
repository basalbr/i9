<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcupacaoDeclaracaoIrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ocupacao_declaracao_ir', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('id_declaracao_ir')->unsigned();
            $table->integer('id_ocupacao')->unsigned();
            $table->string('descricao');
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
		Schema::drop('ocupacao_declaracao_ir');
	}

}
