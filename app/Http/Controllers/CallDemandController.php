<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\Query\Builder;
use App\Models\CallDemand;
use App\Models\Client;
use App\Models\Driver;
use App\Models\Landfill;

class CallDemandController extends Controller
{

    // public function showAPI(Request $request)
    public function showAPI($id_demand)
    {

        $dataresult = array();

        if(isset($id_demand)){

            $calldemandsNoDriver = DB::table('call_demand')
                ->select(
                    'call_demand.id as id_demand',
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
                )->where('call_demand.id', '=', $id_demand)->where('call_demand.id_driver', '=', 0)->get();  


                $calldemands = DB::table('call_demand')
                    ->join('driver', 'driver.id', '=', 'call_demand.id_driver')
                    ->join('employee', 'employee.id', '=', 'driver.id_employee')
                    ->select(
                        'call_demand.id as id_demand',
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
                        'call_demand.id_driver as id_driver',
                        'employee.name as driver_name',
                        'employee.surname as driver_surname',
                        'call_demand.service_status',
                        DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at')
                )->where('call_demand.id', '=', $id_demand)->where('call_demand.id_driver', '<>', 0)->get();


                $tagNameIndex = array();

                if($calldemands->isEmpty() != true && $calldemandsNoDriver->isEmpty() != true){

                    $tagNameIndex =[
                        'datanodriver'=> $calldemandsNoDriver,
                        'datawithdriver'=> $calldemands
                    ];
    
                }elseif($calldemands->isEmpty() != true && $calldemandsNoDriver->isEmpty() != false){
                    $tagNameIndex =[
                        'datanodriver'=> '',
                        'datawithdriver'=> $calldemands
                    ];
    
                }elseif($calldemands->isEmpty() != false && $calldemandsNoDriver->isEmpty() != true){
                    
                    $tagNameIndex =[
                        'datanodriver'=> $calldemandsNoDriver,
                        'datawithdriver'=> ''
                    ];
                }else{
                    
                    $tagNameIndex =[
                        'datanodriver'=> '',
                        'datawithdriver'=> ''
                    ];
                }

                // return $tagNameIndex;
                $tagNameIndex['show_data_hist'] = $this->showHistoryDemand($id_demand);
                $dataresult = $tagNameIndex; 

        }else{

            $calldemand = DB::table('call_demand')
            // ->join('client', 'client.id', '=','call_demand.id_client')
            ->join('driver', 'driver.id', '=', 'call_demand.id_driver')
            ->join('landfill', 'landfill.id', '=', 'call_demand.id_landfill')
            ->join('employee', 'employee.id', '=', 'driver.id_employee')
            ->select(
                'call_demand.id as id_demand',
                DB::raw("CONCAT(call_demand.name) as name_client"),
                'call_demand.type_service  as type_service',
                DB::raw('DATE_FORMAT(call_demand.date_end, "%d/%m/%Y") as date_end'),
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
                // DB::raw('DATEDIFF(call_demand.date_end, call_demand.date_begin) AS date_difference'),
                'landfill.name as landfill_name',
                'call_demand.period',
                DB::raw("CONCAT(employee.name, ' ', employee.surname) as driver_name"),
                // DB::raw('if(call_demand.service_status = 0, "PENDENTE","FINALIZADO") as service_status'),
                DB::raw('call_demand.service_status as service_status'),
                DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at')
            )->get();

            if(isset($calldemand)){

                $tagNameIndex = array('data' => $calldemand);
                // return $tagNameIndex;
                $dataresult = $tagNameIndex;

            }
        }

        return $dataresult;
    }

    public function show(Request $request)
    {
        if(isset($request->id)){
            
            $id_demand = $request->id;

            $calldemand = CallDemand::where('id',$id_demand)->orderBy('id','DESC')->first();

            if(isset($calldemand)){
                
                // return view('call_demand.preview_call_demand',['calldemand' => $calldemand, 'client' => $client]);
                return view('call_demand.preview_call_demand',['calldemand' => $calldemand]);

            }else{

                return view('call_demand.preview_call_demand',['calldemand','']);
            }

        }else{
            

            $calldemands = DB::table('call_demand')
            ->join('driver', 'driver.id', '=', 'call_demand.id_driver')
            ->join('employee', 'employee.id', '=', 'driver.id_employee')
            ->select(
                'call_demand.id as id_demand',
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
                'employee.name as driver_name',
                'employee.surname as driver_surname',
                'call_demand.service_status',
                DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at')
            )->get();




            $calldemandsNoDriver = DB::table('call_demand')
            ->select(
                'call_demand.id as id_demand',
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
            )->get();  

            $driver_name_demands = DB::table('call_demand')
            ->select(
                DB::raw('DISTINCT call_demand.name as name')
            )->get();  


            if($calldemands->isEmpty() != true && $calldemandsNoDriver->isEmpty() != true){

                return view('call_demand.list_call_demand',[
                    'driver_name_demands'=> $driver_name_demands,
                    'calldemandsnodriver'=> $calldemandsNoDriver,
                    'calldemands'=> $calldemands
                ]);

            }elseif($calldemands->isEmpty() != true && $calldemandsNoDriver->isEmpty() != false){
                return view('call_demand.list_call_demand',[
                    'driver_name_demands'=> $driver_name_demands,
                    'calldemandsnodriver'=> '',
                    'calldemands'=> $calldemands
                ]);

            }elseif($calldemands->isEmpty() != false && $calldemandsNoDriver->isEmpty() != true){
                
                return view('call_demand.list_call_demand',[
                    'driver_name_demands'=> $driver_name_demands,
                    'calldemandsnodriver'=> $calldemandsNoDriver,
                    'calldemands'=> ''
                ]);
            }else{
                
                return view('call_demand.list_call_demand',[
                    'driver_name_demands'=> '',
                    'calldemandsnodriver'=> '',
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
                    'call_demand.id as id_demand',
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
                ->where('call_demand.id', '=' ,$getIdFather['id_father'])->get();

                return (isset($showDataHist)) ? $showDataHist : '';
            
            }else{
                $showDataHist = DB::table('call_demand')
                ->select(
                    'call_demand.id as id_demand',
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

    public function showInfoParamsDemand()
    {
        $info_client_demand = DB::table('call_demand')
        ->groupBy('call_demand.name')
        ->orderBy('call_demand.id', 'desc')
        ->select('call_demand.id','call_demand.name')
        ->get();

        $drivers = Driver::join('employee', function($join){
            $join->on('driver.id_employee', '=', 'employee.id')->where('driver.flg_status', 1);
        })->get(['driver.id','employee.name','employee.surname']);

        // $drivers = DB::table('employee')->where('access_permission', 2)->get(['employee.id','employee.name','employee.surname']); // access_permission = 2 is driver

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
                                'call_demand.id as id_demand',
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
        dd('Resolver problema com relacionamento do pedido anterior');
        // CÓDIGO DE REFERÊNCIA LOGO ABAIXO:
        
        /*
        
                $verificaPedidoRelacionado = CallDemand::where('zipcode', '=', $request->zipcode)
                    ->where('address', '=', $request->address)
                    ->where('number', '=', $request->number)
                    ->where('id_father', '=', 0)
                    ->whereNull('date_effective_removal_dumpster')->first();
        */


        $price_unit = str_replace('R$','',$request->price_unit);
        if(isset($request->client_name_new)
        && isset($request->type_service)
        && isset($request->address)
        && isset($request->number)
        && isset($request->zipcode)
        && isset($request->city)
        && isset($request->district)
        && isset($request->state)
        && isset($request->phone)
        && isset($price_unit)
        && isset($request->id_landfill)
        && isset($request->id_driver)
        && isset($request->period)
        && isset($request->date_removal_dumpster)
        && isset($request->date_effective_removal_dumpster)
        && isset($request->dumpster_number)
        ){

            $calldemand = new CallDemand();
            $calldemand->name          = $request->client_name_new;
            $calldemand->type_service  = $request->type_service;
            $calldemand->address       = $request->address;
            $calldemand->number        = $request->number;
            $calldemand->zipcode       = $request->zipcode;
            $calldemand->city          = $request->city;
            $calldemand->district      = $request->district;
            $calldemand->state         = $request->state;
            $calldemand->comments      = $request->comments;
            $calldemand->phone         = $request->phone;
            $calldemand->price_unit    = preg_replace('/[^0-9]+/','.',str_replace('.','',$price_unit));
            $calldemand->id_landfill   = $request->id_landfill;
            $calldemand->id_driver     = $request->id_driver;
            $calldemand->period        = $request->period;
            $calldemand->dumpster_total = $request->dumpster_total;
            $calldemand->dumpster_total_opened = $request->dumpster_total_opened;
            $calldemand->dumpster_number = $request->dumpster_number;
            $calldemand->date_allocation_dumpster  = (isset($request->date_allocation_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_allocation_dumpster))) : '');
            $calldemand->date_removal_dumpster   = (isset($request->date_removal_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_removal_dumpster))) : '');
            $calldemand->date_effective_removal_dumpster = (isset($request->date_effective_removal_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_effective_removal_dumpster))) : '');
        
            if($calldemand->save()){

                return redirect('createcalldemand');
            }

            return view('call_demand.form_cad_call_demand',["response" => "Erro ao cadastrar demanda"]);        
        

        }else{

            // return view('call_demand.form_cad_call_demand',["response" => "Dados incompletos!"]);
            return redirect('/createcalldemand');
        }
    }

    public function showUpdateForm($id_demand)
    {
        $showdata       = $this->showAPI($id_demand);
        
        if($showdata){

            // return view('call_demand.form_edit_call_demand', $this->showDataInfoDemand($id_demand));
            return view('call_demand.form_edit_call_demand',  $showdata, $this->showInfoParamsDemand());
        }
        return null;
    }

    public function update(Request $request){
        
        // if(isset($request->name)){

        //     $call_demand = CallDemand::where('id',$request->id)->update([
        //         'id_driver' => $request->id_driver,
        //         'service_status' => 1 // ATENDENDO
        //     ]);

        //     return $call_demand;
        // }

        // return false;

        return redirect('/call_demand');

    }

    public function showInfoToForm($id_demand)
    {
        // return 'Funcionando!! id: '.$id;
        return $this->showAPI($id_demand)['data'][0];
    }


/*
    public function destroy(Request $request)
    {

        if(isset($request->id) && isset($request->email) && isset($request->cpf_cnpj)){
            
            $employee = Employee::where("id",$request->id)->first();
            
            if($employee){

                $employee = Employee::where('id',$request->id)->where('email',$request->email)->update(['flg_status' => false]);

                if($employee){

                    return $this->returnSuccess("Cliente removido com sucesso");
                
                }else{
                    return $this->returnError('Erro ao remover cliente',500); 
                }

            }else{
                return $this->returnError('Cliente não encontrado',404); 

            }

        }else{
            return $this->returnError('Cliente não encontrado',404); 
        }
    }
*/
    public function updateStatusDemandDriver(Request $request)
    {

        $call_demand = CallDemand::where('id',$request->id)->first();

        if($call_demand->service_status == 0){

            $call_demand = CallDemand::where('id',$request->id)->update([
                'id_driver' => $request->id_driver,
                'service_status' => 1 // ATENDENDO
            ]);

        }elseif($call_demand->service_status == 1){

            $call_demand = CallDemand::where('id',$request->id)->update([
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
