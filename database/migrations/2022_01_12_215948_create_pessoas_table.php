<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
	public function up()
	{
		Schema::create('pessoas', function(Blueprint $table) {
            $table->increments('id');
            $table->text('nome');
            $table->text('sobrenome');
            $table->text('cpf');
            $table->string('celular');
            $table->longText('logradouro');
            $table->string('cep');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('pessoas');
	}
}
