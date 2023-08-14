<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\CallDemand;
use App\Models\PaymentCallDemand;


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


// Verifica se existe chamados em aberto de um cliente em específico
public function checkDemandOpendClient(Request $request):bool
{

    $call_demand = CallDemand::find($request->id);

    
    if(isset($call_demand)){
        return true;
    }else
        return false;
}

// Exibe informações sobre o cliente
public function showInfoClient(Request $request)
{
    
    $client = Client::where('id',$request->id)->first();

    if(isset($client)){
        return $client;
    }else{
        return [];
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

                // return view('client.form_cad_client',["response" => "Dados cadastrados com sucesso"]);
                return redirect('client');
            }

            return view('client.form_cad_client',["response" => "Erro ao cadastrar o cliente"]);

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

                // return view('client.client',[
                //     'response' => $this->returnSuccess("Dados atualizados com sucesso"),
                //     'client' => $client
                // ]);

                return redirect('client/'.$request->id);

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


public function exibirFormCadastroBasico()
{
    return view('client.form_cad_call_demand_cliente');
}


public function saveDataDemandClient(Request $request)
{
    if(isset($request->client_name_new)
    && isset($request->type_service)
    && isset($request->address)
    && isset($request->number)
    && isset($request->zipcode)
    && isset($request->city)
    && isset($request->district)
    && isset($request->state)
    && isset($request->phone)
    && isset($request->period)
    && isset($request->date_allocation_dumpster)
    && isset($request->date_removal_dumpster)
    && isset($request->dumpster_quantity)
    && isset($request->total_days)
    ){
/*
        $verificaPedidoRelacionado = CallDemand::where('zipcode', '=', $request->zipcode)
            ->where('address', '=', $request->address)
            ->where('number', '=', $request->number)
            ->where('id_parent', '=', 0)
            ->whereNull('date_effective_removal_dumpster')->first();

        $calldemand = new CallDemand();
        $calldemand->name          = $request->client_name_new;
        $calldemand->id_parent     = isset($verificaPedidoRelacionado) ? $verificaPedidoRelacionado->id : 0;
        $calldemand->type_service  = $request->type_service;
        $calldemand->address       = $request->address;
        $calldemand->number        = $request->number;
        $calldemand->zipcode       = $request->zipcode;
        $calldemand->city          = $request->city;
        $calldemand->district      = $request->district;
        $calldemand->state         = $request->state;
        $calldemand->comments      = $request->comments;
        $calldemand->phone         = $request->phone;
        $calldemand->price_unit    = 0.00;
        $calldemand->id_driver     = 0;
        $calldemand->period        = $request->period;
        $calldemand->dumpster_quantity = $request->dumpster_quantity;
        $calldemand->dumpster_number = 0;
        $calldemand->days_allocation = $request->total_days;
        
        $calldemand->date_allocation_dumpster           = (isset($request->date_allocation_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_allocation_dumpster))) : '');
        $calldemand->date_removal_dumpster_forecast     = (isset($request->date_removal_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_removal_dumpster))) : '');

        if($calldemand->save()){

            return redirect('/new_demand_client')->with($this->returnSuccess('Salvo com sucesso'));
            
        }

        return redirect('/new_demand_client')->with($this->returnError('Erro ao cadastrar'));
*/

        $verificaPedidoRelacionado = CallDemand::where('zipcode', '=', $request->zipcode)
        ->where('address', '=', $request->address)
        ->where('number', '=', $request->number)
        ->where('id_parent', '=', 0)
        ->whereNull('date_effective_removal_dumpster')->first();

        $lastIdDemand = isset(CallDemand::orderBy('id', 'desc')->first()->id) ? (CallDemand::orderBy('id', 'desc')->first()->id + 1) : 1 ;
                    
        for($repeatInfo = 0; $repeatInfo < $request->dumpster_quantity; $repeatInfo ++){

            $calldemand = new CallDemand();
            $calldemand->id_demand      = $lastIdDemand;
            $calldemand->type_service   = $request->type_service;
            $calldemand->period         = $request->period;
            $calldemand->date_allocation_dumpster       = (isset($request->date_allocation_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_allocation_dumpster))) : '');
            $calldemand->date_removal_dumpster_forecast = (isset($request->date_removal_dumpster) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->date_removal_dumpster))) : '');
            $calldemand->id_parent  = isset($verificaPedidoRelacionado) ? $verificaPedidoRelacionado->id : 0;
            $calldemand->name       = $request->client_name_new;
            $calldemand->address    = $request->address;
            $calldemand->number     = $request->number;
            $calldemand->zipcode    = $request->zipcode;
            $calldemand->city       = $request->city;
            $calldemand->district   = $request->district;
            $calldemand->state      = $request->state;
            $calldemand->phone      = str_replace([" ","(",")"],"",$request->phone);
            $calldemand->price_unit = 0.00;
            $calldemand->comments   = $request->comments;
            $calldemand->dumpster_sequence_demand = $repeatInfo + 1;
            $calldemand->dumpster_quantity  = $request->dumpster_quantity;
            $calldemand->days_allocation    = $request->total_days;
            $calldemand->id_driver  = 0;
            $calldemand->save();

            if(!$calldemand->save())
                return back()->withErrors(['response' => "Erro ao cadastrar demanda"]);


            $paymentCallDemand = new PaymentCallDemand();
            $paymentCallDemand->id_call_demand_reg = $calldemand->id;
            $paymentCallDemand->id_call_demand = $lastIdDemand;

            if(!$paymentCallDemand->save())
                return back()->withErrors(['response' => "Erro ao registrar ids de pagamento"]);            
        }

        return redirect('/new_demand_client')->with($this->returnSuccess('Salvo com sucesso'));

    }else{

        return redirect('/new_demand_client')->with($this->returnError('Dados incompletos'));
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
