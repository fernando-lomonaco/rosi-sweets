<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        DB::table('produtos')->insert([
            [
                'nome' => 'Bolo de Chocolate',
                'descricao' => 'Bolo caseiro de chocolate com cobertura cremosa.',
                'preco' => 35.90,
                'categoria' => 'Bolos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Brigadeiro Gourmet',
                'descricao' => 'Unidade de brigadeiro feito com chocolate belga.',
                'preco' => 2.50,
                'categoria' => 'Doces',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Torta de Limão',
                'descricao' => 'Torta gelada com recheio cremoso e cobertura de merengue.',
                'preco' => 45.00,
                'categoria' => 'Tortas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
