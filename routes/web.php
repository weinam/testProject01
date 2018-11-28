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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('/projects', 'ProjectsController');
// Projects Route
Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/create', 'ProjectsController@create')->name('projects.create');
Route::post('/projects/store', 'ProjectsController@store')->name('projects.store');
Route::get('/projects/{project}', 'ProjectsController@show')->name('projects.show');
Route::get('/projects/{project}/edit', 'ProjectsController@edit')->name('projects.edit');
Route::patch('/projects/{project}/update', 'ProjectsController@update')->name('projects.update');
Route::post('/projects/{project}/delete', 'ProjectsController@delete')->name('projects.delete');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');
Route::get('/groups', 'GroupsController@index');

