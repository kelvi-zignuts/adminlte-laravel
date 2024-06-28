<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     // Get Firebase credentials from the environment variable
    //     $firebaseCredentialsPath = base_path(env('FIREBASE_CREDENTIALS'));

    //     // Check if the file exists
    //     if (!file_exists($firebaseCredentialsPath)) {
    //         throw new \Exception("Firebase credentials file not found: " . $firebaseCredentialsPath);
    //     }

    //     // Create a Firebase instance
    //     $factory = (new Factory)->withServiceAccount($firebaseCredentialsPath)->withDatabaseUri('https://expense-manager-4ab42-default-rtdb.firebaseio.com')

    //     ;
    //     $database = $factory->createDatabase();

    //     // Define your seeder data
    //     $seederData = [
    //         'users' => [
    //             [
    //                 'id' => 1,
    //                 'first_name' => 'Admin',
    //                 "last_name" => 'admin',
    //                 'email' => 'admin@example.com',
    //                 'password' => bcrypt('password'),
    //                 'user_type' => 'admin'
    //             ],
    //         ]
    //     ];

    //     // Write the seeder data to Firebase
    //     foreach ($seederData as $key => $data) {
    //         $database->getReference($key)->set($data);
    //     }
    // }
}
