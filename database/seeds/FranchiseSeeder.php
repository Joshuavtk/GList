<?php

use App\Franchise;
use Illuminate\Database\Seeder;

/**
 * Class FranchiseSeeder
 */
class FranchiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            factory(Franchise::class)->create();
        }
    }
}
