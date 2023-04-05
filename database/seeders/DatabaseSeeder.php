<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Ruangan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(30)->create();
        // Ruangan::factory(20)->create();
        // Product::factory(4)->create();
        // Order::factory(50)->create();
        User::create([
            'nama' => 'admin',
            'userName' => 'admin',
            // 'email_verified_at' => now(),
            'no_telephone' => '085156327536',
            'status' => 'aktif',
            'cekLevel' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'nama' => 'user',
            'userName' => 'user',
            // 'email_verified_at' => now(),
            'no_telephone' => '085156327536',
            'status' => 'aktif',
            'cekLevel' => 'user',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

    }
}
