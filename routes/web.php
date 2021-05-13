<?php

use Illuminate\Support\Facades\Route;

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


//home panel

Route::get('/', 'Controller@welcome');

Auth::routes();

//websites routes


Route::get('/brands/cardetails/{id}', 'CarDetailsController@details');
Route::get('/home/advance/search/details', 'AdvSearchController@advsearch');
Route::post('/home/subscribe', 'SubscribeController@subscribe');

Route::get('/home/advance/search/specific', 'AdvSearchController@specificsearch');

Route::get('/home/autocomplete','Controller@fetch');

Route::get('/home/search','Controller@search');

// //car specific car for welcome page
Route::get('/getData/{id}', 'frontend\CarSearchController@getData')->name('getData');


//json data pass for searching option
Route::get('/getmodels/{id}', 'frontend\CarSearchController@getmodels');
Route::get('/getyears/{id}', 'frontend\CarSearchController@getyears');
//json data pass for admin single car
Route::get('/admingetmodels/{id}', 'backend\SingleCarController@getadminmodels');


//frontend side start ===============

//brand page==============
Route::get('/brands', 'frontend\BrandsController@brands')->name('brand_page');

//service page==============
Route::get('/services', 'frontend\ServiceController@services')->name('service_page');

//compare page==============
Route::get('/compares', 'frontend\CompareController@compares')->name('compare_page');
//car specific car for welcome page
Route::get('/getData1/{id}', 'frontend\CompareController@getData1');
Route::get('/getData2/{id}', 'frontend\CompareController@getData2');
Route::get('/getData1/{id1}/getData2/{id2}', 'frontend\CompareController@getAllData1');
Route::get('/getData2/{id2}/getData1/{id1}', 'frontend\CompareController@getAllData2');
//json data pass for searching option
Route::get('/getyears/{id}', 'frontend\CompareController@getyears');


//contact page==============
Route::get('/contacts', 'frontend\ContactController@contacts')->name('contact_page');
// contact form data collect
Route::post('/contacts', 'frontend\ContactController@collect');





//review page==============
Route::get('/all/reviews', 'frontend\ReviewController@reviews')->name('review_page');
Route::get('/carsdetails/reviews/{id}', 'frontend\ReviewController@postreviews');
Route::post('/carsdetails/process-reviews', 'frontend\ReviewController@process');
Route::get('/carsdetails/reviews/show/{id}', 'frontend\ReviewController@showreviews');
Route::get('/carsdetails/reviews/individual/{id}', 'frontend\ReviewController@individualreviews');
Route::get('/all/reviews/search', 'frontend\ReviewController@searchcar');







//user panel
Route::group(['middleware' => ['auth','user']], function (){
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/home/profile/{id}', 'HomeController@profile')->name('user.profile');
  Route::get('/home/profile/edit/{id}', 'HomeController@EditProfile')->name('edit.profile');
  Route::post('/home/profile/update/', 'HomeController@updateProfile')->name('update.profile');
  Route::get('/home/profile/password/edit/{id}', 'HomeController@passchange')->name('change.password');
  Route::post('/home/profile/password/update/', 'HomeController@updatepass')->name('update.pass');
  Route::get('/home/cardetails/savecar', 'HomeController@savecar');
  Route::get('/home/savecar/list', 'HomeController@savecarlist');
  Route::get('/home/savecar/list/remove/{id}', 'HomeController@savecardelete');
});


















//admin panel

Route::group(['middleware' => ['auth','admin']], function (){


    Route::get('/dashboard', 'backend\AdminController@dashboard')->name('dashboard');
    Route::get('/admin/dashboard/search', 'backend\AdminController@search');
    //admin register user=========================
    Route::get('/admin/user', 'backend\UserController@dashboard')->name('user');
    Route::get('/admin/users/search', 'backend\UserController@userssearch');


    //admin brand push panel=============================
    Route::get('/admin/addbrands', 'backend\BrandController@add')->name('brands.add');

    Route::post('/admin/storebrands', 'backend\BrandController@store')->name('brands.store');

    Route::get('/admin/brandslist', 'backend\BrandController@show')->name('brands.show');

    Route::get('/admin/brandslist/search', 'backend\BrandController@search');

    Route::get('/admin/brandslist/edit/{id}', 'backend\BrandController@edit');

    Route::post('/admin/brandslist/update/{id}', 'backend\BrandController@update');

    Route::get('/admin/brandslist/{id}', 'backend\BrandController@delete');


    //admin brand cars push panel=============================
    Route::get('/admin/brands/overview/addcars', 'backend\CarOverviewBrandController@addcar')->name('addcaroverview');

    Route::post('/admin/brands/overview/storecars', 'backend\CarOverviewBrandController@storecar')->name('caroverviewstore');

    Route::get('/admin/brands/overview/allcars', 'backend\CarOverviewBrandController@allcar')->name('allcaroverview');

    Route::get('/admin/brands/overview/allcars/search', 'backend\CarOverviewBrandController@search');

    Route::get('/admin/brands/overview/allcars/edit/{id}', 'backend\CarOverviewBrandController@editcar');

    Route::post('/admin/brands/overview/allcars/update/{id}', 'backend\CarOverviewBrandController@updatecar');

    Route::get('/admin/brands/overview/allcars/delete/{id}', 'backend\CarOverviewBrandController@deletecar');


    //single car details=================================================
    Route::get('/admin/brands/singlecar/addcars', 'backend\SingleCarController@addcar')->name('addsinglecar');

    Route::post('/admin/brands/singlecar/storecar', 'backend\SingleCarController@storecar')->name('storesinglecar');

    Route::get('/admin/brands/singlecar/allcars', 'backend\SingleCarController@allcar')->name('allsinglecar');

    Route::get('/admin/brands/singlecar/{id}', 'backend\SingleCarController@showcar');

    Route::get('/admin/brands/singlecar/delete/{id}', 'backend\SingleCarController@deletecar');

    Route::get('/admin/brands/singlecar/edit/{id}', 'backend\SingleCarController@editcar');

    Route::post('/admin/brands/singlecar/update/{id}', 'backend\SingleCarController@updatecar');

    Route::get('/admin/brands/singlecar/allcars/search', 'backend\SingleCarController@searchcar');

    Route::get('/admingetmodels/{id}', 'backend\SingleCarController@getadminmodels');

    //admin review panel==================4
    Route::get('/admin/allreviews', 'backend\ReviewController@allreview');

    Route::get('/admin/allreviews/details/{id}', 'backend\ReviewController@reviewdetails');

    Route::get('/admin/allreviews/search', 'backend\ReviewController@searchreview');
    //backend side end==========================



});
