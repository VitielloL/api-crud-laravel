<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class feeding_people_table extends Seeder
{
    public function run()
    {
        DB::table('pessoas')->insert([
            'nome' => 'lucas',
            'sobrenome' => 'vitiello',
            'cpf' => '123546789',
            'celular' => '21968834048',
            'logradouro' => 'Rua Sargento João Lopes',
            'cep' => '21921600'
        ]);
    }
}
