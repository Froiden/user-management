<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) {
            User::create([
                'name'     => $faker->name,
                'email'    => $faker->email,
                'dob'    => \Carbon\Carbon::now(),
                'password' => \Illuminate\Support\Facades\Hash::make('123456')
            ]);
        }
    }
}
