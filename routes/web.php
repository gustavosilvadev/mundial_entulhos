<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CallDemandController;
use App\Http\Controllers\DumpsterServiceDemandController;
use App\Http\Controllers\ClientInfoPaymentController;
use App\Http\Controllers\LandfillController;
// use Illuminate\Http\Request;




Route::get('/', function () {
    
    return view('main.home');
});

// Client
Route::get('createclient', function(){
    return view('client.form_cad_client');
});

Route::post('/save_client',[ClientController::class,'store']);
Route::get('/client/{id?}',[ClientController::class,'show']);
Route::post('/update_client',[ClientController::class,'update']);
Route::get('/del_client/{id}',[ClientController::class,'destroy']);

Route::get('/find_demmand_client',[ClientController::class,'checkDemandOpendClient']);
Route::get('/show_info_client',[ClientController::class,'showInfoClient']);

//Employee
Route::get('createemployee', function(){
    return view('employee.form_cad_employee');
});

Route::post('save_employee',[EmployeeController::class,'store']);
Route::get('employee/{id?}',[EmployeeController::class,'show']);
Route::post('/update_employee',[EmployeeController::class,'update']);
Route::get('/del_employee/{id}',[EmployeeController::class,'destroy']);

// Driver
Route::get('createdriver', [DriverController::class,'showEmployee']);
Route::post('/save_driver',[DriverController::class,'store']);
Route::get('driver/{id?}',[DriverController::class,'show']);

// Route::post('/update_driver',[DriverController::class,'update']);
// Route::get('/del_driver/{id}',[DriverController::class,'destroy']);


// Landfill
Route::get('createlandfill', function(){
    return view('landfill.form_cad_landfill');
});
Route::post('save_landfill',[LandfillController::class,'store']);


// Call Demand
Route::get('createcalldemand', [CallDemandController::class,'callFormCreateDemand']);
Route::post('save_call_demand',[CallDemandController::class,'store']);
Route::get('call_demand/{id?}',[CallDemandController::class,'show']);

Route::get('demand_list_client/{id?}',[CallDemandController::class,'showInfoClientDemand']);


Route::get("teste_lista_items/{id?}", [CallDemandController::class, 'showAPI']);

Route::get('editcalldemand/{id}',[CallDemandController::class,'update']);
Route::get('getInfoDemand/{id}',[CallDemandController::class,'showInfoToForm']);


// Route::get('del_call_demand/{id}',[CallDemandController::class,'destroy']);

// Dumpsdumpster service demand
Route::get('createdumpsterservicedemand', [DumpsterServiceDemandController::class,'showNameDriverDemand']);
Route::post('save_dumpster_service_demand',[DumpsterServiceDemandController::class,'store']);
// Route::get('dumpster_service_demand/{id?}',[DumpsterServiceDemandController::class,'show']);


// Client Info Payment
// Route::get('clientinfopayment/{id?}', [ClientInfoPaymentController::class,'showInfoClientInfoPayment']);
Route::get('clientinfopayment', [ClientInfoPaymentController::class,'showInfoClientInfoPayment']);
Route::post('save_client_info_payment',[ClientInfoPaymentController::class,'store']);
// Route::get('dumpster_service_demand/{id?}',[DumpsterServiceDemandController::class,'show']);