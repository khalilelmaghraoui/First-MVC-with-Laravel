<?php

use App\Http\Controllers\PostsController;
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
    return view('welcome');
});
Route::get('/about', function () {
    return "about page";
});
//Route::get('/contact', function () {
//    return "contact page";
//});
//Route::get('admin/post/example',Array('as'=>'admin.home',function(){
//    $url = route('admin.home');
//    return "the URL " .  $url ;
//
//}));
//Route::get('/post/{id}',[PostsController::class ,'index']);
Route::resource('posts',PostsController::class);


