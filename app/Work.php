<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public static function getSorted($id)
    {
        return \DB::table('works')
            ->where('order_id', '=', $id)
            ->get();
    }
}
