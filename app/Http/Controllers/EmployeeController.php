<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Driver;

class EmployeeController extends Controller
{

    public function show(Request $request)
    {

        if(isset($request->id)){


            $employee = Employee::where('id',$request->id)->orderBy('id','DESC')->first();

            if(isset($employee)){
                

                return view('employee.employee',['employee' => $employee]);

            }else{


                return view('employee.employee',['employee','']);
            }

        }else{
            
            $employees = Employee::all();
            
            if(isset($employees)){
                return view('employee.form_list_employee',['employees'=> $employees]);
            }
        }
    }

    public function store(Request $request)
    {

        if (isset($request->name)
            && isset($request->surname)
            && isset($request->email)
            && isset($request->login)
            && isset($request->password)
        ){



            $employee = new Employee();
                $employee->name     = $request->name;
                $employee->surname  = $request->surname;
                $employee->email    = $request->email;
                $employee->login    = $request->login;
                $employee->password = Hash::make($request->password);;
                $employee->phone    = $request->phone;
                $employee->cpf_cnpj = $request->cpf_cnpj;
                $employee->address  = $request->address;
                $employee->zipcode  = $request->zipcode;
                $employee->city     = $request->city;
                $employee->state    = $request->state;
                $employee->access_permission    = $request->access_permission;
                


                if($employee->save()){

                    if($request->access_permission == 2 ){
                        $driver = new Driver();
                        $driver->id_employee = $employee->id;
                        $driver->flg_status = 1;
                        $driver->save();
                    }


                    // return view('employee.form_cad_employee',["response" => "Dados cadastrados com sucesso"]);
                    return redirect("createemployee");
                }

                // return view('employee.form_cad_employee');
                return redirect("createemployee");

        }else{
            // return view('employee.form_cad_employee',["response" => "Dados incompletos!"]);
            return redirect("createemployee");
        }
    }


    public function update(Request $request)
    {

        if($request->id){

            $employee = Employee::where("id",$request->id)->first();
            
            if($employee){
                
                if($request->access_permission != 0){

                    $employee->access_permission = $request->access_permission;
                }

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

                    // return view('employee.employee',[
                    //     'response' => $this->returnSuccess("Dados atualizados com sucesso"),
                    //     'employee' => $employee
                    // ]);
                    return redirect('employee');                    

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
