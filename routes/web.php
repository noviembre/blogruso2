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

#==========  POSTS + ENLACES  ===========================
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');

#==========  POSTS / TAGS  ===========================
Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');

#==========  POSTS / CATEGORY  ===========================
Route::get('/category/{slug}', 'HomeController@category')->name('category.show');

#==========  POSTS / SUBSCRIBE  ==========================
Route::post('/subscribe', 'SubsController@subscribe');

#==========  POSTS / VERIFY EMAIL / TOKEN  ===============
Route::get('/verify/{token}', 'SubsController@verify');




/*
|--------------------------------------------------------------------------
| G R U P O   FOR   LOGIN   GUEST - INVITADOS
|--------------------------------------------------------------------------
|
| destinado para cualquier usuario
|
|
*/

Route::group(['middleware'	=>	'guest'], function(){

    #==========  REGISTER  ===========================
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');

    #==========  LOGIN  ===========================
    Route::get('/login','AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');

});

/*
|--------------------------------------------------------------------------
| G R U P O   FOR LOGIN   U S E R S
|--------------------------------------------------------------------------
|
| destinado solo para los usuarios que se hayan logeado
|
|
*/
Route::group(['middleware'	=>	'auth'], function(){

    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');

    Route::get('/logout', 'AuthController@logout');
    #==========   COMENTARIOS O REPLY  ================
    Route::post('/comment', 'CommentsController@store');

});

/*
|--------------------------------------------------------------------------
| G R U P O   A D M I N
|--------------------------------------------------------------------------
|
| Contiene las rutas que solo el admin puede ver o editar.
|
|
*/
Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>'admin' ], function(){

    Route::get('/', 'DashboardController@index');

    #=================   CATEGORIAS   ====================
    Route::resource('/categories', 'CategoriesController');

    #=================   TAGS   ====================
    Route::resource('/tags', 'TagsController');

    #=================   USUARIOS   ====================
    Route::resource('/users', 'UsersController');

    #==========  POSTS  ================================
    Route::resource('/posts', 'PostsController');

    #==========  C O M E N T A R I O S  ===================
    Route::get('/comments', 'CommentsController@index');

    #==========  APROBAR/DESAPROBAR COMENTARIOS  ==========
    Route::get('/comments/toggle/{id}', 'CommentsController@toggle');

    #==========  ELIMINAR COMENTARIOS  ==========
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')
        ->name('comments.destroy');





});
