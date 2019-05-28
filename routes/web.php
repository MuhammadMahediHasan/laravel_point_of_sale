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

Route::group(['middleware'=>'auth'],function(){



Route::get('/','HomeController@index');

Route::get('/backend','BackendController@index');

// Category
Route::resource('/category','CategoryController');

Route::get('/category_pdf','CategoryController@pdf');
Route::get('/category_pdf_preview','CategoryController@pdf_preview');
Route::get('/category_pdf_print','CategoryController@pdf_print');

Route::get('/category_pdf_excel','CategoryController@excel');

// Sub_Category
Route::resource('/sub_category','SubCategoryController');

Route::get('/sub_category_pdf','SubCategoryController@pdf');
Route::get('/sub_category_pdf_preview','SubCategoryController@pdf_preview');
Route::get('/sub_category_excel','SubCategoryController@excel');

//Brand
Route::resource('/brand','BrandController');

Route::get('/brand_pdf','BrandController@pdf');
Route::get('/brand_pdf_preview','BrandController@pdf_preview');
Route::get('/brand_excel','BrandController@excel');

//Product
Route::resource('/product_template','ProductTemplateController');
Route::post('/category_wise_sub_category','ProductTemplateController@category_wise_sub_category');
Route::resource('/product_template_pdf','ProductTemplateController');
Route::get('/product_template_pdf','ProductTemplateController@pdf');
Route::get('/product_template_pdf_preview','ProductTemplateController@pdf_preview');
Route::get('/product_template_excel','ProductTemplateController@excel');

//Product Report
Route::get('/product_report','ReportController@product_report');
Route::post('/get_product_report','ReportController@get_product_report');


//Customer
Route::resource('/customer','CustomerController');
Route::get('/customer_pdf','CustomerController@pdf');
Route::get('/customer_pdf_preview','CustomerController@pdf_preview');
Route::get('/customer_excel','CustomerController@excel');

//Suplier
Route::resource('/suplier','SuplierController');

Route::get('/suplier_pdf','SuplierController@pdf');
Route::get('/suplier_pdf_preview','SuplierController@pdf_preview');
Route::get('/suplier_excel','SuplierController@excel');

//User
Route::resource('/users','UserController');

Route::get('/users_pdf','UserController@pdf');
Route::get('/users_pdf_preview','UserController@pdf_preview');
Route::get('/users__excel','UserController@excel');
Route::get('/report','UserController@report');

//Purchase
Route::resource('/purchase','PurchaseController');
Route::post('/purchase_data','PurchaseController@store_purchase');

Route::get('/purchase_list','PurchaseController@purchase_list');
Route::post('/purchase_pay','PurchaseController@purchase_pay');
Route::post('/confirm_pay','PurchaseController@confirm_pay');

Route::get('/stock_table','PurchaseController@stock_table');
Route::get('/full_stock','PurchaseController@full_stock');
Route::delete('/full_stock/{id}','PurchaseController@destroy');

//Pos
Route::resource('/pos','PosController');
Route::post('/product_data','PosController@product_data');
Route::get('/sales_list','PosController@sales_list');
Route::post('/sales_pay','PosController@sales_pay');
Route::post('/sales_confirm_pay','PosController@confirm_pay');

//Daily Report
Route::get('/daily_report','ReportController@report');
Route::post('/get_daily_report','ReportController@daily_report');


//Monthly Report
Route::get('/monthly_report','ReportController@monthly_report');
Route::post('/get_monthly_report','ReportController@get_monthly_report');


//Profit & Loss
Route::get('/profit_loss','ReportController@profit_loss');
Route::post('/get_profit_loss_report','ReportController@get_profit_loss_report');

//Dashboard Content
Route::get('/total_stock','HomeController@total_stock');
Route::get('/sold','HomeController@sold');
Route::get('/purchase_dashboard','HomeController@purchase');
Route::get('/product','HomeController@product');


});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
