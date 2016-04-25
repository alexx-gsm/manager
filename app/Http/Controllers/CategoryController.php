<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function getAll()
    {
        $categories = Category::all();
        
        return view('categories.categories', ['categories' => $categories, 'title' => 'Категории']);
    }
    
    public function addNew(Request $request)
    {

        if( $request->ajax() ) {

            $category = \DB::select("select * from categories where name = :name", ['name' => $request->cat_new]);

            if ($category == null) {
                $category = new Category();
                $category->name = $request->cat_new;
                $category->parent = 0;
                $category->save();

                return response()->json([
                    'id' => $category->id,
                    'name' => $category->name
                ]);
            }

            return response()->json();
        }
    }
}
