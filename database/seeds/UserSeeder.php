<?php

use App\User;
use Illuminate\Database\Seeder;

/**
* Class UserSeeder
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(['email' => 'test@test.nl']);
        factory(User::class)->create(['email' => 'admin@admin.nl']);
    }
}
