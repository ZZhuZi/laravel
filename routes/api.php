<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth:api")->get("/user", function (Request $request) {
    return $request->user();
});
/**************************************[小程序首页]*****************************************************8*/
// Route::any("/home/banners","Api\HomeController@banners");


// 首页banner图接口
Route::any("/home/banners","Api\HomeController@banners");
//首页最新小说的接口
Route::any("/home/news","Api\HomeController@newsList");
// 首页排行最高的小说
Route::any("home/clicks","Api\HomeController@clicksList");
// 分类列表接口
Route::any("category/list","Api\CategoryController@getCategory");
// 分类小说列表接口
Route::any("category/novel","Api\CategoryController@getCategoryNovel");


// 小说搜索接口
Route::any("search/novel","Api\SearchController@getSearchList");
// 小说书单接口
Route::any("book/list","Api\NovelController@bookList");
//小说阅读榜书单接口
Route::any("read/rank","Api\NovelController@bookRank");

//小说详情接口
Route::any("novel/detail/{id}","Api\NovelController@detail");
Route::any("novel/clicks/{id}","Api\NovelController@clicks");
Route::any("novel/read/{id}","Api\NovelController@readNum");
//小说章节列表接口
Route::any("chapter/list/{novel_id}","Api\ChapterController@chapterList");
Route::any("chapter/info/{id}","Api\ChapterController@chapterInfo");
//小说评论添加接口
Route::post("comment/add","Api\CommentController@add");
Route::post("comment/list/{novelId}","Api\CommentController@list");
Route::post("comment/del/{id}","Api\CommentController@del");


/**************************************[小程序首页]*****************************************************8*/
/**************************************[电商类的接口]*****************************************************8*/
// Route::middleware(["api_auth"])->group(function(){
	//商品分类的接口
	Route::post("home/category","ShopApi\HomeController@category");
	//首页banner图，广告位的接口
	Route::post("home/ad","ShopApi\HomeController@ad");
	// 商品类型接口
	Route::post("home/goods","ShopApi\HomeController@goodsList");
	// 品牌列表接口
	Route::post("home/brands","ShopApi\HomeController@brands");
	// 最新文章接口
	Route::post("home/newsArticle","ShopApi\HomeController@newsArticle");
	// 发送短信验证码接口
	Route::post("login/SendSms","ShopApi\LoginController@sendSms");

	//用户注册的功能
	Route::post("register","ShopApi\LoginController@register");
	//用户登录的功能
	Route::post("login","ShopApi\LoginController@login");
	Route::post("logout","ShopApi\LoginController@logout");

	//用户登录的功能
	Route::post('token','ShopApi\LoginController@token');

	//商品详情接口
	Route::post('goods/detail/{id}','ShopApi\GoodsController@detail');
	Route::any('cart/goods/attr','ShopApi\GoodsController@getGoodsAttr');

	//获取用户详情信息
	Route::post('user/info/{id}','ShopApi\UserController@userInfo');
	Route::post('user/modify','ShopApi\UserController@userModify');
	Route::post('user/fund/{user_id}','ShopApi\UserController@userFundHistory');
	//用户中心设置地址信息
	Route::post('user/region/{fid}','ShopApi\UserController@getRegion');
	Route::post('user/address/add','ShopApi\UserController@addUserAddress');
	//获取接口列表数据
	Route::post('user/address/list/{user_id}','ShopApi\UserController@getUserAddress');
	Route::post('set/default/address','ShopApi\UserController@setDefaultAddress');

	//订单相关
	Route::post('user/order/{user_id}','ShopApi\OrderController@userOrder');
	//下订单接口
	Route::post('create/order','ShopApi\OrderController@createOrder');
	
	//订单信息
	Route::any('shipping','ShopApi\OrderController@shipping');
	Route::post('payment','ShopApi\OrderController@payment');
	//用户中心红包记录
	Route::post('user/bonus/{user_id}','ShopApi\BonusController@userBonusList');
	//支付相关的
	Route::any('alipay','ShopApi\AlipayController@alipay');
	Route::any('return/url','ShopApi\AlipayController@returnUrl');
	Route::any('notify/url','ShopApi\AlipayController@notifyUrl');

// });
/**************************************[电商类的接口]*****************************************************8*/


Route::prefix('weixin')->group(function(){
    Route::any('index','Weixin\HomeController@index')->name('weixin.index');
});