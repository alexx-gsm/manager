<?php

namespace App\Http\Controllers;

use App\Object;
use Illuminate\Http\Request;

use App\Http\Requests;

class ObjectController extends Controller
{
    public function getAll()
    {
        $objects = Object::all();

        return view('objects.objects', ['objects' => $objects, 'title' => 'Объекты']);
    }
    
    public function getOne($id = null)
    {
        $object = Object::find($id);


        return view('objects.object', ['object' => $object, 'title' => 'Объект']);
    }

    public function save(Request $request)
    {
        $object = isset($request->id) ? Object::find($request->id) : (new Object());

        $object->name = $request->name;
        $object->city = $request->city;
        $object->street = $request->street;
        $object->building = $request->building;
        $object->flat = isset($request->flat) ? $request->flat : '';
        $object->save();

        return view('objects.object', ['object' => $object,'title' => 'Объект']);
    }
}
