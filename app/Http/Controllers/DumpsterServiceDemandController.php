<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\CallDemand;
use App\Models\Driver;
use App\Models\DumpsterServiceDemand;
use App\Models\CountyDaysDumpster;
use App\Models\TotalDumpster;

class DumpsterServiceDemandController extends Controller
{

    public function showQuantityDumpters()
    {

        $totalDumpsters = TotalDumpster::get('number_total', 'number_available')->first();
        return view('dumpster_service_demand.form_cad_total_dumspter',[
            'number_total' => (isset($totalDumpsters['number_total']) ? $totalDumpsters['number_total'] : 0),
            'number_available' => (isset($totalDumpsters['number_available']) ? $totalDumpsters['number_available'] : 0),
        ]);
    }

    public function updateQuantityDumpters(Request $request)
    {
        $checkTotalDumpsters = TotalDumpster::get('number_total', 'number_available')->first();

        if(isset($checkTotalDumpsters['number_total'])){
            $totalDumpster = TotalDumpster::where('id',1)->update([
                'number_total' => $request->number_total,
                'number_available' => $request->number_available
            ]);

            if($totalDumpster){
                return true;
            }

            return false;

        }else{

            $totalDumpster = new TotalDumpster();
            $totalDumpster->number_total     = $request->number_total;
            $totalDumpster->number_available = $request->number_available;

            if($totalDumpster->save()){
                return true;
            }

            return false;
        }
    }

    public function checkAvailableDumpster(Request $request)
    {
        $dumpsterNumber = $request->dumpsterNumber;
        $id_demand_reg  = $request->id_demand_reg;
        $call_demand = CallDemand::where('id','<>',$id_demand_reg)
                ->where('dumpster_number', $dumpsterNumber)
                ->where('dumpster_number_substitute', 0)
                ->where('service_status', 0)
                ->orWhere(function($query) use ($id_demand_reg, $dumpsterNumber){
                    $query->where('id','<>',$id_demand_reg)
                    ->where('dumpster_number_substitute', $dumpsterNumber)
                    ->where('service_status', 0);
                })->first();
        
        // Se houver registro (TRUE), retornará FALSO pois estará indisponível para uso
        return isset($call_demand) ? false : true;

    }

    public function showNameDriverDemand()
    {
        $call_demands = CallDemand::where('service_status','<',2)->get();
        $drivers      = Driver::join('employee', function($join){
            $join->on('driver.id_employee', '=', 'employee.id')->where('driver.flg_status', 1);
        })->get(['driver.id','employee.name']);

        return view('dumpster_service_demand.form_cad_service_demand', ['call_demands' => $call_demands, 'drivers' => $drivers]);
    }

    public function store(Request $request)
    {
        if(isset($request->id_driver) && isset($request->id_call_demand)){

            $dumpster_service_demand = new DumpsterServiceDemand();
            $dumpster_service_demand->id_driver         = $request->id_driver;
            $dumpster_service_demand->id_call_demand    = $request->id_call_demand;
            $dumpster_service_demand->start_service_date       = now();
            $dumpster_service_demand->dumpster_allocate_date   = null;
            $dumpster_service_demand->dumpster_collected_date  = null;
            $dumpster_service_demand->end_service_date = null;

            if($dumpster_service_demand->save()){
                // return view('call_demand.form_cad_call_demand',["response" => "Dados cadastrados com sucesso"]);
                return redirect('createdumpsterservicedemand');
            }

            // return view('call_demand.form_cad_call_demand',["response" => "Erro ao cadastrar demanda"]);        
            return redirect('/createdumpsterservicedemand');
        
        }else{
            // return view('call_demand.form_cad_call_demand',["response" => "Dados incompletos!"]);
            return redirect('/createdumpsterservicedemand');
        }
    }

    public function showCounties(){

        $list_counties = CountyDaysDumpster::get();
        return view('dumpster_service_demand.form_cad_days_dumpster',['list_counties' => $list_counties]);

    }

    public function showDaysDumpsterCounty(Request $request)
    {
        if(isset($request->id) && is_numeric($request->id))
        {

            $days = CountyDaysDumpster::find($request->id);
            return $days->days;
        
        }elseif(isset($request->city) && is_string($request->city)){
  
            $result = CountyDaysDumpster::whereRaw('UPPER(`name_county`) LIKE "%'.strtoupper($request->city.'%"'))->get();

            return $result[0]->days;
        }

        return null;
    }

    public function updateDaysDumpsterCounty(Request $request){

        if(isset($request->id) 
            && is_numeric($request->id)
            && isset($request->days) 
            && is_numeric($request->days)
            )
        {

            $county_days_dumpster = CountyDaysDumpster::where('id',$request->id)
            ->update([
                'days' => $request->days
            ]);

            if($county_days_dumpster === true){
                return true;
            }
            return false;

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
