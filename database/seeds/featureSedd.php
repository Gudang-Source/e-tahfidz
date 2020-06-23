<?php

use Illuminate\Database\Seeder;
use App\Models\feature;

class featureSedd extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        feature::create([
            "nama_fitur" => "iklan",
            "status" => "non-checked"
        ]);

        feature::create([
            "nama_fitur" => "spp",
            "status" => "non-checked"
        ]);
    }
}
