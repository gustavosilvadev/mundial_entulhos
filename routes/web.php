<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;




Route::get('/', function ():array {
    
    // return view('welcome');

    return ['code'=>200,"response"=>"Success"];
});


//Client
// Route::get('/client/{id?}', [ClientController::class, 'showClient']);
// Route::post('/client', [ClientController::class, 'store']);
// Route::get('/client/{id?}', [ClientController::class, 'showClient']);


// Client
Route::get('createclient', function(){
    return view('client.form_cad_client');
});

Route::post('/save_client',[ClientController::class,'store']);
Route::get('client/{id?}',[ClientController::class,'show']);
Route::post('/update_client',[ClientController::class,'update']);
Route::get('/del_client/{id}',[ClientController::class,'destroy']);


//Employee
Route::get('createemployee', function(){
    return view('employee.form_cad_employee');
});

Route::post('/save_employee',[EmployeeController::class,'store']);
Route::get('employee/{id?}',[EmployeeController::class,'show']);
Route::post('/update_employee',[EmployeeController::class,'update']);
Route::get('/del_employee/{id}',[EmployeeController::class,'destroy']);


/*





// Driver
Route::get('/driver/{id?}', [DriverController::class, 'showDriver']);
Route::post('/newdriver', [DriverController::class, 'saveDriver']);
Route::patch('/changedriver/{id}', [DriverController::class, 'updateDriver']);
Route::delete('/removedriver/{id}', [DriverController::class, 'deleteDriver']);

*/