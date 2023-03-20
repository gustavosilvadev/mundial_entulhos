<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserEmployeeController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CallDemandController;
use App\Http\Controllers\DumpsterServiceDemandController;
use App\Http\Controllers\ClientInfoPaymentController;
use App\Http\Controllers\LandfillController;
// use Illuminate\Http\Request;



// Sessão 
Route::middleware('usersession')->group(function(){


});

//Usuario
Route::get('/page-administrator', function(){
    return view('user.login');
});

Route::get('perfil-create', function(){
    return view('user.form_cad_perfil');
});

Route::get('ger-login',[UserEmployeeController::class,'generateLogin']);
Route::post('/perfil-save',[UserEmployeeController::class,'store']);

Route::post('login',[UserEmployeeController::class,'conectLogin']);


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

// Sessão Motorista (EDITAR)


/********************************** TAREFAS !!!! **************************************************/
/********************************** TAREFAS !!!! **************************************************/
/********************************** TAREFAS !!!! **************************************************/
/********************************** TAREFAS !!!! **************************************************/
/********************************** TAREFAS !!!! **************************************************/
Route::get('/driver_demand', [DriverController::class, 'showDemands']);

// resolver problema ao Clicar no botão Inciar Atendimento
Route::post('/change_status_call_demand',[DriverController::class,'updateStatusDemand']);

// Sessão Cliente (EDITAR)
Route::get('/area_cliente_temp', [ClientController::class, 'exibirFormCadastroBasico']);


// Sessão Endereços que a empresa atende e não atende (EDITAR)
Route::get('/exibir_enderecos_temp', [CallDemandController::class, 'exibirListaEnderecosAtivos']);
/********************************** TAREFAS !!!! **************************************************/
/********************************** TAREFAS !!!! **************************************************/
/********************************** TAREFAS !!!! **************************************************/
/********************************** TAREFAS !!!! **************************************************/
/********************************** TAREFAS !!!! **************************************************/

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

Route::get('editcalldemand/{id}',[CallDemandController::class,'showUpdateForm']);
Route::post('change_call_demand',[CallDemandController::class,'update']);

Route::get("teste_lista_items/{id?}", [CallDemandController::class, 'showAPI']);

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


