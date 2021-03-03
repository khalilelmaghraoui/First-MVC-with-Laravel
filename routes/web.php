<?php
use App\Models\Post;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
//Route::get('/about', function () {
//    return "about page";
//});
////Route::get('/contact', function () {
////    return "contact page";
////});
////Route::get('admin/post/example',Array('as'=>'admin.home',function(){
////    $url = route('admin.home');
////    return "the URL " .  $url ;
////
////}));
////Route::get('/post/{id}',[PostsController::class ,'index']);
//Route::resource('posts',PostsController::class);
//Route::get('/contact',[PostsController::class,'contact']);
//
//|--------------------------------------------------------------------------
//| Database raw sql Queries
//|--------------------------------------------------------------------------
//|
//
//Route::get('/insert',function (){
//    DB::insert('insert into posts(title,body) values(?,?)',['Laravel is cool','Laravel baby']);
//});

//Route::get('/read',function(){
//    return DB::select('select * from posts where id =? ',[1]);
//});

//Route::get('/update',function (){
//    $update = DB::update('update posts set title ="Update title" where id = ?',[1]);
//    return $update;
//});

//Route::get('/delete',function (){
//    $delete = DB::delete('delete from posts where id =2', [1]);
//});

//|--------------------------------------------------------------------------
//| ELOQUENT
//|--------------------------------------------------------------------------
//|
//
//Route::get('/read',function (){
//    $posts= Post::all();
//    foreach ($posts as $post){
//        return $post->title;
//    }
//
//});
//Route::get('/find',function (){
//    $posts= Post::find(1);
//   return $posts->title;
//
//});
//Route::get('/findWhere',function (){
//    $posts = Post::where('id',1)->orderBy('id','desc')->take(1)->get();
//    return $posts;
//});
//
//Route::get('/basicinsert',function (){
//
//    $post = new Post;
//
//    $post->title = "Eloquent insert title 3";
//    $post->body = "Eloquent insert content 3";
//
//    $post->save();
//
//
//});
//// mass assignment
//Route::get('/mass',function (){
//    Post::create(['title' => 'the create method' , 'body'=>'the body']);
//    //look at  Post class
//});
//
//// update eloquent
//
//Route::get('/update',function (){
//    Post::where('id','3')->where('is_admin','3')->update(['title'=>'new title','body'=>'new body content']);
//});
//
//// delete
//Route::get('/delete',function (){
//    $post = Post::find(5);
//    $post->delete();
//});
//Route::get('/delete2',function (){
//  Post::destroy(1);
//  // delete a couple
//   Post::destroy([1,3]);
//  // or with statement
//    Post::where('is_admin','3')->delete();
//
//
//});
//
////Soft delete
//Route::get('/softdelete',function (){
//
//    Post::find(1)->delete();
//
//});
//// read deleted records
//Route::get('/readsoftdelete',function (){
//    return Post::withTrashed()->where('id',1)->get();
//});
//// restoring deleted trashed records
//Route::get('/restore',function (){
//    Post::withTrashed()->where('id',1)->restore();
//});
//// delete records permanently
//
//Route::get('/forcedelete',function(){
// Post::withTrashed()->where('id',3)->forceDelete();
//});
//|--------------------------------------------------------------------------
//| ELOQUENT relationships
//|--------------------------------------------------------------------------
//|
// One to One relationship
Route::get('/user/{id}/post',function ($id){
    return User::find($id)->post;
});
// do the inverse relation from post to user

Route::get('/post/{id}/user',function ($id){
    return Post::find($id)->user->name;
});

// one to many
Route::get('/posts',function (){
    $user = User::find(1);
    foreach ($user->posts as $post){
       echo $post->title;
    }
});
Route::get('/user/{id}/role',function ($id){
    $User= User::find($id);


  foreach ($User->roles as $role){
      echo $role->name;
  }

});

// accessing pivot table or intermediate table
Route::get('/user/pivot',function (){
    $user = User::find(1);

    foreach ($user->roles as $role){
        return $role->pivot->created_at;
    }
});

Route::get('/user/country',function (){

});

