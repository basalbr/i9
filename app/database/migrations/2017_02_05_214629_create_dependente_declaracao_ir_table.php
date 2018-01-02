<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenteDeclaracaoIrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dependente_declaracao_ir', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('id_declaracao_ir')->unsigned();
            $table->integer('id_tipo_dependente')->unsigned();
            $table->string('nome');
            $table->string('data_nascimento');
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
		Schema::drop('dependente_declaracao_ir');
	}

}
