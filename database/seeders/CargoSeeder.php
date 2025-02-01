<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            [
                'nome' => 'Pastor',
                'users_id' => 1
            ],
            [
                'nome' => 'Co-pastor',
                'users_id' => 1
            ],
            [
                'nome' => 'Missionário',
                'users_id' => 1
            ],
            [
                'nome' => 'Evangelista',
                'users_id' => 1
            ],
            [
                'nome' => 'Presbítero',
                'users_id' => 1
            ],
            [
                'nome' => 'Líder Jovens',
                'users_id' => 1
            ],
            [
                'nome' => 'Líder Senhoras',
                'users_id' => 1
            ],
            [
                'nome' => 'Líder Louvor',
                'users_id' => 1
            ],
            [
                'nome' => 'Sonoplasta',
                'users_id' => 1
            ],
            [
                'nome' => 'Diácono',
                'users_id' => 1
            ],
            [
                'nome' => 'Auxiliar',
                'users_id' => 1
            ]
        ];

        DB::table('cargos')->insert($cargos);
    }
}
