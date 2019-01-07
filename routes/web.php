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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/membre', function() {
	return view('membre');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reserver', 'ReserverController@index')->name('reserver');

Route::get('/inforeserv', 'ReserverController@validation')->name('info.reservation');

Route::get('/attente', 'ReserverController@attente')->name('attente');

Route::get('/profile/{nom}', 'ProfileController@show')->name('profile.show');

Route::any('/admin/users', 'UsersController@index')->name('users');

Route::post('updates/{id}', 'UsersController@update')->name('updates');

Route::get('/admin', 'AdminController@index')->name('admin');
// Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function()
// {
//     Route::get('/admin', 'AdminController@index');

Route::get('/admin/listAttente', 'ListAttenteController@index')->name('listAttente');

Route::get('/admin/places', 'PlacesController@index')->name('gestion.places');

Route::post('/admin/pl', 'PlacesController@ajout')->name('update.gestion');

// Route::get('/admin/places/{nb}', 'PlacesController@delete')->name('delete.place');

Route::get('historique/{idPlace}', 'PlacesController@historique')->name('historique');

Route::get('hist/{id}', 'PlacesController@hist')->name('hist');

Route::get('modif/{user}', 'TestController@modif')->name('modif');

Route::post('update/{id}', 'TestController@update')->name('updateUser');

Route::get('/admin/modify/{user}', 'UsersController@show')->name('modify');

Route::get('/admin/users/{valid}', 'UsersController@valider')->name('valide');



Route::get('protected', ['middleware' => ['admin'], function() {
	return "Vous devez être connecté et être un administrateur.";
}]);

Route::get('/tests', 'test@test')->name('test');