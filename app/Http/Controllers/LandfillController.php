<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Landfill;


class LandfillController extends Controller
{
    public function show(Request $request)
    {

        if(isset($request->id)){

            $landfill = Landfill::where('id',$request->id)->orderBy('id','DESC')->first();

            if(isset($landfill)){
                

                return view('landfill.landfill',['landfill' => $landfill]);

            }else{

                return view('landfill.landfill',['landfill','']);
            }

        }else{
            
            $landfills = Landfill::all();
            
            if(isset($landfills)){
                return view('landfill.form_list_landfill',['landfills'=> $landfills]);
            }
        }
    }

    public function store(Request $request)
    {
        if(isset($request->name)
        && isset($request->email)
        && isset($request->phone)
        && isset($request->cpf_cnpj)
        && isset($request->address)
        && isset($request->number)
        && isset($request->zipcode)
        && isset($request->district)
        && isset($request->city)
        && isset($request->state)
        ){
            $landfill = new Landfill();
            $landfill->name = $request->name;
            $landfill->email = $request->email;
            $landfill->phone = $request->phone;
            $landfill->cpf_cnpj = $request->cpf_cnpj;
            $landfill->address = $request->address;
            $landfill->number = $request->number;
            $landfill->zipcode = $request->zipcode;
            $landfill->district = $request->district;
            $landfill->city = $request->city;
            $landfill->state = $request->state;


            if($landfill->save()){

                return redirect('createlandfill');
            }

        
        }else{

            return redirect('/createlandfill');
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
