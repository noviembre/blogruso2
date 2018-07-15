<?php




/*
|--------------------------------------------------------------------------
| F R O N T E N D
|--------------------------------------------------------------------------
|
| Contiene las rutas de la pagina principal del post.
|
|
*/
Route::get('/', 'HomeController@index');



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

    #=================   CATEGORIAS   ====================
    Route::resource('/categories', 'CategoriesController');

    #=================   TAGS   ====================
    Route::resource('/tags', 'TagsController');

    #=================   USUARIOS   ====================
    Route::resource('/users', 'UsersController');

    #==========  POSTS  ================================
    Route::resource('/posts', 'PostsController');




});
