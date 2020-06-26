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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');
Route::get('/category/{slug}', 'HomeController@category')->name('category.show');
Route::post('/subscribe', 'SubsController@subscribe')->name('subscribe');
Route::get('/verify/{token}', 'SubsController@verify')->name('verify');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'AuthController@registerForm')->name('registerForm');
    Route::post('/register', 'AuthController@register')->name('register');
    Route::get('/login', 'AuthController@loginForm')->name('loginForm');
    Route::post('/login', 'AuthController@login')->name('login');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profileUpdate');
    Route::post('/comment', 'CommentsController@store')->name('comment');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'BlogTagsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/posts', 'BlogPostsController');
    Route::resource('/subscribers', 'SubscribersController');
    Route::get('/comments/toggle/{id}', 'CommentsController@toggle')->name('toggle');;
    Route::get('/comments', 'CommentsController@index')->name('comments');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comment_destroy');


});


//index
//create
//update
//edit
//store
//destroy

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
