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

Route::any('index{id}', function ($id) {
    return $id;
});


// Route::get('login','SignController@login');

// 学习类 签到
Route::prefix("study")->group(function(){
	Route::get('sign','SignController@sign');
	// Route::get('dosign','SignController@dosign');
	Route::get('student','StudentController@index');

	Route::any('bonus','Study\BonusController@getBonus'); // 获取红包路由
	Route::any('index','Study\BonusController@index'); // 获取红包路由
	Route::any('addBonus','Study\BonusController@addBonus'); // 获取红包路由

});


// 管理后台的路由分组
Route::prefix("admin")->group(function(){
	// Route::get('login',function(){
	// 	return "登录成功";
	// })->middleware('admin_auth');
	Route::any('index','Admin\HomeController@index');
	Route::any('login','Admin\LoginController@login');

});

// 测试路由组 中间件
Route::middleware("check_age")->group(function(){
	Route::get('young',function(){
		return "I'm young ";
	});
});


