@include('partials.header_mobile')
@include('partials.nav_mobile')


<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

    <input type="text" class="form-control dt-date flatpickr-range dt-input date_format_service_search" id="data_filter_demand" data-column="5" placeholder="" data-column-index="4" name="dt_date" readonly="readonly">

    <select class="form-control py-2 m-1" id="name_driver_selected">
        <option value="" selected>Tipo de Serviço</option>
        <option value="1">Colocação</option>
        <option value="2">Troca</option>
        <option value="3">Retirada</option>

    </select>

    </div>
</nav>



<div class="container" style="max-width: 720px">

    <div class="todo-task-list-wrapper list-group">

        <ul class="todo-task-list media-list p-0" id="todo-task-list" style>
            <?php if(is_array($call_demands)): ?>

                <?php foreach($call_demands as $call_demand): ?>    
                
                    <li class="todo-item mt-3">
                        <div class="todo-title-wrapper">
                            <div class="todo-title-area">
                                <i data-feather="more-vertical" class="drag-icon"></i>
                                <div class="title-wrapper">

                                        <h3 class="bg-dark text-white todo-title">
                                        {{ $call_demand['tipo_servico'] }}
                                        ({{$call_demand['quantidade_cacamba']}})
                                        </h3>
                                        <BR />
                                        <h4 class="text-dark todo-title-address">
                                        {{ $call_demand['endereco']; }}
                                        </h4>                    
                                </div>
                            </div>
                        
                        </div>

                        <label class="text-nowrap text-muted mr-1 todo-url-list-landfill" style="display: none;">{{ url('listlandfill') }}</label>
                        <label class="text-nowrap text-muted mr-1 todo-url-show-dumpster-demand" style="display: none;">{{ url('show_dumpster_demand') }}</label>

                        <label class="text-nowrap text-muted mr-1 todo-id-demand-reg" style="display: none;">{{ $call_demand['id_chamado_reg'] }}</label>
                        <label class="text-nowrap text-muted mr-1 todo-id-demand" style="display: none;">{{ $call_demand['id_pedido'] }}</label>
                        <label class="text-nowrap text-muted mr-1 todo-type-service" style="display: none;">{{ $call_demand['tipo_servico'] }}</label>
                        <label class="text-nowrap text-muted mr-1 todo-description" style="display: none;">{{ $call_demand['comentario'] }}</label>
                        <label class="text-nowrap text-muted mr-1 todo-name-client" style="display: none;">{{ $call_demand['nome_cliente'] }}</label>
                        <label class="text-nowrap text-muted mr-1 todo-phone" style="display: none;">{{ $call_demand['telefone'] }}</label>


                        <input type="hidden" class="id_call_demand_reg" value="{{ $call_demand['id_chamado_reg'] }}" />
                        <input type="hidden" class="id_demand" value="{{ $call_demand['id_pedido'] }}" />
                        <input type="hidden" name="service_status" class="todo-service-status" value="{{ $call_demand['status_servico'] }}" />
                        <span class="todo-date-start d-none">{{ $call_demand['data_inicio'] }} </span>

                    </li>
                    {{-- <hr> --}}
                
                <?php endforeach; ?>
                    
            <?php else: ?>
        </ul>
                            
        <div class="no-results" style="display: block; text-align:center">
            <h5>Sem pedido disponí­vel</h5>
        </div>
        <?php endif; ?>  
    </div>
</div>


{{-- BEGIN MODAL  --}}
<div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">

    <div class="modal-dialog w-100">
        <div class="modal-content p-0">

            <form id="form-modal-todo" class="todo-modal needs-validation" >
                @csrf

                <div class="modal-header align-items-center mb-1">
                    <h5 class="modal-title todo-name-client">Nome do cliente</h5>
                    <div class="todo-item-action d-flex align-items-center justify-content-between ml-auto">
                        <span class="todo-item-favorite cursor-pointer mr-75"><i data-feather="star" class="font-medium-2"></i></span>
                        <button type="button" class="close font-large-1 font-weight-normal py-0" data-dismiss="modal" aria-label="Close">
                            ×
                        </button>
                    </div>
                </div>                

                <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                    
                    <div class="form-group my-1">

                        <div class="form-group">
                            <p><a class="todo-item-address-waze" href="#"></a></p>
                            <p><a class="todo-item-address-google-maps" href="#"></a></p>
                        </div>

                        <div class="form-group">
                            <h3 class="form-label">Telefone</h3>
                            <p><a class="todo-phone" href="#"></a></p>
                        </div>                                            

                        <div class="form-group">
                            <h3 class="form-label">Descrição</h3>
                            <p class="todo-item-description"></p>
                            
                            <div id="task-desc" class="border-bottom-0 d-none" data-placeholder="Write Your Description"></div>
                            <div class="desc-toolbar border-top-0 d-none"></div>
                            
                        </div>
                        <div class="form-group">
                            {{-- <h3 class="form-label">Número da Caçamba: </h3> --}}
                            <div data-repeater-item id="number-dumpster-repeat"></div>
                            <div data-repeater-item id="lista_aterros"></div>
                            
                            
                            <div id="atividade_input">

                                <p class="botao_iniciar"></p>
                                <p class="botao_encerrar"></p>
                            </div>
                            <hr/>

                            {{-- <h3 class="form-label">Aterro: </h3> --}}
                            
                        </div>

                        <input type="hidden" name= "id_demand_reg" class="todo-id-demand-reg" />
                        <input type="hidden" name= "id_demand" class="todo-id-demand" />
                        <input type="hidden" name= "type_service" class="todo-type-service" />
{{-- 
                        <label for="type_service">Aterro</label>
                        <select class="select2 form-control form-control-lg edit-landfill-list" id="type_service" name="landfill">
                        </select>  
--}}
                        <hr />

                        {{-- <button type="button" class="btn btn-success" id="btn_start_call_demand">INICIAR ATENDIMENTO</button> --}}
                        <button type="button" class="btn btn-primary update-btn d-none my-2" id="btn_finish_call_demand" style="" data-dismiss="modal">ENCERRAR ATENDIMENTO</button>
                        <button type="button" class="btn btn-secondary my-2" data-dismiss="modal">CANCELAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- END MODAL  --}}

@include('partials.footer_mobile') 

<script>


$("#data_filter_demand").on('change',function(){
            
let dataAlocacao = $(this).val();

if(dataAlocacao.length > 0){
    $('.loadingMask').show();

    $("#todo-task-list li").remove();
    $.ajax({
            method: 'GET',
            url: 'search_demand',
            data: {data_alocacao : dataAlocacao},
            success: function(dataResponse) {

// console.log(dataResponse);
//                 return false;
                $.each(dataResponse, function(i, field) {
                    let className = "";
                    if(field.type_service == "COLOCACAO"){
                        className = "text-info";
                    }else if(field.type_service == "TROCA"){
                        className = "text-warning";
                    }else{
                        className = "text-danger";

                    }

                    // let h1 = '<h1 class="' + className + '">'+ field.type_service + '</h1>';
                    let h1 = '<h1 class="bg-dark text-white">'+ field.type_service + '</h1>';
                    let h2 = '<h2 class="text-dark todo-title-address">' + field.address_service +
                    ' - ' + field.number_address_service +
                    ' - ' + field.zipcode_address_service +
                    ' - ' + field.city_address_service +
                    ' - ' + field.district_address_service +
                    ' - ' + field.state_address_service + '</h2>'; 

                    let contentOne = '<div class="todo-title-area"><div class="title-wrapper"><span class="todo-name-client d-none">' 
                        + field.name 
                        + '</span><span class="todo-phone d-none">'
                        + field.phone_demand + '</span></div></div>';

                    let showStatusDemand = "";
                    if(field.service_status == 0){
                        
                        showStatusDemand =  '<div class="badge badge-pill badge-light-danger"><div class="badge badge-pill badge-light-danger">PENDENTE</div></div>';


                    }else if(field.service_status == 1){

                        showStatusDemand =  '<div class="badge badge-pill badge-light-warning">ATENDENDO</div>';

                    }else if(field.service_status == 2 && empty(field.date_end) ){

                        // showStatusDemand = '<div class="badge badge-pill badge-light-success">RETIRADA: ' + field.date_effective_removal_dumpster + '</div><div class="badge badge-pill badge-light-info">ALOCADO</div>';
                        showStatusDemand = '<div class="badge badge-pill badge-light-info">ALOCADO</div>';

                    }else{

                        // showStatusDemand = '<div class="badge badge-pill badge-light-success">RETIRADA: ' + field.date_effective_removal_dumpster + '</div><div class="badge badge-pill badge-light-success">ENCERRADO</div>';
                        showStatusDemand = '<div class="badge badge-pill badge-light-success">ENCERRADO</div>';

                    }
                    
                    let contentTwo = '<div class="todo-item-action"><div class="badge-wrapper mr-1">' + showStatusDemand + '</div>';
                    contentTwo += '<label class="text-nowrap text-muted mr-1 todo-url-list-landfill" style="display: none;">' + $('#todo-url-list-landfill').text() + '</label>';
                    contentTwo += '<label class="text-nowrap text-muted mr-1 todo-url-show-dumpster-demand" style="display: none;">' + $('#todo-url-show-dumpster-demand').text() + '</label>';
                    contentTwo += '<label class="text-nowrap text-muted mr-1 todo-id-demand-reg" style="display: none;">' + field.id_demand_reg + '</label>';
                    contentTwo += '<label class="text-nowrap text-muted mr-1 todo-id-demand" style="display: none;">' + field.id_demand + '</label>';
                    contentTwo += '<label class="text-nowrap text-muted mr-1 todo-type-service" style="display: none;">' + field.type_service + '</label>';
                    contentTwo += '<label class="text-nowrap text-muted mr-1 todo-description" style="display: none;">' + field.comments_demand + '</label>';
                    contentTwo += '<label class="text-nowrap text-muted mr-1 todo-name-client" style="display: none;">' + field.phone_demand + '</label>';
                    contentTwo += '<input type="hidden" class="id_demand" value="' + field.id_demand + '" />';
                    contentTwo += '<input type="hidden" name="service_status" class="todo-service-status" value="' + field.service_status + '" />';
                    contentTwo += '<span class="todo-date-start d-none">' + field.date_start + ' </span>';
                    contentTwo += '<span class="todo-dumpster-quantity d-none">' + field.dumpster_quantity + '</span>';
                    contentTwo += '</div>';

                    $("#todo-task-list").append('<li class="border-bottom-dark todo-item my-3 py-1">' + h1 + h2 + contentOne + contentTwo + '</li>');

                });                            
                
                
                $('.loadingMask').hide();
                // $("input[name='date_removal_dumpster']").val(adicionaDiasEmData(dataResponse));
                // $("input[name='total_days']").val(dataResponse);
                
            },
            error: function(responseError){
                $('.loadingMask').hide();
                alert(responseError);
            }
    });
}

});
</script>