<?php



Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'Admin\DashboardController@index');


/*
|--------------------------------------------------------------------------
| G R U P O   A D M I N
|--------------------------------------------------------------------------
|
| Contiene las rutas que solo el admin puede ver o editar.
|
|
*/
Route::group(['prefix'=>'admin','namespace'=>'Admin', ], function(){

    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');


});
