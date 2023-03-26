<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\CallDemand;
use App\Models\Driver;
use App\Models\DumpsterServiceDemand;
use App\Models\CountyDaysDumpster;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\CallLike;

class DumpsterServiceDemandController extends Controller
{

    public function show(Request $request)
    {
/*
        if(isset($request->id)){


            $calldemand = CallDemand::where('id',$request->id)->orderBy('id','DESC')->first();
            $client     = Client::where('id',$calldemand->id_client)->first();

            if(isset($calldemand)){
                
                return view('call_demand.preview_call_demand',['calldemand' => $calldemand, 'client' => $client]);

            }else{

                return view('call_demand.preview_call_demand',['calldemand','']);
            }

        }else{
            
            $calldemands = CallDemand::all();

            if(isset($calldemands)){
                return view('call_demand.list_call_demand',['calldemands'=> $calldemands]);
            }


            return view('call_demand.list_call_demand');
        }
*/        
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

    public function showDaysDumpsterCounty(Request $request){

        if(isset($request->id) && is_numeric($request->id))
        {

            $days = CountyDaysDumpster::find($request->id);
            return $days->days;
        }
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
