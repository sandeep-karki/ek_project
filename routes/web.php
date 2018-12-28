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

define("PREFIX", env('PREFIX','system'));
define("BACKEND", env('BACKEND', 'system'));
define("PAGINATION", env('PAGINATION',20));
Route::get('/', function () {
    return view('welcome');
});
Route::get('terms-condition','Admin\home\homeController@getTermsAndCondition');
Route::get('about-us','Admin\home\homeController@getAboutUs');
Route::get('privacy-policy','Admin\home\homeController@getPrivacyPolicy');

// Route::get('/system',function(){
//     dd('dfsdf');
// });
Route::get('system','Auth\LoginController@showLoginForm')->name('login');
Route::get('/system/login','Auth\LoginController@showLoginForm')->name('login');

Route::get('/system/verify','Auth\LoginController@verify');
////Route::get('/','Auth\LoginController@showLoginForm');
//Route::post('/system/login','Auth\LoginController@login')->middleware('throttle:5');
Route::post('/system/login','Auth\LoginController@login')->middleware(['throttle:5','log']);
Route::get('/system/logout','Auth\LoginController@logout');
Route::post('/system/verification','Auth\LoginController@verification');
Route::get('/logout','Auth\LoginController@logout');
//
Route::get('/resetpassword/{token}/{userid}','frontend\resetpassword\resetpasswordController@index');
Route::post('/resetpassword/updatepassword','frontend\resetpassword\resetpasswordController@resetUserPassword');

Route::get('/forgotpassword','frontend\resetpassword\recoverpasswordController@index');
Route::post('/forgotpassword/recover','frontend\resetpassword\recoverpasswordController@recoverpassword');


include('backend.php');


