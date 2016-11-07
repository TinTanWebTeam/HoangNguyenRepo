<?php
/*
 * Public Route
 * */

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('index');
    }
    return redirect('auth/login');
});

Route::get('auth/logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'logout'
]);

Route::group(['middleware' => ['guest']], function () {
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
});

/*
 * Route phân quy?n
 * */

Route::group(['middleware' => 'auth'], function () {
    Route::get('/index', 'HomeController@index');
    Route::get('/verify-project', 'HomeController@getVerifyProject');
    Route::get('/dashboard', 'HomeController@getDashboard');
    Route::group(['middleware' => 'Admin'], function () {
        Route::post('/invoice-customer/delete', 'DebtManagementController@postDeleteInvoiceCustomer');
        Route::post('/invoice-customer-detail/delete', 'DebtManagementController@postDeleteInvoiceCustomerDetail');
        Route::post('/invoice-garage/delete', 'DebtManagementController@postDeleteInvoiceGarage');
        Route::post('/invoice-garage-detail/delete', 'DebtManagementController@postDeleteInvoiceGarageDetail');
    });
    Route::group(['middleware' => 'UserManagement'], function () {
        Route::get('/position', 'UserManagementController@getViewPosition');
        Route::get('/user', 'UserManagementController@getViewUser');
        /*Post view*/
        Route::post('/position', 'UserManagementController@getDataPosition');
        Route::get('/user/users', 'UserManagementController@getDataUser');
        Route::post('/position/modify', 'UserManagementController@postModifyPosition');
        Route::post('/user/edit', 'UserManagementController@postEditUser');
        Route::post('/user/modify', 'UserManagementController@postModifyUser');

        Route::post('/validate-user', 'UserManagementController@postDataUserValidate');
        Route::post('/validate-position', 'UserManagementController@postDataPositionValidate');
    });
    Route::group(['middleware' => 'CustomerManagement'], function () {
        //get View
        Route::get('/customer', 'CustomerManagementController@getViewCustomer');
        Route::get('/delivery-requirement', 'CustomerManagementController@getViewTransport');
        //get Data
        Route::get('/customer/customers', 'CustomerManagementController@getDataCustomer');
        Route::get('/product-type/product-types', 'CustomerManagementController@getDataProductType');
        Route::get('/product/products', 'CustomerManagementController@getDataProduct');
        Route::get('/voucher/vouchers', 'CustomerManagementController@getDataVoucher');
        Route::get('/transport/transports', 'CustomerManagementController@getDataTransport');
        //post Modify
        Route::post('/customer/modify', 'CustomerManagementController@postModifyCustomer');
        Route::post('/customer-type/modify', 'CustomerManagementController@postModifyCustomerType');
        Route::post('/transport/modify', 'CustomerManagementController@postModifyTransport');
        Route::post('/voucher/modify', 'CustomerManagementController@postModifyVoucher');
        Route::post('/product/modify', 'CustomerManagementController@postModifyProduct');

        Route::post('/staff/modify', 'CustomerManagementController@postModifyStaff');

        //post to get Data
        Route::post('/customer/postage', 'CustomerManagementController@postDataPostageOfCustomer');


    });
    Route::group(['middleware' => 'VehicleManagement'], function () {
        //get View
        Route::get('/vehicle-inside', 'VehicleManagementController@getViewVehicle');
        Route::get('/vehicle-outside', 'VehicleManagementController@getViewGarage');
        //get Data
        Route::get('/vehicle-inside/vehicles', 'VehicleManagementController@getDataVehicle');
        Route::get('/vehicle-outside/garages', 'VehicleManagementController@getDataGarage');
        Route::get('/vehicle-type/vehicleTypes', 'VehicleManagementController@getDataVehicleType');
        //post Modify
        Route::post('/vehicle-inside/modify', 'VehicleManagementController@postModifyVehicle');
        Route::post('/vehicle-outside/modify', 'VehicleManagementController@postModifyGarage');
        Route::post('/vehicle-type/modify', 'VehicleManagementController@postModifyVehicleType');
    });
    Route::group(['middleware' => 'DebtManagement'], function () {
        /*GET VIEW*/
        Route::get('/debt-customer', 'DebtManagementController@getViewDebtCustomer');
        Route::get('/debt-vehicle-outside', 'DebtManagementController@getViewDebtGarage');
        /*GET DATA*/
        Route::get('/debt-customer/transports', 'DebtManagementController@getDataDebtCustomer');
        Route::get('/debt-garage/transports', 'DebtManagementController@getDataDebtGarage');
        /*POST MODIFY*/
        Route::post('/debt-customer/modify', 'DebtManagementController@postModifyDebtCustomer');
        Route::post('/invoice-customer/modify', 'DebtManagementController@postModifyInvoiceCustomer');
        Route::post('/debt-garage/modify', 'DebtManagementController@postModifyDebtGarage');
        Route::post('/invoice-garage/modify', 'DebtManagementController@postModifyInvoiceGarage');
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
        /*Get Data View OtherCost */
        Route::get('/other-cost/otherCost', 'CostManagementController@getDataOtherCost');


        /*Post Data server */
        /*Cost*/
        Route::post('/fuel-cost/modify', 'CostManagementController@postModifyFuelCost');
        /*Petroleum*/
        Route::post('/petroleum/modify', 'CostManagementController@postModifyPetroleum');
        /*Parking Cost*/
        Route::post('/parking-cost/modify', 'CostManagementController@postModifyParkingCost');


        /*Other Cost*/
        Route::post('/other-cost/modify', 'CostManagementController@postModifyOtherCost');


    });
    //Cu?c phí
    Route::group(['middleware' => 'PostageManagement'], function () {
        Route::get('/postage-management', 'PostageManagementController@getViewPostage');

        Route::get('/postage/postages', 'PostageManagementController@getDataPostage');

        Route::post('/postage/modify', 'PostageManagementController@postModifyPostage');
    });
    //QL giá nhiên liệu
    Route::group(['middleware' => 'FuelManagement', 'prefix' => 'fuel-price'], function () {
        /* GET VIEW */
        Route::get('/oil', 'FuelManagementController@getOilView');
        /* GET VIEW COMPLETE DATA */
        Route::get('/oil/getOilViewCompleteData', 'FuelManagementController@getOilViewCompleteData');
        /* ADD NEW OIL PRICE */
        Route::post('/oil/add', 'FuelManagementController@addNewOilPrice');
        /* UPDATE OIL PRICE */
        Route::post('/oil/update', 'FuelManagementController@updateOilPrice');
        /*---------------------------------------------------------------------*/
        /* GET VIEW */
        Route::get('/lube', 'FuelManagementController@getLubeView');
        /* GET VIEW COMPLETE DATA */
        Route::get('/lube/getLubeViewCompleteData', 'FuelManagementController@getLubeViewCompleteData');
        /* ADD NEW OIL PRICE */
        Route::post('/lube/add', 'FuelManagementController@addNewLubePrice');
        /* UPDATE OIL PRICE */
        Route::post('/lube/update', 'FuelManagementController@updateLubePrice');
    });
    Route::group(['middleware' => 'DriverManagement'], function () {
        //get View
        Route::get('/driver-management', 'DriverManagementController@getViewDriver');
        //get Data
        Route::get('/driver-management/driver', 'DriverManagementController@getDataDriver');
        //Post modify
        Route::post('/driver/modify', 'DriverManagementController@postModifyDriver');
    });
    Route::group(['middleware' => 'Report'], function () {
        Route::get('/revenue-report', 'ReportController@getViewRevenueReport');
        Route::get('/history-delivery-report', 'ReportController@getViewHistoryDeliveryReport');
        //Get data view
        Route::get('/revenue-report-view', 'ReportController@getDataViewRevenueReport');
        Route::get('/delivery-report-view', 'ReportController@getDataViewDeliveryReport');
        //Post data view
        Route::post('/revenue-report-list', 'ReportController@getDataReportList');
        Route::post('/delivery-report-list', 'ReportController@getDataDeliveryList');

    });
});










