<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

// Projects
Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/create', 'ProjectsController@create')->name('projects.create');
Route::post('/projects/store', 'ProjectsController@store')->name('projects.store');
Route::get('/projects/{project}/show', 'ProjectsController@show')->name('projects.show');
Route::get('/projects/{project}/edit', 'ProjectsController@edit')->name('projects.edit');
Route::patch('/projects/{project}/update', 'ProjectsController@update')->name('projects.update');
Route::post('/projects/{project}/delete', 'ProjectsController@delete')->name('projects.delete');

//User
Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/{user}/show', 'UsersController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/users/{user}/update', 'UsersController@update')->name('users.update');

//Role
Route::get('/roles', 'RolesController@index')->name('roles.index');
Route::get('/roles/create', 'RolesController@create')->name('roles.create');
Route::post('/roles/store', 'RolesController@store')->name('roles.store');
Route::get('/roles/{role}/show', 'RolesController@show')->name('roles.show');
Route::get('/roles/{role}/edit', 'RolesController@edit')->name('roles.edit');
Route::patch('/roles/{role}/update', 'RolesController@update')->name('roles.update');
Route::patch('/roles/{role}/delete', 'RolesController@delete')->name('roles.delete');

//Functions
Route::get('/functions', 'FunctionsController@index')->name('functions.index');
Route::get('/functions/create', 'FunctionsController@create')->name('functions.create');
Route::post('/functions/store', 'FunctionsController@store')->name('functions.store');
Route::get('/functions/{function}/show', 'FunctionsController@show')->name('functions.show');
Route::get('/functions/{function}/edit', 'FunctionsController@edit')->name('functions.edit');
Route::patch('/functions/{function}/update', 'FunctionsController@update')->name('functions.update');
Route::patch('/functions/{function}/delete', 'FunctionsController@delete')->name('functions.delete');

//Profile
Route::get('/profile/{profile}/show', 'ProfileController@show')->name('profile.show');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');
Route::get('/groups', 'GroupsController@index');

