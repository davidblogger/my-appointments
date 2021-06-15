<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Usuario estandar asi se reinicie la base de datos
    	User::create([
	    	'name' => 'David Mijares',
	        'email' => 'davidblogger@gmail.com',
	        'password' => bcrypt('12345'), // 12345
	        'dni' => '17382485',
	        'address' => 'Lomas del Avila, Residencias Avila Humboltd',
	        'phone' => '04120865913',
	        'role' => 'admin'
    	]);

    	//Crear usuarios de prueba en la base de datos
    	factory(User::class, 50)->create();
    }
}
