<?php
//Home Controller
Route::get('/','View\HomeController@get')->name('home');
//Page Controller
Route::get('/trang/{alias}','View\PageController@get')->name('page');
//Danh mục sản phẩm
Route::get('/danh-muc/{alias}','View\CategoryController@get')->name('category');
Route::get('/danh-muc/{alias}/{id}','View\CategoryController@getDetail')->name('detail_category');
//Chi tiết sản phẩm
Route::get('/san-pham/{id}/{alias}','View\ProductController@get')->name('detail');
//Chi tiết chủ shop
Route::get('/nguoi-ban/{id}/{alias}','View\ProfileController@get')->name('profile');
//Đăng nhập
Route::get('/dang-nhap','View\AuthController@getLogin')->name('login');
Route::post('/dang-nhap','View\AuthController@postLogin')->name('login');
//Đăng ký
Route::get('/dang-ky','View\AuthController@getRegister')->name('register');
Route::post('/dang-ky','View\AuthController@postRegister')->name('register');
Route::get('/verify-user/{code}', 'View\AuthController@activateUser')->name('activate.user');
//Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//Điều lệ
Route::get('/dieu-le','View\RulesController@get')->name('rule');

//Middleware account
Route::prefix('account')->group(function(){
    //Account
    Route::group(['middleware' => 'auth:web'], function () {
        //Dashboard
        Route::get('/','View\AccountController@get')->name('user-dashboard');
        //Đăng xuất
        Route::get('/logout','View\AuthController@logout')->name('user-logout');
        //Lấy thông tin trường
        Route::get('/school','User\AccountController@getSchool');
        //Lấy thông tin tài khoản
        Route::get('/user','User\AccountController@get');
        //Cập nhật thông tin tài khoản
        Route::put('/user','User\AccountController@put');
        //Cập nhật mật khẩu tài khoản
        Route::put('/password','User\AccountController@putPassword');
        //Cập nhật ảnh
        Route::post('/upload','User\AccountController@postAvatar');
        //Lấy thông tin sản phẩm
        Route::get('/product','User\ProductController@get');
        Route::delete('/product_delete/{id}','User\ProductController@delete');
        Route::post('/product_add','User\ProductController@post');
        Route::post('/product_image/{id}','User\ProductController@postImage');;
        Route::put('/product_update/{id}','User\ProductController@update');
        Route::get('/product/{id}','User\ProductController@getDetail');
        //Lấy danh sách danh mục
        Route::get('/category','User\ProductController@category');
    });
});
//Middleware Admin
Route::prefix('qanivia')->group(function () {
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/',function(){
            return view('server.index');
        })->name('admin-home');
        //Logout
        Route::get('/logout','API\AuthController@logout')->name('logout');
        Route::get('/check','API\AuthController@check')->name('check');
        //All
        Route::get('permissions/all','API\RoleController@permission');
        Route::get('roles/all','API\RoleController@all');
        //API
        Route::resource('pages','API\PageController');
        Route::resource('roles','API\RoleController');
        Route::resource('users','API\AdminController');
        Route::resource('schools','API\SchoolController');
        Route::resource('contacts','API\ContactController');
        Route::resource('categories','API\CategoryController');
        Route::resource('banners','API\BannerController');
        Route::resource('customers','API\UserController');
        Route::resource('products','API\ProductController');
        Route::resource('rules-categories','API\RulesCategoryController');
        Route::resource('rules','API\RulesController');
         //Delete
        Route::post('pages/deleteMulti','API\PageController@deleteMultiple');
        Route::post('roles/deleteMulti','API\RoleController@deleteMultiple');
        Route::post('users/deleteMulti','API\UserController@deleteMultiple');
        Route::post('contacts/deleteMulti','API\ContactController@deleteMultiple');
        Route::post('rules/deleteMulti','API\RulesController@deleteMultiple');
        //Page Changed
        Route::get('pages/changed/{page}','API\PageController@checked');
        Route::get('banners/changed/{page}','API\BannerController@checked');
        Route::get('products/changed/{page}','API\ProductController@checked');
    });
    //Auth
    Route::get('/login','API\AuthController@viewLogin')->name('admin-login');
    Route::post('/login','API\AuthController@login');
    Route::any('/{all}', function () {
        return view('server.index');
    })
    ->where('all','.*');
});
