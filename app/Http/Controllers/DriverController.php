<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CallDemandController;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\CallDemand;
// use App\Models\DriverDemand;

class DriverController extends Controller
{
    public function show(Request $request)
    {

        if(isset($request->id)){

            $driver = Driver::where('id',$request->id)->orderBy('id','DESC')->first();

            if(isset($driver)){
                

                return view('driver.driver',['driver' => $driver]);

            }else{


                return view('driver.driver',['driver','']);
            }

        }else{

            $employees = Driver::join('employee', function($join){
                $join->on('driver.id_employee', '=', 'employee.id')->where('driver.flg_status', 1);
            })->get(['driver.id','employee.name']);


            if(isset($employees)){
                return view('driver.form_list_driver',['employee'=> $employees]);
            }
        }
    }

    public function showEmployee()
    {
        $employees = Employee::all();
        
        if($employees){

            return view('driver.form_cad_driver',['employees'=> $employees]);
        }
    }

    public function store(Request $request)
    {
        if (isset($request->employee)){

            $employee = Employee::where("id",$request->employee)->first();
            $employee->access_permission = 2;
            $employee->update();


            $driver_check = Driver::where("id_employee",$request->employee)->first();


            if(!$driver_check){
                $driver = new Driver();
                $driver->id_employee = $request->employee;

                if($driver->save()){

                    // return view('driver.form_cad_driver',["response" => "Dados cadastrados com sucesso"]);
                    return redirect('createdriver');
                }
            }
            // return view('driver.form_cad_driver',["response" => "Erro ao cadastrar o motorista"]);
            return redirect('createdriver');

        }else{
            // return view('driver.form_cad_driver',["response" => "Dados incompletos!"]);
            return redirect('createdriver');
        }
    }

    public function update(Request $request)
    {

        if($request->id){

            $driver = Driver::where("id",$request->id)->first();
            
            if($driver){
                
                $driver->id_employee     = $request->id_employee;
                
                if($driver->update()){

                    return view('driver.driver',[
                        'response' => $this->returnSuccess("Dados atualizados com sucesso"),
                        'driver' => $driver
                    ]);

                }else{
                    return $this->returnError('Erro ao atualizar os dados do motorista',500); 
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

        if(isset($request->id_employee)){
            
            $driver = Driver::where("id",$request->id)->first();
            
            if($driver){

                $driver = Driver::where('id',$request->id)->where('id_employee',$request->id_employee)->update(['flg_status' => false]);

                if($driver){

                    return $this->returnSuccess("Motorista removido com sucesso");
                
                }else{
                    return $this->returnError('Erro ao remover o motorista',500); 
                }

            }else{
                return $this->returnError('Motorista não encontrado',404); 

            }

        }else{
            return $this->returnError('Motorista não encontrado',404); 
        }
    }

    // public function exibirDemandasAtivas()
    public function showDemands()
    {
        $id_driver_session = session('id_user');
        $call_demands = $this->showDemandsClient($id_driver_session);

        if($call_demands['data']->isEmpty() != true){
            return view('driver.list_demand_driver',['call_demands'=> $call_demands['data']]);
        }

            return view('driver.list_demand_driver',['call_demands' => '']);
    }

    public function showDemandsClient($id_employee)
    {
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
            DB::raw('DATE_FORMAT(call_demand.created_at, "%d/%m/%Y") as created_at'),
            'landfill.name as landfill_name',
            'call_demand.period',
            DB::raw("CONCAT(employee.name, ' ', employee.surname) as driver_name"),
            DB::raw('call_demand.service_status as service_status'),
            DB::raw('DATE_FORMAT(call_demand.updated_at, "%d/%m/%Y") as updated_at')
        )->where('employee.id', $id_employee)->get();
        // )->where('employee.id', 3)->get();

        // if(isset($calldemand)){

        //     $tagNameIndex = array('data' => $calldemand);
        //     return $tagNameIndex;
        // }

        return array('data' => $calldemand);
    }

    public function updateStatusDemand(Request $request)
    {
        return $request->id;
        
        $id_driver_session = 1;

        // if(isset($request->id) && isset($id_driver_session)){
        //     $call_demand = CallDemand::where('id',$request->id)->first();
            
        //     if($call_demand){
                
        //         $call_demand->id_driver       = $id_driver_session;
        //         $call_demand->date_end        = date('Y-m-d H:i:s');
        //         $call_demand->service_status  = 2;

                
        //         if($call_demand->update()){

        //             return true;
                    
        //         }else{
        //             return false;
        //         }
        //     }
        // }
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
