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



Auth::routes();


use App\Service;
use App\NotificationHelper;
use App\NotificationService;
use App\Slider;


Route::group(['middleware' => 'https'], function() {

Route::group(['middleware' => 'checkval'], function() {

  Route::get('/admin', function() {
    return view('admin.index');
});






//*********************************************************************************************
Route::get('/admin/about/index','AboutUsController@index');
Route::get('/admin/about/create','AboutUsController@create');
Route::post('/admin/about/create','AboutUsController@store');
Route::get('/admin/about/update/{id}','AboutUsController@edit');
Route::post('/admin/about/update/{id}','AboutUsController@update');
Route::get('/admin/about/delete/{id}','AboutUsController@delete');
//*********************************************************************************************
Route::get('/admin/company/index','CompanyController@index');
Route::get('/admin/company/create','CompanyController@create');
Route::post('/admin/company/create','CompanyController@store');
Route::get('/admin/company/update/{id}','CompanyController@edit');
Route::post('/admin/company/update/{id}','CompanyController@update');
Route::get('/admin/company/delete/{id}','CompanyController@delete');
//*********************************************************************************************
Route::get('/admin/contact/index','ContactController@index');
Route::get('/admin/contact/create','ContactController@create');
Route::post('/admin/contact/create','ContactController@store');
Route::get('/admin/contact/update/{id}','ContactController@edit');
Route::post('/admin/contact/update/{id}','ContactController@update');
Route::get('/admin/contact/delete/{id}','ContactController@delete');
//*********************************************************************************************
Route::get('/admin/partner/index','PartnerController@index');
Route::get('/admin/partner/create','PartnerController@create');
Route::post('/admin/partner/create','PartnerController@store');
Route::get('/admin/partner/update/{id}','PartnerController@edit');
Route::post('/admin/partner/update/{id}','PartnerController@update');
Route::get('/admin/partner/delete/{id}','PartnerController@delete');
//*********************************************************************************************
Route::get('/admin/gallery/index','GalleryController@index');
Route::get('/admin/gallery/create','GalleryController@create');
Route::post('/admin/gallery/create','GalleryController@store');
Route::get('/admin/gallery/update/{id}','GalleryController@edit');
Route::post('/admin/gallery/update/{id}','GalleryController@update');
Route::get('/admin/gallery/delete/{id}','GalleryController@delete');
//*********************************************************************************************
Route::get('/admin/news/index','NewsController@index');
Route::get('/admin/news/create','NewsController@create');
Route::post('/admin/news/create','NewsController@store');
Route::get('/admin/news/update/{id}','NewsController@edit');
Route::post('/admin/news/update/{id}','NewsController@update');
Route::get('/admin/news/delete/{id}','NewsController@delete');
//*********************************************************************************************
Route::get('/admin/service/index','ServiceController@index');
Route::get('/admin/service/create','ServiceController@create');
Route::post('/admin/service/create','ServiceController@store');
Route::get('/admin/service/update/{id}','ServiceController@edit');
Route::post('/admin/service/update/{id}','ServiceController@update');
Route::get('/admin/service/delete/{id}','ServiceController@delete');

//*********************************************************************************************
Route::get('/admin/service/index/{parent_id}','ServiceController@index_sons');
Route::get('/admin/service/create/{parent_id}','ServiceController@create_son');
Route::post('/admin/service/create/{parent_id}','ServiceController@store_son');
//*********************************************************************************************
Route::get('/admin/product/index','ServiceController@product_index');
Route::get('/admin/product/create','ServiceController@product_create');
Route::post('/admin/product/create','ServiceController@product_store');
Route::get('/admin/product/update/{id}','ServiceController@product_edit');
Route::post('/admin/product/update/{id}','ServiceController@product_update');
Route::get('/admin/product/delete/{id}','ServiceController@product_delete');
//*********************************************************************************************
Route::get('/admin/product/index/{parent_id}','ServiceController@product_index_sons');
Route::get('/admin/product/create/{parent_id}','ServiceController@product_create_son');
Route::post('/admin/product/create/{parent_id}','ServiceController@product_store_son');
//*********************************************************************************************
Route::get('/admin/slider/index','SliderController@index');
Route::get('/admin/slider/create','SliderController@create');
Route::post('/admin/slider/create','SliderController@store');
Route::get('/admin/slider/update/{id}','SliderController@edit');
Route::post('/admin/slider/update/{id}','SliderController@update');
Route::get('/admin/slider/delete/{id}','SliderController@delete');
//*********************************************************************************************
Route::get('/admin/media/index/{content_id}/{content_type}','MediaController@get_by_type');
Route::get('/admin/media/create/{content_id}/{content_type}','MediaController@create');
Route::post('/admin/media/create/{content_id}/{content_type}','MediaController@store');
Route::get('/admin/media/update/{id}','MediaController@edit');
Route::post('/admin/media/update/{id}','MediaController@update');
Route::get('/admin/media/delete/{id}','MediaController@delete');
//*********************************************************************************************
Route::get('/admin/city/index','CityController@index');
Route::get('/admin/city/create','CityController@create');
Route::post('/admin/city/create','CityController@store');
Route::get('/admin/city/update/{id}','CityController@edit');
Route::post('/admin/city/update/{id}','CityController@update');
Route::get('/admin/city/delete/{id}','CityController@delete');
//*********************************************************************************************
Route::get('/admin/option/index','OptionController@index');
Route::get('/admin/option/create','OptionController@create');
Route::post('/admin/option/create','OptionController@store');
Route::get('/admin/option/update/{id}','OptionController@edit');
Route::post('/admin/option/update/{id}','OptionController@update');
Route::get('/admin/option/delete/{id}','OptionController@delete');
//*********************************************************************************************

Route::get('/admin/bank/index','BankController@index');
Route::get('/admin/bank/create','BankController@create');
Route::post('/admin/bank/create','BankController@store');
Route::get('/admin/bank/update/{id}','BankController@edit');
Route::post('/admin/bank/update/{id}','BankController@update');
Route::get('/admin/bank/delete/{id}','BankController@delete');
//*********************************************************************************************
Route::get('/admin/price/index','PriceController@index');
Route::get('/admin/price/create','PriceController@create');
Route::post('/admin/price/create','PriceController@store');
Route::get('/admin/price/update/{id}','PriceController@edit');
Route::post('/admin/price/update/{id}','PriceController@update');
Route::get('/admin/price/delete/{id}','PriceController@delete');
//*********************************************************************************************
Route::get('/admin/portal/index','PortalController@index');
Route::get('/admin/portal/create','PortalController@create');
Route::post('/admin/portal/create','PortalController@store');
Route::get('/admin/portal/update/{id}','PortalController@edit');
Route::post('/admin/portal/update/{id}','PortalController@update');
Route::get('/admin/portal/delete/{id}','PortalController@delete');
//*********************************************************************************************
Route::get('/admin/page/index','PageController@index');
Route::get('/admin/page/create','PageController@create');
Route::post('/admin/page/create','PageController@store');
Route::get('/admin/page/update/{id}','PageController@edit');
Route::post('/admin/page/update/{id}','PageController@update');
Route::get('/admin/page/delete/{id}','PageController@delete');
//*********************************************************************************************
Route::get('/admin/application/index','ApplicationController@index');
Route::get('/admin/application/{id}','ApplicationController@show');
Route::get('/admin/application/print/{id}','ApplicationController@print');
Route::get('/admin/application/delete/{id}','ApplicationController@delete');
Route::get('/admin/application/index/{service_id}','ApplicationController@index_by_service');

//*********************************************************************************************
Route::get('/admin/user/index','UserController@index');
Route::get('/admin/user/create','UserController@admin_create');
Route::post('/admin/user/create','UserController@admin_store');
Route::get('/admin/user/update/{id}','UserController@admin_edit');
Route::post('/admin/user/update/{id}','UserController@admin_update');
Route::get('/admin/user/delete/{id}','UserController@admin_delete');
//*********************************************************************************************
Route::get('/admin/user/index','UserController@index');
Route::get('/admin/user/create','UserController@admin_create');
Route::post('/admin/user/create','UserController@admin_store');
Route::get('/admin/user/update/{id}','UserController@admin_edit');
Route::post('/admin/user/update/{id}','UserController@admin_update');
Route::get('/admin/user/delete/{id}','UserController@admin_delete');
//*********************************************************************************************
Route::get('/admin/notification/index','NotificationController@index');
Route::get('/sendnotify', 'NotificationController@create');
Route::post('/sendnotify', 'NotificationController@store');


Route::get('/admin/service/active/{id}','ServiceController@active');
});
//*********************************************************************************************



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/', function () {
	  if(Session::get('locale')=="")
  {
    Session::put('locale', "en");
  }
  $sliders=Slider::slider_index();
   $services=Service::service_index_fathers_main();
  // return $services;
    return view('main_site.index',compact('services','sliders'));
});

Route::get('user/register', 'UserController@create');
Route::post('user/register', 'UserController@store');

Route::get('user/login', 'UserController@login_page');
Route::post('user/login', 'UserController@login');




Route::get('/account', 'UserController@account')->name('account');
Route::post('/account', 'UserController@update')->name('account');


Route::get('/galleries','SiteController@galleries');


Route::get('/gallery/{gallery_id}', 'SiteController@gallery')->name('gallery');


Route::get('/services', 'SiteController@services')->name('home');

Route::get('/products', 'SiteController@products')->name('home');

Route::get('/service/{id}', 'SiteController@services_single')->name('home');

Route::get('/product/{id}/show', 'SiteController@product_sons')->name('home');

Route::get('/service/{id}/show', 'SiteController@service_sons')->name('home');


Route::get('/product/{id}', 'SiteController@product_single')->name('home');
//************************************************************************************************************

//Applications Confrim on Cancel


Route::get('/application/confirm/{id}', 'SiteController@application_confirm')->name('home');
Route::get('/application/confirm/mobile/{id}', 'SiteController@application_confirm_mobile')->name('home');

Route::get('/application/unconfirm/{id}', 'SiteController@application_cancel')->name('home');

Route::get('/application/unconfirm/mobile/{id}', 'SiteController@application_cancel_mobile')->name('home');

Route::get('/application/confirm/service/{id}', 'SiteController@application_service_confirm')->name('home');
Route::get('/application/confirm/service/mobile/{id}', 'SiteController@application_service_confirm_mobile')->name('home');

Route::get('/application/unconfirm/service/{id}', 'SiteController@application_service_cancel')->name('home');

Route::get('/application/unconfirm/service/mobile/{id}', 'SiteController@application_service_cancel_mobile')->name('home');


//************************************************************************************************************

Route::get('/news','SiteController@news_index');


Route::get('/news_single/{id}', 'SiteController@news_show');

Route::get('/contact','SiteController@contact');



Route::get('/aboutus','SiteController@about');


Route::get('/lang/{locale}', 'LocalizationController@index');


Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ComplaintController@contactSaveData']);


Route::get('/application/{token}/{user_id}/create','SiteController@application_create_mobile');

Route::post('/application/{token}/{user_id}/create','SiteController@application_store_mobile');

Route::get('/application/service/{token}/{user_id}/create','SiteController@application_service_create_mobile');

Route::post('/application/service/{token}/{user_id}/create','SiteController@application_service_store_mobile');

Route::group(['middleware' => 'checkuser'], function() {

Route::get('/application/create','SiteController@application_create');

Route::post('/application/create','SiteController@application_store');


Route::get('/application/service/create','SiteController@application_service_create');

Route::post('/application/service/create','SiteController@application_service_store');

});

Route::get('/application/service/single/{id}','SiteController@application_service_single');
Route::get('/application/single/{id}','SiteController@application_single');


Route::get('/application/service/single/mobile/{id}','SiteController@application_service_single_mobile');
Route::get('/application/single/mobile/{id}','SiteController@application_single_mobile');


Route::get('/company/portal/{id}','UserController@company_portal');



  Route::get('/notifications', function() {
    return view('main_site.notifications');
});

  Route::get('/company', function() {
    return view('company.index');
});


Route::get('user/active', 'UserController@active_view');
Route::post('user/active', 'UserController@active');

  Route::get('/test', function() {
    return view('test');
});

});

