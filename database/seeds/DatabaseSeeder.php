<?php

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
        $this->call(superAdminSeeder::class);
        $this->call(visibleSeeder::class);
        $this->call(featureSedd::class);
    }
}
