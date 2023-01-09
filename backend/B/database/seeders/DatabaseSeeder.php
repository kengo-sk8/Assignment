<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Task;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ja_JP');

        $admin = User::create([
            'name'     => 'admin',
            'email'    => 'matsuno@example.com',
            'password' => Hash::make('Test1234')
        ]);

        $user1 = User::create([
            'name'     => $faker->name(),
            'email'    => 'test1@example.com',
            'password' => Hash::make('password')
        ]);

        for ($i = 0; $i < 10; $i++) {
            Task::create([
                'name'    => $faker->text(50),
                'status'  => 0,
                'user_id' => $user1->id
            ]);
        }
    }
}
