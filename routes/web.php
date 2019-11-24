<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {

//     return view('welcome');


// });

// RUTAS GENERALES
Auth::routes();
Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/home', 'HomeController@home')->name('home');

// RATING
Route::get('/ratings', 'RatingController@hello');
Route::post('/ratings', 'RatingController@store')->name('rating.store');
// USUARIO
Route::get('/configuracion', 'userController@config')->name('config');
Route::post('/user/update', 'userController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'userController@getImage')->name('user.avatar');
Route::get('/perfil/{id}', 'userController@profile')->name('profile');
Route::get('/gente/{search?}', 'userController@index')->name('user.index');

// COMPONENT
Route::get('/subir-componente', 'componentController@create')->name('component.create');
Route::post('/component/save', 'componentController@save')->name('component.save');
Route::get('/component/file/{filename}', 'componentController@getComponent')->name('component.file');
Route::get('/component/{id}', 'componentController@detail')->name('component.detail');
Route::get('/component/delete/{id}', 'componentController@delete')->name('component.delete');
Route::get('/component/editar/{id}', 'componentController@edit')->name('component.edit');
Route::post('/component/update', 'componentController@update')->name('component.update');

// COMMENT
Route::post('/comment/save', 'commentController@save')->name('comment.save');
Route::get('/comment/delete/{id}', 'commentController@delete')->name('comment.delete');

// LIKE
Route::get('/like/{component_id}', 'likeController@like')->name('like.save');
Route::get('/dislike/{component_id}', 'likeController@dislike')->name('like.delete');
Route::get('/likes', 'likeController@index')->name('likes');


