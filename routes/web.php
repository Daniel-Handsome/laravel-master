<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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

//controllerm原版寫法 //8的用法
Route::get('/controller', [HomeController::class, 'home']);






// Route::get('/', function () {
//     return view('home.index');
// })->name('home.index');

//上面簡化來的  這樣不會麻煩 只是單純回傳view就這樣 前提不用傳參數或其他工作
// Route::view('/', 'home.index')->name('home.index')->middleware('auth');


$contact = [
    1 => [
        'title' => '1111',
        'content' => 'bbb',
        'new_b' => true,
        'has_true' => true,
    ],
    2 => [
        'title' => '222w',
        'content' => 'c',
        'new_b' => false,
    ],
];

Route::get('/contact', function () use ($contact) {

    // compact($contact) == ['contact'=>$contact]
    return view('contact.index', ['contact' => $contact]);
});

//use() 使用未定義 的var
Route::get('/contact/{id}', function ($id) use ($contact) {

    // ***重點 當你有錯誤 傳入的陣列
    //回傳404 錯誤 當你上架東西不能讓別人看到錯誤只能出現不存在
    // abort_if 函式會在給定布林表達式的結果為 ture 時，回應一件 HTTP 例外

    abort_if(!isset($contact[$id]), 404);

    return view('contact.show', ['contact' => $contact[$id]]);
})->name('contact.show');



// 基本給參數
// 參數funtion內的亂寫 一樣可以接到 路徑的參數

// where()設條件 給限制 這樣才不會一直跑去controller執行
//如果要全域限制RouteServiceProvider去 找boot()涵式

// Route::get('/posts/{id}', function ($id) {
//     return 'hey' . $id;
// })
//     // ->where([
//     //     'id' => '[0-9]+'
//     // ])
//     ->name('posts.show');







// $id給預設值
Route::get('/uses/{id?}', function ($id = 2) {
    return 'hey' . $id;
})->name('users.show');



//自定義用
Route::get('/fun/response', function () use ($contact) {
    return response($contact, 201)
        ->header('content-Type', 'application/json')
        ->cookie('My_cookie', 'danie', 3600);
});


// 返回特定 HTTP 302
Route::get('/fun/redirect', function () {
    return redirect('....');
});
// 回上一個
Route::get('/fun/back', function () {
    return back();
});

// 返回 並傳回id是 users.show就需要傳入的參數
Route::get('/fun/name_route', function () {
    return redirect()->route('users.show', ['id' => 1]);
});
//重新導向 一個網站
Route::get('/fun/away', function () {
    return redirect()->away('https://google.com');
});


//json
Route::get('/fun/json', function () use ($contact) {
    return response()->json($contact);
});

//下載東西
Route::get('/fun/download', function () use ($contact) {
    return response()->download(public_path('/daniel.jpg'), 'face.jpg');
});

Route::get('/request', function (Request $request) use ($contact) {
    dd(request()->all());
});

Route::resource('posts', 'PostsController')->only('index','show','create','store');
//只用那些
//進用那些
// Route::resource('posts', 'PostsController')->except('index', 'show');
