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

Route::get('test',function(){
		return app('common')->downloadImage('http://newnews.book.kaimusoft.xyz/uploads/logo.png');
	 //app('common')->postRepo()->generateAuthors();
	// $request = new Request::class;
	// return  app('common')->generateErweima($request,'1'); //time_parse('2018-11-29')->format('d');
});

Route::get('/api/deal_img','Front\AjaxController@downloadImg');

Auth::routes();

//ajax请求
Route::group(['prefix'=>'ajax','namespace'=>'Front'],function(){
	
	#发起微信二维码扫描
	Route::get('start_weixin_scan','AjaxController@startErweimaScan');
	#询问二维码扫码结果
	Route::get('ask_scan_result','AjaxController@askScanErweimaResult');


	//部分后台操作
	Route::get('set_goodwriter/{id}','AjaxController@setGoodWriter');

	#登录 
	Route::post('login_user','AjaxController@loginUser');
	#安全退出
	Route::post('logout_user','AjaxController@logoutUser');
	#发送手机验证码
	Route::post('send_mobile_code','AjaxController@sendMobileCode');
	
	#完整注册
	Route::post('reg_user','AjaxController@regUser');
	#上传文件
	Route::post('upload_file','AjaxController@uploadFile');
	#发送邮箱验证码
	//Route::post('send_mail_code/{type?}','AjaxController@sendEmailCode');
	#给用户发通知消息
	Route::post('send_notice/{user_id}','AjaxController@sendOneUserNoticeAdmin');
	#给所有用户发通知消息
	Route::post('send_group_notice','AjaxController@sendAllUserNotice');
	#设置单条通知消息为已读
	Route::get('set_notice_readed/{id}','AjaxController@setNoticeReaded');
	#忘记密码发送手机验证码/邮箱验证码
	Route::post('forgetpwd_send_code','AjaxController@forgetSendCode');
	#忘记密码找回
	Route::post('forgetpwd_action_submit','AjaxController@forgetPwdFindAction');

	/**
	 *需要用户登录后才可以操作
	 */
	Route::group(['middleware'=>['webAuth']],function(){

		## 解除绑定微信
		Route::post('unbind_weixin','AjaxController@unbindWeixin');

		## 修改手机号绑定
		Route::post('edit_mobile_bind','AjaxController@editMobileBind');

		##更新用户信息
		Route::post('update_user','AjaxController@updateUserApi');

		##发起实名认证
		Route::post('certs/publish','AjaxController@certsPublish');

		##用户给用户发私信
		Route::post('send_sixin/{user_id}','AjaxController@sendOneUserNoticeSiXin');

		##收藏文章操作
		Route::post('action_post/{post_id}','AjaxController@actionCollectPost');

		##删除通知消息
		Route::post('delete_notice/{notice_id}','AjaxController@deleteNoticeAction');

		##利好利空
		Route::post('likeOrDis/{post_id}','AjaxController@likeOrDisPost');

		/**
		 * 需要用户完成实名认证后可操作
		 */
		Route::group(['middleware'=>['webCert']],function(){
			
				##用户发布文章
				Route::post('publish_post','AjaxController@publishPost');

				##获取子分类
				Route::post('child_cats/{cat_id}','AjaxController@getChildCats');


				
		});

	});
	
});


Route::group(['middleware'=>['web'],'namespace'=>'Front'],function(){
	//前端路由
	Route::get('/', 'MainController@index')->name('index');

	//微信授权首页
	Route::get('weixin_auth','FrontController@weixinAuth');

	//微信授权登录回调
	Route::get('weixin_auth_callback','FrontController@weixinAuthCallback');

	Route::get('weixin_success','FrontController@weixinSuccess');
	
	Route::group(['middleware'=>['auth.user','webCert']],function(){
		//小屋结算参与
		
	});

	/**
	 *需要用户登录后才可以操作
	 */
	Route::group(['prefix'=>'user'],function(){
		//用户登录
		Route::get('login','MainController@authLogin');
		//用户注册
		Route::get('reg/mobile','MainController@authMobileReg');
		Route::get('find_pwd','MainController@authForgetPwd');
		/**
 		 * 个人中心
 		 */
		Route::group(['middleware'=>'auth.user'],function(){

			Route::group(['middleware'=>['webCert']],function(){
				//投稿发布
				Route::get('publish_post','MainController@authPublishPost');
			});


			//个人中心
			Route::get('center/index','MainController@authCenter');
			//账号安全
			Route::get('center/account','MainController@authAccount');
			//我的关注/收藏
			Route::get('center/attention','MainController@authAttention');
			//我的发布
			Route::get('center/publish','MainController@authPublish');
			//消息通知
			Route::get('center/notice','MainController@authNotices');
			
			//认证选择
			Route::get('center/certs','MainController@authCerts');
			//发起认证
			Route::get('center/certs/publish','MainController@publishCerts');

		});
	});

	//优秀作家
	Route::get('good_writer','MainController@goodWriter');
	Route::get('cat/{id}', 'FrontController@cat')->name('category');
	Route::get('post/{id}', 'FrontController@post')->name('post');
	Route::get('page/{id}', 'FrontController@page')->name('page');

	//搜索结果页面
	Route::get('search','FrontController@searchPage');

});

/**
 *后台
 */
//刷新缓存
Route::post('/clearCache','CommonApiController@clearCache');
Route::get('/getRootSlug/{cat_id}','Front\FrontController@getCatRootSlug');
//在页面中的URL尽量试用ACTION来避免前缀的干扰
Route::group([ 'prefix' => 'zcjy', 'namespace' => 'Admin'], function () {
	//登录
	Route::get('login', 'LoginController@showLoginForm');
	Route::post('login', 'LoginController@login');
	Route::get('logout', 'LoginController@logout');
});

/**
 * ajax接口
 */
Route::group(['prefix' => 'ajax'], function () {
	 //直接根据id返回市区县地区列表
	Route::post('cities/getAjaxSelect/{id}','CitiesController@CitiesAjaxSelect');
	//根据地域返回对应的城市列表
	Route::post('diyu/getAjaxSelect/{diyu}','CitiesController@DiyuCitiesAjaxSelect');
});



//后台管理系统
Route::group(['middleware' => ['auth.admin:admin'], 'prefix' => 'zcjy'], function () {
	//说明文档
	Route::get('/doc', 'SettingController@settingDoc');

	//后台首页
	Route::get('/', 'SettingController@setting');
	//通知消息
	Route::resource('notices', 'NoticesController');
	//贷款管理
	// Route::resource('loans', 'LoansController');
	//留言板
	Route::resource('messageBoards', 'MessageBoardController');
    //系统设置
    Route::get('settings/setting', 'SettingController@setting')->name('settings.setting');
    Route::post('settings/setting', 'SettingController@update')->name('settings.setting.update');
    //地图选择
    Route::get('settings/map','SettingController@map');
    //修改密码
	Route::get('setting/edit_pwd','SettingController@edit_pwd')->name('settings.edit_pwd');
    Route::post('setting/edit_pwd/{id}','SettingController@edit_pwd_api')->name('settings.pwd_update');
 
	//部署操作
	Route::get('helper', 'SettingController@helper')->name('settings.helper');

	//文章分类
	Route::resource('categories', 'CategoryController');

	//快讯图查看
	Route::get('quickNewsImg/{post_id}','PostController@qkImgShow');

	//文章
	Route::resource('posts', 'PostController');

    //自定义文章类型
    Route::resource('customPostTypes', 'CustomPostTypeController');
    //获取所有自定义文章类型
    Route::post('getCustomType','PostController@getCustomType');
    //自定义文章详细字段
    Route::resource('{customposttype_id}/customPostTypeItems', 'CustomPostTypeItemsController');

    //自定义页面类型
    Route::resource('customPageTypes', 'CustomPageTypeController');
    //自定义页面详细字段
    Route::resource('{page_id}/pageItems', 'PageItemsController');
	//页面
	Route::resource('pages', 'PageController');
	//首页横幅
	Route::resource('banners', 'BannerController');

	Route::resource('{banner_id}/bannerItems', 'BannerItemController');
	
	//菜单
	Route::resource('menus', 'MenuController');
	//合作伙伴
	Route::resource('coorperators', 'CoorperatorController');
	//友情链接
	Route::resource('links', 'LinkController');
	//菜单
	Route::post('menu_items', 'MenuItemController@setMenus');
	Route::get('menu_items/add', 'MenuItemController@addItem');
	Route::get('menu_items/{menu_id}', 'MenuItemController@items');
	//留言消息
	Route::resource('messages', 'MessageController');
    //我们的客户
    Route::resource('clients', 'ClientController');
    
    Route::post('reportMany', 'MessageController@reportMany')->name('messages.report');
    Route::post('allDel','MessageController@allDel')->name('messages.alldel');

    //地区设置
    Route::resource('cities','CitiesController');

    //根据pid查看到地区列表
    Route::get('cities/pid/{pid}','CitiesController@ChildList')->name('cities.child.index');
    //为指定父级城市添加地区页面
    Route::get('cities/pid/{pid}/add','CitiesController@ChildCreate')->name('cities.child.create');
    //省市区三级选择
    Route::get('cities/frame/select','CitiesController@CitiesSelectFrame')->name('cities.select.frame');


	//会员管理
	Route::resource('users', 'UserController'); 

	//认证管理
	Route::resource('certs', 'CertsController');
	//合作管理
	Route::resource('heZuos', 'HeZuoController');
	
});



