<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //admin
        DB::table('users')->insert([
            'name'=> 'carlos',
            'email'=> 'carlos@carlos.com',
            'password'=> bcrypt('carlos'),
            'role'=> 0
            
        ]);
        //user
        DB::table('users')->insert([
            'name'=> 'carlos2',
            'email'=> 'carlos2@carlos.com',
            'password'=> bcrypt('carlos'),
            'role'=> 1
            
        ]);
        
    }
}
