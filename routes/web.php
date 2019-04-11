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

// Route::get('index{id}', function ($id) {
//     return $id;
// });


// Route::get('login','SignController@login');

// 学习类 签到
Route::prefix("study")->group(function(){

	Route::get('student','StudentController@index');

	Route::get('bonus/get','Study\BonusController@getBonus');    // 获取红包路由
	Route::get('bonus/index','Study\BonusController@index');       // 获取红包路由
	Route::get('bonus/add','Study\BonusController@addBonus'); // 获取红包路由

	Route::get('index','Study\SignController@index');    // 签到
	Route::get('doSign','Study\SignController@doSign');  // 签到
	Route::get('sign','Study\SignController@sign');      // 签到

    Route::get('guess/add','Study\GuessController@add');      // 竞猜添加页面
    Route::get('guess/doAdd','Study\GuessController@doAdd');      // 竞猜添加操作页面
    Route::get('guess/list','Study\GuessController@list');      // 竞猜添加页面

    Route::get('guess/guess','Study\GuessController@guess');      // 竞猜添加页面
    Route::get('guess/result','Study\GuessController@checkResult');      // 竞猜结果页面
    Route::get('guess/doGuess','Study\GuessController@doGuess');      // 竞猜竞猜页面

    Route::get('lottery/index','Study\LotteryController@index'); //抽奖页面
    Route::get('lottery/do','Study\LotteryController@doLottery'); //抽奖执行页面



});


#---------------------------------------------------------------------------------
// 后台管理

Route::get('admin/login','Admin\LoginController@index');    //登录页面
Route::get('admin/doLogin','Admin\LoginController@doLogin'); //执行登录
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
	Route::any('/permission/list','Admin\PermissionController@list')->name('admin.permission.list');
	// 获取权限的数据
	Route::any('/get/permission/list/{fid?}','Admin\PermissionController@getPermissionList')->name('admin.get.permission.list');
	// 权限添加
	Route::any('/permission/create','Admin\PermissionController@create')->name('admin.permission.create');
	// 执行权限添加
	Route::any('/permission/doCreate','Admin\PermissionController@doCreate')->name('admin.permission.doCreate');
	//删除权限的操作
	Route::any('/permission/del/{id}','Admin\PermissionController@del')->name('admin.permission.del');
    ##################################[权限相关]#################################################33


	##################################[用户相关]#################################################33
	// 用户添加页面
	Route::any('/user/create','Admin\AdminUsersController@create')->name('admin.user.create');
	// 执行用户添加
	Route::any('/user/store','Admin\AdminUsersController@store')->name('admin.user.store');
	// 用户列表页面
	Route::any('/user/list','Admin\AdminUsersController@list')->name('admin.user.list');
	//用户删除操作
	Route::any('/user/del/{id}','Admin\AdminUsersController@delUser')->name('admin.user.del');
	//用户编辑页面
	Route::any('/user/edit/{id}','Admin\AdminUsersController@edit')->name('admin.user.edit');
	//用户执行编辑页面
	Route::post('/user/doEdit','Admin\AdminUsersController@doEdit')->name('admin.user.doEdit');
    ##################################[用户相关]#################################################33


	##################################[角色相关]#################################################33
     //角色列表
     Route::any('/role/list','Admin\RoleController@list')->name('admin.role.list');
     //角色删除
     Route::any('/role/del/{id}','Admin\RoleController@delRole')->name('admin.role.del');
     //角色添加
     Route::any('/role/create','Admin\RoleController@create')->name('admin.role.create');
     //角色执行添加
     Route::any('/role/store','Admin\RoleController@store')->name('admin.role.store');
     //角色编辑
     Route::any('/role/edit/{id}','Admin\RoleController@edit')->name('admin.role.edit');
     //角色执行编辑
     Route::any('/role/doEdit','Admin\RoleController@doEdit')->name('admin.role.doEdit');
     //角色权限编辑
     Route::any('/role/permission/{id}','Admin\RoleController@rolePermission')->name('admin.role.permission');
     //角色权限执行编辑
     Route::post('/role/permission/save','Admin\RoleController@saveRolePermission')->name('admin.role.permission.save');
    ##################################[角色相关]#################################################33

	##################################[小说相关]#################################################33
    //作者列表
    Route::get('/author/list','Admin\AuthorController@list')->name('admin.author.list');
    //作者添加
    Route::get('/author/create','Admin\AuthorController@create')->name('admin.author.create');
     //作者执行添加
    Route::post('/author/store','Admin\AuthorController@store')->name('admin.author.store');
    //作者执行删除
    Route::any('/author/del/{id}','Admin\AuthorController@del')->name('admin.author.del');

     //小说列表
    Route::any('/novel/list','Admin\NovelController@list')->name('admin.novel.list');
    //小说添加
    Route::any('/novel/create','Admin\NovelController@create')->name('admin.novel.create');
     //小说执行添加
    Route::any('/novel/store','Admin\NovelController@store')->name('admin.novel.store');
    //小说执行删除
    Route::any('/novel/del/{id}','Admin\NovelController@del')->name('admin.novel.del');
    //小说编辑
    Route::any('/novel/edit/{id}','Admin\NovelController@edit')->name('admin.novel.edit');
    //小说执行编辑
    Route::any('/novel/doEdit','Admin\NovelController@doEdit')->name('admin.novel.doEdit');

     //小说章节列表
    Route::post('/chapter/list/{novel_id?}','Admin\ChapterController@list')->name('admin.chapter.list');
    //小说章节添加
    Route::any('/chapter/create/{novel_id}','Admin\ChapterController@create')->name('admin.chapter.create');
     //小说章节执行添加
    Route::post('/chapter/store','Admin\ChapterController@store')->name('admin.chapter.store');
    //小说章节执行删除
    Route::any('/chapter/del/{id}','Admin\ChapterController@del')->name('admin.chapter.del');
    //小说章节编辑
    Route::any('/chapter/edit/{id}','Admin\ChapterController@edit')->name('admin.chapter.edit');
    //小说章节执行编辑
    Route::post('/chapter/doEdit','Admin\ChapterController@doEdit')->name('admin.chapter.doEdit');

    //小说评论列表
    Route::post('/novel/comment/list','Admin\CommentController@list')->name('admin.comment.list');
    //小说数据
    Route::any('/novel/comment/data','Admin\CommentController@getComment')->name('admin.comment.data');
     //小说评论审核
    Route::any('/novel/comment/check/{id}','Admin\CommentController@check')->name('admin.comment.check');
    //小说评论执行删除
    Route::any('/novel/comment/del/{id}','Admin\CommentController@del')->name('admin.comment.del');
    ##################################[小说相关]#################################################33



	##################################[练习相关]#################################################33

 	Route::get('/users/create','LianXi\AdminUsersController@create')->name('admin.users.create');
	// 执行用户添加
	Route::get('/users/store','LianXi\AdminUsersController@store')->name('admin.users.store');
	// 用户列表页面
	Route::get('/users/list','LianXi\AdminUsersController@list')->name('admin.users.list');
	Route::get('/users/getList','LianXi\AdminUsersController@getList')->name('admin.users.getList');

	//用户删除操作
	Route::get('/users/del/{id}','LianXi\AdminUsersController@delUser')->name('admin.users.del');
	//用户编辑页面
	Route::get('/users/edit/{id}','LianXi\AdminUsersController@edit')->name('admin.users.edit');
	//用户执行编辑页面
	Route::get('/users/doEdit','LianXi\AdminUsersController@doEdit')->name('admin.users.doEdit');
    ##################################[练习相关]#################################################33



     /*#############################[商品品牌相关]##############################################*/
     Route::get('brand/list','Admin\BrandController@list')->name('admin.brand.list'); //品牌列表页面
     Route::any('brand/data/list','Admin\BrandController@getListData')->name('admin.brand.data.list'); //品牌列表数据

     Route::any('brand/add','Admin\BrandController@add')->name('admin.brand.add'); //品牌添加页面
     Route::any('brand/doAdd','Admin\BrandController@doAdd')->name('admin.brand.doAdd'); //品牌执行添加操作

     Route::any('brand/del/{id}','Admin\BrandController@del')->name('admin.brand.del'); //品牌执行删除操作

     /*#############################[商品品牌相关]################################################*/

    /*#############################[商品分类相关]#############################*/
     //商品分类列表页面
     Route::get('category/list', 'Admin\CategoryController@list')->name('admin.category.list');
     //获取商品接口分类的数据
     Route::get('category/get/data/{fid?}','Admin\CategoryController@getListData')->name('admin.category.get.data');
     //商品添加页面
     Route::get('category/add','Admin\CategoryController@add')->name('admin.category.add');
     //商品执行添加操作
     Route::post('category/doAdd','Admin\CategoryController@doAdd')->name('admin.category.doAdd');
     //商品编辑页面
     Route::get('category/edit/{id}','Admin\CategoryController@edit')->name('admin.category.edit');
     //商品执行编辑操作
     Route::post('category/doEdit','Admin\CategoryController@doEdit')->name('admin.category.doEdit');
     //商品执行删除操作
     Route::get('category/del/{id}','Admin\CategoryController@del')->name('admin.category.del');
     /*#############################[商品分类相关]#############################*/

     /*#############################[文章相关]################################################*/
     // Route::get('')

     /*#############################[文章相关]################################################*/

    /*#############################[广告位相关]################################################*/
    // 广告位列表页面
     Route::any('position/list','Admin\AdPositionController@list')->name('admin.position.list');

     //广告位添加页面
     Route::get('position/add','Admin\AdPositionController@add')->name('admin.position.add');
     // 执行添加广告位操作
     Route::post('position/store','Admin\AdPositionController@store')->name('admin.position.store');
      //广告位修改页面
     Route::get('position/edit/{id}','Admin\AdPositionController@edit')->name('admin.position.edit');
     // 执行修改广告位操作
     Route::post('position/doEdit','Admin\AdPositionController@doEdit')->name('admin.position.doEdit');
      //广告位删除操作
     Route::get('position/del/{id}','Admin\AdPositionController@del')->name('admin.position.del');

     // -----------------------------
     // 广告列表页面
     Route::any('ad/list','Admin\AdController@list')->name('admin.ad.list');

     //广告添加页面
     Route::get('ad/add','Admin\AdController@add')->name('admin.ad.add');
     // 执行添加广告操作
     Route::post('ad/store','Admin\AdController@store')->name('admin.ad.store');
      //广告修改页面
     Route::get('ad/edit/{id}','Admin\AdController@edit')->name('admin.ad.edit');
     // 执行修改广告操作
     Route::post('ad/doEdit','Admin\AdController@doEdit')->name('admin.ad.doEdit');
      //广告删除操作
     Route::get('ad/del/{id}','Admin\AdController@del')->name('admin.ad.del');


     /*#############################[广告位相关]################################################*/

     /*#############################[商品相关]################################################*/
     // ---------------------------------商品类型相关----------------------------------------------
    // 商品类型列表页面
     Route::any('goods/type/list','Admin\GoodsTypeController@list')->name('admin.goods.type.list');
     //商品类型添加页面
     Route::get('goods/type/add','Admin\GoodsTypeController@add')->name('admin.goods.type.add');
     // 执行添加商品类型操作
     Route::post('goods/type/store','Admin\GoodsTypeController@store')->name('admin.goods.type.store');
      //商品类型修改页面
     Route::get('goods/type/edit/{id}','Admin\GoodsTypeController@edit')->name('admin.goods.type.edit');
     // 执行修改商品类型位操作
     Route::post('goods/type/doEdit','Admin\GoodsTypeController@doEdit')->name('admin.goods.type.doEdit');
      //商品类型删除操作
     Route::get('goods/type/del/{id}','Admin\GoodsTypeController@del')->name('admin.goods.type.del');
     // ---------------------------------商品属性相关----------------------------------------------
      // 商品类型列表页面
     Route::any('goods/attr/list/{type_id}','Admin\GoodsAttrController@list')->name('admin.goods.attr.list');

     //商品属性添加页面
     Route::get('goods/attr/add','Admin\GoodsAttrController@add')->name('admin.goods.attr.add');
     // 执行添加商品属性操作
     Route::post('goods/attr/store','Admin\GoodsAttrController@store')->name('admin.goods.attr.store');
      //商品属性修改页面
     Route::get('goods/attr/edit/{id}','Admin\GoodsAttrController@edit')->name('admin.goods.attr.edit');
     // 执行修改商品属性位操作
     Route::post('goods/attr/doEdit','Admin\GoodsAttrController@doEdit')->name('admin.goods.attr.doEdit');
      //商品属性删除操作
     Route::get('goods/attr/del/{id}','Admin\GoodsAttrController@del')->name('admin.goods.attr.del');
     // ---------------------------------商品相关----------------------------------------------
     //商品列表
     Route::any('goods/list','Admin\GoodsController@list')->name('admin.goods.list');
     //商品列表接口数据
     Route::any('goods/data/list','Admin\GoodsController@getGoodsData')->name('admin.goods.data.list');


     //商品添加页面
     Route::get('goods/add','Admin\GoodsController@add')->name('admin.goods.add');
     // 执行添加商品操作
     Route::post('goods/store','Admin\GoodsController@store')->name('admin.goods.store');

      //商品修改属性页面
     Route::get('goods/change/attr','Admin\GoodsController@changeAttr')->name('admin.goods.change.attr');

       //商品修改页面
     Route::get('goods/edit/{id}','Admin\GoodsController@edit')->name('admin.goods.edit');
     // 执行修改商品位操作
     Route::post('goods/doEdit','Admin\GoodsController@doEdit')->name('admin.goods.doEdit');
      //商品删除操作
     Route::get('goods/del/{id}','Admin\GoodsController@del')->name('admin.goods.del');


     // ---------------------------------商品相册相关----------------------------------------------

    //商品相册数据
     Route::post('goods/gallery/list/{goods_id}','Admin\GoodsGalleryController@getGallery')->name('admin.goods.gallery.list');
      //商品相册删除操作
     Route::get('goods/gallery/del/{id}','Admin\GoodsGalleryController@del')->name('admin.goods.gallery.del');

   
     // ---------------------------------商品库存相关----------------------------------------------

     //商品sku和属性页面
     Route::get('goods/sku/edit/{goods_id}','Admin\GoodsSkuController@edit')->name('admin.goods.sku.edit');
      //商品添加操作
     Route::post('goods/sku/save','Admin\GoodsSkuController@doEdit')->name('admin.goods.sku.save');
     //商品sku属性列表接口
     Route::any('goods/sku/attr/{goods_id}','Admin\GoodsSkuController@getSkuAttr')->name('admin.goods.sku.attr');
     //商品属性值
     Route::any('goods/attr/value/{id}','Admin\GoodsSkuController@getAttrValues')->name('admin.goods.attr.value');
     /*#############################[商品相关]################################################*/



});

// Route::middleware('AdminAuth')->prefix('admin')->group(function(){
// 	Route::get('index','Admin\HomeController@index');
// 	Route::get('login','Admin\LoginController@login');

// });

// 测试路由组 中间件
Route::middleware("check_age")->group(function(){
	Route::get('young',function(){
		return "I'm young ";
	});
});




