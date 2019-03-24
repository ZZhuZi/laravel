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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::any('index{id}', function ($id) {
//     return $id;
// });


// Route::get('login','SignController@login');

// 学习类 签到
Route::prefix("study")->group(function(){

	Route::get('student','StudentController@index');

	Route::any('bonus/get','Study\BonusController@getBonus');    // 获取红包路由
	Route::any('bonus/index','Study\BonusController@index');       // 获取红包路由
	Route::any('bonus/add','Study\BonusController@addBonus'); // 获取红包路由

	Route::get('index','Study\SignController@index');    // 签到
	Route::get('doSign','Study\SignController@doSign');  // 签到
	Route::get('sign','Study\SignController@sign');      // 签到

});


#---------------------------------------------------------------------------------
// 后台管理

Route::get('admin/login','Admin\LoginController@index');    //登录页面
Route::any('admin/doLogin','Admin\LoginController@doLogin'); //执行登录
Route::get('admin/loginout','Admin\LoginController@loginout'); //用户退出

Route::get('403',function(){
	return view('403');
});


// 管理后台的路由分组
Route::middleware(['admin_auth','permission_auth'])->prefix('admin')->group(function(){
	
	//中间件 admin_auth permission_auth             

	// Route::get('login',function(){
	// 	return "登录成功";
	// })->middleware('admin_auth');
	Route::any('index','Admin\HomeController@index')->name('admin.index');     //后台首页
    // Route::get('home','Admin\HomeController@home')->name('admin.home');

	##################################[权限相关]#################################################33
	// 权限列表
	Route::get('/permission/list','Admin\PermissionController@list')->name('admin.permission.list');
	// 获取权限的数据
	Route::any('/get/permission/list/{fid?}','Admin\PermissionController@getPermissionList')->name('admin.get.permission.list');
	// 权限添加
	Route::get('/permission/create','Admin\PermissionController@create')->name('admin.permission.create');
	// 执行权限添加
	Route::any('/permission/doCreate','Admin\PermissionController@doCreate')->name('admin.permission.doCreate');
	//删除权限的操作
	Route::get('/permission/del/{id}','Admin\PermissionController@del')->name('admin.permission.del');


	##################################[用户相关]#################################################33
	// 用户添加页面
	Route::get('/user/create','Admin\AdminUsersController@create')->name('admin.user.create');
	// 执行用户添加
	Route::any('/user/store','Admin\AdminUsersController@store')->name('admin.user.store');
	// 用户列表页面
	Route::get('/user/list','Admin\AdminUsersController@list')->name('admin.user.list');
	//用户删除操作
	Route::get('/user/del/{id}','Admin\AdminUsersController@delUser')->name('admin.user.del');
	//用户编辑页面
	Route::get('/user/edit/{id}','Admin\AdminUsersController@edit')->name('admin.user.edit');
	//用户执行编辑页面
	Route::post('/user/doEdit','Admin\AdminUsersController@doEdit')->name('admin.user.doEdit');


	##################################[角色相关]#################################################33
     //角色列表
     Route::get('/role/list','Admin\RoleController@list')->name('admin.role.list');
     //角色删除
     Route::get('/role/del/{id}','Admin\RoleController@delRole')->name('admin.role.del');
     //角色添加
     Route::get('/role/create','Admin\RoleController@create')->name('admin.role.create');
     //角色执行添加
     Route::any('/role/store','Admin\RoleController@store')->name('admin.role.store');
     //角色编辑
     Route::get('/role/edit/{id}','Admin\RoleController@edit')->name('admin.role.edit');
     //角色执行编辑
     Route::post('/role/doEdit','Admin\RoleController@doEdit')->name('admin.role.doEdit');
     //角色权限编辑
     Route::get('/role/permission/{id}','Admin\RoleController@rolePermission')->name('admin.role.permission');
     //角色权限执行编辑
     Route::post('/role/permission/save','Admin\RoleController@saveRolePermission')->name('admin.role.permission.save');

	##################################[小说相关]#################################################33
    //作者列表
    Route::get('/author/list','Admin\AuthorController@list')->name('admin.author.list');
    //作者添加
    Route::get('/author/create','Admin\AuthorController@create')->name('admin.author.create');
     //作者执行添加
    Route::post('/author/store','Admin\AuthorController@store')->name('admin.author.store');
    //作者执行删除
    Route::get('/author/del/{id}','Admin\AuthorController@del')->name('admin.author.del');

     //小说列表
    Route::post('/novel/list','Admin\NovelController@list')->name('admin.novel.list');
    //小说添加
    Route::get('/novel/create','Admin\NovelController@create')->name('admin.novel.create');
     //小说执行添加
    Route::post('/novel/store','Admin\NovelController@store')->name('admin.novel.store');
    //小说执行删除
    Route::get('/novel/del/{id}','Admin\NovelController@del')->name('admin.novel.del');
    //小说编辑
    Route::get('/novel/edit/{id}','Admin\NovelController@edit')->name('admin.novel.edit');
    //小说执行编辑
    Route::post('/novel/doEdit','Admin\NovelController@doEdit')->name('admin.novel.doEdit');

     //小说章节列表
    Route::post('/chapter/list/{novel_id?}','Admin\ChapterController@list')->name('admin.chapter.list');
    //小说章节添加
    Route::get('/chapter/create/{novel_id}','Admin\ChapterController@create')->name('admin.chapter.create');
     //小说章节执行添加
    Route::post('/chapter/store','Admin\ChapterController@store')->name('admin.chapter.store');
    //小说章节执行删除
    Route::get('/chapter/del/{id}','Admin\ChapterController@del')->name('admin.chapter.del');
    //小说章节编辑
    Route::get('/chapter/edit/{id}','Admin\ChapterController@edit')->name('admin.chapter.edit');
    //小说章节执行编辑
    Route::post('/chapter/doEdit','Admin\ChapterController@doEdit')->name('admin.chapter.doEdit');

    //小说评论列表
    Route::post('/novel/comment/list','Admin\CommmentController@list')->name('admin.comment.list');
    //小说数据
    Route::get('/novel/comment/data','Admin\CommmentController@getComment')->name('admin.comment.data');
     //小说评论审核
    Route::post('/novel/comment/check{id}','Admin\CommmentController@check')->name('admin.comment.check');
    //小说评论执行删除
    Route::get('/novel/comment/del/{id}','Admin\CommmentController@del')->name('admin.comment.del');



	##################################[练习相关]#################################################33

 	Route::any('/users/create','LianXi\AdminUsersController@create')->name('admin.users.create');
	// 执行用户添加
	Route::any('/users/store','LianXi\AdminUsersController@store')->name('admin.users.store');
	// 用户列表页面
	Route::any('/users/list','LianXi\AdminUsersController@list')->name('admin.users.list');
	Route::any('/users/getList','LianXi\AdminUsersController@getList')->name('admin.users.getList');

	//用户删除操作
	Route::any('/users/del/{id}','LianXi\AdminUsersController@delUser')->name('admin.users.del');
	//用户编辑页面
	Route::any('/users/edit/{id}','LianXi\AdminUsersController@edit')->name('admin.users.edit');
	//用户执行编辑页面
	Route::any('/users/doEdit','LianXi\AdminUsersController@doEdit')->name('admin.users.doEdit');



});

// Route::middleware('AdminAuth')->prefix('admin')->group(function(){
// 	Route::any('index','Admin\HomeController@index');
// 	Route::any('login','Admin\LoginController@login');

// });

// 测试路由组 中间件
Route::middleware("check_age")->group(function(){
	Route::get('young',function(){
		return "I'm young ";
	});
});




