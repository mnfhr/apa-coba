<?php

namespace Database\Seeders;

use App\Models\TipeKamar;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(3)->create();

        User::create([
            'nama'              => 'admin',
            'username'          => 'admin',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('admin'),
            'remember_token'    => Str::random(10),
            'alamat'            => 'Kediri',
            'role'              => 'ADMIN',
        ]);

        User::create([
            'nama'              => 'resepsionis',
            'username'          => 'resepsionis',
            'email'             => 'resep@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('resepsionis'),
            'remember_token'    => Str::random(10),
            'alamat'            => 'Kediri',
            'role'              => 'RESEPSIONIS',
        ]);

        User::create([
            'nama'              => 'user',
            'username'          => 'tamu',
            'email'             => 'tamu@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('12345678'),
            'remember_token'    => Str::random(10),
            'alamat'            => 'Kediri',
            'role'              => 'USER',
        ]);

        // TipeKamar::create([
        //     'nama' => 'Reguler',
        //     'harga' => 270000,
        //     'stok' => 20,
        //     'onbook' => 0,
        //     'onuse' => 0,
        // ]);
    }
}
