<?php

use Illuminate\Database\Seeder;
use App\Sala;

class SalasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sala::create([
            'tipo' => 'tipo A',
            'capacidad' => 10
        ]);
        Sala::create([
            'tipo' => 'tipo B',
            'capacidad' => 20
        ]);
        Sala::create([
            'tipo' => 'tipo C',
            'capacidad' => 30
        ]);
    }
}
