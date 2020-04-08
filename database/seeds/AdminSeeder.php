<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Administrator',
        	'email' => 'administrator@mail.com',
        	'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('admin');
    }
}
