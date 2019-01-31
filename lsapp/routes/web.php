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

/* Route::get('/', function () {
    return view('welcome');
});
 */
//can use either . or / for sytax of pages
/* Route::get('/about', function () {
    return view('pages.about');
}); */

/* Route::get('/about', function () {
    return view('pages/about');
}); */

// insert data in the query
/* Route::get('/users/{id}', function ($id) {
    return 'This is user '.$id;
}); */

// insert data in the query
/* Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user '.$name. ' with an ID '.$id;
}); */

Route::get('/', 'PagesController@index' );
Route::get('/about', 'PagesController@about' );
Route::get('/services', 'PagesController@services' );
Route::resource('posts','PostController'); //shortcut to call all functions on the post controller

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

