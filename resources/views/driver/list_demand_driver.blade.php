@include('partials.header_teste')
@include('partials.nav_teste');


    <!-- BEGIN: Content-->
    <div class="app-content content-designed">
            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="body-content-overlay"></div>
                        <div class="todo-app-list">
                            <!-- Todo search starts -->
                            <div class="app-fixed-search d-flex align-items-center">

                                <div class="d-flex align-content-center justify-content-between w-100">
                                    <div class="input-group input-group-merge">

                                        <div class="form-group mb-0">
                                            {{-- <span>Data: </span> --}}
                                            <input type="text" name="date_allocation_dumpster" id="data_filter_demand" class="form-control dt-date flatpickr-range dt-input date_format date_allocation_dumpster date_format_allocation" data-column="5"  data-column-index="4" />
                                        </div>                                        
                                    </div>
                                </div>

                            </div>
                            <div class="app-fixed-search d-flex align-items-center">

                                <div class="d-flex align-content-center justify-content-between w-100">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="todo-search" placeholder="PESQUISAR" aria-label="PESQUISAR..." aria-describedby="todo-search" />
                                    </div>
                                </div>

                            </div>
                            <!-- Todo search ends -->

                            <!-- Todo List starts -->
                            <div class="todo-task-list-wrapper list-group">
                                <ul class="todo-task-list media-list" id="todo-task-list">
                                    <h1 class="loadingMask text-success text-center" style="display:none;">Loading...</div>
                                    <?php if(is_object($call_demands)): ?>

                                        <?php foreach($call_demands as $call_demand): ?>

                                            <li class="todo-item my-3">

                                                <div class="">

                                                    <h1 class="<?php 
                                                        if($call_demand->type_service == "COLOCACAO"){
                                                            echo "text-info";
                                                        }elseif($call_demand->type_service == "TROCA"){

                                                            echo "text-warning";
                                                        }else{
                                                            echo "text-danger";
                                                        }
                                                    ?>"><?php echo $call_demand->type_service; ?></h1>
                                                    <h2 class="text-dark todo-title-address">
                                                        {{
                                                            $call_demand->address_service.
                                                            ' - '.$call_demand->number_address_service.
                                                            ' - '.$call_demand->zipcode_address_service.
                                                            ' - ' . $call_demand->city_address_service.
                                                            ' - '.$call_demand->district_address_service.
                                                            ' - '.$call_demand->state_address_service; 
                                                        }}
                                                    </h2>

                                                    <div class="todo-title-area">

                                                        <div class="title-wrapper">

                                                            {{-- <p>DATA: <span class="text-white bg-success todo-date-begin">{{ $call_demand->date_allocation_dumpster }}</span></p>  --}}
                                                            <span class="todo-name-client d-none">{{ $call_demand->name; }}</span>
                                                            <span class="todo-phone d-none">{{ $call_demand->phone_demand; }}</span>
                                                            

                                                        </div>
                                                    </div>

                                                    <div class="todo-item-action">
                                                        
                                                        <div class="badge-wrapper mr-1">


                                                                    <?php 
                                                                        if($call_demand->service_status == 0){
                    
                                                                            echo '
                                                                            <div class="badge badge-pill badge-light-danger">
                                                                            <div class="badge badge-pill badge-light-danger">PENDENTE</div>
                                                                            </div>';


                                                                        }elseif($call_demand->service_status == 1){
                    
                                                                            echo '<div class="badge badge-pill badge-light-warning">ATENDENDO</div>';

                                                                        }elseif($call_demand->service_status == 2 && empty($call_demand->date_end) ){
                
                                                                            echo '
                                                                            <div class="badge badge-pill badge-light-success">RETIRADA: '.$call_demand->date_effective_removal_dumpster.'</div>
                                                                            <div class="badge badge-pill badge-light-info">ALOCADO</div>';

                                                                        }else{

                                                                            echo '
                                                                            <div class="badge badge-pill badge-light-success">RETIRADA: '.$call_demand->date_effective_removal_dumpster.'</div>
                                                                            <div class="badge badge-pill badge-light-success">ENCERRADO</div>';
                        
                                                                        }
                                                                    ?>

                                                        </div>
                                                        <label class="text-nowrap text-muted mr-1 todo-url-list-landfill" style="display: none;">{{ url('listlandfill') }}</label>
                                                        <label class="text-nowrap text-muted mr-1 todo-url-show-dumpster-demand" style="display: none;">{{ url('show_dumpster_demand') }}</label>

                                                        <label class="text-nowrap text-muted mr-1 todo-id-demand" style="display: none;">{{ $call_demand->id_demand }}</label>
                                                        <label class="text-nowrap text-muted mr-1 todo-type-service" style="display: none;">{{ $call_demand->type_service }}</label>
                                                        <label class="text-nowrap text-muted mr-1 todo-description" style="display: none;">{{ $call_demand->comments_demand }}</label>
                                                        <label class="text-nowrap text-muted mr-1 todo-name-client" style="display: none;">{{ $call_demand->phone_demand }}</label>


                                                        <input type="hidden" class="id_demand" value="{{ $call_demand->id_demand }}" />
                                                        <input type="hidden" name="service_status" class="todo-service-status" value="{{ $call_demand->service_status }}" />
                                                        <span class="todo-date-start d-none">{{ $call_demand->date_start }} </span>
                                                        <span class="todo-dumpster-quantity d-none">{{ $call_demand->dumpster_quantity }}</span>

                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    
                                    <?php else: ?>
                                </ul>
                                                    
                                <div class="no-results" style="display: block; text-align:center">
                                    <h5>Sem pedido disponível</h5>
                                </div>
                                <?php endif; ?>
                            </div>
                            <!-- Todo List ends -->
                        </div>

                        <!-- Right Sidebar starts -->
                        <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
                            <div class="modal-dialog sidebar-lg" style="width: 28rem !important;">
                                <div class="modal-content p-0">
    
                                    <form id="form-modal-todo" class="todo-modal needs-validation" >
                                        @csrf
                                        <div class="modal-header align-items-center mb-1">
                                            
                                            <div class="todo-item-action d-flex align-items-center justify-content-between ml-auto">
    
                                                <button type="button" class="close font-large-1 font-weight-normal py-0" data-dismiss="modal" aria-label="Close">
                                                    ×
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                            
                                            <div class="form-group my-1">
                                                <div class="form-group">
                                                    <h3 class="form-label todo-name-client">Nome do cliente</h3>

                                                </div>

    
                                                <div class="form-group">
                                                    <p><a class="todo-item-address-waze" href="#"></a></p>
                                                    <p><a class="todo-item-address-google-maps" href="#"></a></p>
                                                </div>
    
                                                <div class="form-group">
                                                    <h3 class="form-label">Telefone</h3>
                                                    <p class="todo-phone"></p>
                                                </div>                                            



                                                <div class="form-group">
                                                    <h3 class="form-label">Descrição</h3>
                                                    <p class="todo-item-description"></p>
                                                    
                                                    <div id="task-desc" class="border-bottom-0 d-none" data-placeholder="Write Your Description"></div>
                                                    <div class="desc-toolbar border-top-0 d-none"></div>
                                                    
                                                </div>

                                                <div class="form-group">
                                                    <h3 class="form-label">Quantidade de Caçambas: </h3>
                                                    <p class="todo-item-dumpster-quantity"></p>
                                                </div>

                                                <div class="form-group">
                                                    <h3 class="form-label">Caçambas Registradas: </h3>
                                                    <div data-repeater-item id="number-dumpster-repeat">

                                                    </div>                                                  
                                                    <hr />                                                    

                                                </div>                                                

                                                <input type="hidden" name= "id_demand" class="todo-id-demand" />
                                                <input type="hidden" name= "type_service" class="todo-type-service" />

                                                <label for="type_service">Aterro</label>
                                                <select class="select2 form-control form-control-lg edit-landfill-list" id="type_service" name="landfill">
                                                </select>  
                                                <hr />

                                                <button type="button" class="btn btn-success" id="btn_start_call_demand">INICIAR ATENDIMENTO</button>
                                                <button type="button" class="btn btn-primary update-btn d-none my-2" id="btn_finish_call_demand" style="" data-dismiss="modal">ENCERRAR ATENDIMENTO</button>

                                                <button type="button" class="btn btn-secondary my-2" data-dismiss="modal">CANCELAR</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Right Sidebar ends -->



                        <!-- Modal Baixa Caçamba -->

                        <div class="modal fade" id="open_new_modal">
                            
                            <div class="modal-dialog modal-dialog-centered modal-lg" data-select2-id="84">
                                <div class="modal-content" data-select2-id="83">
                                    <div class="modal-header bg-transparent">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-sm-5 mx-50 pb-4" data-select2-id="82">
                                        <h1 class="text-center mb-1" id="shareProjectTitle">Registro de Caçambas</h1>
                                        <label class="form-label fw-bolder font-size font-small-4 mb-50" for="addMemberSelect"> Add members </label>
                                       
                                        <p class="fw-bolder pt-50 mt-2">Quantidade de Caçambas: 3</p>

                                        <!-- form dumpster's list  -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Caçambas</h4>
                                            </div>
                                            <div class="card-body">
                                                <form action="#" class="invoice-repeater">
                                                    <div data-repeater-list="invoice">
                                                        <div data-repeater-item>
                                                            <div class="row d-flex align-items-end">
                                                                <div class="col-md-4 col-2">
                                                                    <div class="form-group">
                                                                        <label for="itemname">Número de caçambas</label>
                                                                        <input type="text" class="form-control" id="itemname" aria-describedby="itemname" placeholder="Vuexy Admin Template" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--/ form dumpster's list  -->

                                        <!-- project link -->
                                        <div class="d-flex align-content-center justify-content-between flex-wrap">
                                            <div class="d-flex align-items-center me-2">
                                                <button class="btn btn-success">Registrar</button>
                                            </div>

                                            <div class="d-flex align-items-center me-2">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
 
                        <!-- Modal Baixa Caçamba -->

                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>
    
    <!-- END: Content-->

    <label id="todo-url-list-landfill" style="display: none;">{{ url('listlandfill') }}</label>
    <label id="todo-url-show-dumpster-demand" style="display: none;">{{ url('show_dumpster_demand') }}</label>

 {{-- @include('partials.footer') --}}
@include('partials.footer_teste') 

<script>

    $( document ).ready(function() {

        $("form").submit(function(a){

            let id_demand = this.id_demand.value;
            if(id_demand){

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: 'POST',
                    url: 'change_status_call_demand',
                    data: {
                        id : id_demand
                    },
                    success: function(dataResponse) {

                        if(dataResponse){
                            location.reload();
                        }
                    },
                    error: function(responseError){
                        alert(responseError);
                    }
                });
            }
        });


        $("#btn_start_call_demand").click(function(){

            let dataForm = $('#form-modal-todo');
            let dataInfo = dataForm.serializeArray();
            let dumpsterNumbers = $.map($('.dumpster_number'), function(el) { return el.value; });
            let typeService = "";
            let idDemand   = 0;
            let idLandfill = 0;
            let stopExec   = false; 

            $.each(dataInfo, function(i, field) {

                if(field.name.trim() == "id_demand")
                    idDemand = field.value;

                if(field.name.trim() == "type_service")
                    typeService = field.value;

                if(field.name.trim() == "landfill")
                    idLandfill = field.value;
            });

            if(dumpsterNumbers.length > 0){
                $.each(dumpsterNumbers, function(i, field) {
                
                    if(field == '' || field == 0){
                        alert("Preencha o número da caçamba!");
                        stopExec = true;
                        return false;
                    }
                });

            }else{
                alert("Preencha todas as caçambas!");
                stopExec = true;
                return false;
            }

            if(typeService == 'RETIRADA' || typeService == 'TROCA' && idLandfill == 0)
            {
                alert('Selecione o aterro!');
                stopExec = true;
            }



            if(stopExec == false){

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: 'POST',
                    url: 'start_demand',
                    data: {
                        type_service: typeService, 
                        id_demand: idDemand,
                        id_landfill: idLandfill,
                        dumpster_numbers: dumpsterNumbers
                    },
                    success: function(dataResponse) {
                        if(dataResponse == true)
                            location.reload();
                        else
                            alert("Caçamba em uso!");
                    },
                    error: function(responseError){
                        console.log(responseError);
                    }
                });
            }else{
                alert('Preencha todos os campos!');
            }
        })

        $("#btn_finish_call_demand").click(function(){
            
            let dataForm = $('#form-modal-todo');
            let dataInfo = dataForm.serializeArray();
            let dumpsterNumbers = $.map($('.dumpster_number'), function(el) { return el.value; });
            let idDemand   = 0;
            let idLandfill = 0;
            let typeService = '';
            let stopExec    = false; 

            
            $.each(dataInfo, function(i, field) {

                if(field.name.trim() == "id_demand")
                    idDemand = field.value;
                    
                    if(field.name.trim() == "landfill")
                    idLandfill = field.value;
                    
                    if(field.name.trim() == "type_service")
                    typeService = field.value;
            });

            if(dumpsterNumbers.length > 0){
                $.each(dumpsterNumbers, function(i, field) {
                    
                    if(field == '' || field == 0){
                        alert("Preencha o número da caçamba!");
                        stopExec = true;
                        return false;
                    }
                });

            }else{

                alert("Preencha todas as caçambas!");
                stopExec = true;
                return false;
            }

            if(typeService == 'RETIRADA' || typeService == 'TROCA' && idLandfill == 0)
            {
                alert('Selecione o aterro!');
                stopExec = true
                // return false;
            }
                    
            if(stopExec == false){
                
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: 'POST',
                    url: 'finish_demand',
                    data: { 
                        id_demand: idDemand,
                        id_landfill: idLandfill,
                        type_service: typeService,
                        dumpster_numbers: dumpsterNumbers,
                    },
                    success: function(dataResponse) {

                        if(dataResponse == true)
                            location.reload();
                        else
                            alert("Erro ao atualizar pedido!!!");
                    },
                    error: function(responseError){
                        console.log(responseError);
                    }
                });
            }else{
                alert('Preencha todos os campos!')
            }            

        });

        $("#btn_collect_dumpster").click(function(){
            
            let dataForm = $('#form-modal-todo');
            let dataInfo = dataForm.serializeArray();
            let dumpsterNumbers = $.map($('.dumpster_number'), function(el) { return el.value; });
            let idDemand   = 0;
            let idLandfill = 0;

            $.each(dataInfo, function(i, field) {

                if(field.name.trim() == "id_demand")
                    idDemand = field.value;

                if(field.name.trim() == "landfill")
                    idLandfill = field.value;
            });

            if(idLandfill > 0){

                console.log("ID do chamado : " + idDemand);
                console.log("ID do aterro : " + idLandfill);
                console.log("DAdos caçamba : " + dumpsterNumbers);

            }else{
                alert("Selecione o Aterro!");


            }


        });

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


                            $.each(dataResponse, function(i, field) {

                                let className = "";
                                if(field.type_service == "COLOCACAO"){
                                    className = "text-info";
                                }else if(field.type_service == "TROCA"){
                                    className = "text-warning";
                                }else{
                                    className = "text-danger";

                                }

                                let h1 = '<h1 class="' + className + '">'+ field.type_service + '</h1>';
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

                                    showStatusDemand = '<div class="badge badge-pill badge-light-success">RETIRADA: ' + field.date_effective_removal_dumpster + '</div><div class="badge badge-pill badge-light-info">ALOCADO</div>';

                                }else{

                                    showStatusDemand = '<div class="badge badge-pill badge-light-success">RETIRADA: ' + field.date_effective_removal_dumpster + '</div><div class="badge badge-pill badge-light-success">ENCERRADO</div>';

                                }
                                
                                let contentTwo = '<div class="todo-item-action"><div class="badge-wrapper mr-1">' + showStatusDemand + '</div>';
                                contentTwo += '<label class="text-nowrap text-muted mr-1 todo-url-list-landfill" style="display: none;">' + $('#todo-url-list-landfill').text() + '</label>';
                                contentTwo += '<label class="text-nowrap text-muted mr-1 todo-url-show-dumpster-demand" style="display: none;">' + $('#todo-url-show-dumpster-demand').text() + '</label>';
                                contentTwo += '<label class="text-nowrap text-muted mr-1 todo-id-demand" style="display: none;">' + field.id_demand + '</label>';
                                contentTwo += '<label class="text-nowrap text-muted mr-1 todo-type-service" style="display: none;">' + field.type_service + '</label>';
                                contentTwo += '<label class="text-nowrap text-muted mr-1 todo-description" style="display: none;">' + field.comments_demand + '</label>';
                                contentTwo += '<label class="text-nowrap text-muted mr-1 todo-name-client" style="display: none;">' + field.phone_demand + '</label>';
                                contentTwo += '<input type="hidden" class="id_demand" value="' + field.id_demand + '" />';
                                contentTwo += '<input type="hidden" name="service_status" class="todo-service-status" value="' + field.service_status + '" />';
                                contentTwo += '<span class="todo-date-start d-none">' + field.date_start + ' </span>';
                                contentTwo += '<span class="todo-dumpster-quantity d-none">' + field.dumpster_quantity + '</span>';
                                contentTwo += '</div>';

                                $("#todo-task-list").append('<li class="todo-item my-3">' + h1 + h2 + contentOne + contentTwo + '</li>');

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


    });
</script>

