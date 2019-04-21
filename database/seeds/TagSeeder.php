<?php

use App\Tag;
use Illuminate\Database\Seeder;

/**
 * Class TagSeeder
 */
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            factory(Tag::class)->create();
        }
    }
}
