@include('partials.header_teste')
@include('partials.nav_teste');


    <!-- BEGIN: Content-->
    
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper container-xxl p-0">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content todo-sidebar">
                        <div class="todo-app-menu">
                        <!--
                            <div class="add-task">
                                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#new-task-modal">
                                    CALL
                                </button>
                            </div>
                        -->
                        </div>
                    </div>

                </div>
            </div>
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
                                <?php if(is_object($call_demands)): ?>

                                    <ul class="todo-task-list media-list" id="todo-task-list">
                                        <?php foreach($call_demands as $call_demand): ?>

                                            <li class="todo-item">

                                                <div class="">

                                                    <h1 class="<?php echo ($call_demand->type_service == "COLOCACAO" ? "text-info" : "text-danger")?>"><?php echo $call_demand->type_service; ?></h1>
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

                                                            <p>DATA: <span class="text-white bg-success todo-date-begin">{{ $call_demand->date_allocation_dumpster }}</span></p> 
                                                            
                                                            
                                                            {{-- <span class="todo-title-address" style="display:none;">
                                                                {{
                                                                    $call_demand->address_service.
                                                                    ' - '.$call_demand->number_address_service.
                                                                    ' - '.$call_demand->zipcode_address_service.
                                                                    ' - ' . $call_demand->city_address_service.
                                                                    ' - '.$call_demand->district_address_service.
                                                                    ' - '.$call_demand->state_address_service; 
                                                                }}
                                                            </span> --}}

                                                            <span class="todo-name-client d-none">{{ $call_demand->name; }}</span>
                                                            <span class="todo-phone d-none">{{ $call_demand->phone_demand; }}</span>
                                                            

                                                        </div>
                                                    </div>
{{-- 
                                                    <?php if($call_demand->date_start): ?>
                                                        <p>Data da operação: <span class="badge badge-pill badge-light-info">{{ $call_demand->date_start }}</span></p>
                                                    <?php endif; ?>

                                                    <p>Previsão de retirada:<span class="text-danger"> {{ $call_demand->date_removal_dumpster_forecast }}</span></p>
--}}
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
                                                        <label class="text-nowrap text-muted mr-1 todo-id-demand" style="display: none;">{{ $call_demand->id_demand }}</label>
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
                                        
                                    </ul>
                                <?php else: ?>
                                                        
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
                                            {{-- <div class="action-tags"> --}}
                                            <div class="form-group my-1">
                                                <div class="form-group">
                                                    <h3 class="form-label todo-name-client">Nome do cliente</h3>
                                                    {{-- <p class="todo-name-client"></p> --}}
                                                </div>
{{--     
                                                <div class="form-group">
                                                    <h3 for="task-due-date" class="form-label">Endereço</h3>
                                                    <p class="todo-item-title-address"></p>
                                                </div> 
--}}
    
                                                <div class="form-group">
                                                    <p><a class="todo-item-address-waze" href="#"></a></p>
                                                    <p><a class="todo-item-address-google-maps" href="#"></a></p>
                                                </div>
    
                                                <div class="form-group">
                                                    <h3 class="form-label">Telefone</h3>
                                                    <p class="todo-phone"></p>
                                                </div>                                            
{{--     
                                                <div class="form-group">
                                                    <h3 for="task-due-date" class="form-label">Data do chamado</h3>
                                                    <p class="todo-item-date-begin" ></p>
                                                    <input type="hidden" name="todo-item-date-begin" class="todo-item-date-begin"/>
                                                </div> 
--}}


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
<!--                                             
                                            </div>
    
                                            <div class="form-group my-1">
-->
                                                    {{-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#open_new_modal">ABRIR MODAL </button> --}}
                                                    <label for="type_service">Aterro</label>
                                                    <select class="select2 form-control form-control-lg edit-landfill-list" id="type_service" name="landfill">
                                                    </select>  
                                                    <hr />
                                                    {{-- <button type="button" class="btn btn-success" id="start_call_demand">INICIAR ATENDIMENTO</button> --}}
                                                    <button type="button" class="btn btn-success" id="btn_start_call_demand">INICIAR ATENDIMENTO</button>
                                                    {{-- <button type="button" class="btn btn-outline-danger update-btn d-none my-2" data-dismiss="modal">Cancelar</button> --}}
                                                    <button type="button" class="btn btn-secondary my-2" data-dismiss="modal">CANCELAR</button>

                                                    <button type="button" class="btn btn-warning update-btn d-none my-2" id="btn_allocated_dumpster" style="" data-dismiss="modal">CAÇAMBA ALOCADA</button>
                                                    <button type="button" class="btn btn-info update-btn d-none my-2" id="btn_collect_dumpster" style="" data-dismiss="modal">RECOLHER CAÇAMBA</button>
                                                    <button type="button" class="btn btn-primary update-btn d-none my-2" id="set_done_demand" style="" data-dismiss="modal">ENCERRAR ATENDIMENTO</button>
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
        </div>
    </div>
    
    <!-- END: Content-->




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
                    url: '/change_status_call_demand',
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
            let idDemand   = 0;
            let idLandfill = 0;

            if(dumpsterNumbers.length > 0){

                $.each(dataInfo, function(i, field) {

                    if(field.name.trim() == "id_demand")
                        idDemand = field.value;
                    
                    if(field.name.trim() == "landfill")
                        idLandfill = field.value;
                });

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: 'POST',
                    url: '/start_demand',
                    data: { 
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
                alert('Insira todas as caçambas!')
            }
        })

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

/*
        $("#get_dumpster_location").click(function(){

            let dataForm = $('#form-modal-todo');
            let x = dataForm.serializeArray();
            let id_demand = 0;

            $.each(x, function(i, field) {
                if(field.name == "id_demand")
                {
                    id_demand = field.value;

                }
            });

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'POST',
                url: '/get_dumpster_location',
                data: { id_demand: id_demand },
                success: function(dataResponse) {
                    if(dataResponse == true)
                        location.reload();
                },
                error: function(responseError){
                    console.log(responseError);
                }
            });    


        });
*/        

    });
</script>

