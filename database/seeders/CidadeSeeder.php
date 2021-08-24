<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cidade::create(['name' => 'Pirapora']);
        Cidade::create(['name' => 'Montes Claros']);
        Cidade::create(['name' => 'Janaúba']);
        Cidade::create(['name' => 'Várzea da Palma']);
        Cidade::create(['name' => 'Belo Horizonte']);
        Cidade::create(['name' => 'Buritizeiro']);
        Cidade::create(['name' => 'Rio de Janeiro']);
        Cidade::create(['name' => 'Brasília']);
        Cidade::create(['name' => 'Uberlândia']);
    }
}
