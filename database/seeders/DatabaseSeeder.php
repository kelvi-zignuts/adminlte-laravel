<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\FirebaseDataSeeder;
use Database\Seeders\FirebaseUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'first_name' => 'Admin',
            "last_name" => 'admin',
            "phone" => '7573863694',
            // 'email' => 'admin@example.com',
            // 'password' => bcrypt('password'),
            'user_type' => 'admin',
            'roles' => 'admin'
        ]);
        
    }
    // public function run()
    // {
    //     $this->call(FirebaseDataSeeder::class);
    // }
}
