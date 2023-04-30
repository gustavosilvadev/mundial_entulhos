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
                    // DB::raw('DATE_FORMAT(call_demand.date_effective_removal_dumpster, "%d/%m/%Y") as date_end'),
                    DB::raw('DATE_FORMAT(call_demand.created_at, "%d/%m/%Y") as created_at'),
                    'call_demand.days_allocation AS days_allocation',
                    'call_demand.address as address_service',
                    'call_demand.number as number_address_service',
                    'call_demand.zipcode as zipcode_address_service',
                    'call_demand.city as city_address_service',
                    'call_demand.district as district_address_service',
                    'call_demand.state as state_address_service',
                    'call_demand.comments as comments_demand',
                    'call_demand.phone as phone_demand',
                    // 'call_demand.price_unit',
                    DB::raw('REPLACE(call_demand.price_unit, ".", ",") as price_unit'),
                    'call_demand.dumpster_quantity',
                    'call_demand.dumpster_number',
                    'call_demand.id_landfill',
                    'call_demand.id_driver',
                    'call_demand.service_status',
                    DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at'),
                    DB::raw('"" as name_landfill'),
                    DB::raw('"" as name_driver')
                // )->where('call_demand.id_demand', '=', $id_demand)->where('call_demand.id_driver','>=',0)->first();
                // )->where('call_demand.id_demand', '=', $id_demand)->where('call_demand.id_driver','>=',0)->get();
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
                
                // return view('call_demand.preview_call_demand',['calldemand' => $calldemand, 'client' => $client]);
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
                DB::raw('"" as name_driver')

            )->where('call_demand.id_driver','>=',0)
            // ->orderByDesc('call_demand.id_demand')
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
                                    ->get(["employee.name"]);

            if($calldemands->isEmpty() != true){
                return view('call_demand.list_call_demand',[
                    'driver_name_demands'=> $driver_name_demands,
                    'calldemands'=> $calldemands
                ]);

            }else{
                
                return view('call_demand.list_call_demand',[
                    'driver_name_demands'=> '',
                    'calldemands'=> ''
                ]);
            }


            return view('call_demand.list_call_demand');            
        }
    }


    public function showHistoryDemand($id_demand)
    {

        if(isset($id_demand)){

            $getIdFather = CallDemand::find($id_demand);

            if($getIdFather['id_father'] > 0){

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
                ->where('call_demand.id_demand', '=' ,$getIdFather['id_father'])->get();

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
                ->where('call_demand.id_father', '=' ,$id_demand)->get();

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
        ->select('call_demand.id_demand','call_demand.name')
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
                            // ->join('client', 'client.id', '=','call_demand.id_client')
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
            
            // $infoClient  = Client::where('id',$id_client)->first();
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
        && isset($request->comments)
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
                // $calldemand->date_start = '';
                $calldemand->date_allocation_dumpster       = (isset($request->date_allocation_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_allocation_dumpster))) : '');
                $calldemand->date_removal_dumpster_forecast = (isset($request->date_removal_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_removal_dumpster))) : '');
                // $calldemand->date_effective_removal_dumpster = '';
                // $calldemand->id_father = '';
                $calldemand->name       = $request->client_name_new;
                $calldemand->address    = $request->address;
                $calldemand->number     = $request->number;
                $calldemand->zipcode    = $request->zipcode;
                $calldemand->city       = $request->city;
                $calldemand->district   = $request->district;
                $calldemand->state      = $request->state;
                $calldemand->phone      = str_replace([" ","(",")"],"",$request->phone);
                $calldemand->price_unit = $request->price_unit;
                $calldemand->comments   = $request->comments;
                $calldemand->dumpster_sequence_demand = $repeatInfo + 1;
                $calldemand->dumpster_quantity  = $request->dumpster_quantity;
                // $calldemand->dumpster_number = ''; // MOTORISTA IRÁ ADICIONAR
                $calldemand->days_allocation    = $request->total_days;
                // $calldemand->id_landfill = ''; // MOTORISTA IRÁ ADICIONAR
                $calldemand->id_driver  = $request->id_driver;
                // $calldemand->service_status = ''; // SOMENTE NA ATUALIZAÇÃO
                $calldemand->save();

                if(!$calldemand->save())
                    return back()->withErrors(['response' => "Erro ao cadastrar demanda"]);


                $paymentCallDemand = new PaymentCallDemand();
                $paymentCallDemand->id_call_demand_reg = $calldemand->id;
                $paymentCallDemand->id_call_demand = $lastIdDemand;

                if(!$paymentCallDemand->save())
                    return back()->withErrors(['response' => "Erro ao registrar ids de pagamento"]);

            }
            return redirect('createcalldemand');

        }else{
            return back()->withErrors(['response' => 'Dados incompletos']);
        }

    }

    public function showUpdateForm($id_demand)
    {
        $showdata   = $this->showAPI($id_demand);
        
        // dd($showdata);
        // die();

        return view('call_demand.form_edit_call_demand',  $showdata);
    }

    public function update(Request $request)
    {
        if (
            isset($request->id_demand)
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
            // && isset($request->dumpster_total_opened)
            // && isset($request->id_landfill)
            // && isset($request->id_driver)
            && isset($request->comments)
            && isset($request->type_service)
            && isset($request->period)
            && isset($request->date_allocation_dumpster)
            && isset($request->date_removal_dumpster_forecast)
            && isset($request->total_days)){

            $call_demand = CallDemand::where('id_demand',$request->id_demand)->update([

                'name' => $request->client_name_new,
                'zipcode' => $request->zipcode,
                'address' => $request->address,
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
                'date_removal_dumpster_forecast' => (isset($request->date_removal_dumpster_forecast) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_removal_dumpster_forecast))) : ''),
                'days_allocation' => $request->total_days
            ]);

            if($call_demand){
                return redirect('/call_demand');
            }
        }
        return redirect('/call_demand');

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
