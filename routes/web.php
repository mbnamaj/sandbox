<?php
use Illuminate\Http\Request;
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
Route::get('/', 'MainController@sand')->name('/');
Route::post('/check', 'MainController@sandmodel')->name('/check');
//Route::get('/api/user', function () {
//    return redirect()->route('/');
//});
