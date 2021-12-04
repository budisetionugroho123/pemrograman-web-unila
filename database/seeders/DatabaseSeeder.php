<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'role'=>'admin',
            'name'=>'Budi Setio Nugroho',
            'email'=>'budisetionugroho0001@gmail.com',
            'password'=>Hash::make('06mei2001'),
            'alamat' =>'Graha Serpong Hijau',
            'tanggal_lahir' =>'2001-05-06'
        ]);
        User::create([
            'role'=>'member',
            'name'=>'Hilda laila hafiza',
            'email'=>'hilda@gmail.com',
            'password'=>Hash::make('12345678'),
            'alamat' =>'Graha Serpong Hijau',
            'tanggal_lahir' =>'2001-11-08'
        ]);

    }
}