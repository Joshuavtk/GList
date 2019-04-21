<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(TagSeeder::class);
         $this->call(PlatformSeeder::class);
         $this->call(FranchiseSeeder::class);
         $this->call(GameSeeder::class);
         $this->call(UserSeeder::class);
    }
}
