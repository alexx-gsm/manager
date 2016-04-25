<?php

namespace App\Http\Controllers;

use App\Actions;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class ActionController extends Controller
{
    public function getAll()
    {
        $actions = Actions::all();
        $categories = Category::all();
        $cat_list = [];
        foreach ($categories as $category) {
            $cat_list[$category->id] = $category->name;
        }

        return view('actions.actions', ['actions' => $actions, 'cat_list' => $cat_list, 'title' => 'Услуги']);
    }

    public function getOne($id = null)
    {
        $action = Actions::find($id);
        $categories = Category::all();

        return view('actions.action', ['action' => $action, 'categories' => $categories, 'title' => 'Услуга']);
    }

    public function addNew()
    {
        $categories = Category::all();
        return view('actions.new', ['categories' => $categories, 'title' => 'Новая услуга']);
    }

    public function save(Request $request)
    {
        $action = isset($request->id) ? Actions::find($request->id) : (new Actions());

        $action->name = $request->name;
        $action->value = $request->value;
        $action->cat_id = $request->category;
        $action->save();

        $categories = Category::all();

        return view('actions.action', ['action' => $action, 'categories' => $categories, 'title' => 'Услуга']);
    }

    public function getList(Request $request)
    {
        if( $request->ajax() ) {

            $actions = \DB::table('actions')
            ->get(['id', 'name', 'value', 'cat_id']);

            $categories = \DB::table('categories')
                ->where('parent', '=', '0')
                ->get(['id', 'name']);

            $cat_list = [];
            $select = '';
            foreach ($categories as $category) {
                $cat_list[$category->id] = $category->name;
                $select .= '<optgroup label="' . $category->name . '">';
                foreach ($actions as $action) {
                    if ($action->cat_id == $category->id) {
                        $select .= '<option value="' . $action->id . '">' . $action->name . '</option>';
                    }
                }
                $select .= '</optgroup>';
            }

            return response()->json($select);
        }
    }
    
}
