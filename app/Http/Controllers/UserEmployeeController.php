<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controllers;
use \Session as Session;
use App\Models\Employee;

class UserEmployeeController extends Controller
{

    public function show(Request $request)
    {
/*
        if(isset($request->id)){

            $usuario = Usuario::where('id',$request->id)->orderBy('id','DESC')->where('removido',0)->first();

            if(isset($usuario)){

                return view('usuario.usuario',['usuario' => $usuario]);

            }else{

                return view('usuario.usuarios',['response','Vazio']);
            }

        }else{

            $usuarios = Usuario::all();
                
            if(isset($usuarios)){

                return view('usuario.usuarios',['usuarios' =>$usuarios]);

                
            }
        }

        return view('usuario.usuarios',['response','Vazio']);
*/        
    }

    public function conectLogin(Request $request)
    {

        $removedUser = null;

        if(filter_var($request->login, FILTER_VALIDATE_EMAIL)){

            $removedUser = Employee::where("login","=",$request->login)
                                ->where("flg_status","=",0)->first();
        }else{

            $removedUser = Employee::where("login","=",$request->login)
                                ->where("flg_status","=",0)->first();
        }

        if($removedUser){

            return view('user.login',["response" => "Usuário se encontra inativo"]);
        }

        $login   = $request->login;
        $password   = Hash::make($request->password);
        
        $LoginUser = Employee::where("login","=",$login)
                    ->orWhere("email","=",$login)
                    ->first();

        if($LoginUser){

            if(Hash::check($request->password,$LoginUser->password) == true){
                
                session(['id_user' => $LoginUser->id,
                        'access_permission' => $LoginUser->access_permission,
                        'name' => $LoginUser->name,
                        'surname' => $LoginUser->surname,
                        'login' => $LoginUser->login,
                        'email' => $LoginUser->email]);
                
                // return redirect('/lista_todas_categorias_edit');
                return redirect('/');

            }else
                return view('user.login',["response" => "Senha incorreta"]);


        }else{


            return view('user.login',["response" => "Login inválido, verifique login e senha"]);
        }
    }

    public function logoutAccount()
    {
        session::flush();
        return redirect('/login');
    }

    public function store(Request $request)
    {

        if(isset($request->name) 
            && isset($request->surname) 
            && isset($request->login) 
            && isset($request->email) 
            && isset($request->password)
            && isset($request->access_permission)
        ){

            if($request->password == $request->repeat_password)
            {
                $employee = Employee::where("name","=",$request->name)
                            ->where("surname","=",$request->surname)
                            ->where("login","=", $request->login)
                            ->where("email","=", $request->email)->first();
                   

                if($employee){
                    // return $this->returnError('Você já possui um cadastro');    
                    return "Você já possui um cadastro";
                
                }else{

                    $employee = new Employee();
                    $employee->name = $request->name;
                    $employee->surname = $request->surname;
                    $employee->email = $request->email;
                    $employee->login = $request->login;
                    $employee->access_permission = $request->access_permission;
                    $employee->password = Hash::make($request->password);
            
                    if(!$employee->save()){
                        // return view('user.form_cad_perfil',["response" => "Dados cadastrados com sucesso"]);
                        // return view('user.login',["response" => "Dados cadastrados com sucesso"]);
                        return redirect('page-administrator');
                    }
            
                    return view('user.login',["response" => "Dados cadastrados com sucesso"]);
                }
            }
        }else{
            return view('user.form_cad_perfil',["response" => "Dados incompletos!"]);
        }
 
    }

    public function generateLogin(Request $request)
    {
        $number_login = rand(0,1000);
        $login = explode("@",$request->email);
        return $login[0].$number_login;        
    }

    public function update(Request $request)
    {

        if($request->id){

            $employee = Employee::where("id",$request->id)->first();
            
            if($employee){

                $employee = Employee::find($request->id);
                $employee->name  = $request->name;
                $employee->surname     = $request->surname;
                $employee->email         = $request->email;
                $employee->login         = $request->login;
                $employee->password         = Hash::make($request->password);
        
                if($employee->update()){

                    return $this->returnSuccess("Dados atualizados com sucesso",200);
                
                }else{
                    return $this->returnError('Erro ao atualizar os dados do usuário',500); 
                }

            }else{
                return $this->returnError('Usuário não encontrado',404); 

            }

        }else{
            return $this->returnError('Usuário não encontrado',404); 
        }
    }

    public function destroy(Request $request)
    {


        if(isset($request->id) && isset($request->email) && isset($request->password)){
            
            $employee = Employee::where("id",$request->id)->first();
            
            if($employee){

                $employee = Employee::where('id',$request->id)->where('email',$request->email)->update(['removido' => true]);

                if($employee){

                    return $this->returnSuccess("Usuário removido com sucesso");
                
                }else{
                    return $this->returnError('Erro ao remover usuário',500); 
                }

            }else{
                return $this->returnError('Usuário não encontrado',404); 

            }

        }else{
            return $this->returnError('Usuário não encontrado',404); 
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
        // return Response::json(['code' => $status, 'status' => 'error', 'data' => $retorno], $status);

    }
}