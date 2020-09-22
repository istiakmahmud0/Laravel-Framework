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

//Route::get('/', function () {
//    return view('index');
//});
Route::get('/','HelloController@index');
Route::get('contact/us','HelloController@contact')->name('contact');
Route::get('about/us','HelloController@about')->name('about');

//category
Route::get('add/category','HelloController@addCategory')->name('add.category');
Route::post('store/category','HelloController@storeCategory')->name('store.category');
Route::get('all/category','HelloController@allCategory')->name('all.category');
Route::get('view/category/{id}','HelloController@viewCategory');
Route::get('delete/category/{id}',"HelloController@deleteCategory");
Route::get('edit/category/{id}',"HelloController@editCategory");
Route::post('update/category/{id}',"HelloController@updateCategory");
//post page
Route::get('write/post','HelloController@writePost')->name('write.post');
Route::post('store/post','HelloController@storePost')->name('store.post');
Route::get('all/post','HelloController@allPost')->name('all.post');
Route::get('view/post/{id}','HelloController@viewPost')->name('view.post');
Route::get('edit/post/{id}','HelloController@editPost')->name('edit.post');
Route::post('update/post/{id}',"HelloController@updatePost");
Route::get('delete/post/{id}',"HelloController@deletePost");

//Student
Route::get('students','StudentController@student')->name('student');
Route::post("store/student","StudentController@store")->name('store.student');
Route::get("all/student","StudentController@allStudent")->name('all.student');
Route::get("view/student/{id}","StudentController@viewStudent")->name('view.student');
Route::get("delete/student/{id}","StudentController@deleteStudent")->name('delete.student');
Route::get("edit/student/{id}","StudentController@editStudent")->name('edit.student');
Route::post("update/student/{id}","StudentController@updateStudent")->name('update.student');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
