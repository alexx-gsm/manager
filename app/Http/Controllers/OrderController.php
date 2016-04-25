<?php

namespace App\Http\Controllers;

use App\Actions;
use App\Object;
use App\Orders;
use App\Custom;
use App\Work;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    public function getAll()
    {
        $orders = Orders::all();

        $objects = Object::all();
        $objects_list = [];
        foreach ($objects as $object) {
            $objects_list[$object->id] = $object->city .','. $object->street .' '. $object->building .'-'. $object->flat;
        }

        $customs = Custom::all();

        $customs_list = [];
        foreach ($customs as $custom) {
            $customs_list[$custom->id] = $custom->name_last .' '. $custom->name_first .' '. $custom->name_middle;
        }

        return view('orders.orders', ['orders' => $orders, 'objects_list' => $objects_list, 'customs_list' => $customs_list, 'title' => 'Заказы']);
    }

    public function getOne($id = null)
    {
        $order = Orders::find($id);

        $objects = Object::all();
        $customs = Custom::all();

        $works = Work::getSorted($id);

        $actions = Actions::all();
        $action_list = [];
        foreach ($actions as $action)  {
            $action_list[$action->id] = $action->name;
        }

        $time = date("Y-m-d", strtotime($order->time));

        return view('orders.order', [
            'order'     => $order,
            'objects'   => $objects,
            'customs'   => $customs,
            'time'      => $time,
            'works'     => $works,
            'actions'   => $action_list,
            'title'     => 'Заказ'
        ]);
    }

    public function save(Request $request)
    {
        $order = isset($request->id) ? Orders::find($request->id) : (new Orders());

        $order->object_id = $request->object_id;
        $order->custom_id = $request->custom_id;
//        $order->total_value = $request->total_value ?? '';
        $order->time = isset($request->time) ? $request->time : '';

        $order->save();

        $objects = Object::all();
        $customs = Custom::all();
        $works = Work::getSorted($order->id);

        $actions = Actions::all();
        $action_list = [];
        foreach ($actions as $action)  {
            $action_list[$action->id] = $action->name;
        }

        $time = date( "Y-m-d", strtotime($order->time) );

        return view('orders.order', [
            'order'     => $order,
            'objects'   => $objects,
            'customs'   => $customs,
            'time'      => $time,
            'works'     => $works,
            'actions'   => $action_list,
            'title'     => 'Заказ'
        ]);
    }

    public function addNew()
    {
        $objects = Object::all();
        $customs = Custom::all();
        $time = date("Y-m-d");

        return view('orders.new', ['objects' => $objects, 'customs' => $customs, 'time' => $time,'title' => 'Новый заказ']);
    }
}
