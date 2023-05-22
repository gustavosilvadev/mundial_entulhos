<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\CallDemand;
use App\Models\ActivityUserDemandDumpster;
use App\Models\Landfill;
use \Session as Session;
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
    
    public function getLandFill(Request $request)
    {

        $id_user_employee = session('id_user');
        $driver_data = Driver::where('id_employee',$id_user_employee)->first();

        if($request->id_demand){

            $call_demand  = CallDemand::where('id_demand','=',$request->id_demand)
            ->where('type_service','=', $request->type_service)
            ->where('id_driver','=', $driver_data->id)
            ->first();

            $itemLandfill = array();            
            if(isset($call_demand) && ($call_demand->id_landfill > 0)){
                
                $landfills  = Landfill::select('id','name')->where('flg_status', 1)->get();

                foreach ($landfills as $value) {

                    $itemLandfill[] = array(
                            "id" => $value->id,
                            "name" => $value->name,
                            "selected" => ($call_demand->id_landfill == $value->id) ? true : false
                        );
                }
            }else{

                $landfills  = Landfill::select('id','name')->where('flg_status', 1)->get();

                foreach ($landfills as $value) {

                    $itemLandfill[] = array(
                            "id" => $value->id,
                            "name" => $value->name,
                            "selected" => false
                        );
                }
            }

            return $itemLandfill;            
        }
    }

    // public function exibirDemandasAtivas()
    public function showDemands()
    {
        $id_user_employee  = session('id_user');
        $call_demands       = $this->showDemandsClient($id_user_employee, '');

        return view('driver.list_demand_driver',['call_demands'=> $call_demands]);
    }


    public function showDemandFilter(Request $request)
    {
        $id_user_employee  = session('id_user');
        $call_demands      = $this->showDemandsClient($id_user_employee, $request->data_alocacao);

        return $call_demands;
    }    

    public function showDemandsClient($id_employee, $date_demand_filter)
    {
        $dateAllocationFilter = (isset($date_demand_filter) ? $date_demand_filter : date('d/m/Y'));

        $get_id_driver  = Driver::select()->where("id_employee", $id_employee)->first();
        $service_status = 5;

        $calldemands = DB::table('call_demand')
        ->groupBy('call_demand.id_demand','call_demand.type_service')
        ->orderBy('call_demand.type_service', 'desc')        
        ->select(
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
            DB::raw('"" as name_driver'),
            DB::raw('"" as type_service_driver'),
            DB::raw('"" as datetime_start_demand'),
            DB::raw('"" as datetime_finish_demand'),
            DB::raw('"" as dumpsters')

        )
        ->where('call_demand.id_driver', $get_id_driver['id'])
        ->where('call_demand.service_status','<>', $service_status)
        ->where(DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y")'), $dateAllocationFilter)
        ->groupBy('id_demand')
        ->get();

        return $calldemands;
    }

    /**
     * Iniciar operação do motorista
     */
    public function startDemand(Request $request)
    {
        $id_user_employee = session('id_user');
        $driver_data = Driver::where('id_employee',$id_user_employee)->first();

        for($number = 0; $number < count($request->dumpster_numbers); $number++)
        {
            $call_demands = CallDemand::where('id_demand','<>',$request->id_demand)
            ->where('dumpster_number','<>', 0)
            ->where('dumpster_number',$request->dumpster_numbers[$number])
            ->where('date_effective_removal_dumpster','=', null)
            ->where('id_driver','=', $driver_data->id)
            ->get();

            if($call_demands->count()){
                return false;
                break;
            }
        }

        $call_demands = CallDemand::where('id_demand',$request->id_demand)->where('type_service', $request->type_service)->get();

        foreach($call_demands as $key => $value){

            CallDemand::where('id_demand', $request->id_demand)
            ->where('type_service', 'RETIRADA')
            ->where('dumpster_sequence_demand', ($key + 1))
            ->where('dumpster_number','=', 0)
            ->update([
                'dumpster_number' => $request->dumpster_numbers[$key],
                'id_landfill' => $request->id_landfill
            ]);

            CallDemand::where('id_demand', $request->id_demand)
            ->where('type_service', $request->type_service)
            ->where('dumpster_sequence_demand', ($key + 1))
            ->where('id_driver','=', $driver_data->id)
            ->update([
                'service_status' => 1,
                'date_start' => date('Y-m-d H:i:s'),
                'dumpster_number' => $request->dumpster_numbers[$key],
                'id_landfill' => $request->id_landfill
            ]);

            $call_demand_updated_data = CallDemand::where('id_demand', $request->id_demand)
            ->where('type_service', $request->type_service)
            ->where('id_driver','=', $driver_data->id)
            ->first();


            // $activityUserDemandDumpster = ActivityUserDemandDumpster::where('id_demand', $request->id_demand)
            // ->where('id_call_demand_reg', $call_demand_updated_data->id)
            // ->where('id_call_demand', $call_demand_updated_data->id_demand)
            // ->first();

            // if(!$activityUserDemandDumpster)
            // {
                $activityUserDemandDumpster = new ActivityUserDemandDumpster();
                $activityUserDemandDumpster->id_call_demand_reg = $call_demand_updated_data->id;
                $activityUserDemandDumpster->id_call_demand     = $call_demand_updated_data->id_demand;
                $activityUserDemandDumpster->id_employee        = $id_user_employee;
                $activityUserDemandDumpster->type_service       = $call_demand_updated_data->type_service;
                $activityUserDemandDumpster->service_status     = 1; // INICIAR CHAMADO
            
                if($activityUserDemandDumpster->save()){
                    continue;

                }else{
                    return false;
                }
            // }
        }

        return true;
    }

    public function finishDemand(Request $request)
    {
        $id_employee    = session('id_user');
        $service_status = 5;


            $is_updated = CallDemand::where('id_demand',$request->id_demand)
            ->where('type_service', trim($request->type_service))
            ->where('service_status','<>', 5)
            ->update([
                'service_status' => $service_status,
                'id_landfill' => $request->id_landfill,
                'date_effective_removal_dumpster' => date("Y-m-d H:i:s")
            ]);

            if($is_updated)
            {
                $call_demands = CallDemand::where('id_demand', $request->id_demand)
                ->where('type_service', trim($request->type_service))
                ->where('service_status', $service_status)
                ->get();

                if($call_demands->count()){

                    foreach ($call_demands as $call_demand) {

                        $activityUserDemandDumpster = new ActivityUserDemandDumpster();
                        $activityUserDemandDumpster->id_call_demand_reg = $call_demand->id;
                        $activityUserDemandDumpster->id_call_demand     = $call_demand->id_demand;
                        $activityUserDemandDumpster->id_employee        = $id_employee;
                        $activityUserDemandDumpster->type_service       = $call_demand->type_service;
                        $activityUserDemandDumpster->service_status     = $service_status; // ENCERRAR CHAMADO
                    
                        if($activityUserDemandDumpster->save()){
                            continue;

                        }else{
                            return false;
                        }
                    }
                    return true;
                }else{
                    return false;
                }
            }else{
    
                return false;
            }
    }

    public function getDumpsterDemand(Request $request)
    {
        $id_user_employee  = session('id_user');
        $driver       = Driver::select()->where("id_employee", $id_user_employee)->first();
        $callDemand   = CallDemand::where('id_demand', $request->id_demand)
        ->where('id_driver', $driver->id)
        ->where('type_service', trim($request->type_service))
        ->get("dumpster_number");
        
        return $callDemand;
        // $callDemand   = CallDemand::where('id_demand', $request->id_demand)->where('id_driver', $id_driver->id)->where('type_service', $request->type_service)->groupBy('type_service')->get("dumpster_number");
    }

    /**
     * Recolher Caçamba
     */
    public function getDumpsterLocation(Request $request)
    {
        $id_user_employee = session('id_user');   
        
        if(isset($id_user_employee) && isset($request->id_demand)){
            $call_demand = CallDemand::where('id_demand',$request->id_demand)->first();

            if($call_demand->date_start == null && $call_demand->service_status == 0){
                $call_demand->service_status = 3; //  Status 3 -. Recolhimento da caçamba
                $call_demand->date_start = date('Y-m-d H:i:s');
            
                if($call_demand->update()){
                    return true;
                }
                    return false;
            }
        }
        return false;        
    }

    public function updateStatusDemand(Request $request)
    {
        $id_user_employee = session('id_user');

        return 'id_user: '.$id_user_employee. "\n id_demand: ".$request->id_demand;

        if(isset($request->id) && isset($id_user_employee)){
            $call_demand = CallDemand::where('id_demand',$request->id)->first();
            
            if($call_demand){
                if($call_demand->service_status != 2)
                {
                    // $call_demand->id_driver       = $id_user_employee;
                    // $call_demand->date_end        = date('Y-m-d H:i:s');
                    $call_demand->service_status  = 2;
                }else{

                    $call_demand->date_end = date('Y-m-d H:i:s');
                }

                if($call_demand->update()){

                    return true;
                    
                }else{
                    return false;
                }
            }
        }
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
