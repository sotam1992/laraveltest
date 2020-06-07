<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('users')->delete();

        if(DB::table('users')->get()->count() == 0){

            DB::table('users')->insert([

                [
                    'name' => 'Doctor',
                    'email' => 'doctor@gmail.com',
                    'role' => 'Doctor',
                    'address' => 'bhawarkua indore',
                    'designation' => 'Cardiologists',
                    'mobile' => '8871025543',
                    'fees' => 500,
                    'password' => bcrypt('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Patient',
                    'email' => 'patient@gmail.com',
                    'role' => 'Patient',
                    'address' => 'bhawarkua indore',
                    'designation' => 'patient',
                    'mobile' => '8871025543',
                    'fees' => 500,
                    'password' => bcrypt('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else {
         	echo "\e[31mTable is not empty, therefore NOT "; 
     	}
    }
}
