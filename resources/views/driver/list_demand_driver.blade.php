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
                                            </select>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Todo search ends -->

                            <!-- Todo List starts -->
                            <div class="todo-task-list-wrapper list-group">
                                <ul class="todo-task-list media-list" id="todo-task-list">
                                    <?php if(is_array($lista_chamados)): ?>

                                        <?php foreach($lista_chamados as $id_chamado => $chamados): ?>
                                            <?php foreach($chamados as $ind_atividade => $chamado_info): ?>
                                                <li class="todo-item my-2 border">
                                                    <div class="todo-title-wrapper">
                                                        <div class="todo-title-area">
                                                            <i data-feather="more-vertical" class="drag-icon"></i>
                                                            {{-- <div class="title-wrapper"> --}}
                                                            <div >

                                                                {{-- <span class="todo-title">Fix Responsiveness for new structure 💻</span> --}}


                                                                    <h3 class="bg-dark text-white todo-title">{{ $chamado_info['tipo_servico'] }} ({{$chamado_info['quantidade_cacamba']}})</h3>
                                                                    
                                                                    <label class="text-nowrap text-muted mr-1">{{ $id_chamado }}</label>

                                                                    <h4 class="text-dark todo-title-address">
                                                                        {{ $chamado_info['endereco'].', '
                                                                    .$chamado_info['numero_endereco'].', '
                                                                    .$chamado_info['bairro_endereco'].', '
                                                                    .$chamado_info['cidade_endereco'].' - '
                                                                    .$chamado_info['cep_endereco']
                                                                    }}
                                                                    </h4>

                                                                    
                                                                    <label class="text-nowrap text-muted mr-1 todo-id-demand" style="display: none;">{{ $id_chamado }}</label>
                                                                    <label class="text-nowrap text-muted mr-1 todo-id-driver" style="display: none;">{{ $chamado_info['id_motorista'] }}</label>
                                                                    <label class="text-nowrap text-muted mr-1 todo-data-alocacao" style="display: none;">{{ $chamado_info['data_operacao'] }}</label>
                                                                    <label class="text-nowrap text-muted mr-1 todo-url-show-details_demand" style="display: none;">{{ url('get_details_demand') }}</label>
                                                                    <label class="text-nowrap text-muted mr-1 todo-url-list-landfill" style="display: none;">{{ url('listlandfill') }}</label>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>

                                <?php else: ?>
                                </ul>
                                <div class="no-results">
                                    <h5>Sem item disponível</h5>
                                </div>
                                <?php endif; ?>  
                            </div>
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
                                        <div class="modal-body flex-grow-1 pb-sm-0 pb-3" id="body_modal">


                                            <div class="action-tags" id="atividade_input">
                                            
                                            </div>    
                                            <!--
                                            <div class="action-tags">


                                                <div class="form-group p-1 mb-1 bg-primary text-white">COLOCAÇÃO</div>
                                                <div class="form-group p-1 mb-1 bg-warning text-white">TROCA</div>
                                                <div class="form-group p-1 mb-1 bg-success text-white">RETIRADA</div>

                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 1 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>
                                                    

                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 2 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 1 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>

                                                </div>                                                
                                                <div class="form-group position-relative">
                                                    <label for="task-assigned" class="form-label d-block">Aterro</label>
                                                    <select class="select2 form-control" id="task-assigned" name="task-assigned">
                                                    </select>
                                                </div>

                                                <button type="button" class="btn btn-success  update-btn update-todo-item mr-1">ATENDENR</button>
                                                <button type="button" class="btn btn-info update-btn " data-dismiss="modal">FINALIZAR</button>

                                            </div>
                                            -->
                                            <hr>
                                            <hr>

                                        <!--
                                            <div class="action-tags">


                                                <div class="form-group p-1 mb-1 bg-primary text-white">COLOCAÇÃO</div>
                                                <div class="form-group p-1 mb-1 bg-warning text-white">TROCA</div>
                                                <div class="form-group p-1 mb-1 bg-success text-white">RETIRADA</div>

                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 1 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>
                                                    

                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 2 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 1 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>

                                                </div>                                                
                                                <div class="form-group position-relative">
                                                    <label for="task-assigned" class="form-label d-block">Aterro</label>
                                                    <select class="select2 form-control" id="task-assigned" name="task-assigned">
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-3.jpg" value="Phill Buffer" selected>
                                                            Phill Buffer
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-1.jpg" value="Chandler Bing">
                                                            Chandler Bing
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-4.jpg" value="Ross Geller">
                                                            Ross Geller
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-6.jpg" value="Monica Geller">
                                                            Monica Geller
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-2.jpg" value="Joey Tribbiani">
                                                            Joey Tribbiani
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-11.jpg" value="Rachel Green">
                                                            Rachel Green
                                                        </option>
                                                    </select>
                                                </div>

                                                <button type="button" class="btn btn-success  update-btn update-todo-item mr-1">ATENDENR</button>
                                                <button type="button" class="btn btn-info update-btn " data-dismiss="modal">FINALIZAR</button>                                                

                                            </div>

                                        -->
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
{{-- 
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer--> 
--}}

@include('partials.footer_mobile') 

