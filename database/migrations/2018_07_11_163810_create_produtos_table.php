<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProdutosTable.
 */
class CreateProdutosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produtos', function(Blueprint $table) {
            $table->increments('id');
			$table->string('nome',255);
			$table->decimal('valor',20,2);
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
		Schema::drop('produtos');
	}
}
