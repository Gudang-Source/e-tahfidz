<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\murid;
class muridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "yoki hendrika",
            "email" => "yoki035@gmail.com",
            "password" => bcrypt('yoki0000'),
            "role" => "murid"
        ]);
        murid::create([
            "nama" => "yoki hendrika",
            "kelas_id" => null
        ]);

        User::create([
            "nama" => "maretabenza purnama",
            "email" => "sipur@gmail.com",
            "password" => bcrypt('pur0000'),
            "role" => "murid"
        ]);
        murid::create([
            "nama" => "maretabenza purnama",
            "kelas_id" => null
        ]);

        User::create([
            "nama" => "muhammad al farizzi",
            "email" => "muhammadalfarizzi563@gmail.com",
            "password" => bcrypt('alfarizzi0000'),
            "role" => "murid"
        ]);
        murid::create([
            "nama" => "muhammad al farizzi",
            "kelas_id" => null
        ]);

        User::create([
            "nama" => "dion efendi",
            "email" => "dion@gmail.com",
            "password" => bcrypt('dion0000'),
            "role" => "murid"
        ]);
        murid::create([
            "nama" => "dion efendi",
            "kelas_id" => null
        ]);

        User::create([
            "nama" => "naufal afif",
            "email" => "naufal@gmail.com",
            "password" => bcrypt('naufal0000'),
            "role" => "murid"
        ]);
        murid::create([
            "nama" => "naufal afif",
            "kelas_id" => null
        ]);
        
    }
}
