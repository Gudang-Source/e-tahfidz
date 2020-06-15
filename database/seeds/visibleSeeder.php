<?php

use Illuminate\Database\Seeder;
use App\Models\visible;

class visibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        visible::create(["visible" => "umum"]);
        visible::create(["visible" => "pengajar"]);
        visible::create(['visible' => "pengajar & murid"]);
    }
}
