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

        if($request->id_demand_reg){

            $call_demand  = CallDemand::where('id','=',$request->id_demand_reg)
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
    public function showDemands(Request $request)
    {
        $id_user_employee  = session('id_user');
        
        $dateAllocationFilter = (empty($request->date_demand_filter) != true ? $request->date_demand_filter : date('d/m/Y'));
        
        $calldemands = $this->listarChamadosDoDia($id_user_employee, $dateAllocationFilter);
        $lista_chamados_finalizados = $this->listarChamadosDoDiaFinalizados($id_user_employee, $dateAllocationFilter);
        
        
        
        /*
        $call_demands         = $this->listarChamadosDoDia($id_user_employee, $dateAllocationFilter);
        $dados_organizados    = array();
        foreach ($call_demands as $call_demand) { $dados_organizados[$call_demand->id_cliente] = null; }

        $chamado_indice_cliente = 0;
        $quantidade_cacamba = 0;
        $tipo_servico = '';
        $tipo_servico_compare = '';

        foreach ($call_demands as $call_demand) {
            if($call_demand->id_cliente == $chamado_indice_cliente)
            {
                if($call_demand->cacamba_colocacao == true){
                    $indice_servico = 0;
                    if($tipo_servico == $call_demand->tipo_servico)
                    {
                        $quantidade_cacamba += $call_demand->quantidade_cacamba;
                                    
                        $dados_organizados[$call_demand->id_cliente][$indice_servico] = array_replace(
                            $dados_organizados[$call_demand->id_cliente][$indice_servico], array('tipo_servico' => $call_demand->tipo_servico, 'quantidade_cacamba' => $quantidade_cacamba)
                        );

                        continue;

                    }else{
                        $tipo_servico = $call_demand->tipo_servico;
                        $quantidade_cacamba = 1;

                        $dados_organizados[$call_demand->id_cliente][$indice_servico] = array(
                            'id_ficha' => $call_demand->ficha,
                            'status_colocacao' => $call_demand->cacamba_colocacao,
                            'status_retirada' => $call_demand->cacamba_retirada,
                            'status_troca' => $call_demand->cacamba_troca,
                            'id_cliente' => $call_demand->id_cliente,
                            'tipo_servico' =>$call_demand->tipo_servico,
                            'periodo_dia' =>$call_demand->periodo_dia,
                            'endereco' =>$call_demand->endereco,
                            'numero_endereco' =>$call_demand->numero_endereco,
                            'cep_endereco' =>$call_demand->cep_endereco,
                            'bairro_endereco' =>$call_demand->bairro_endereco,
                            'cidade_endereco' =>$call_demand->cidade_endereco,
                            'quantidade_cacamba' => $call_demand->quantidade_cacamba,
                            'id_motorista' => $call_demand->id_motorista,
                            'data_operacao' => $call_demand->data_operacao
                        );

                        continue;
                    }
                    

                }
                if($call_demand->cacamba_retirada == true){
                    $indice_servico = 1;
                    if($tipo_servico == $call_demand->tipo_servico)
                    {
                        $quantidade_cacamba += $call_demand->quantidade_cacamba;
                                    
                        $dados_organizados[$call_demand->id_cliente][$indice_servico] = array_replace(
                            $dados_organizados[$call_demand->id_cliente][$indice_servico], array('tipo_servico' => $call_demand->tipo_servico, 'quantidade_cacamba' => $quantidade_cacamba)
                        );

                        continue;

                    }else{
                        $tipo_servico = $call_demand->tipo_servico;
                        $quantidade_cacamba = 1;


                        $dados_organizados[$call_demand->id_cliente][$indice_servico] = array(
                            'id_ficha' => $call_demand->ficha,
                            'status_colocacao' => $call_demand->cacamba_colocacao,
                            'status_retirada' => $call_demand->cacamba_retirada,
                            'status_troca' => $call_demand->cacamba_troca,
                            'id_cliente' => $call_demand->id_cliente,
                            'tipo_servico' =>$call_demand->tipo_servico,
                            'periodo_dia' =>$call_demand->periodo_dia,
                            'endereco' =>$call_demand->endereco,
                            'numero_endereco' =>$call_demand->numero_endereco,
                            'cep_endereco' =>$call_demand->cep_endereco,
                            'bairro_endereco' =>$call_demand->bairro_endereco,
                            'cidade_endereco' =>$call_demand->cidade_endereco,
                            'quantidade_cacamba' => $call_demand->quantidade_cacamba,
                            'id_motorista' => $call_demand->id_motorista,
                            'data_operacao' => $call_demand->data_operacao
                        );

                        continue;
                    }    

                }

                if($call_demand->cacamba_troca == true){
                    $indice_servico = 2;
                    if($tipo_servico == $call_demand->tipo_servico)
                    {
                        $quantidade_cacamba += $call_demand->quantidade_cacamba;
                                    
                        $dados_organizados[$call_demand->id_cliente][$indice_servico] = array_replace(
                            $dados_organizados[$call_demand->id_cliente][$indice_servico], array('tipo_servico' => $call_demand->tipo_servico, 'quantidade_cacamba' => $quantidade_cacamba)
                        );

                        continue;

                    }else{
                        $tipo_servico = $call_demand->tipo_servico;
                        $quantidade_cacamba = 1;

                        $dados_organizados[$call_demand->id_cliente][$indice_servico] = array(
                            'id_ficha' => $call_demand->ficha,
                            'status_colocacao' => $call_demand->cacamba_colocacao,
                            'status_retirada' => $call_demand->cacamba_retirada,
                            'status_troca' => $call_demand->cacamba_troca,            
                            'id_cliente' => $call_demand->id_cliente,
                            'tipo_servico' =>$call_demand->tipo_servico,
                            'periodo_dia' =>$call_demand->periodo_dia,
                            'endereco' =>$call_demand->endereco,
                            'numero_endereco' =>$call_demand->numero_endereco,
                            'cep_endereco' =>$call_demand->cep_endereco,
                            'bairro_endereco' =>$call_demand->bairro_endereco,
                            'cidade_endereco' =>$call_demand->cidade_endereco,
                            'quantidade_cacamba' => $call_demand->quantidade_cacamba,
                            'id_motorista' => $call_demand->id_motorista,
                            'data_operacao' => $call_demand->data_operacao
                        );        
                        continue;
                    }

                }

            }else{
                $chamado_indice_cliente = $call_demand->id_cliente;
                $tipo_servico           = $call_demand->tipo_servico;
                $quantidade_cacamba     = $call_demand->quantidade_cacamba;

                $dados_organizados[$call_demand->id_cliente][0] = array(
                    'id_ficha' => $call_demand->ficha,
                    'status_colocacao' => $call_demand->cacamba_colocacao,
                    'status_retirada' => $call_demand->cacamba_retirada,
                    'status_troca' => $call_demand->cacamba_troca,
                    'id_cliente' => $chamado_indice_cliente,
                    'tipo_servico' =>$tipo_servico,
                    'periodo_dia' =>$call_demand->periodo_dia,
                    'endereco' =>$call_demand->endereco,
                    'numero_endereco' =>$call_demand->numero_endereco,
                    'cep_endereco' =>$call_demand->cep_endereco,
                    'bairro_endereco' =>$call_demand->bairro_endereco,
                    'cidade_endereco' =>$call_demand->cidade_endereco,
                    'quantidade_cacamba' => $quantidade_cacamba,
                    'id_motorista' => $call_demand->id_motorista,
                    'data_operacao' => $call_demand->data_operacao
                );

                continue;
            }
        }
*/   

        $lista_chamados = array();
        $ficha = array();
        $status_servico = array();
        $chave_demanda = 0;
        $id_cliente = 0;
        $quantidade_cacamba = 0;
        $tipo_servico    = "";
        $endereco        = "";
        $numero_endereco = "";
        $bairro_endereco = "";
        $cep_endereco    = "";
        $cidade_endereco = "";

        foreach ($calldemands as $key => $chamado) {

            if(
                $chamado->id_cliente == $id_cliente
                && $chamado->tipo_servico == $tipo_servico 
                && $chamado->endereco == $endereco
                && $chamado->numero_endereco == $numero_endereco
                && $chamado->bairro_endereco == $bairro_endereco
                && $chamado->cep_endereco == $cep_endereco
                && $chamado->cidade_endereco == $cidade_endereco            
            ){
                $quantidade_cacamba += 1;
                $ficha[] = $chamado->ficha;
                $status_servico[] = $chamado->status_servico;
                
                $lista_chamados[$chave_demanda] = array_replace($lista_chamados[$chave_demanda], array(
                    'id_fichas'     => $ficha,
                    'id_motorista'  => $chamado->id_motorista,
                    'id_cliente'    => $id_cliente,
                    'tipo_servico'  => $tipo_servico,
                    'status_colocacao'=> $chamado->cacamba_colocacao,
                    'status_retirada' => $chamado->cacamba_retirada,
                    'status_troca'    => $chamado->cacamba_troca,
                    'endereco'        => $endereco,
                    'numero_endereco' => $numero_endereco,
                    'bairro_endereco' => $bairro_endereco,
                    'cep_endereco'    => $cep_endereco,
                    'cidade_endereco' => $cidade_endereco,
                    'quantidade_cacamba' => $quantidade_cacamba,
                    'status_servico'  => $status_servico
                ));


            }else{

                $ficha = array();
                $status_servico = array();
                $ficha[] = $chamado->ficha;
                $status_servico[] = $chamado->status_servico;

                $id_cliente      = $chamado->id_cliente;
                $tipo_servico    = $chamado->tipo_servico;
                $endereco        = $chamado->endereco;
                $numero_endereco = $chamado->numero_endereco;
                $bairro_endereco = $chamado->bairro_endereco;
                $cep_endereco    = $chamado->cep_endereco;
                $cidade_endereco = $chamado->cidade_endereco;
                $quantidade_cacamba = 1;
                $chave_demanda = $key;
                

                $lista_chamados[$key] = array(
                    'id_fichas' => $ficha,
                    'id_motorista'  => $chamado->id_motorista,
                    'id_cliente' => $id_cliente,
                    'tipo_servico' => $tipo_servico,
                    'status_colocacao'=> $chamado->cacamba_colocacao,
                    'status_retirada' => $chamado->cacamba_retirada,
                    'status_troca'    => $chamado->cacamba_troca,
                    'endereco'        => $endereco,
                    'numero_endereco' => $numero_endereco,
                    'bairro_endereco' => $bairro_endereco,
                    'cep_endereco'    => $cep_endereco,
                    'cidade_endereco' => $cidade_endereco,
                    'quantidade_cacamba' => $quantidade_cacamba,
                    'status_servico'  => $status_servico
                );
            }
        }

        if($request->get_data == true){

            return $lista_chamados;
        }

        return view('driver.list_demand_driver',[
            'lista_chamados'=> $lista_chamados,
            'lista_chamados_finalizados'=> $lista_chamados_finalizados
        ]);
    }

    

    public function showDemandFilter(Request $request)
    {
        $id_user_employee  = session('id_user');
        $call_demands      = $this->showDemandsClient($id_user_employee, $request->data_alocacao);

        return $call_demands;
    }    
/*
    public function showDemandsClient($id_employee, $date_demand_filter)
    {
        $dateAllocationFilter = (empty($date_demand_filter) != true ? $date_demand_filter : date('d/m/Y'));
        $get_id_driver  = Driver::select()->where("id_employee", $id_employee)->first();
        $service_status = 5; // FINALIZADOS

        $calldemands = DB::table('call_demand')
        ->select(
            'call_demand.id as id_demand_reg',
            'call_demand.id_demand as id_demand',
            'call_demand.type_service  as type_service',
            'call_demand.dumpster_allocation',
            'call_demand.dumpster_replacement',
            'call_demand.dumpster_removal',
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
        // ->where('call_demand.service_status','<>',$service_status)
        ->where(DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y")'), $dateAllocationFilter)
        ->orderBy('call_demand.id_demand', 'asc')
        ->orderBy('call_demand.type_service', 'desc')
        ->get();

        return $calldemands;
    }
*/

    public function listarChamadosDoDia($id_employee, $dateAllocationFilter)
    {
        // $dateAllocationFilter = (empty($date_demand_filter) != true ? $date_demand_filter : date('d/m/Y'));
        $get_id_driver  = Driver::select()->where("id_employee", $id_employee)->first();
        $service_status = 5; // FINALIZADOS

        $calldemands = DB::table('call_demand')
        ->select(
            'call_demand.id as ficha',
            'call_demand.service_status as status_servico',
            'call_demand.id_demand as id_chamado',
            'call_demand.id_client as id_cliente',
            'call_demand.type_service  as tipo_servico',
            'call_demand.dumpster_allocation  as cacamba_colocacao',
            'call_demand.dumpster_replacement  as cacamba_troca',
            'call_demand.dumpster_removal  as cacamba_retirada',
            'call_demand.address as endereco',
            'call_demand.period as periodo_dia',
            'call_demand.address as endereco',
            'call_demand.number as numero_endereco',
            'call_demand.zipcode as cep_endereco',
            'call_demand.district as bairro_endereco',
            'call_demand.city as cidade_endereco',
            'call_demand.id_driver as id_motorista',
            DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y") as data_operacao'),
            DB::raw('COUNT(*) as quantidade_cacamba')
        )
        ->where('call_demand.service_status', 0)
        ->where('call_demand.id_driver', $get_id_driver['id'])
        ->where(DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y")'), $dateAllocationFilter)
        ->groupBy(
            'call_demand.id',
            'call_demand.id_demand',
            'call_demand.period',
            'call_demand.address',
            'call_demand.number',
            'call_demand.zipcode',
            'call_demand.district',
            'call_demand.city',
            'call_demand.id_driver',
            'call_demand.date_allocation_dumpster',

        )
        ->orderBy('call_demand.id_client', 'asc')
        ->orderBy('call_demand.address', 'asc')
        ->orderBy('call_demand.type_service', 'asc')
        ->get();

        return $calldemands;
    }

    public function listarChamadosDoDiaFinalizados($id_employee, $dateAllocationFilter){

        $get_id_driver  = Driver::select()->where("id_employee", $id_employee)->first();

        $calldemands = DB::table('call_demand')
        ->select(
            'call_demand.id as ficha',
            'call_demand.service_status as status_servico',
            'call_demand.id_demand as id_chamado',
            'call_demand.id_client as id_cliente',
            'call_demand.type_service  as tipo_servico',
            'call_demand.dumpster_allocation  as cacamba_colocacao',
            'call_demand.dumpster_replacement  as cacamba_troca',
            'call_demand.dumpster_removal  as cacamba_retirada',
            'call_demand.address as endereco',
            'call_demand.period as periodo_dia',
            'call_demand.address as endereco',
            'call_demand.number as numero_endereco',
            'call_demand.zipcode as cep_endereco',
            'call_demand.district as bairro_endereco',
            'call_demand.city as cidade_endereco',
            'call_demand.id_driver as id_motorista',
            DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y") as data_operacao'),
            DB::raw('COUNT(*) as quantidade_cacamba')
        )
        ->where('call_demand.service_status', 5)
        ->where('call_demand.id_driver', $get_id_driver['id'])
        ->where(DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y")'), $dateAllocationFilter)
        ->groupBy(
            'call_demand.id',
            'call_demand.id_demand',
            'call_demand.period',
            'call_demand.address',
            'call_demand.number',
            'call_demand.zipcode',
            'call_demand.district',
            'call_demand.city',
            'call_demand.id_driver',
            'call_demand.date_allocation_dumpster',

        )
        ->orderBy('call_demand.id_client', 'asc')
        ->orderBy('call_demand.address', 'asc')
        ->orderBy('call_demand.type_service', 'asc')
        ->get();

        return $calldemands;
    }

    public function buscarDetahesPedidoSelecionados(Request $request)
    {

        $status_retirada    = $request->status_retirada === "true" ? 1 : 0;
        $status_colocacao   = $request->status_colocacao === "true" ? 1 : 0;
        $status_troca       = $request->status_troca === "true" ? 1 : 0;


        $calldemands = DB::table('call_demand')
        ->select(
            'call_demand.id as id_ficha',
            'call_demand.id_demand as id_chamado',
            'call_demand.name as nome_cliente',
            'call_demand.type_service  as tipo_servico',
            'call_demand.dumpster_allocation as colocacao',
            'call_demand.dumpster_replacement as troca',
            'call_demand.dumpster_removal as remocao',
            'call_demand.period as periodo_dia',
            'call_demand.id_driver as id_motorista',
            'call_demand.dumpster_number as numero_cacamba',
            'call_demand.dumpster_number_substitute as numero_cacamba_substituto',
            'call_demand.comments as observacao_operacao',
            'call_demand.id_landfill as id_aterro',
            'call_demand.service_status as status_atendimento'
        )
        ->where('call_demand.id', $request->id_ficha)
        // ->where('call_demand.id_client', $request->id_cliente_chamado)
        // ->where('call_demand.id_driver', $request->idmotorista)
        ->where('call_demand.dumpster_allocation', $status_colocacao)
        ->where('call_demand.dumpster_replacement', $status_troca)
        ->where('call_demand.dumpster_removal', $status_retirada)

        // ->where(DB::raw('DATE_FORMAT(call_demand.date_allocation_dumpster, "%d/%m/%Y")'), $request->dataalocacao)

        ->get();
   
        return $calldemands;

    }

    /**
     * Iniciar operação do motorista
     */
    public function startDemand(Request $request)
    {
        $numeroCacamba    = 0;
        $id_user_employee = session('id_user');
        $driver_data      = Driver::where('id_employee',$id_user_employee)->first();
        
        $callDemand  = CallDemand::select('id_parent')->where('id', $request->id_demand_reg)
        ->where('id_demand', $request->id_demand)
        ->where('type_service', $request->type_service)->first();

        // if($callDemand->id_parent != 0 && trim($request->type_service) != 'TROCA'){
        if($callDemand->id_parent != 0){

            // ATUALIZA ATERRO DE COLOCAÇÃO SE FINALIZAR TROCA
            // ATUALIZA ATERRO DE TROCA QUANDO FINALIZA TROCA OU RETIRADA            
            $updated_landfill_parent = CallDemand::where('id', $callDemand->id_parent)
            ->update([
                'id_landfill' => $request->id_landfill,
                'service_status' => $request->service_status,
            ]);
            if(!$updated_landfill_parent){
                return false;
            }
        }

        // ATUALIZA CAÇAMBA
        if(trim($request->type_service) == 'COLOCACAO' || trim($request->type_service) == 'TROCA'){

            $numeroCacamba = (trim($request->type_service) == 'COLOCACAO') ? $request->dumpster_numbers : $request->dumpster_number_sub;

            // ATUALIZA RETIRADA/TROCA PENDENTE
            $get_dumspter_removal = CallDemand::select('id')
            ->where('id_parent', $request->id_demand_reg)
            ->where(function($query){
                $query->where('dumpster_replacement', true)
                ->orWhere('dumpster_removal', true);
            })->where('service_status', 0)->first();

            if($get_dumspter_removal){

                $updated_dumpster_removal = CallDemand::where('id', $get_dumspter_removal->id)
                ->update([
                    'dumpster_number' => $numeroCacamba,
                ]);

                if(!$updated_dumpster_removal){
                    return false;
                }
            }
        }

        // FINALIZA ATENDIMENTO
        $call_demand_updated_data = CallDemand::where('id', $request->id_demand_reg)
        ->where('id_demand', $request->id_demand)
        ->where('type_service', $request->type_service)
        ->where('id_driver','=', $driver_data->id)
        ->update([
            'service_status' => $request->service_status,
            'date_start' => date('Y-m-d H:i:s'),
            'dumpster_number' => $request->dumpster_numbers,
            'dumpster_number_substitute' => isset($request->dumpster_number_sub) ? $request->dumpster_number_sub : 0,
            'id_landfill' => $request->id_landfill
        ]);

        if($call_demand_updated_data){
                
            $activityUserDemandDumpster = new ActivityUserDemandDumpster();
            $activityUserDemandDumpster->id_call_demand_reg = $request->id_demand_reg;
            $activityUserDemandDumpster->id_call_demand     = $request->id_demand;
            $activityUserDemandDumpster->id_employee        = $id_user_employee;
            $activityUserDemandDumpster->type_service       = $request->type_service;
            $activityUserDemandDumpster->service_status     = $request->service_status; // STATUS  CHAMADO

            if($activityUserDemandDumpster->save()){
                return true;
    
            }else{
                return false;
            }               
        }else{
            return false;
        }
        
    }

    public function finishDemand(Request $request)
    {

        $id_employee    = session('id_user');
        $service_status = 5;

        $recordCallDemand = CallDemand::find($request->id_call_demand_reg);

        if($recordCallDemand)
        {
            $recordCallDemand->service_status = $service_status;
            
            if(isset($request->dumpster_number)){
                $recordCallDemand->dumpster_number = $request->dumpster_number;
            }

            if(isset($request->dumpster_number_substitute)){
                $recordCallDemand->dumpster_number_substitute = $request->dumpster_number_substitute;
            }

            if(isset($request->id_driver)){
                $recordCallDemand->id_driver = $request->id_driver;
            }

            if(isset($request->id_landfill)){
                $recordCallDemand->id_landfill = $request->id_landfill;
            }

            if($recordCallDemand->save()){

                $recordId = $recordCallDemand->id;
                $recordIdDemand    = $recordCallDemand->id_demand;
                $recordTypeDervice = $recordCallDemand->type_service;

                $activityUserDemandDumpster = new ActivityUserDemandDumpster();
                $activityUserDemandDumpster->id_call_demand_reg = $recordId;
                $activityUserDemandDumpster->id_call_demand     = $recordIdDemand;
                $activityUserDemandDumpster->id_employee        = $id_employee;
                $activityUserDemandDumpster->type_service       = $recordTypeDervice;
                $activityUserDemandDumpster->service_status     = $service_status; // ENCERRAR CHAMADO

                if($activityUserDemandDumpster->save()){
                    return true;

                }else{
                    return false;
                }
            } else
                return false;

        } else
            return true;

    }

    public function getDumpsterDemand(Request $request)
    {
        $id_user_employee  = session('id_user');
        $driver       = Driver::select()->where("id_employee", $id_user_employee)->first();

        $callDemand   = CallDemand::where('id_demand', $request->id_demand)
        ->where('id_driver', $driver->id)
        ->get(["id", 
               "service_status", 
               "type_service", 
               "dumpster_number", 
               "id_landfill",
               "dumpster_allocation",
               "dumpster_replacement",
               "dumpster_removal"
            ]);
        
        return $callDemand;
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
