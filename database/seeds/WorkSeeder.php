<?php

use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $work = new \App\Works();
        $work->order_id = 1;
        $work->action_id = 1;
        $work->count = 2;
        $work->value = 300;
        $work->total = $work->value * $work->count;

        $work->save();

        $work = new \App\Works();
        $work->order_id = 1;
        $work->action_id = 2;
        $work->count = 3;
        $work->value = 500;
        $work->total = $work->value * $work->count;

        $work->save();

        $work = new \App\Works();
        $work->order_id = 1;
        $work->action_id = 3;
        $work->count = 1;
        $work->value = 2000;
        $work->total = $work->value * $work->count;

        $work->save();

        $work = new \App\Works();
        $work->order_id = 2;
        $work->action_id = 3;
        $work->count = 2;
        $work->value = 2000;
        $work->total = $work->value * $work->count;

        $work->save();
    }
}
