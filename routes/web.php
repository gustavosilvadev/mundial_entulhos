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
    Route::get('/driver_demand', [DriverController::class, 'showDemands']);
    
    // resolver problema ao Clicar no botão Inciar Atendimento
    Route::post('/change_status_call_demand',[DriverController::class,'updateStatusDemand']);
    
    Route::post('/start_demand',[DriverController::class,'startDemand']);
    Route::get('/show_dumpster_demand/{id?}',[DriverController::class,'getDumpsterDemand']);
    Route::post('/get_dumpster_location',[DriverController::class,'getDumpsterLocation']);

    // Route::get('/listlandfill', [DriverController::class,'getLandFill']);
    
    Route::post('/atualiza_dias_cacamba_municipio',[DumpsterServiceDemandController::class,'updateDaysDumpsterCounty']);
    
    // Landfill
    Route::get('createlandfill', function(){
        return view('landfill.form_cad_landfill');
    });
    Route::post('save_landfill',[LandfillController::class,'store']);
    
    
    // Call Demand
    Route::get('createcalldemand', [CallDemandController::class,'callFormCreateDemand']);
    Route::post('save_call_demand',[CallDemandController::class,'store']);
    Route::get('call_demand/{id?}',[CallDemandController::class,'show']);
    Route::post('update_call_demand',[CallDemandController::class,'update']);
    
    Route::get('demand_list_client/{id?}',[CallDemandController::class,'showInfoClientDemand']);
    
    Route::get('editcalldemand/{id}',[CallDemandController::class,'showUpdateForm']);
    Route::post('change_call_demand',[CallDemandController::class,'update']);
    
    Route::get("teste_lista_items/{id?}", [CallDemandController::class, 'showAPI']);
    
    Route::get('getInfoDemand/{id}',[CallDemandController::class,'showInfoToForm']);
    
    Route::get('createdumpsterservicedemand', [DumpsterServiceDemandController::class,'showNameDriverDemand']);
    Route::post('save_dumpster_service_demand',[DumpsterServiceDemandController::class,'store']);
    
    
    // Client Info Payment
    Route::get('clientinfopayment', [ClientInfoPaymentController::class,'showInfoClientInfoPayment']);
    Route::post('save_client_info_payment',[ClientInfoPaymentController::class,'store']);
    

});

Route::get('listlandfill/{id?}', [DriverController::class,'getLandFill']);

Route::post('save_call_demand_teste',[CallDemandController::class,'storeTeste']);
Route::get('call_demand_teste/{id?}',[CallDemandController::class,'showTeste']);


// USUÁRIO / LOGIN
Route::get('/login', function(){

    if(session('id_user') != null
        && session('login') != null
    ){

        return redirect('/');
    }

    return view('user.login');
});

Route::get('perfil-create', function(){
    return view('user.form_cad_perfil');
});

Route::get('ger-login',[UserEmployeeController::class,'generateLogin']);
Route::post('/perfil-save',[UserEmployeeController::class,'store']);
Route::post('login',[UserEmployeeController::class,'conectLogin']);
Route::get('/logout',[UserEmployeeController::class,'logoutAccount']);


Route::get('/', [UserEmployeeController::class,'redirectPagePerfil']);

// Sessão Cliente (EDITAR)
Route::get('/new_demand_client', [ClientController::class, 'exibirFormCadastroBasico']);
Route::post('/save_call_demand_cliente', [ClientController::class, 'saveDataDemandClient']);


// Sessão Endereços que a empresa atende e não atende (EDITAR)
Route::get('/cacamba_dias_municipio', [DumpsterServiceDemandController::class, 'showCounties']);
Route::get('/dias_municipio', [DumpsterServiceDemandController::class, 'showDaysDumpsterCounty']);

// Route::post('/save_client',[ClientController::class,'store']);
// Route::get('/client/{id?}',[ClientController::class,'show']);
// Route::post('/update_client',[ClientController::class,'update']);
// Route::get('/del_client/{id}',[ClientController::class,'destroy']);
// Route::get('/find_demmand_client',[ClientController::class,'checkDemandOpendClient']);

Route::get('/teste_layout', function(){
    return view('user.layout_basico');
});
