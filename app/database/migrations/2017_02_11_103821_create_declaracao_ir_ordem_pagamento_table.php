<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeclaracaoIrOrdemPagamentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('declaracao_ir_ordem_pagamento', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('id_ordem_pagamento')->unsigned();
            $table->integer('id_declaracao_ir')->unsigned();
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
		Schema::drop('declaracao_ir_ordem_pagamento');
	}

}
