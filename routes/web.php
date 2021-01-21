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

Route::get('/','GuestController@index')->name('index');
Route::get('/post/{id}/{title}/','GuestController@ShowUserPost')->name('showUserPost'); 
Route::get('/search','GuestController@ShowSearch')->name('ShowSearch');
Route::post('/search','GuestController@search')->name('Search');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/** Admin Route */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
/** Admin Route Posts */

Route::get('/dashboard/posts', 'DashboardController@posts')->name('dashboardposts');
Route::get('/dashboard/post/delete/{id}', 'PostController@destroy')->name('DeletePost');
Route::post('/dashboard/post/add', 'PostController@store')->name('AddPost');
Route::get('/dashboard/post/show/add', 'PostController@create')->name('ShowAddPost');
Route::get('/dashboard/post/show/edit/{id}', 'PostController@edit')->name('ShowEditPost');
Route::post('/dashboard/post/edit', 'PostController@update')->name('EditPost');
/** Admin Route Users */

Route::post('/dashboard/AddUser', 'UserController@store')->name('AddUser');
Route::post('/dashboard/EditUser', 'UserController@store')->name('EditUser');
Route::get('/dashboard/DeleteUser/{id}', 'UserController@destroy')->name('DeleteUser');
Route::get('/dashboard/users', 'DashboardController@users')->name('dashboardusers');
/** Admin Route Categories */
Route::get('/dashboard/categories', 'DashboardController@categories')->name('dashboardcategories');
Route::get('/dashboard/category/delete/{id}', 'CategoryController@destroy')->name('DeleteCategorie');
Route::post('/dashboard/category/add', 'CategoryController@store')->name('AddCategory');
Route::post('/dashboard/category/edit', 'CategoryController@update')->name('EditCategory');