<?php

use App\Models\User;
use Illuminate\Support\Facades\Redis;
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
    $user = Redis::get('user');
    if($user){
        return $user;
    }
    $user = User::all();
    Redis::set('user', $user);
    return $user;
});

// Route::get('/', function () {
//     $p = Redis::incr('p');
//     return $p;
// });