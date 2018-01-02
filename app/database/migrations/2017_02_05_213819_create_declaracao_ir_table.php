<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeclaracaoIrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('declaracao_ir', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('id_usuario');
            $table->integer('exercicio');
            $table->string('status');
            $table->softDeletes();
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
		Schema::drop('declaracao_ir');
	}

}
