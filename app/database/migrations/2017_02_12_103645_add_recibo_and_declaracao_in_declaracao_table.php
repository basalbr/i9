<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReciboAndDeclaracaoInDeclaracaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('declaracao_ir', function(Blueprint $table)
		{
			$table->string('recibo')->nullable();
			$table->string('declaracao')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('declaracao_ir', function(Blueprint $table)
		{
			//
		});
	}

}
