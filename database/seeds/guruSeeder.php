<?php

use Illuminate\Database\Seeder;
use App\Models\pengajar;
use App\User;
class guruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "sandhika galih",
            "email" => "galih@gmail.com",
            "password" => bcrypt("galih0000"),
            "role" => "pengajar"
        ]);
        pengajar::create([
            "nama" => "sandhika galih",
            "status" => "aktiv"
        ]);

        User::create([
            "nama" => "doddy ferdiansayah",
            "email" => "doddy@gmail.com",
            "password" => bcrypt("doddy0000"),
            "role" => "pengajar"
        ]);
        pengajar::create([
            "nama" => "doddy ferdiansyah",
            "status" => "aktiv"
        ]);

        User::create([
            "nama" => "jhon doe",
            "email" => "jhon@gmail.com",
            "password" => bcrypt("jhon0000"),
            "role" => "pengajar"
        ]);
        pengajar::create([
            "nama" => "jhon doe",
            "status" => "aktiv"
        ]);

        User::create([
            "nama" => "jhon lenon",
            "email" => "lenon@gmail.com",
            "password" => bcrypt("lenon0000"),
            "role" => "pengajar"
        ]);
        pengajar::create([
            "nama" => "jhon lenon",
            "status" => "aktiv"
        ]);

    }
}
