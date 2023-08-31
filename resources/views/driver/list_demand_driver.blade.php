
<?php 
// echo '<pre>';
// print_r($lista_chamados_finalizados);
// echo '</pre>';
// die();

// echo '<pre>';
// print_r($lista_chamados);
// echo '</pre>';
// die();

// foreach ($lista_chamados as $key => $lista_chamado) {
//     echo '<pre>';
//     print_r($lista_chamado['status_servico']);
//     echo '</pre>';
//     continue;
// }


// foreach($lista_chamados_finalizados as $id_cliente => $chamado_finalizado){


// echo "tipo_servico: ".$chamado_finalizado->tipo_servico.
// "<BR/>endereco: ".$chamado_finalizado->endereco.
// "<BR/>numero_endereco: ".$chamado_finalizado->numero_endereco.
// "<BR/>bairro_endereco: ".$chamado_finalizado->bairro_endereco.
// "<BR/>cidade_endereco: ".$chamado_finalizado->cidade_endereco.
// "<BR/>cep_endereco: ".$chamado_finalizado->cep_endereco.
// "<BR/>cacamba_colocacao: ".$chamado_finalizado->cacamba_colocacao.
// "<BR/>cacamba_retirada: ".$chamado_finalizado->cacamba_retirada.
// "<BR/>cacamba_troca: ".$chamado_finalizado->cacamba_troca.
// "<BR/>ficha: ".$chamado_finalizado->ficha.
// "<BR/>id_cliente: ".$chamado_finalizado->id_cliente.
// "<BR />***************<BR />";
// continue;
// }

// die();
?>
@include('partials.header_mobile')
@include('partials.nav_mobile')


    <!-- BEGIN: Content-->
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper container-xxl p-0">

            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="body-content-overlay"></div>
                        <div class="todo-app-list">

                            <div class="app-fixed-search d-flex align-items-center">
                                <div class="d-flex align-content-center justify-content-between w-100">
                                    <div class="input-group input-group-merge">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control border border-secondary dt-date flatpickr-range dt-input date_format_service_search" id="data_filter_demand" data-column="5" placeholder="Selecione a Data" data-column-index="4" name="dt_date" readonly="readonly">
                                        </div>
                                        <div class="col-md-12">
{{-- 
                                            <select class="select2 form-control" id="filter_tipo_servico" name="filter_tipo_servico">
                                                <option value="" selected>
                                                    Tipo de Serviço
                                                </option>
                                                <option value="1">
                                                    Colocação
                                                </option>
                                                <option value="2">
                                                    Troca
                                                </option>
                                                <option value="3">
                                                    Retirada
                                                </option>                                            
                                            </select>    --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Todo search ends -->

                            <div class="bd-example bd-example-tabs">
                                <ul class="nav nav-pills mb-3 ul-list" id="pills-tab" role="tablist">
                                  <li class="nav-item li-item">
                                    <a class="nav-link active show" id="principal-tab" data-toggle="pill" href="#principal" role="tab" aria-controls="principal" aria-selected="true">PRINCIPAL</a>
                                  </li>
                                  <li class="nav-item li-item">
                                    <a class="nav-link btn" id="pedidos-finalizados-tab" data-toggle="pill" href="#pedidos-finalizados" role="tab" aria-controls="pedidos-finalizados" aria-selected="false">FINALIZADOS</a>
                                  </li>

                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                  <div class="tab-pane fade active show" id="principal" role="tabpanel" aria-labelledby="principal-tab">
                                    <div class="todo-task-list-wrapper list-group" style="  max-height: 500px;overflow-y: auto;">
                                        <ul class="todo-task-list media-list" id="todo-task-list">
                                            <?php if(is_array($lista_chamados)): ?>
        
                                                <?php foreach($lista_chamados as $id_cliente => $chamado_info): ?>
                                                
        
                                                    <li class="todo-item my-2 border">
                                                        <div class="todo-title-wrapper">
                                                            <div class="todo-title-area prevent-select">
                                                                <i data-feather="more-vertical" class="drag-icon"></i>
        
                                                                <div>
                                                                        <h3 class="bg-dark text-white todo-title">{{ $chamado_info['tipo_servico'] }} ({{$chamado_info['quantidade_cacamba']}})</h3>
                                                                        
                                                                        <h4 class="text-dark todo-title-address">
                                                                            {{ $chamado_info['endereco'].', '
                                                                        .$chamado_info['numero_endereco'].', '
                                                                        .$chamado_info['bairro_endereco'].', '
                                                                        .$chamado_info['cidade_endereco'].' - '
                                                                        .$chamado_info['cep_endereco']
                                                                        }}
                                                                        </h4>
                                                                        
                                                                        <label class="text-nowrap text-muted mr-1 todo-status-colocacao" style="display: none;">{{ $chamado_info['status_colocacao'] }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-status-retirada" style="display: none;">{{ $chamado_info['status_retirada'] }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-status-troca" style="display: none;">{{ $chamado_info['status_troca'] }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-id-ficha" style="display: none;">{{ implode("|",$chamado_info['id_fichas']) }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-id-client-demand" style="display: none;">{{ $chamado_info['id_cliente'] }}</label> 
        
        
                                                                        {{-- <label class="text-nowrap text-muted mr-1 todo-id-driver" style="display: none;">{{ $chamado_info['id_motorista'] }}</label> --}}
                                                                        {{-- <label class="text-nowrap text-muted mr-1 todo-data-alocacao" style="display: none;">{{ $chamado_info['data_operacao'] }}</label> --}}
                                                                        
                                                                        <label class="text-nowrap text-muted mr-1 todo-url-show-details_demand" style="display: none;">{{ url('get_details_demand') }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-url-list-landfill" style="display: none;">{{ url('listlandfill') }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-url-check-dumpster" style="display: none;">{{ url('available_dumpster') }}</label>
        
                                                                </div>
                                                            </div>
        
                                                        </div>
                                                    </li>
                                                
                                                <?php endforeach; ?>
        
        
                                            <?php else: ?>
                                        </ul>
                                        <div class="no-results">
                                            <h5>Sem item disponível</h5>
                                        </div>
                                        <?php endif; ?>  
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="pedidos-finalizados" role="tabpanel" aria-labelledby="pedidos-finalizados-tab">
                                    <div class="todo-task-list-wrapper list-group" style="  max-height: 500px;overflow-y: auto;">
                                        <ul class="todo-task-list media-list" id="todo-task-list">
                                            <?php if(is_array($lista_chamados)): ?>
        
                                                <?php foreach($lista_chamados_finalizados as $id_cliente => $chamado_finalizado): ?>
        
                                                    <li class="todo-item my-2 border">
                                                        <div class="todo-title-wrapper">
                                                            <div class="todo-title-area prevent-select">
                                                                <i data-feather="more-vertical" class="drag-icon"></i>
        
                                                                <div>
                                                                        <h3 class="bg-dark text-white todo-title">{{ $chamado_finalizado->tipo_servico }}</h3>
                                                                        
                                                                        <h4 class="text-dark todo-title-address">
                                                                            {{ $chamado_finalizado->endereco.', '
                                                                        .$chamado_finalizado->numero_endereco.', '
                                                                        .$chamado_finalizado->bairro_endereco.', '
                                                                        .$chamado_finalizado->cidade_endereco.' - '
                                                                        .$chamado_finalizado->cep_endereco
                                                                        }}
                                                                        </h4>
                                                                        
                                                                        <label class="text-nowrap text-muted mr-1 todo-status-colocacao" style="display: none;">{{ $chamado_finalizado->cacamba_colocacao }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-status-retirada" style="display: none;">{{ $chamado_finalizado->cacamba_retirada }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-status-troca" style="display: none;">{{ $chamado_finalizado->cacamba_troca }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-id-ficha" style="display: none;">{{ $chamado_finalizado->ficha }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-id-client-demand" style="display: none;">{{ $chamado_finalizado->id_cliente }}</label> 
        

                                                                        <label class="text-nowrap text-muted mr-1 todo-url-show-details_demand" style="display: none;">{{ url('get_details_demand') }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-url-list-landfill" style="display: none;">{{ url('listlandfill') }}</label>
                                                                        <label class="text-nowrap text-muted mr-1 todo-url-check-dumpster" style="display: none;">{{ url('available_dumpster') }}</label>
        
                                                                </div>
                                                            </div>
        
                                                        </div>
                                                    </li>
                                                
                                                <?php endforeach; ?>
        
        
                                            <?php else: ?>
                                        </ul>
                                        <div class="no-results">
                                            <h5>Sem item disponível</h5>
                                        </div>
                                        <?php endif; ?>  
                                    </div>


                                  </div>
                                </div>
                            </div>




                            <!-- Todo List starts -->
                            {{-- 
                            <div class="todo-task-list-wrapper list-group">
                                <ul class="todo-task-list media-list" id="todo-task-list">
                                    <?php if(is_array($lista_chamados)): ?>

                                        <?php foreach($lista_chamados as $id_cliente => $chamado_info): ?>
                                        

                                            <li class="todo-item my-2 border">
                                                <div class="todo-title-wrapper">
                                                    <div class="todo-title-area prevent-select">
                                                        <i data-feather="more-vertical" class="drag-icon"></i>

                                                        <div>
                                                                <h3 class="bg-dark text-white todo-title">{{ $chamado_info['tipo_servico'] }} ({{$chamado_info['quantidade_cacamba']}})</h3>
                                                                
                                                                <h4 class="text-dark todo-title-address">
                                                                    {{ $chamado_info['endereco'].', '
                                                                .$chamado_info['numero_endereco'].', '
                                                                .$chamado_info['bairro_endereco'].', '
                                                                .$chamado_info['cidade_endereco'].' - '
                                                                .$chamado_info['cep_endereco']
                                                                }}
                                                                </h4>
                                                                
                                                                <label class="text-nowrap text-muted mr-1 todo-status-colocacao" style="display: none;">{{ $chamado_info['status_colocacao'] }}</label>
                                                                <label class="text-nowrap text-muted mr-1 todo-status-retirada" style="display: none;">{{ $chamado_info['status_retirada'] }}</label>
                                                                <label class="text-nowrap text-muted mr-1 todo-status-troca" style="display: none;">{{ $chamado_info['status_troca'] }}</label>
                                                                <label class="text-nowrap text-muted mr-1 todo-id-ficha" style="display: none;">{{ implode("|",$chamado_info['id_fichas']) }}</label>
                                                                <label class="text-nowrap text-muted mr-1 todo-id-client-demand" style="display: none;">{{ $chamado_info['id_cliente'] }}</label> 

                                                                <label class="text-nowrap text-muted mr-1 todo-url-show-details_demand" style="display: none;">{{ url('get_details_demand') }}</label>
                                                                <label class="text-nowrap text-muted mr-1 todo-url-list-landfill" style="display: none;">{{ url('listlandfill') }}</label>
                                                                <label class="text-nowrap text-muted mr-1 todo-url-check-dumpster" style="display: none;">{{ url('available_dumpster') }}</label>

                                                        </div>
                                                    </div>

                                                </div>
                                            </li>
                                        
                                        <?php endforeach; ?>


                                    <?php else: ?>
                                </ul>
                                <div class="no-results">
                                    <h5>Sem item disponível</h5>
                                </div>
                                <?php endif; ?>  
                            </div>
                            --}}    
                            <!-- Todo List ends -->
                        </div>

                        <!-- Right Sidebar starts -->
                        <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
                            <div class="modal-dialog sidebar-lg w-100">
                                <div class="modal-content p-0">

                                    <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false">
                                        <div class="modal-header align-items-center mb-1">
                                            <p class="h3" id="nome_cliente">--</p>

                                            <div class="todo-item-action d-flex align-items-center justify-content-between ml-auto">
                                                <span class="todo-item-favorite cursor-pointer mr-75"><i data-feather="star" class="font-medium-2"></i></span>
                                                <button type="button" class="close font-large-1 font-weight-normal py-0" data-dismiss="modal" aria-label="Close">
                                                    X
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-12 p-2 btn-group">
                                            <a class="btn btn-info" href="" id="todo-item-address-waze" target="_blank"></a>
                                            <a class="btn btn-danger" href="" id="todo-item-address-google-maps" target="_blank"></a>

                                        </div>

                                        <div class="modal-body" id="loading-content" style="text-align: center;">
                                            <div class="spinner-border" role="status">
                                                <span class="sr-only">Carregando...</span>
                                            </div>
                                        </div>                                        

                                        <div class="modal-body flex-grow-1 pb-sm-0 pb-3" id="body_modal">


                                            <div class="action-tags" id="atividade_input">
                                            
                                            </div>    

                                            <hr>
                                            <hr>

                                            <div class="form-group my-1">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                                    Fechar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Right Sidebar ends -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


@include('partials.footer_mobile') 


<script>
    $("#data_filter_demand").on('change',function(){
            
            let dataAlocacao = $(this).val();
            
            if(dataAlocacao.length > 0){
                $('.loadingMask').show();
            
                $("#todo-task-list li").remove();

                $.ajax({
                        method: 'GET',
                        url: 'driver_demand',
                        data: {
                            get_data : true,
                            date_demand_filter : dataAlocacao
                        },
                        success: function(dataResponse) {

                            $.each(dataResponse, function(i, field) {
                            
                                $("#todo-task-list").append('<li class="todo-item my-2 border"><div class="todo-title-wrapper"><div class="todo-title-area prevent-select"><i data-feather="more-vertical" class="drag-icon"></i><div id="task_'+i+'"><div ></li>');
                                $("#task_"+i).append('<h3 class="bg-dark text-white todo-title">' + field.tipo_servico + ' (' + field.quantidade_cacamba + ')</h3>');
                                $("#task_"+i).append('<h4 class="text-dark todo-title-address">' + field.endereco +', ' + field.numero_endereco + ', ' + field.bairro_endereco + ', ' +field.cidade_endereco + ' - ' + field.cep_endereco + '</h4>');

                                $("#task_"+i).append('<label class="text-nowrap text-muted mr-1 todo-status-colocacao" style="display: none;">' + field.status_colocacao + '</label>');
                                $("#task_"+i).append('<label class="text-nowrap text-muted mr-1 todo-status-retirada" style="display: none;">' + field.status_retirada + '</label>');
                                $("#task_"+i).append('<label class="text-nowrap text-muted mr-1 todo-status-troca" style="display: none;">' + field.status_troca + '</label>');
                                
                                $("#task_"+i).append('<label class="text-nowrap text-muted mr-1 todo-id-ficha" style="display: none;">' + field.id_fichas.join("|") + '</label>');
                                $("#task_"+i).append('<label class="text-nowrap text-muted mr-1 todo-id-client-demand" style="display: none;">' + field.id_cliente + '</label>');
                                $("#task_"+i).append('<label class="text-nowrap text-muted mr-1 todo-id-driver" style="display: none;">' + field.id_motorista + '</label>');
                                $("#task_"+i).append('<label class="text-nowrap text-muted mr-1 todo-data-alocacao" style="display: none;">' + field.data_operacao + '</label>');
                                $("#task_"+i).append('<label class="text-nowrap text-muted mr-1 todo-url-show-details_demand" style="display: none;">{{ url('get_details_demand')}}</label>');
                                $("#task_"+i).append('<label class="text-nowrap text-muted mr-1 todo-url-list-landfill" style="display: none;">{{ url('listlandfill') }}</label>');
                                $("#task_"+i).append('<label class="text-nowrap text-muted mr-1 todo-url-check-dumpster" style="display: none;">{{ url('available_dumpster') }}</label>');
                            });                            
                            
                            $('.loadingMask').hide();
                        },
                        error: function(responseError){
                            $('.loadingMask').hide();
                            alert(responseError);
                        }
                });
            }
            
            });
</script>