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

Route::get('/', 'App\Http\Controllers\DemoController@home')->name('home');
Route::get('about', 'App\Http\Controllers\DemoController@about')->name('about');
Route::get('contact', 'App\Http\Controllers\DemoController@contact')->name('contact');

Route::get('add/category', 'App\Http\Controllers\DemoController@AddCategory')->name('add.category');
Route::post('store/category', 'App\Http\Controllers\DemoController@StoreCategory')->name('store.category');
Route::get('all/category', 'App\Http\Controllers\DemoController@ShowAllCategory')->name('all.category');
Route::get('view/category/{id}', 'App\Http\Controllers\DemoController@ViewSingleCategory');
Route::get('delete/category/{id}', 'App\Http\Controllers\DemoController@DeleteSingleCategory');
Route::get('edit/category/{id}', 'App\Http\Controllers\DemoController@EditSingleCategory');
Route::get('update/category/{id}', 'App\Http\Controllers\DemoController@UpdateCategory');

Route::get('write/post', 'App\Http\Controllers\PostController@writePost')->name('write.post');
Route::post('store/post', 'App\Http\Controllers\PostController@storePost')->name('store.post');
Route::get('view/post/{id}', 'App\Http\Controllers\PostController@viewPost');
Route::get('all/post', 'App\Http\Controllers\PostController@allPost')->name('all.post');

Route::get('students', 'App\Http\Controllers\StudentController@Student')->name('student');
Route::post('store/student', 'App\Http\Controllers\StudentController@storeStudent')->name('store.student');
Route::get('all/students', 'App\Http\Controllers\StudentController@allStudents')->name('all.students');



