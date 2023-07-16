<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;

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
    return view('frontend/home/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//admin route
Route::middleware(['auth'])->group(function () {
//category
Route::post('/store/category',[CategoryController::class,'store']);
Route::get('/show/category',[CategoryController::class,'show']);
Route::get('/edit/category/{id}',[CategoryController::class,'edit']);
Route::post('/update/category/{id}',[CategoryController::class,'update']);
Route::get('/delete/category/{id}',[CategoryController::class,'delete']);

//blog
Route::post('/store/blog',[BlogController::class,'store']);
Route::get('/show/blog',[BlogController::class,'show']);
Route::get('/get/blogById/{id}',[BlogController::class,'getBlogById']);
Route::post('/update/blog/{id}',[BlogController::class,'updateBlog']);
Route::get('/delete/blog/{id}',[BlogController::class,'deleteBlog']);
});



//frontend route
Route::get('/get/blogPost',[FrontendController::class,'getBlogpost']);
Route::get('/get/blog/category',[FrontendController::class,'getBlogCategory']);
Route::get('/get/blogPostByCategoryId/{id}',[FrontendController::class,'getBlogPostByCategoryId']);
