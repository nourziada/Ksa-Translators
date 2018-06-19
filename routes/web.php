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

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

    Route::get('/','WebSite\HomeController@index')->name('index');
    Route::get('/page/{id}','WebSite\HomeController@getPage')->name('page');
    Route::get('/contact-us','WebSite\HomeController@getContact')->name('contact');
    Route::post('/contact-us/send','WebSite\HomeController@postContact')->name('contact.send');

    Route::resource('/projects','User\ProjectController');
    Route::get('/project/coupon/check/{coupon}','User\ProjectController@checkCoupon')->name('user.check.coupon');
    Route::get('/project/check/{id}','User\ProjectController@getCheck')->name('user.check.project');

    /***** Reply Controller ***/
    Route::post('/reply/add','User\ReplyController@addReply')->name('user.add.reply');
    Route::post('/rating/add','User\ReplyController@addRating')->name('user.add.rating');

    Route::post('/make-payment/account','User\ProjectController@makePaymentAccount')->name('make.payment.account');
    Route::post('/make-payment','User\ProjectController@makePayment')->name('make.payment');
    Route::get('/success/{status}','User\ProjectController@MakePayProducts')->name('make.pay.cart');

    Route::get('/profile','User\AccountController@getAccount')->name('user.account');
    Route::post('/profile/update','User\AccountController@updateAccount')->name('user.account.update');
    Auth::routes();

});


Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('me-user-admin')->group(function(){

    Route::get('/', 'Admin\HomeController@index')->name('admin.index');

    Route::resource('slider','Admin\SliderController');

    Route::get('/services/{id}','Admin\HomeController@getServices')->name('admin.service');
    Route::post('/services/update','Admin\HomeController@updateServices')->name('admin.service.update');

    Route::get('/page/{id}','Admin\HomeController@getPage')->name('admin.page');
    Route::post('/page/update','Admin\HomeController@updatePage')->name('admin.page.update');

    Route::get('/section/{id}','Admin\HomeController@getSection')->name('admin.section');
    Route::post('/section/update','Admin\HomeController@updateSection')->name('admin.section.update');

    Route::get('/users','Admin\HomeController@getUsers')->name('admin.users');
    Route::get('/user/{id}','Admin\HomeController@getUpdateUser')->name('admin.user');
    Route::post('/users/update','Admin\HomeController@updateUsers')->name('admin.users.update');
    Route::get('/users/search','Admin\HomeController@searchUsers')->name('admin.users.search');

    Route::get('/supervisor/search','Admin\SupervisorController@searchUsers')->name('admin.supervisor.search');
    Route::resource('/supervisor','Admin\SupervisorController');

    Route::get('/ratings','Admin\AdminSuperController@getRatings')->name('admin.ratings');
    Route::post('/ratings/update','Admin\AdminSuperController@updateRating')->name('admin.users.ratings');

    Route::get('new-projects','Admin\ProjectController@getNewProjects')->name('admin.projects.new');
    Route::get('payment-projects','Admin\ProjectController@getPaymentProjects')->name('admin.projects.payment');

    Route::get('submit-projects','Admin\ProjectController@getSubmitProjects')->name('admin.projects.submit');
    Route::get('accept-projects','Admin\ProjectController@getAcceptedProjects')->name('admin.projects.accept');

    Route::get('/projects/search','Admin\ProjectController@searchProject')->name('admin.projects.search');
    Route::get('/projects/details/{id}','Admin\ProjectController@getProject')->name('admin.project.details');

    Route::post('/project/accept','Admin\ProjectController@acceptProjects')->name('admin.accept.project');
    Route::post('/project/submit','Admin\ProjectController@submitProjects')->name('admin.submit.project');

    Route::post('/project/delete','Admin\ProjectController@deleteProject')->name('admin.delete.project');

    Route::resource('/coupon','Admin\CouponController');

    Route::resource('/data','Admin\ProjectDataController');
	/*
	|--------------------------------------------------------------------------
	| Auth Routes
	|--------------------------------------------------------------------------
	*/
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Password Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/password' ,'Admin\HomeController@showPassword')->name('show.admin.password');
    Route::post('/password/update' ,'Admin\HomeController@changePassword')->name('update.admin.password');

    

});

