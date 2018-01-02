<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdemPagamentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ordem_pagamento', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_usuario')->unsigned();
			$table->string('status')->default('Pendente');
			$table->float('valor');
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
		Schema::drop('ordem_pagamento');
	}

}
