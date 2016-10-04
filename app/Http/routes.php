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
    Route::get('/dashboard', 'HomeController@getDashboard');
    Route::group(['middleware' => 'Admin'], function () {
    });
    Route::group(['middleware' => 'UserManagement'], function () {
        Route::get('/position','UserManagementController@getViewPosition');
        Route::get('/user','UserManagementController@getViewUser');
        /*Post view*/
        Route::post('/position','UserManagementController@getDataPosition');
        Route::post('/user','UserManagementController@getDataUser');
        Route::post('/position/modify','UserManagementController@postModifyPosition');
        Route::post('/user/edit','UserManagementController@postEditUser');
        Route::post('/user/modify','UserManagementController@postModifyUser');

    });
    Route::group(['middleware' => 'CustomerManagement'], function () {
        //get View
        Route::get('/customer', 'CustomerManagementController@getViewCustomer');
        Route::get('/delivery-requirement', 'CustomerManagementController@getViewTransport');
        //get Data
        Route::get('/customer/customers','CustomerManagementController@getDataCustomer');
        Route::get('/product/products','CustomerManagementController@getDataProduct');
        Route::get('/voucher/vouchers','CustomerManagementController@getDataVoucher');
        Route::get('/transport/transports', 'CustomerManagementController@getDataTransport');
        //post Modify
        Route::post('/customer/modify','CustomerManagementController@postModifyCustomer');
        Route::post('/customer-type/modify','CustomerManagementController@postModifyCustomerType');
        Route::post('/transport/modify','CustomerManagementController@postModifyTransport');
        Route::post('/voucher/modify','CustomerManagementController@postModifyVoucher');
    });
    Route::group(['middleware' => 'VehicleManagement'], function () {
        //get View
        Route::get('/vehicle-inside', 'VehicleManagementController@getViewVehicle');
        Route::get('/vehicle-outside', 'VehicleManagementController@getViewGarage');
        //get Data
        Route::get('/vehicle-inside/vehicles', 'VehicleManagementController@getDataVehicle');
        Route::get('/vehicle-outside/garages', 'VehicleManagementController@getDataGarage');
        //post Modify
        Route::post('/vehicle-inside/modify', 'VehicleManagementController@postModifyVehicle');
        Route::post('/vehicle-outside/modify', 'VehicleManagementController@postModifyGarage');
        Route::post('/vehicle-type/modify', 'VehicleManagementController@postModifyVehicleType');
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
        /*post view*/
          Route::post('/other-cost', 'CostManagementController@getDataOtherCost');

        /*Get List Vehicle*/
        Route::get('/get-list-vehicle/getVehicle', 'CostManagementController@getListDataVehicle');
        Route::get('/get-list-option/Garage-Vehicle', 'CostManagementController@getListDataOptionGarageAndVehicle');
        /*Post Create Vehicle + PriceNew*/
        Route::post('/create-price-new/modify', 'CostManagementController@postModifyPriceNew');
        Route::post('/create-vehicle-new/modify', 'CostManagementController@postModifyVehicleNew');



        /*Get Data View fuelCost */
        Route::get('/fuel-cost/fuelCost', 'CostManagementController@getDataFuelCost');
        /*Get Data View petroleum */
        Route::get('/petroleum-cost/petroleum-cost', 'CostManagementController@getDataPetroleumCost');
         /*Get Data View ParkingCost */
        Route::get('/parking-cost/parkingCost', 'CostManagementController@getDataParkingCost');

        /*Post Data server */
        /*Cost*/
        Route::post('/fuel-cost/modify', 'CostManagementController@postModifyFuelCost');
         /*Petroleum*/
        Route::post('/petroleum/modify', 'CostManagementController@postModifyPetroleum');



    });
    //Cu?c phí
    Route::group(['middleware' => 'PostageManagement'], function () {
        Route::get('/customer-postage', 'PostageManagementController@getViewPostage');
        Route::get('/month-postage', 'PostageManagementController@getViewMonthPostage');

        Route::get('postage/postages', 'PostageManagementController@getDataPostage');
    });
    Route::group(['middleware' => 'DivisiveDriver'], function () {
        //get View
        Route::get('/divisive-driver', 'DivisiveDriverController@getViewDivisiveDriver');
        //get Data
        Route::get('/divisive-driver/vehicle-user', 'DivisiveDriverController@getDataDivisiveDriver');
        Route::get('/divisive-driver/users', 'DivisiveDriverController@getAllUser');
        //post Modify
        Route::post('/divisive-driver/modify', 'DivisiveDriverController@postModifyDivisiveDriver');
    });
    Route::group(['middleware' => 'Report'], function () {
        Route::get('/revenue-report', 'ReportController@getViewRevenueReport');
        Route::get('/history-delivery-report', 'ReportController@getViewHistoryDeliveryReport');
    });
});









