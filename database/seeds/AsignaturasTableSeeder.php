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
            'nombre' => 'Matemáticas',
            'codigo' => '0000000001',
            'grado' => 'Biotecnología',
            'curso' => 1,
            'grupo' => 'M11'
        ]);
        Asignatura::create([
            'nombre' => 'Física',
            'codigo' => '0000000002',
            'grado' => 'Farmacia',
            'curso' => 2,
            'grupo' => 'T12'
        ]);
        Asignatura::create([
            'nombre' => 'Química',
            'codigo' => '0000000003',
            'grado' => 'Enfermería',
            'curso' => 3,
            'grupo' => 'M41'
        ]);
        
    }
}
