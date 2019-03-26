<?php

use Illuminate\Database\Seeder;
use App\Asignatura;
class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asignatura::create([
            'nombre' => 'asignatura A',
            'codigo' => '1111',
            'grado' => 'grado A',
            'curso' => 1,
            'grupo' => 'grupo A'
        ]);
        Asignatura::create([
            'nombre' => 'asignatura B',
            'codigo' => '2222',
            'grado' => 'grado B',
            'curso' => 2,
            'grupo' => 'grupo B'
        ]);
        Asignatura::create([
            'nombre' => 'asignatura C',
            'codigo' => '3333',
            'grado' => 'grado C',
            'curso' => 3,
            'grupo' => 'grupo C'
        ]);
        
    }
}
