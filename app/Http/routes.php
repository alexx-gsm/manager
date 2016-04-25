<?php

//Route::get('/', ['as' => 'home', function () {
//    return view('welcome');
//}]);

Route::auth();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/register', function() {
    return redirect('/');
});


Route::group(['middleware' => 'auth'], function() {
    Route::get('/customs', [
        'as' => 'customs',
        'uses' => 'CustomController@getAll'
    ]);

    Route::get('/custom/{id?}', [
        'as' => 'customs',
        'uses' => 'CustomController@getOne'
    ])->where(['id' => '[0-9]+']);

    Route::post('/custom/save', [
        'as' => 'custom/save',
        'uses' => 'CustomController@save'
    ]);

    Route::get('/custom/new', [
        'as' => 'custom/new',
        function() {
            return view('customs.new');
        }
    ]);
// ------------------------------------------  Card's routers
    Route::get('/cards', [
        'as' => 'cards',
        'uses' => 'CardController@getAll'
    ]);
    
    Route::get('/card/{id?}', [
        'as' => 'card',
        'uses' => 'CardController@getOne'
    ])->where(['id' => '[0-9]+']);
    
    Route::post('/card/save', [
        'as' => 'card/save',
        'uses' => 'CardController@save'
    ]);

    Route::get('/card/new', [
        'as' => 'card/new',
        function() {
            return view('cards.new');
        }
    ]);

    Route::post('/card/cards', [        // AJAX request
        'as' => 'card/list',
        'uses' => 'CardController@getList'
    ]);

    Route::post('/card/reset', [        // AJAX request
        'as' => 'card/reset',
        'uses' => 'CardController@resetCustom'
    ]);

    // ------------------------------------------  Objects's routers
    Route::get('/objects', [
        'as' => 'objects',
        'uses' => 'ObjectController@getAll'
    ]);

    Route::get('/object/{id?}', [
        'as' => 'object',
        'uses' => 'ObjectController@getOne'
    ])->where(['id' => '[0-9]+']);

    Route::post('/object/save', [
        'as' => 'object/save',
        'uses' => 'ObjectController@save'
    ]);

    Route::get('/object/new', [
        'as' => 'object/new',
        function() {
            return view('objects.new');
        }
    ]);

    // ------------------------------------------  Order's routers
    Route::get('/orders', [
        'as' => 'orders',
        'uses' => 'OrderController@getAll'
    ]);

    Route::get('/order/{id?}', [
        'as' => 'order',
        'uses' => 'OrderController@getOne'
    ])->where(['id' => '[0-9]+']);

    Route::post('/order/save', [
        'as' => 'order/save',
        'uses' => 'OrderController@save'
    ]);

    Route::get('/order/new', [
        'as' => 'order/new',
        'uses' => 'OrderController@addNew'
    ]);

    // ------------------------------------------  Action's routers
    Route::get('/actions', [
        'as' => 'actions',
        'uses' => 'ActionController@getAll'
    ]);

    Route::get('/action/{id?}', [
        'as' => 'action',
        'uses' => 'ActionController@getOne'
    ])->where(['id' => '[0-9]+']);

    Route::get('/action/new', [
        'as' => 'action/new',
        'uses' => 'ActionController@addNew'
    ]);

    Route::post('/action/save', [
        'as' => 'action/save',
        'uses' => 'ActionController@save'
    ]);

    Route::post('/action/list', [
        'as' => 'action/list',
        'uses' => 'ActionController@getList'
    ]);

    // ------------------------------------------  Category's routers
    Route::get('/categories', [
        'as' => 'categories',
        'uses' => 'CategoryController@getAll'
    ]);

    Route::get('/category/{id?}', [
        'as' => 'category',
        'uses' => 'CategoryController@getOne'
    ])->where(['id' => '[0-9]+']);

    Route::post('/category/new', [
        'as' => 'category/new',
        'uses' => 'CategoryController@addNew'
    ]);

    Route::post('/category/save', [
        'as' => 'category/save',
        'uses' => 'CategoryController@save'
    ]);

    // ------------------------------------------  Work's routers
    Route::post('/work/save', [
        'as' => 'work/save',
        'uses' => 'WorkController@saveWork'
    ]);
});
