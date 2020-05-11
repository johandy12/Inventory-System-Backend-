<?php

use Illuminate\Http\Request;

Route::group([

    'middleware' => 'api',
    'prefix' => 'job'

], function ($router){

    route::get('', 'JobController@getJob');
    route::get('privilege', 'JobController@getUserPrivilege');
    Route::post('addJob', 'JobController@addJob');
    Route::post('updateJob/{id}', 'JobController@updateJob');
    Route::delete('deleteJob/{id}', 'JobController@deleteJob');

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('validation', 'AuthController@check');
    Route::post('payload', 'AuthController@payload');

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'users'

], function ($router){    

    Route::post('registerUser', 'UserController@register');
    Route::post('updateProfile', 'UserController@updateProfile');
    Route::post('updatePassword', 'UserController@updatePassword');
    Route::delete('delete/{id}', 'UserController@delete');

});    
    
Route::group([

    'middleware' => 'api',
    'prefix' => 'type'

], function ($router){

    route::get('', 'TypeController@getType');
    Route::post('addType', 'TypeController@addType');
    Route::post('updateType/{id}', 'TypeController@updateType');
    Route::delete('deleteType/{id}', 'TypeController@deleteType');

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'brand'

], function ($router){

    route::get('', 'BrandController@getBrand');
    Route::post('addBrand', 'BrandController@addBrand');
    Route::post('updateBrand/{id}', 'BrandController@updateBrand');
    Route::delete('deleteBrand/{id}', 'BrandController@deleteBrand');

});


Route::group([

    'middleware' => 'api',
    'prefix' => 'stocks'

], function ($router){

    route::get('', 'StocksController@getStock');
    route::get('item/{item}', 'StocksController@getItem');
    route::get('type/{type}', 'StocksController@getStockType');
    route::get('brand/{brand}', 'StocksController@getStockBrand');
    route::get('restock', 'StocksController@getRestock');
    route::get('new', 'StocksController@getNewStock');
    Route::post('addItem', 'StocksController@addStock');
    Route::post('updateItem/{item}', 'StocksController@updateStock');
    Route::delete('deleteItem/{id}', 'StocksController@deleteStock');

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'invoice'

], function ($router){

    //Sell Invoice
    route::get('', 'InvoiceController@getInvoice');
    route::get('popular', 'InvoiceController@getMostPopular');
    route::get('salesNo/{salesNo}', 'InvoiceController@getInvoiceNo');
    route::get('salesPrice/{salesNo}', 'InvoiceController@getInvoicePrice');
    Route::post('addSales', 'InvoiceController@addInvoice');
    Route::post('updateSales/{id}', 'InvoiceController@updateInvoice');
    Route::delete('deleteSales/{id}', 'InvoiceController@deleteInvoice');
    Route::delete('deleteSalesNo/{salesNo}', 'InvoiceController@deleteInvoiceNo');

    //Buy Invoice
    route::get('purchases', 'PurchaseInvoiceController@getInvoice');
    route::get('purchaseNo/{salesNo}', 'PurchaseInvoiceController@getInvoiceNo');
    route::get('purchasePrice/{salesNo}', 'PurchaseInvoiceController@getInvoicePrice');
    Route::post('addPurchase', 'PurchaseInvoiceController@addInvoice');
    Route::post('updatePurchase/{id}', 'PurchaseInvoiceController@updateInvoice');
    Route::delete('deletePurchase/{id}', 'PurchaseInvoiceController@deleteInvoice');
    Route::delete('deletePurchaseNo/{salesNo}', 'PurcaseInvoiceController@deleteInvoiceNo');

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'sales'

], function ($router){

    route::get('', 'SalesController@getSales');
    route::get('salesNo/{salesNo}', 'SalesController@getSalesNo');
    route::get('monthlySales/{month}', 'SalesController@getMonthlySalesTotal');
    route::get('yearlySales/{year}', 'SalesController@getYearlySales');
    Route::post('addSales', 'SalesController@addSales');
    Route::post('updateSales/{salesNo}', 'SalesController@updateSales');
    Route::delete('deleteSales/{salesNo}', 'SalesController@deleteSales');

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'purchases'

], function ($router){

    route::get('', 'PurchasesController@getPurchases');
    route::get('monthlyPurchases/{month}', 'PurchasesController@getMonthlyPurchasesTotal');
    Route::post('addPurchases', 'PurchasesController@addPurchases');
    Route::post('updatePurchases/{id}', 'PurchasesController@updatePurchases');
    Route::delete('deletePurchases/{id}', 'PurchasesController@deletePurchases');

});