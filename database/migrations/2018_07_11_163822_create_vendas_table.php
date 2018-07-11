<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVendasTable.
 */
class CreateVendasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendas', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onDelete('cascade');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');	
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
		Schema::drop('vendas');
	}
}
