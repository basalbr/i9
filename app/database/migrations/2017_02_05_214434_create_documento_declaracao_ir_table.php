<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoDeclaracaoIrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documento_declaracao_ir', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('id_declaracao_ir')->unsigned();
            $table->string('descricao');
            $table->string('documento');
            $table->string('valor');
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
		Schema::drop('documento_declaracao_ir');
	}

}
