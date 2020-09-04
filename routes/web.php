<?php

use Illuminate\Support\Facades\Route;

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
    return view('portfolio/page/homepage');
});

Route::get('/contact', function () {
    return view('portfolio/page/contact');
});

Route::get('/about', function () {
    return view('portfolio/page/about');
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    # Project routes
    Route::get('/projects', 'ProjectController@index')->name('project.index');
    Route::post('/projects', 'ProjectController@store')->name('project.store');
    Route::get('/projects/create', 'ProjectController@create')->name('project.create');
    Route::get('/projects/{project}', 'ProjectController@show')->name('project.show');
    Route::get('/projects/{project}/edit', 'ProjectController@edit')->name('project.edit');
    Route::put('/projects/{project}', 'ProjectController@update')->name('project.update');
    Route::get('/projects/{project}/delete', 'ProjectController@destroy')->name('project.delete');
});
