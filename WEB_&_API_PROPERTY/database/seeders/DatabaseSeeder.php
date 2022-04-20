<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->call(UserSeeder::class);

        User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "id_role" => 1,
            "password" => bcrypt("admin")
        ]);
    }
}
