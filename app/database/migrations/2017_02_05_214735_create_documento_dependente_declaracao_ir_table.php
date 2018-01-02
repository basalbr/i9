<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoDependenteDeclaracaoIrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documento_dependente_declaracao_ir', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('id_declaracao_ir')->unsigned();
            $table->foreign('id_declaracao_ir')->references('id')->on('declaracao_ir');
            $table->string('descricao');
            $table->string('documento');
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
		Schema::drop('documento_dependente_declaracao_ir');
	}

}
