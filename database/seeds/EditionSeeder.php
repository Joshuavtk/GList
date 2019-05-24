<?php

use App\Edition;
use Illuminate\Database\Seeder;

/**
 * Class EditionSeeder
 */
class EditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            factory(Edition::class)->create();
        }
    }
}
