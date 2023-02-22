<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

use App\Models\Client;


class ClientController extends Controller
{

public function show(Request $request)
{

    if(isset($request->id)){


        $client = Client::where('id',$request->id)->orderBy('id','DESC')->first();

        if(isset($client)){
            

            return view('client.client',['client' => $client]);

        }else{


            return view('client.client',['client','']);
        }

    }else{
        
        $clients = Client::all();
        
        if(isset($clients)){
            return view('client.list_client',['clients'=> $clients]);
        }
    }
}

public function store(Request $request)
{

    if(isset($request->name)
    && isset($request->surname)
    && isset($request->email)
    && isset($request->phone)
    && isset($request->cpf_cnpj)
    && isset($request->address)
    && isset($request->number)
    && isset($request->zipcode)
    && isset($request->district)
    && isset($request->state)
    && isset($request->city)
    ){

        $client = new Client();
            $client->name       = $request->name;
            $client->surname    = $request->surname;
            $client->email      = $request->email;
            $client->phone      = $request->phone;
            $client->cpf_cnpj   = $request->cpf_cnpj;
            $client->address    = $request->address;
            $client->number     = $request->number;
            $client->zipcode    = $request->zipcode;
            $client->district   = $request->district;
            $client->state      = $request->state;
            $client->city       = $request->city;
            $client->state      = $request->state;


            if($client->save()){

                return view('client.form_cad_client',["response" => "Dados cadastrados com sucesso"]);
            }

            return view('client.form_cad_client',["response" => "Erro ao cadastrar o cliente"]);

        // }

    }else{
        dd('Dados incompletos!');

        return view('client.form_cad_client',["response" => "Dados incompletos!"]);
    }

}

public function update(Request $request)
{

    if($request->id){

        $client = Client::where("id",$request->id)->first();
        
        if($client){

            $client = Client::find($request->id);
            $client->name       = $request->name;
            $client->surname    = $request->surname;
            $client->email      = $request->email;
            $client->phone      = $request->phone;
            $client->cpf_cnpj   = $request->cpf_cnpj;
            $client->address    = $request->address;
            $client->number     = $request->number;
            $client->zipcode    = $request->zipcode;
            $client->district   = $request->district;
            $client->state      = $request->state;
            $client->city       = $request->city;
            $client->state      = $request->state;            
            


            if($client->update()){

                return view('client.client',[
                    'response' => $this->returnSuccess("Dados atualizados com sucesso"),
                    'client' => $client
                ]);

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


    if(isset($request->id) && isset($request->email) && isset($request->cpf_cnpj)){
        
        $client = Client::where("id",$request->id)->first();
        
        if($client){

            $client = Client::where('id',$request->id)->where('email',$request->email)->update(['flg_status' => false]);

            if($client){

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
