{{-- 
@include('partials.header')
@include('partials.nav') 
--}}


<?php 

// echo '<pre>';
// print_r($call_demands);
// echo '</pre>';
// die();
?>
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
                                        {{-- <?php if(empty($call_demand->date_end)): ?> --}}
                                            <input type="hidden" class="id_demand" value="{{ $call_demand->id_demand }}" />
                                            
                                            <li class="todo-item">
                                                {{-- <div class="todo-title-wrapper"> --}}
                                                <div class="">
                                                    <h2 class="<?php echo ($call_demand->type_service == "COLOCACAO" ? "text-info" : "text-warning")?>"><?php echo $call_demand->type_service; ?></h2>
                                                    <div class="todo-title-area">

                                                        <div class="title-wrapper">

                                                            <p>Data de abertura:<span class="text-success">{{ $call_demand->created_at }}</span></p> 
                                                            
                                                            <p>Previsão de retirada:<span class="text-danger"> {{ $call_demand->date_removal_dumpster_forecast }}</span></p>

                                                            <span class="todo-title-address" style="display:none;">
                                                                {{
                                                                    $call_demand->address_service.
                                                                    ' - '.$call_demand->number_address_service.
                                                                    ' - '.$call_demand->zipcode_address_service.
                                                                    ' - ' . $call_demand->city_address_service.
                                                                    ' - '.$call_demand->district_address_service.
                                                                    ' - '.$call_demand->state_address_service; 
                                                                }}
                                                            </span>

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
                    
                                                                            echo '
                                                                            <div class="badge badge-pill badge-light-warning">
                                                                            <div class="badge badge-pill badge-light-warning">ATENDENDO</div>
                                                                            </div>';
                                                                        }elseif($call_demand->service_status == 2 && empty($call_demand->date_end) ){
                
                                                                            echo '
                                                                            <div class="badge badge-pill badge-light-success">
                                                                            <div class="badge badge-pill badge-light-success">RETIRADA: '.$call_demand->date_effective_removal_dumpster.'</div>
                                                                            </div>';

                                                                        }else{

                                                                            echo '
                                                                            <div class="badge badge-pill badge-light-success">
                                                                            <div class="badge badge-pill badge-light-success">FINALIZADO</div>
                                                                            </div>';
                                                                            
                                                                        }
                                                                    ?>

                                                        </div>
                                                        <label class="text-nowrap text-muted mr-1 todo-date-begin">{{ $call_demand->created_at }}</label>
                                                        <label class="text-nowrap text-muted mr-1 todo-id-demand" style="display: none;">{{ $call_demand->id_demand }}</label>
                                                        <label class="text-nowrap text-muted mr-1 todo-description" style="display: none;">{{ $call_demand->comments_demand }}</label>
                                                        <label class="text-nowrap text-muted mr-1 todo-name-client" style="display: none;">{{ $call_demand->phone_demand }}</label>
                                                    </div>
                                                </div>
                                            </li>
                                        
                                        {{-- <?php endif; ?>  --}}

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
                            <div class="modal-dialog sidebar-lg">
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
                                            <div class="action-tags">
    
                                                <div class="form-group">
                                                    <h3 class="form-label">Nome do cliente</h3>
                                                    <p class="todo-name-client"></p>
                                                </div>
    
                                                <div class="form-group">
                                                    <h3 for="task-due-date" class="form-label">Endereço</h3>
                                                    <p class="todo-item-title-address"></p>
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
                                                    <h3 for="task-due-date" class="form-label">Data do chamado</h3>
                                                    <p class="todo-item-date-begin" ></p>
    
                                                </div>
    
                                                <div class="form-group">
                                                    <h3 class="form-label">Descrição</h3>
                                                    <p class="todo-item-description"></p>
                                                    
                                                    <div id="task-desc" class="border-bottom-0 d-none" data-placeholder="Write Your Description"></div>
                                                    <div class="desc-toolbar border-top-0 d-none"></div>
                                                    
                                                </div>

                                                <input type="hidden" name= "id_demand" class="todo-id-demand" />
                                            </div>
    
                                            <div class="form-group my-1">
                                                    <input type="submit" class="btn btn-success" id="update_active_call_demand" value="Iniciar Atendimento" />
                                                    <button type="button" class="btn btn-secondary update-btn d-none my-2" data-dismiss="modal">Caçamba recolhida</button>
                                                    <button type="button" class="btn btn-outline-warning update-btn d-none my-2" data-dismiss="modal">Caçamba recolhida</button>
                                                    <button type="button" class="btn btn-outline-danger update-btn d-none my-2" data-dismiss="modal">Cancelar</button>
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
    });
</script>

