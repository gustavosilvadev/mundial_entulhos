<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\CallDemand;
use App\Models\Client;
use App\Models\Driver;
use App\Models\Landfill;

class CallDemandController extends Controller
{

    public function showAPI(Request $request)
    {
        if(isset($request->id)){

            $calldemand = DB::table('call_demand')
                ->join('client', 'client.id', '=','call_demand.id_client')
                ->join('driver', 'driver.id', '=', 'call_demand.id_driver')
                ->join('landfill', 'landfill.id', '=', 'call_demand.id_landfill')
                ->join('employee', 'employee.id', '=', 'driver.id_employee')
                ->select(
                    'call_demand.id as id_demand',
                    'client.id as id_client',
                    DB::raw("CONCAT(client.name, ' ', client.surname) as name_client"),
                    'call_demand.type_service  as type_service',
                    DB::raw('DATE_FORMAT(call_demand.date_begin, "%d/%m/%Y") as date_begin'),
                    DB::raw('DATE_FORMAT(call_demand.date_end, "%d/%m/%Y") as date_end'),
                    DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y") as date_allocation_dumpster'),
                    DB::raw('DATE_FORMAT(call_demand.date_removal_dumpster, "%d/%m/%Y") as date_removal_dumpster'),
                    DB::raw('DATE_FORMAT(call_demand.date_change_dumpster, "%d/%m/%Y") as date_change_dumpster'),
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
                    DB::raw('DATEDIFF(call_demand.date_end, call_demand.date_begin) AS date_difference'),
                    'landfill.name as landfill_name',
                    'call_demand.period',
                    DB::raw("CONCAT(employee.name, ' ', employee.surname) as driver_name"),
                    DB::raw('if(call_demand.service_status = 0, "PENDENTE","") as service_status'),
                    DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at')
                )
                ->where('call_demand.id', '=', $request->id)->get();

                if(isset($calldemand)){
                $tagNameIndex = array('data' => $calldemand);
                return $tagNameIndex;

                }                

        }else{
            
            $calldemands = DB::table('call_demand')
                ->join('client', 'client.id', '=','call_demand.id_client')
                ->join('driver', 'driver.id', '=', 'call_demand.id_driver')
                ->join('landfill', 'landfill.id', '=', 'call_demand.id_landfill')
                ->join('employee', 'employee.id', '=', 'driver.id_employee')
                ->select(
                    'call_demand.id as id_demand',
                    'client.id as id_client',
                    DB::raw("CONCAT(client.name, ' ', client.surname) as name_client"),
                    'call_demand.type_service  as type_service',
                    DB::raw('DATE_FORMAT(call_demand.date_begin, "%d/%m/%Y") as date_begin'),
                    DB::raw('DATE_FORMAT(call_demand.date_end, "%d/%m/%Y") as date_end'),
                    DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y") as date_allocation_dumpster'),
                    DB::raw('DATE_FORMAT(call_demand.date_removal_dumpster, "%d/%m/%Y") as date_removal_dumpster'),
                    DB::raw('DATE_FORMAT(call_demand.date_change_dumpster, "%d/%m/%Y") as date_change_dumpster'),
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
                    DB::raw('DATEDIFF(call_demand.date_end, call_demand.date_begin) AS date_difference'),
                    'landfill.name as landfill_name',
                    'call_demand.period',
                    DB::raw("CONCAT(employee.name, ' ', employee.surname) as driver_name"),
                    DB::raw('if(call_demand.service_status = 0, "PENDENTE","OK") as service_status'),
                    DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at')
                )->get();

            if(isset($calldemands)){
                $tagNameIndex = array('data' => $calldemands );
                return $tagNameIndex;
            }
        }
    }

    public function show(Request $request)
    {

        $id_demand = $request->id;

        if(isset($id_demand)){
            
            $calldemand = CallDemand::where('id',$id_demand)->orderBy('id','DESC')->first();
            $client     = Client::where('id',$calldemand->id_client)->first();

            if(isset($calldemand)){
                
                return view('call_demand.preview_call_demand',['calldemand' => $calldemand, 'client' => $client]);

            }else{

                return view('call_demand.preview_call_demand',['calldemand','']);
            }

        }else{
            
            // $calldemands = CallDemand::all();

            $calldemands = DB::table('call_demand')
                ->join('client', 'client.id', '=','call_demand.id_client')
                ->join('driver', 'driver.id', '=', 'call_demand.id_driver')
                ->join('employee', 'employee.id', '=', 'driver.id_employee')
                ->select(
                    'client.id as id_client',
                    'client.name as name_client',
                    'client.surname as surname_client',
                    'call_demand.id as id_demand',
                    'call_demand.type_service  as type_service',
                    'call_demand.date_begin as date_begin',
                    'call_demand.date_end as date_end',
                    'call_demand.date_allocation_dumpster as date_allocation_dumpster',
                    'call_demand.date_removal_dumpster as date_removal_dumpster',
                    'call_demand.date_change_dumpster as date_change_dumpster',
                    'call_demand.date_effective_removal_dumpster as date_effective_removal_dumpster',
                    'call_demand.address as address_service',
                    'call_demand.number as number_address_service',
                    'call_demand.zipcode as zipcode_address_service',
                    'call_demand.city as city_address_service',
                    'call_demand.district as district_address_service',
                    'call_demand.state as state_address_service',
                    'call_demand.comments as comments_demand',
                    'call_demand.phone as phone_demand',
                    'call_demand.price_unit',
                    'call_demand.dumpster_total',
                    'call_demand.dumpster_total_opened',
                    'call_demand.dumpster_number',
                    'call_demand.id_landfill',
                    'call_demand.period',
                    'employee.name as driver_name',
                    'employee.surname as driver_surname',
                    'call_demand.service_status',
                    'call_demand.updated_at',
                )->get();

            if(isset($calldemands)){
                return view('call_demand.list_call_demand',['calldemands'=> $calldemands]);
            }


            return view('call_demand.list_call_demand');
        }
    }


    public function showNameClient()
    {
        $clients = Client::all();   
        $drivers = Driver::join('employee', function($join){
            $join->on('driver.id_employee', '=', 'employee.id')->where('driver.flg_status', 1);
        })->get(['driver.id','employee.name']);

        $landfills = Landfill::select('id','name')->where('flg_status', 1)->get();
        
        return view('call_demand.form_cad_call_demand', [
            'clients' => $clients, 
            'drivers' => $drivers,
            'landfills' => $landfills
        ]);
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
                            ->join('client', 'client.id', '=','call_demand.id_client')
                            ->join('driver', 'driver.id', '=', 'call_demand.id_driver')
                            ->join('landfill', 'landfill.id', '=', 'call_demand.id_landfill')
                            ->join('employee', 'employee.id', '=', 'driver.id_employee')
                            ->select(
                                'call_demand.id as id_demand',
                                'client.id as id_client',
                                DB::raw("CONCAT(client.name, ' ', client.surname) as name_client"),
                                'call_demand.type_service  as type_service',
                                DB::raw('DATE_FORMAT(call_demand.date_begin, "%d/%m/%Y") as date_begin'),
                                DB::raw('DATE_FORMAT(call_demand.date_end, "%d/%m/%Y") as date_end'),
                                DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y") as date_allocation_dumpster'),
                                DB::raw('DATE_FORMAT(call_demand.date_removal_dumpster, "%d/%m/%Y") as date_removal_dumpster'),
                                DB::raw('DATE_FORMAT(call_demand.date_change_dumpster, "%d/%m/%Y") as date_change_dumpster'),
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
                                DB::raw('DATEDIFF(call_demand.date_end, call_demand.date_begin) AS date_difference'),
                                'landfill.name as landfill_name',
                                'call_demand.period',
                                DB::raw("CONCAT(employee.name, ' ', employee.surname) as driver_name"),
                                DB::raw('if(call_demand.service_status = 0, "PENDENTE","ENTREGUE") as service_status'),
                                DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at')
                            )            
                            ->orderBy('call_demand.service_status')
                            ->get();
            
            $infoClient  = Client::where('id',$id_client)->first();
            return array('calldemands' => $calldemands, 'infoclient' => $infoClient);

            /*
            $client     = Client::where('id',$calldemand->id_client)->first();

            if(isset($calldemand)){
                
                return view('call_demand.preview_call_demand',['calldemand' => $calldemand, 'client' => $client]);

            }else{

                return view('call_demand.preview_call_demand',['calldemand','']);
            }
            */

        }
    }

    public function store(Request $request)
    {

        $price_unit = str_replace('R$','',$request->price_unit);

        if(isset($request->id_client)
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
        && isset($request->date_begin)
        // && isset($request->date_end)
        && isset($request->date_removal_dumpster)
        && isset($request->date_effective_removal_dumpster)
        && isset($request->dumpster_number)
        ){

            $calldemand = new CallDemand();
            $calldemand->id_client     = $request->id_client;
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
            
            $calldemand->date_begin = (isset($request->date_begin) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_begin))) : '');
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

/*
    public function update(Request $request)
    {

        if($request->id){

            $employee = Employee::where("id",$request->id)->first();
            
            if($employee){
                
                $employee->name     = $request->name;
                $employee->surname  = $request->surname;
                $employee->email    = $request->email;
                $employee->login    = $request->login;
                
                if(isset($request->password)){

                    $employee->password = Hash::make($request->password);
                }

                $employee->phone    = $request->phone;
                $employee->cpf_cnpj = $request->cpf_cnpj;
                $employee->address  = $request->address;
                $employee->zipcode  = $request->zipcode;
                $employee->city     = $request->city;
                $employee->state    = $request->state;

                if($employee->update()){

                    return view('employee.employee',[
                        'response' => $this->returnSuccess("Dados atualizados com sucesso"),
                        'employee' => $employee
                    ]);

                }else{
                    return $this->returnError('Erro ao atualizar os dados do funcionário',500); 
                }

            }else{
                return $this->returnError('Funcionário não encontrado',404);

            }

        }else{
            return $this->returnError('Funcionário não encontrado',404); 
        }
    
    }


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
