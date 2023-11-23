    @include('partials.header_mobile')


    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand" href="#"><span class="brand-logo">
                            
                    </a></li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">

{{-- 
                <li class="nav-item dropdown dropdown-notification me-25">
                    <div class="dropdown">
                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Notificações
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> 
                </li> 
--}}


            </ul>
        </div>
    </nav>

    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    @include('partials.nav_mobile') 

    <div class="app-content content " style="padding-bottom: 50px !important;">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                
                <div class="app-fixed-search d-flex align-items-center">
                    <div class="d-flex align-content-center justify-content-between w-100"></div>
                </div>               

                <div class="bd-example bd-example-tabs">


                    <div class="modal-body" id="loading-content-list" style="text-align: center;display:none">
                        <div class="spinner-border" role="status">
                            {{-- <span class="sr-only">Carregando...</span> --}}
                        </div>
                    </div>                                 
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade active show" id="principal" role="tabpanel" aria-labelledby="principal-tab">
                        <div class="todo-task-list-wrapper list-group" style="overflow-y: auto;">
                            <div class="row" id="todo-task-list">
                                <?php if(is_array($lista_chamados)): ?>
                                    <?php foreach($lista_chamados as $id_cliente => $chamado_info): ?>
                                            <div class="col-md-4 todo-item" style="border-top: 3px solid rgb(92, 91, 91);border-bottom: 3px solid rgb(92, 91, 91);">
                                                <div class="card" style="margin-bottom: 0px">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">

                                                            <div class="contact-icon" style="font-size: 40px;width: 140px;height: 55px;text-align: center;text-decoration: none;border-bottom: 3px solid black;">
                                                                {{$chamado_info['quantidade_cacamba']}}
                                                            </div>
                                                            <div class="m-2">
                                                                <h5 class="display-6" style="margin-bottom: 20px; background: #ec8186;color: #000;">{{ $chamado_info['tipo_servico'] }}</h5> 
                                                                <h5 class="display-6" style="margin-bottom: 20px; background: #ecde81;color: #000;">{{ $chamado_info['data_operacao'] }}</h5> 
                                                                <h6 class="card-subtitle h3 todo-title-address">
                                                                    {{ $chamado_info['endereco'].', '
                                                                    .$chamado_info['numero_endereco'].', '
                                                                    .$chamado_info['bairro_endereco'].', '
                                                                    .$chamado_info['cidade_endereco'].' - '
                                                                    .$chamado_info['cep_endereco']
                                                                    }}
                                                                </h6>
                                                                <hr>
                                                                <?php if(isset($chamado_info['observacao_operacao'])): ?>
                                                                    <p class="card-text" style="font-size:20px">Observação: {{ $chamado_info['observacao_operacao']}}</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="text-nowrap text-muted mr-1 todo-status-colocacao" style="display: none;">{{ $chamado_info['status_colocacao'] }}</label>
                                                <label class="text-nowrap text-muted mr-1 todo-status-retirada" style="display: none;">{{ $chamado_info['status_retirada'] }}</label>
                                                <label class="text-nowrap text-muted mr-1 todo-status-troca" style="display: none;">{{ $chamado_info['status_troca'] }}</label>
                                                <label class="text-nowrap text-muted mr-1 todo-id-ficha" style="display: none;">{{ implode("|",$chamado_info['id_fichas']) }}</label>
                                                <label class="text-nowrap text-muted mr-1 todo-id-client-demand" style="display: none;">{{ $chamado_info['id_cliente'] }}</label> 
                                                
                                                <label class="text-nowrap text-muted mr-1 todo-url-show-details_demand" style="display: none;">{{ url('get_details_demand') }}</label>
                                                <label class="text-nowrap text-muted mr-1 todo-url-list-landfill" style="display: none;">{{ url('listlandfill') }}</label>
                                                <label class="text-nowrap text-muted mr-1 todo-url-check-dumpster" style="display: none;">{{ url('available_dumpster') }}</label>                                                
        
                                            </div>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>                        
                        </div>                        
                      </div>
                    </div>

                <!-- Right Sidebar starts -->
                <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
                    <div class="modal-dialog sidebar-lg w-100">
                        <div class="modal-content p-0">

                            <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false">

                                <div>
                                    <div class="todo-item-action d-flex align-items-center justify-content-between ml-auto">
                                        <a class="" data-dismiss="modal" aria-label="Close" style="font-size: 30px;/* text-decoration: underline; */background-color: #333244;border-radius: 0 0 30px 0;padding: 5px;color: white;">
                                            Voltar
                                        </a>
                                    </div>
                                </div>
                                <div class="modal-header align-items-center mb-1">
                                    <p class="h3" id="nome_cliente">--</p>

                                </div>

                                <div class="col-12 p-2 btn-group">
                                    <a class="btn btn-outline-info" href="" id="todo-item-address-waze" target="_blank"></a>
                                    <a class="btn btn-outline-danger" href="" id="todo-item-address-google-maps" target="_blank"></a>

                                </div>

                                <div class="modal-body" id="loading-content" style="text-align: center;">
                                    <div class="spinner-border" role="status"></div>
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
    
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('partials.footer_mobile') 
