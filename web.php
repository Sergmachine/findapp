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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/getLastPosts', function () {
    header('Access-Control-Allow-Origin:*');
    $all = App\Item::take(2)->get();
    return $all;
});
Route::get('/getLostPosts', function () {
    header('Access-Control-Allow-Origin:*');
    $lost_post = App\Item::where('lost', 1)->where('done', 0)->get();
    return $lost_post;
});

Route::get('/getFoundPosts', function () {
    header('Access-Control-Allow-Origin:*');
    $found_post = App\Item::where('found', 1)->where('done', 0)->get();
    return $found_post;
});
Route::get('/searchPosts', function (Request $req) {
    header('Access-Control-Allow-Origin:*');
    $search = $req->search_key;
    $searching = App\Item::where('title', 'like', Input::get('title'))->orWhere('description', 'like', Input::get('description'));
    return $searching;
    
      
});