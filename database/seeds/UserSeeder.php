<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'admin';
        $user->email = 'alexx-gsm@yandex.ru';
        $user->password = bcrypt('25L10i1979');
        $user->save();
    }
}
