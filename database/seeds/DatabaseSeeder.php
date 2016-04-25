<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(CustomSeeder::class);
        // $this->call(UserSeeder::class);
//        $this->call(CardSeeder::class);
        // $this->call(ObjectSeeder::class);
        $this->call(WorkSeeder::class);
        // $this->call(CategorySeeder::class);
    }
}
