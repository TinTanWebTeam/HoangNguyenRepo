<?php
/*
 * Public Route
 * */

Route::get('/',function(){
    if(Auth::check()){
        return redirect('index');
    }
    return redirect('auth/login');
});

Route::get('auth/logout',[
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'logout'
]);

Route::group(['middleware' => ['guest']],function (){
    Route::get('auth/login','Auth\AuthController@getLogin');
    Route::post('auth/login','Auth\AuthController@postLogin');
});

/*
 * Route phân quy?n
 * */

Route::group(['middleware' => 'auth'], function(){

    Route::get('/index','HomeController@index');


    Route::group(['middleware' => 'Admin'], function () {

    });
    Route::group(['middleware' => 'UserManagement'], function () {
        Route::get('/user-management', 'UserManagementController@getViewUserManagement');
    });
    Route::group(['middleware' => 'CustomerManagement'], function () {
        Route::get('/customer', 'CustomerManagementController@getViewCustomer');
        Route::get('/delivery-requirement', 'CustomerManagementController@getViewDeliveryRequirement');
    });
    Route::group(['middleware' => 'PortfolioManagement'], function () {
        Route::get('/unit', 'PortfolioManagementController@getViewUnit');
        Route::get('/city', 'PortfolioManagementController@getViewCity');
    });
    Route::group(['middleware' => 'VehicleManagement'], function () {
        Route::get('/vehicle-inside', 'VehicleManagementController@getViewVehicleInside');
        Route::get('/vehicle-outside', 'VehicleManagementController@getViewVehicleOutside');
    });
    Route::group(['middleware' => 'DebtManagement'], function () {
        Route::get('/debt-customer', 'DebtManagementController@getViewDebtCustomer');
        Route::get('/debt-vehicle-outside', 'DebtManagementController@getViewDebtVehicleOutside');
    });
    //Chi phí
    Route::group(['middleware' => 'CostManagement'], function () {
        Route::get('/fuel-cost', 'CostManagementController@getViewFuelCost');
        Route::get('/petroleum-cost', 'CostManagementController@getViewPetroleumCost');
        Route::get('/parking-cost', 'CostManagementController@getViewParkingCost');
        Route::get('/other-cost', 'CostManagementController@getViewOtherCost');
    });
    //Cu?c phí
    Route::group(['middleware' => 'PostageManagement'], function () {
        Route::get('/customer-postage', 'PostageManagementController@getViewCustomerPostage');
        Route::get('/month-postage', 'PostageManagementController@getViewMonthPostage');
    });
    Route::group(['middleware' => 'DivisiveDriver'], function () {
        Route::get('/divisive-driver', 'DivisiveDriverController@getViewDivisiveDriver');
    });
    Route::group(['middleware' => 'Report'], function () {
        Route::get('/revenue-report', 'ReportController@getViewRevenueReport');
        Route::get('/history-delivery-report', 'ReportController@getViewHistoryDeliveryReport');
    });
});








