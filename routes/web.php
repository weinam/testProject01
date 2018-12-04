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

// Route::resource('/projects', 'ProjectsController');
// Projects
Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/create', 'ProjectsController@create')->name('projects.create');
Route::post('/projects/store', 'ProjectsController@store')->name('projects.store');
Route::get('/projects/{project}', 'ProjectsController@show')->name('projects.show');
Route::get('/projects/{project}/edit', 'ProjectsController@edit')->name('projects.edit');
Route::patch('/projects/{project}/update', 'ProjectsController@update')->name('projects.update');
Route::post('/projects/{project}/delete', 'ProjectsController@delete')->name('projects.delete');

//Role - set
Route::get('/rolesset/create', 'RolesSetController@create')->name('rolesset.create');
Route::post('/rolesset/store', 'RolesSetController@store')->name('rolesset.store');

//Role
Route::get('/roles', 'RolesController@index')->name('roles.index');
Route::get('/roles/create', 'RolesController@create')->name('roles.create');
Route::post('/roles/store', 'RolesController@store')->name('roles.store');
Route::get('/roles/{role}/show', 'RolesController@show')->name('roles.show');
Route::get('/roles/{role}/edit', 'RolesController@edit')->name('roles.edit');
Route::patch('/roles/{role}/update', 'RolesController@update')->name('roles.update');
Route::patch('/roles/{role}/delete', 'RolesController@delete')->name('roles.delete');

//Profile
Route::get('/profile/{profile}/show', 'ProfileController@show')->name('profile.show');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');
Route::get('/groups', 'GroupsController@index');

