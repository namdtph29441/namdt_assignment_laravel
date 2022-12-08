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

Route::get('/', function () {
    return view('templates.home');
});
Route::get('/', "HomeController@index")->name('route_FrontEnd_home');
Route::get('/detail/{id}',"HomeController@detail")->name('route_BackEnd_home_detail');
Route::get('/category/{id}',"HomeController@category")->name('route_BackEnd_category');
Route::get('/login',['as'=>'login','uses'=>'Auth\LoginController@getLogin']);//gọi route chỉ dùng đăng nhập
Route::Post('/login',['as'=>'login','uses'=>'Auth\LoginController@postLogin']);
Route::get('/logout',['as'=>'logout','uses'=>'Auth\LoginController@getLogout']);
//gio hang
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('/update-cart', [\App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('/remove', [\App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/clear', [\App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');
Route::middleware(['auth'])->group(function (){
    //tất cả các đường link cần bảo vệ cho vào đây
    Route::get('/home', function () {
        return view('templates.layout');
    })->name('route_BackEnd_home');
    //route list
    Route::get('/user', "UserController@index")->name('route_BackEnd_user_list');
    Route::get('/role', "RoleController@index")->name('route_BackEnd_role_list');
    Route::get('/category', "CategoryController@index")->name('route_BackEnd_category_list');
    Route::get('/product', "ProductController@index")->name('route_BackEnd_product_list');
    Route::get('/imgbanner', "ImgBannerController@index")->name('route_BackEnd_imgbanner_list');
    Route::get('/invoice', "InvoiceController@index")->name('route_BackEnd_invoice_list');
    Route::get('/promotion', "PromotionController@index")->name('route_BackEnd_promotion_list');
    //route add
    Route::match(['get','post'],'/user/add',"UserController@add")->name('route_BackEnd_user_add');
    Route::match(['get','post'],'/role/add',"RoleController@add")->name('route_BackEnd_role_add');
    Route::match(['get','post'],'/category/add',"CategoryController@add")->name('route_BackEnd_category_add');
    Route::match(['get','post'],'/product/add',"ProductController@add")->name('route_BackEnd_product_add');
    Route::match(['get','post'],'/promotion/add',"PromotionController@add")->name('route_BackEnd_promotion_add');
    Route::match(['get','post'],'/imgbanner/add',"ImgBannerController@add")->name('route_BackEnd_imgbanner_add');
    //route Show details of 1 record
    Route::get('/user/detail/{id}',"UserController@detail")->name('route_BackEnd_user_detail');
    Route::get('/role/detail/{id}',"RoleController@detail")->name('route_BackEnd_role_detail');
    Route::get('/category/detail/{id}',"CategoryController@detail")->name('route_BackEnd_category_detail');
    Route::get('/product/detail/{id}',"ProductController@detail")->name('route_BackEnd_product_detail');
    Route::get('/promotion/detail/{id}',"PromotionController@detail")->name('route_BackEnd_promotion_detail');
    Route::get('/imgbanner/detail/{id}',"ImgBannerController@detail")->name('route_BackEnd_imgbanner_detail');
    //route save update
    Route::post('/user/update/{id}',"UserController@update")->name('route_BackEnd_user_update');
    Route::post('/role/update/{id}',"RoleController@update")->name('route_BackEnd_role_update');
    Route::post('/category/update/{id}',"CategoryController@update")->name('route_BackEnd_category_update');
    Route::post('/product/update/{id}',"ProductController@update")->name('route_BackEnd_product_update');
    Route::post('/promotion/update/{id}',"PromotionController@update")->name('route_BackEnd_promotion_update');
    Route::post('/imgbanner/update/{id}',"ImgBannerController@update")->name('route_BackEnd_imgbanner_update');
    //route delete
    Route::get('/user/delete/{id}',"UserController@delete")->name('route_BackEnd_user_delete');
    Route::get('/role/delete/{id}',"RoleController@delete")->name('route_BackEnd_role_delete');
    Route::get('/category/delete/{id}',"CategoryController@delete")->name('route_BackEnd_category_delete');
    Route::get('/product/delete/{id}',"ProductController@delete")->name('route_BackEnd_product_delete');
    Route::get('/promotion/delete/{id}',"PromotionController@delete")->name('route_BackEnd_promotion_delete');
    Route::get('/imgbanner/delete/{id}',"ImgBannerController@delete")->name('route_BackEnd_imgbanner_delete');
    Route::get('/invoice/delete/{id}',"InvoiceController@delete")->name('route_BackEnd_invoice_delete');
});

