<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\CallDemand;
use App\Models\Driver;
use App\Models\DumpsterServiceDemand;
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
