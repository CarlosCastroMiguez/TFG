<?php

use Illuminate\Database\Seeder;
use App\Profesor;

class ProfesoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profesor::create([
            'nombre' => 'AAAAA',
            'departamento' => 'departamento A'
            
        ]);
        Profesor::create([
            'nombre' => 'BBBB',
            'departamento' => 'departamento B'
            
        ]);
        Profesor::create([
            'nombre' => 'CCCC',
            'departamento' => 'departamento C'
            
        ]);
    }
}
