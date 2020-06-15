<?php

use Illuminate\Database\Seeder;
use App\User;
class superAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "Tahfidz Online",
            "email" => "otahfidz@gmail.com",
            "password" => bcrypt('superadmin'),
            "role" => "super_admin"
        ]);
    }
}
