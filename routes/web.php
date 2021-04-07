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
/** Site Map */
Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap/posts', 'SitemapController@posts');
Route::get('/sitemap/pages', 'SitemapController@pages');
Route::get('/sitemap/categories', 'SitemapController@categories');
/** Guest Route */
Route::get('/','GuestController@index')->name('index');
Route::get('/aboutus','GuestController@about')->name('about');
Route::get('/contact','GuestController@contact')->name('contact');
Route::get('/sharewithus','GuestController@sharewithus')->name('sharewithus');
Route::get('/post/{id}/{title}/','GuestController@ShowUserPost')->name('showUserPost'); 
Route::get('/search','GuestController@ShowSearch')->name('ShowSearch');
Route::get('/category/{id}/{name}','GuestController@CategoryPosts')->name('CategoryPost');
Route::get('/privacy','GuestController@Privacy')->name('Privacy');
Route::post('/search','GuestController@search')->name('Search');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/** Admin Route */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
/** Admin Route Posts */

Route::get('/dashboard/posts', 'DashboardController@posts')->name('dashboardposts');
Route::get('/dashboard/post/show/data/{id}', 'DashboardController@ShowPost')->name('ShowDashboardPost');
Route::get('/dashboard/posts/saved', 'DashboardController@postsSaved')->name('dashboardPostsSaved');
Route::get('/dashboard/posts/reviewed', 'DashboardController@postsReviewed')->name('dashboardPostsReviewed');
Route::get('/dashboard/posts/inreview', 'DashboardController@PostsInReview')->name('dashboardPostsInReview');
Route::post('/dashboard/posts/filter', 'DashboardController@FilterPosts')->name('DashboardFilterPosts');

Route::get('/dashboard/posts/user/reviewed', 'DashboardController@postsReviewedUser')->name('dashboardPostsReviewedUser');
Route::get('/dashboard/posts/user/inreview', 'DashboardController@PostsInReviewUser')->name('dashboardPostsInReviewUser');

Route::get('/dashboard/post/send/to/review/{id}', 'DashboardController@SendPostToReview')->name('SendPostToReview');
Route::get('/dashboard/post/send/to/share/{id}', 'DashboardController@SendPostToShare')->name('SendPostToShare');
Route::post('/dashboard/post/resend/to/writer', 'DashboardController@ResendPostToWriter')->name('ResendPostToWriter');


Route::get('/dashboard/post/delete/{id}', 'PostController@destroy')->name('DeletePost');
Route::post('/dashboard/post/add', 'PostController@store')->name('AddPost');
Route::get('/dashboard/post/show/add', 'PostController@create')->name('ShowAddPost');
Route::get('/dashboard/post/show/edit/{id}', 'PostController@edit')->name('ShowEditPost');
Route::post('/dashboard/post/edit', 'PostController@update')->name('EditPost');
/** Admin Route Users */

Route::post('/dashboard/AddUser', 'UserController@store')->name('AddUser');
Route::post('/dashboard/EditUser', 'UserController@update')->name('EditUser');
Route::get('/dashboard/DeleteUser/{id}', 'UserController@destroy')->name('DeleteUser');
Route::get('/dashboard/users', 'DashboardController@users')->name('dashboardusers');
/** Admin Route Categories */
Route::get('/dashboard/categories', 'DashboardController@categories')->name('dashboardcategories');
Route::get('/dashboard/category/delete/{id}', 'CategoryController@destroy')->name('DeleteCategorie');
Route::post('/dashboard/category/add', 'CategoryController@store')->name('AddCategory');
Route::post('/dashboard/category/edit', 'CategoryController@update')->name('EditCategory');

Route::get('/dashboard/me', 'UserController@ShowProfile')->name('ShowProfile');
Route::post('/dashboard/me/edit', 'UserController@MeUpdate')->name('EditUserInfo');
Route::get('/team', 'GuestController@Team')->name('Team');

Route::get('/dashboard/events','TodayeventController@index')->name('TodayEventList');
Route::post('/dashboard/AddEvent','TodayeventController@store')->name('AddTodayEvent');
Route::post('/dashboard/Event/{id}/Edit', 'TodayeventController@update')->name('EditTodayEvent');
Route::get('/dashboard/Event/{id}/Delete', 'TodayeventController@destroy')->name('DeleteTodayEvent');
