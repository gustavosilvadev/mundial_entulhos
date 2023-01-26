<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;



/*
Route::get('/', function () {
    
    return view('welcome');
});
*/


Route::get('/', [ClientController::class, 'showClient']);
Route::post('/create_client', [ClientController::class, 'CreateClient']);


//Client
Route::get('/client/{id?}', [ClientController::class, 'showClient']);
Route::post('/newclient', [ClientController::class, 'saveClient']);
Route::patch('/changeclient/{id}', [ClientController::class, 'updateClient']);
Route::delete('/removeclient/{id}', [ClientController::class, 'deleteClient']);


//Employee
Route::get('/employee/{id?}', [EmployeeController::class, 'showEmployee']);
Route::post('/newemployee', [EmployeeController::class, 'saveEmployee']);
Route::patch('/changeemployee/{id}', [EmployeeController::class, 'updateEmployee']);
Route::delete('/removeemployee/{id}', [EmployeeController::class, 'deleteEmployee']);


// Driver
Route::get('/driver/{id?}', [DriverController::class, 'showDriver']);
Route::post('/newdriver', [DriverController::class, 'saveDriver']);
Route::patch('/changedriver/{id}', [DriverController::class, 'updateDriver']);
Route::delete('/removedriver/{id}', [DriverController::class, 'deleteDriver']);
