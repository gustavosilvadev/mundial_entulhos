<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\CallDemand;
use App\Models\PaymentCallDemand;
use App\Models\Driver;
use App\Models\Landfill;

class CallDemandController extends Controller
{

    public function showAPI($id_register)
    {
        if(isset($id_register)){
                $calldemand = DB::table('call_demand')
                ->select(
                    'call_demand.id as id',
                    'call_demand.id_demand as id_demand',
                    'call_demand.type_service  as type_service',
                    'call_demand.period',
                    'call_demand.name as name',
                    DB::raw('DATE_FORMAT(call_demand.date_start, "%d/%m/%Y") as date_start'),
                    DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y") as date_allocation_dumpster'),
                    DB::raw('DATE_FORMAT(call_demand.date_removal_dumpster_forecast, "%d/%m/%Y") as date_removal_dumpster_forecast'),
                    DB::raw('DATE_FORMAT(call_demand.date_effective_removal_dumpster, "%d/%m/%Y") as date_effective_removal_dumpster'),
                    DB::raw('DATE_FORMAT(call_demand.created_at, "%d/%m/%Y") as created_at'),
                    'call_demand.days_allocation AS days_allocation',
                    'call_demand.address as address_service',
                    'call_demand.address_complement as address_complement',
                    'call_demand.number as number_address_service',
                    'call_demand.zipcode as zipcode_address_service',
                    'call_demand.city as city_address_service',
                    'call_demand.district as district_address_service',
                    'call_demand.state as state_address_service',
                    'call_demand.comments as comments_demand',
                    'call_demand.comments_contract as comments_contract',
                    'call_demand.phone as phone_demand',
                    DB::raw('REPLACE(call_demand.price_unit, ".", ",") as price_unit'),
                    'call_demand.dumpster_quantity',
                    'call_demand.dumpster_number',
                    'call_demand.id_landfill',
                    'call_demand.id_driver',
                    'call_demand.service_status',
                    DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at'),
                    DB::raw('"" as name_landfill'),
                    DB::raw('"" as name_driver')
                )->where('call_demand.id', '=', $id_register)->where('call_demand.id_driver','>=',0)->get();


                foreach($calldemand as $demand){

                    if($demand->id_driver){

                        $findDriver = DB::table('driver')
                        ->join('employee', 'employee.id', '=', 'driver.id_employee')
                        ->where('driver.id', '=', $demand->id_driver)
                        ->get('employee.name as name_driver');
                        if(isset($findDriver))
                            $demand->name_driver =  $findDriver[0]->name_driver;
                    }


                    if($demand->id_landfill){

                        $findLandfill = DB::table('landfill')
                        ->where('landfill.id', '=', $demand->id_landfill)
                        ->get('landfill.name as name_landfill');
                        if(isset($findLandfill))
                            $demand->name_landfill =  $findLandfill[0]->name_landfill;
                    }                
                }
                
                $drivers = DB::table('driver')
                                        ->select('driver.id as id','employee.id as id_employee', 'employee.name as name')
                                        ->join('employee', 'employee.id', '=', 'driver.id_employee')
                                        ->where('driver.flg_status','=', 1)
                                        ->get();

                $landfills = DB::table('landfill')
                    ->select('landfill.id as id', 'landfill.name as name')
                    ->where('landfill.flg_status','=', 1)
                    ->get();

                if($calldemand->isEmpty() != true){

                    return [
                        'drivers'=> $drivers,
                        'landfills'=> $landfills,
                        'calldemand'=> $calldemand
                    ];
    
                }else{
                    
                    return [
                        'drivers'=> '',
                        'landfills'=> '',
                        'calldemand'=> ''
                    ];
                }
        }

        return [
            'drivers'=> '',
            'landfills'=> '',
            'calldemand'=> ''
        ];
    }

    public function show(Request $request)
    {
        if(isset($request->id)){

            $id_demand = $request->id;
            $calldemand = CallDemand::where('id_demand',$id_demand)->orderBy('id_demand','DESC')->first();

            if(isset($calldemand)){
                
                return view('call_demand.preview_call_demand',['calldemand' => $calldemand]);

            }else{

                return view('call_demand.preview_call_demand',['calldemand','']);
            }

        }else{

            $calldemands = DB::table('call_demand')
            ->select(
                'call_demand.id as id',
                'call_demand.id_demand as id_demand',
                'call_demand.type_service  as type_service',
                'call_demand.period',
                'call_demand.name as name',
                DB::raw('DATE_FORMAT(call_demand.date_start, "%d/%m/%Y") as date_start'),
                DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y") as date_allocation_dumpster'),
                DB::raw('DATE_FORMAT(call_demand.date_removal_dumpster_forecast, "%d/%m/%Y") as date_removal_dumpster_forecast'),
                DB::raw('DATE_FORMAT(call_demand.date_effective_removal_dumpster, "%d/%m/%Y") as date_effective_removal_dumpster'),
                DB::raw('DATE_FORMAT(call_demand.created_at, "%d/%m/%Y") as created_at'),
                'call_demand.address as address_service',
                'call_demand.number as number_address_service',
                'call_demand.zipcode as zipcode_address_service',
                'call_demand.city as city_address_service',
                'call_demand.district as district_address_service',
                'call_demand.state as state_address_service',
                'call_demand.comments as comments_demand',
                'call_demand.phone as phone_demand',
                'call_demand.price_unit',
                'call_demand.dumpster_quantity',
                'call_demand.dumpster_number',
                'call_demand.id_landfill',
                'call_demand.id_driver',
                'call_demand.service_status',
                DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at'),
                DB::raw('"" as name_landfill'),
                DB::raw('"" as name_driver')

            )->where('call_demand.id_driver','>=',0)
            ->where('call_demand.service_status','<>',5)
            // ->where('call_demand.type_service','<>','RETIRADA')
            ->orderByDesc('call_demand.id')
            ->get();

            foreach($calldemands as $call_demand){

                if($call_demand->id_driver){

                    $findDriver = DB::table('driver')
                    ->join('employee', 'employee.id', '=', 'driver.id_employee')
                    ->where('driver.id', '=', $call_demand->id_driver)
                    ->get('employee.name as name_driver');
                    if(isset($findDriver))
                        $call_demand->name_driver =  $findDriver[0]->name_driver;
                }


                if($call_demand->id_landfill){

                    $findLandfill = DB::table('landfill')
                    ->where('landfill.id', '=', $call_demand->id_landfill)
                    ->get('landfill.name as name_landfill');
                    if(isset($findLandfill))
                        $call_demand->name_landfill =  $findLandfill[0]->name_landfill;
                }                
            }
            $driver_name_demands = DB::table('driver')
                                    ->join('employee', 'employee.id', '=', 'driver.id_employee')
                                    ->where('driver.flg_status','=', 1)
                                    // ->get(["driver.id", "employee.name"]);
                                    ->get(["employee.name","driver.id"]);

            if($calldemands->isEmpty() != true){
                return view('call_demand.list_call_demand',[
                    'driver_name_demands'=> $driver_name_demands,
                    'calldemands'=> $calldemands
                ]);

            }else{
                
                return view('call_demand.list_call_demand',[
                    'driver_name_demands'=> $driver_name_demands,
                    'calldemands'=> ''
                ]);
            }


            return view('call_demand.list_call_demand');            
        }
    }

    public function showCallDemandResume()
    {

        $calldemands = DB::table('call_demand')
        ->select(
            'call_demand.id as id',
            'call_demand.id_demand as id_demand',
            'call_demand.type_service  as type_service',
            'call_demand.period',
            'call_demand.name as name',
            DB::raw('DATE_FORMAT(call_demand.date_start, "%d/%m/%Y") as date_start'),
            DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y") as date_allocation_dumpster'),
            DB::raw('DATE_FORMAT(call_demand.date_removal_dumpster_forecast, "%d/%m/%Y") as date_removal_dumpster_forecast'),
            DB::raw('DATE_FORMAT(call_demand.date_effective_removal_dumpster, "%d/%m/%Y") as date_effective_removal_dumpster'),
            // DB::raw('DATE_FORMAT(call_demand.date_effective_removal_dumpster, "%d/%m/%Y") as date_end'),
            DB::raw('DATE_FORMAT(call_demand.created_at, "%d/%m/%Y") as created_at'),
            'call_demand.address as address_service',
            'call_demand.number as number_address_service',
            'call_demand.zipcode as zipcode_address_service',
            'call_demand.city as city_address_service',
            'call_demand.district as district_address_service',
            'call_demand.state as state_address_service',
            'call_demand.comments as comments_demand',
            'call_demand.phone as phone_demand',
            'call_demand.price_unit',
            'call_demand.dumpster_quantity',
            'call_demand.dumpster_number',
            'call_demand.id_landfill',
            'call_demand.id_driver',
            'call_demand.service_status',
            DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at'),
            DB::raw('"" as name_landfill'),
            DB::raw('employee.name as name_driver')

        )
        ->join('driver', 'driver.id', '=', 'call_demand.id_driver')
        ->join('employee', 'employee.id', '=', 'driver.id_employee')
        ->where('call_demand.id_driver','>=',0)
        ->orderByDesc('call_demand.id')
        ->get();

        if($calldemands->isEmpty() != true){
            return view('call_demand.list_resume_call_demand',[
                'calldemands'=> $calldemands
            ]);

        }else{
            
            return view('call_demand.list_resume_call_demand',[
                'employee_activities' => '',
                'calldemands'=> ''
            ]);
        }
    }

    public function showActivitiesEmployee(Request $request)
    {

        if(!empty(trim($request->date_demand_filter))){
            
            $date_demand_filter = explode(',', str_replace("|", ",",$request->date_demand_filter));

            $calldemands = DB::table('call_demand')
            ->select(
                'employee.name as name',
                'call_demand.id_driver as id_driver',
                'call_demand.type_service  as type_service',
                DB::raw('COUNT(*) as total')
            )
            ->join('driver','driver.id', '=', 'call_demand.id_driver')
            ->join('employee','employee.id', '=', 'driver.id_employee')
            ->where('call_demand.id_driver','>=',0)
            // ->whereIn(DB::raw('DATE_FORMAT(call_demand.created_at, "%d/%m/%Y")'), $date_demand_filter)
            ->whereIn(DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y")'), $date_demand_filter)
            ->groupBy('call_demand.id_driver', 'call_demand.type_service')        
            ->get();
            

        }else{
            $calldemands = DB::table('call_demand')
            ->select(
                'employee.name as name',
                'call_demand.id_driver as id_driver',
                'call_demand.type_service  as type_service',
                DB::raw('COUNT(*) as total')
            )
            ->join('driver','driver.id', '=', 'call_demand.id_driver')
            ->join('employee','employee.id', '=', 'driver.id_employee')
            ->groupBy('call_demand.id_driver', 'call_demand.type_service')        
            ->where('call_demand.id_driver','>=',0)
            ->get();
        }

        $activitiesDriverGroup = array();
        foreach ($calldemands as $demand) { 

            $activitiesDriverGroup[$demand->name][$demand->type_service] = $demand->total;
        }



        foreach($activitiesDriverGroup as $keyActName=>$activity)
        {
            if(!array_key_exists("COLOCACAO",$activitiesDriverGroup[$keyActName])){
                $activitiesDriverGroup[$keyActName]["COLOCACAO"] = 0;
            }
            
            if(!array_key_exists("TROCA",$activitiesDriverGroup[$keyActName])){
                $activitiesDriverGroup[$keyActName]["TROCA"] = 0;
            }

            if(!array_key_exists('RETIRADA',$activitiesDriverGroup[$keyActName])){
                $activitiesDriverGroup[$keyActName]['RETIRADA'] = 0;
            }
        }

        return $activitiesDriverGroup;
    }

    public function showHistoryDemand($id_demand)
    {

        if(isset($id_demand)){

            $getIdFather = CallDemand::find($id_demand);

            if($getIdFather['id_parent'] > 0){

                $showDataHist = DB::table('call_demand')
                ->select(
                    'call_demand.id_demand as id_demand',
                    'call_demand.type_service  as type_service',
                    'call_demand.period',
                    'call_demand.name as name',
                    DB::raw('DATE_FORMAT(call_demand.date_start, "%d/%m/%Y") as date_start'),
                    DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y") as date_allocation_dumpster'),
                    DB::raw('DATE_FORMAT(call_demand.date_removal_dumpster_forecast, "%d/%m/%Y") as date_removal_dumpster_forecast'),
                    DB::raw('DATE_FORMAT(call_demand.date_effective_removal_dumpster, "%d/%m/%Y") as date_end'),
                    DB::raw('DATE_FORMAT(call_demand.created_at, "%d/%m/%Y") as created_at'),
                    'call_demand.address as address_service',
                    'call_demand.number as number_address_service',
                    'call_demand.zipcode as zipcode_address_service',
                    'call_demand.city as city_address_service',
                    'call_demand.district as district_address_service',
                    'call_demand.state as state_address_service',
                    'call_demand.comments as comments_demand',
                    'call_demand.phone as phone_demand',
                    'call_demand.price_unit',
                    'call_demand.dumpster_quantity',
                    'call_demand.dumpster_number',
                    'call_demand.id_landfill',
                    'call_demand.service_status',
                    DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at')
                )            
                ->where('call_demand.id_demand', '=' ,$getIdFather['id_parent'])->get();

                return (isset($showDataHist)) ? $showDataHist : '';
            
            }else{
                $showDataHist = DB::table('call_demand')
                ->select(
                    'call_demand.id_demand as id_demand',
                    'call_demand.type_service  as type_service',
                    'call_demand.period',
                    'call_demand.name as name',
                    DB::raw('DATE_FORMAT(call_demand.date_start, "%d/%m/%Y") as date_start'),
                    DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y") as date_allocation_dumpster'),
                    DB::raw('DATE_FORMAT(call_demand.date_removal_dumpster_forecast, "%d/%m/%Y") as date_removal_dumpster_forecast'),
                    DB::raw('DATE_FORMAT(call_demand.date_effective_removal_dumpster, "%d/%m/%Y") as date_end'),
                    DB::raw('DATE_FORMAT(call_demand.created_at, "%d/%m/%Y") as created_at'),
                    'call_demand.address as address_service',
                    'call_demand.number as number_address_service',
                    'call_demand.zipcode as zipcode_address_service',
                    'call_demand.city as city_address_service',
                    'call_demand.district as district_address_service',
                    'call_demand.state as state_address_service',
                    'call_demand.comments as comments_demand',
                    'call_demand.phone as phone_demand',
                    'call_demand.price_unit',
                    'call_demand.dumpster_quantity',
                    'call_demand.dumpster_number',
                    'call_demand.id_landfill',
                    'call_demand.service_status',
                    DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at')
                )            
                ->where('call_demand.id_parent', '=' ,$id_demand)->get();

                return (isset($showDataHist)) ? $showDataHist : '';
            }

            return array();
            
        }        
    }

    public function callFormCreateDemand()
    {
        return view('call_demand.form_cad_call_demand', $this->showInfoParamsDemand());

    }

    /**
     * showInfoParamsDemand
     */
    public function showInfoParamsDemand()
    {
        $info_client_demand = DB::table('call_demand')
        ->groupBy('call_demand.name')
        ->orderBy('call_demand.id_demand', 'desc')
        ->select('call_demand.id', 'call_demand.id_demand', 'call_demand.name')
        ->get();

        $drivers = Driver::join('employee', function($join){
            $join->on('driver.id_employee', '=', 'employee.id')->where('driver.flg_status', 1);
        })->get(['driver.id','employee.name','employee.surname']);

        $landfills = Landfill::select('id','name')->where('flg_status', 1)->get();

        return [
            'clients' => $info_client_demand, 
            'drivers' => $drivers,
            'landfills' => $landfills
        ];
    }

    public function showInfoClientDemand(Request $request)
    {
        $responseListDemandClient =  $this->showListDemandClient($request->id);
        return view('call_demand.preview_list_demand_client', $responseListDemandClient);
    }

    public function showListDemandClient($id_client)
    {
        
        if(isset($id_client)){
        
            $calldemands = CallDemand::where('id_client',$id_client)
                            ->join('driver', 'driver.id', '=', 'call_demand.id_driver')
                            ->join('landfill', 'landfill.id', '=', 'call_demand.id_landfill')
                            ->join('employee', 'employee.id', '=', 'driver.id_employee')
                            ->select(
                                'call_demand.id_demand as id_demand',
                                DB::raw("CONCAT(client.name, ' ', client.surname) as name_client"),
                                'call_demand.type_service  as type_service',
                                DB::raw('DATE_FORMAT(call_demand.date_begin, "%d/%m/%Y") as date_begin'),
                                DB::raw('DATE_FORMAT(call_demand.date_removal_dumpster_forecast, "%d/%m/%Y") as date_end'),
                                DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y") as date_allocation_dumpster'),
                                DB::raw('DATE_FORMAT(call_demand.date_removal_dumpster, "%d/%m/%Y") as date_removal_dumpster'),
                                DB::raw('DATE_FORMAT(call_demand.date_effective_removal_dumpster, "%d/%m/%Y") as date_effective_removal_dumpster'),                    
                                'call_demand.address as address_service',
                                'call_demand.number as number_address_service',
                                'call_demand.zipcode as zipcode_address_service',
                                'call_demand.city as city_address_service',
                                'call_demand.district as district_address_service',
                                'call_demand.state as state_address_service',
                                'call_demand.comments as comments_demand',
                                'call_demand.phone as phone_demand',
                                DB::raw('CONCAT("R$","",format(call_demand.price_unit,2,"Pt_BR"))  as price_unit'),
                                'call_demand.dumpster_total',
                                'call_demand.dumpster_total_opened',
                                'call_demand.dumpster_number',
                                'call_demand.days_allocation AS date_difference',
                                'landfill.name as landfill_name',
                                'call_demand.period',
                                DB::raw("CONCAT(employee.name, ' ', employee.surname) as driver_name"),
                                DB::raw('if(call_demand.service_status = 0, "PENDENTE","ENTREGUE") as service_status'),
                                DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at')
                            )            
                            ->orderBy('call_demand.service_status')
                            ->get();
            
            return array('calldemands' => $calldemands);

        }
    }

    public function store(Request $request)
    {
        // CÓDIGO DE REFERÊNCIA LOGO ABAIXO:
        if (isset($request->client_name_new)
        && isset($request->type_service)
        && isset($request->zipcode)
        && isset($request->address)
        && isset($request->number)
        && isset($request->district)
        && isset($request->city)
        && isset($request->state)
        && isset($request->phone)
        && isset($request->dumpster_quantity)
        && isset($request->price_unit)
        && isset($request->id_driver)
        // && isset($request->comments)
        && isset($request->period)
        && isset($request->date_allocation_dumpster)
        && isset($request->date_removal_dumpster))
        {

            $lastIdDemand = isset(CallDemand::orderBy('id', 'desc')->first()->id) ? (CallDemand::orderBy('id', 'desc')->first()->id + 1) : 1 ;
            
            for($repeatInfo = 0; $repeatInfo < $request->dumpster_quantity; $repeatInfo ++){

                $calldemand = new CallDemand();
                $calldemand->id_demand      = $lastIdDemand;
                $calldemand->type_service   = $request->type_service;
                $calldemand->period         = $request->period;
                $calldemand->date_allocation_dumpster       = (isset($request->date_allocation_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_allocation_dumpster))) : '');
                $calldemand->date_removal_dumpster_forecast = (isset($request->date_removal_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_removal_dumpster))) : '');
                $calldemand->name       = $request->client_name_new;
                $calldemand->address    = $request->address;
                $calldemand->address_complement    = $request->address_complement;
                $calldemand->number     = $request->number;
                $calldemand->zipcode    = $request->zipcode;
                $calldemand->city       = $request->city;
                $calldemand->district   = $request->district;
                $calldemand->state      = $request->state;
                $calldemand->phone      = str_replace([" ","(",")"],"",$request->phone);
                $calldemand->price_unit = $request->price_unit;
                $calldemand->comments   = $request->comments;
                $calldemand->comments_contract   = $request->comments_contract;
                $calldemand->dumpster_sequence_demand = $repeatInfo + 1;
                $calldemand->dumpster_quantity  = $request->dumpster_quantity;
                $calldemand->days_allocation    = $request->total_days;
                $calldemand->id_driver  = $request->id_driver;

                if(!$calldemand->save())
                    return back()->withErrors(['response' => "Erro ao cadastrar o chamado"]);

/*
                // Gravando Registro para Futura Retirada da caçamba
                $calldemandDumpsterRemoval = new CallDemand();
                $calldemandDumpsterRemoval->id_demand      = $lastIdDemand;
                $calldemandDumpsterRemoval->type_service   = 'RETIRADA';
                $calldemandDumpsterRemoval->id_parent      = $calldemand->id;
                $calldemandDumpsterRemoval->period         = $request->period;
                $calldemandDumpsterRemoval->date_allocation_dumpster       = (isset($request->date_allocation_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_allocation_dumpster))) : '');
                $calldemandDumpsterRemoval->date_removal_dumpster_forecast = (isset($request->date_removal_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_removal_dumpster))) : '');
                $calldemandDumpsterRemoval->name           = $request->client_name_new;
                $calldemandDumpsterRemoval->address        = $request->address;
                $calldemandDumpsterRemoval->number         = $request->number;
                $calldemandDumpsterRemoval->zipcode        = $request->zipcode;
                $calldemandDumpsterRemoval->city           = $request->city;
                $calldemandDumpsterRemoval->district       = $request->district;
                $calldemandDumpsterRemoval->state          = $request->state;
                $calldemandDumpsterRemoval->phone          = str_replace([" ","(",")"],"",$request->phone);
                $calldemandDumpsterRemoval->dumpster_sequence_demand = $repeatInfo + 1;
                $calldemandDumpsterRemoval->dumpster_quantity  = $request->dumpster_quantity;
                $calldemandDumpsterRemoval->days_allocation    = $request->total_days;
                $calldemandDumpsterRemoval->id_driver      = 0;


                if(!$calldemandDumpsterRemoval->save())
                    return back()->withErrors(['response' => "Erro ao cadastrar dados de Retirada"]);
*/

                // Gravando na tabela de pagamentos
                $paymentCallDemand = new PaymentCallDemand();
                $paymentCallDemand->id_call_demand_reg = $calldemand->id;
                $paymentCallDemand->id_call_demand = $lastIdDemand;

                if(!$paymentCallDemand->save())
                    return back()->withErrors(['response' => "Erro ao registrar ids de pagamento"]);

            }
            // return redirect('createcalldemand');
            return redirect()->back()->with(['response' => 'Dados cadastrados com sucesso!']);

        }else{
            return back()->withErrors(['response' => 'Dados incompletos']);
        }

    }

    public function showUpdateForm($id_demand)
    {
        $showdata   = $this->showAPI($id_demand);
        return view('call_demand.form_edit_call_demand',  $showdata);
    }

    public function update(Request $request)
    {
        if (
            isset($request->id_demand)
            && isset($request->id_demand_reg)
            && isset($request->client_name_new)
            && isset($request->zipcode)
            && isset($request->address)
            && isset($request->number)
            && isset($request->district)
            && isset($request->city)
            && isset($request->state)
            && isset($request->phone)
            && isset($request->price_unit)
            && isset($request->dumpster_total)
            && isset($request->type_service)
            && isset($request->period)
            && isset($request->date_allocation_dumpster)
            && isset($request->date_removal_dumpster_forecast)
            && isset($request->total_days)){

            $call_demand = CallDemand::where('id',$request->id_demand_reg)
            ->where('id_demand',$request->id_demand)
            ->update([
                'name' => $request->client_name_new,
                'zipcode' => $request->zipcode,
                'address' => $request->address,
                'address_complement' => $request->address_complement,
                'number' => $request->number,
                'district' => $request->district,
                'city' => $request->city,
                'state' => $request->state,
                'phone' => $request->phone,
                'price_unit' => preg_replace('/[^0-9]+/','.',str_replace('.','',$request->price_unit)),
                'dumpster_quantity' => $request->dumpster_total,
                'dumpster_number' => (empty($request->dumpster_total_opened) ? 0 : $request->dumpster_total_opened),
                'id_landfill' => (empty($request->id_landfill) ? 0 : $request->id_landfill),
                'id_driver' => (empty($request->id_driver) ? 0 : $request->id_driver),
                'comments' => $request->comments,
                'type_service' => $request->type_service,
                'period' => $request->period,
                'date_allocation_dumpster' => (isset($request->date_allocation_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_allocation_dumpster))) : ''),
                'date_effective_removal_dumpster' => (isset($request->date_effective_removal_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_effective_removal_dumpster))) : ''),
                'date_removal_dumpster_forecast' => (isset($request->date_removal_dumpster_forecast) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_removal_dumpster_forecast))) : ''),
                'days_allocation' => $request->total_days
            ]);

            if($call_demand){
                // return redirect('/call_demand');
                return true;
            }else{
                return false;
            }
        }else
            // return redirect('/call_demand');
            return false;

    }

    public function updateStatusDemandDriver(Request $request)
    {

        $call_demand = CallDemand::where('id_demand',$request->id)->first();

        if($call_demand->service_status == 0){

            $call_demand = CallDemand::where('id_demand',$request->id)->update([
                'id_driver' => $request->id_driver,
                'service_status' => 1 // ATENDENDO
            ]);

        }elseif($call_demand->service_status == 1){

            $call_demand = CallDemand::where('id_demand',$request->id)->update([
                'id_driver' => $request->id_driver,
                'date_end' => date('Y-m-d H:i:s'),
                'service_status' => 2 // FINALIZADO
            ]);

        }

        return $call_demand;
    }

    public function changeDriverDemand(Request $request)
    {

        $calldemandFirst         = CallDemand::where('id',$request->id_reg)->where('id_demand',$request->id_demand)->first();
        $calldemandRemovalFirst  = CallDemand::where('type_service', 'RETIRADA')->where('id',$request->id_reg)->where('id_demand',$request->id_demand)->first();
        $effectiveDateRemoval    = isset($request->effective_date_removal) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->effective_date_removal))) : null;
        
        if(isset($calldemandFirst))
        {

            // CRIAR UM CHAMADO DE RETIRADA SE O USUÁRIO ADICIONAR "DATA DE RETIRADA EFETIVA"
            if($effectiveDateRemoval != null && !$calldemandRemovalFirst){

                // Gravando Registro para Futura Retirada da caçamba
                $calldemandDumpsterRemoval = new CallDemand();
                $calldemandDumpsterRemoval->id_demand      = $calldemandFirst->id_demand;
                $calldemandDumpsterRemoval->type_service   = 'RETIRADA';
                $calldemandDumpsterRemoval->id_parent      = $calldemandFirst->id_parent;
                $calldemandDumpsterRemoval->period         = $calldemandFirst->period;
                $calldemandDumpsterRemoval->date_allocation_dumpster = isset($calldemandFirst->date_allocation_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $calldemandFirst->date_allocation_dumpster))) : '';
                $calldemandDumpsterRemoval->date_removal_dumpster_forecast  = isset($calldemandFirst->date_removal_dumpster_forecast) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $calldemandFirst->date_removal_dumpster_forecast))) : '';
                $calldemandDumpsterRemoval->date_effective_removal_dumpster = $effectiveDateRemoval;
                $calldemandDumpsterRemoval->name           = $calldemandFirst->name;
                $calldemandDumpsterRemoval->address        = $calldemandFirst->address;
                $calldemandDumpsterRemoval->number         = $calldemandFirst->number;
                $calldemandDumpsterRemoval->zipcode        = $calldemandFirst->zipcode;
                $calldemandDumpsterRemoval->city           = $calldemandFirst->city;
                $calldemandDumpsterRemoval->district       = $calldemandFirst->district;
                $calldemandDumpsterRemoval->state          = $calldemandFirst->state;
                $calldemandDumpsterRemoval->phone          = $calldemandFirst->phone;
                $calldemandDumpsterRemoval->dumpster_sequence_demand = $calldemandFirst->dumpster_sequence_demand;
                $calldemandDumpsterRemoval->dumpster_quantity  = $calldemandFirst->dumpster_quantity;
                $calldemandDumpsterRemoval->days_allocation    = $calldemandFirst->days_allocation;
                $calldemandDumpsterRemoval->id_driver      = $calldemandFirst->id_driver;

                if(!$calldemandDumpsterRemoval->save())
                    return back()->withErrors(['response' => "Erro ao cadastrar dados de Retirada"]);
                
            }

            // INSERE ID DO MOTORISTA NO CHAMADO E DATA DE REMOÇÃO EFETIVA SE EXISTIR
            $drivers_checked = $request->drivers_checked === 'true' ? true: false;
            $effectivedateremoval_checked = $request->effectivedateremoval_checked === 'true' ? true: false;
            
            if($drivers_checked)
            {
                $call_demand = CallDemand::where('id_demand',$request->id_demand)
                ->where('type_service',$calldemandFirst->type_service)->update(['id_driver' => $request->id_driver]);

            }else{
                $call_demand = CallDemand::where('id',$request->id_reg)
                ->where('id_demand',$request->id_demand)
                ->where('type_service',$calldemandFirst->type_service)
                ->update([
                    'id_driver' => $request->id_driver

                ]);
            }

            if($effectivedateremoval_checked){

                $call_demand = CallDemand::where('id_demand',$request->id_demand)
                ->where('type_service',$calldemandFirst->type_service)->update(['date_effective_removal_dumpster' => $effectiveDateRemoval]);
            
            }else{

                $call_demand = CallDemand::where('id',$request->id_reg)
                ->where('id_demand',$request->id_demand)
                ->where('type_service',$calldemandFirst->type_service)
                ->update([
                    'date_effective_removal_dumpster' => $effectiveDateRemoval
                ]);
            }

            if($call_demand)
            {
                return true;
            }

            return false;
        }

        return false;
    }

    public function destroy(Request $request)
    {

        foreach ($request->id_demands as $idDemand) {

            $dataQueryPayment  = DB::table('payment_call_demand')->where('id_call_demand_reg', $idDemand)->first();
            
            if($dataQueryPayment){

                $dataDeletePayment = DB::table('payment_call_demand')->where('id_call_demand_reg', $idDemand)->delete();

                if(!$dataDeletePayment){
                    return false;
                }
            }
          
            $dataQueryActivity = DB::table('activity_user_demand_dumpster')->where('id_call_demand_reg', $idDemand)->first();

            if($dataQueryActivity){
                $dataDeleteActivity = DB::table('activity_user_demand_dumpster')->where('id_call_demand_reg', $idDemand)->delete();

                if(!$dataDeleteActivity){
                    return false;
                }
            }

            $dataDelete = DB::table('call_demand')->where('id', $idDemand)->delete();
            if($dataDelete){
                continue;
            }else{
                return false;
            }


        }

        return false;

    }

    private function returnSuccess($dados)
    {
        return [
            'code' => 200,
            'status' => 'success',
            'data' => $dados
        ];
    }

    private function returnError($retorno, $status = 403)
    {
        return Response::json(['code' => $status, 'status' => 'error', 'data' => $retorno], $status);
    }

}
