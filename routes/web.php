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

// 用品追加
Route::get('/add_supplie','AddSupplieController@show');
Route::post('/add_supplie','AddSupplieController@store');

// 用品情報編集
Route::get('/edit_supplie/{youhinn_id}', 'EditSupplieController@show');
Route::post('/edit_supplie','EditSupplieController@edit');

// 取引先追加
Route::get('/add_vendor','AddVendorController@show');
Route::post('/add_vendor','AddVendorController@store');

// 取引先情報編集
Route::get('/edit_vendor/{torihikisaki_id?}','EditVendorController@show');
Route::post('/edit_vendor','EditVendorController@edit');

//ログイン
// Route::get('/','LoginController@show');
Route::get('/','TopController@show');

//会社単位での発注書確認画面
Route::get('/po_by_vendor','PoByVendorController@show');

//保護者への商品引き渡し画面
Route::get('/po_check_delivery/{hannbaikai_id?}/{kumi_id?}','PoCheckDeliveryController@show')->name('po_check_delivery . load');
Route::post('/po_check_delivery','PoCheckDeliveryController@store')->name('po_check_delivery.store');
Route::post('/po_check_delivery/load/{zidou_id?}', 'PoCheckDeliveryController@load')->name('po_check_delivery.load');

//納品された商品の検品を行う画面
Route::get('/po_check_inspection','PoCheckInspectionController@show');
Route::post('/po_check_inspection','PoCheckInspectionController@store');

//発注書を新規に作成する画面
Route::get('/po_create','PoCreateController@show');
Route::post('/po_create','PoCreateController@store');

//保育士が担当の園児の注文内容を確認する画面
Route::get('/po_customer_list/{hannbaikai_id?}/{kumi_id?}','PoCustomerListController@show');

//注文書に登録した商品、組を確認するための画面
Route::get('/po_details','PoDetailsController@show');
Route::post('/po_details','PoDetailsController@edit');

//保護者が購入する際に保護者、又は保育士が入力する画面
Route::get('/po_fill_in/{hannbaikai_id?}/{kumi_id?}','PoFillInController@show');
Route::post('/po_fill_in','PoFillInController@store');

//引き渡しや、保護者入力など、一覧を表示する画面
Route::get('/po_list','PoListController@show');

//発注書を印刷するための画面
Route::get('/po_print/{hannbaikai_id?}','PoPrintController@show');

//発注書の詳細を確認するための画面
Route::get('/po_print_details/{hannbaikai_id}/{torihikisaki_id}','PoPrintDetailsController@show');

//DBに登録した商品全てを表示するための画面
Route::get('/show_supplie_list','ShowSupplieListController@show');

//DBに登録した取引先全てを表示するための画面
Route::get('/show_vendor_list','ShowVendorListController@show');

//Top画面表示
Route::get('/top','TopController@show');

//取引先削除
Route::post('/delete_vendor','DeleteVendorController@editFlag');

//発注書編集画面
Route::get('/edit_po_create/{id?}','EditPoCreateController@show');
Route::post('/edit_po_create/{id}','EditPoCreateController@store');

//　DBアクセスのテスト
//Route::get('/db/{{type?}}','SampleController@model');
