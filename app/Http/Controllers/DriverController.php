<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Employee;

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
            
            $drivers = Driver::all();
            
            if(isset($drivers)){
                return view('driver.form_list_driver',['drivers'=> $drivers]);
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

            $driver = new Driver();
                $driver->id_employee    = $request->id_employee;

                if($driver->save()){

                    return view('driver.form_cad_driver',["response" => "Dados cadastrados com sucesso"]);
                }

                return view('driver.form_cad_driver',["response" => "Erro ao cadastrar o motorista"]);

        }else{
            return view('driver.form_cad_driver',["response" => "Dados incompletos!"]);
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
