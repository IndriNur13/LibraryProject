<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $dataSimpan = [
            'name' => 'indri nur amiati',
            'email' => 'indrinur400@gmail.com',
            'role' => 'pengelola',
            'jenis_kelamin' =>'perempuan',
            'pictures'=>'default.com',
            'password' =>Hash::make('123123'),
        ];
        User::create($dataSimpan);
    }


}