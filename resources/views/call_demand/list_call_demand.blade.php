@include('partials.header')
<!--
<div class="row" id="table-responsive">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Lista de Pedidos</h4>
            </div>
            <div class="card-body">
                <p class="card-text">
                    Detalhes sobre pedidos 
                </p>
                <a href="" class="btn btn-success">Novo</a>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>

                            {{-- <th scope="col" class="text-nowrap"></th> --}}
                            <th scope="col" class="text-nowrap">Nº FICHA</th>
                            <th scope="col" class="text-nowrap">COLOCAÇÃO/TROCA</th>
                            <th scope="col" class="text-nowrap">DATA PEDIDO</th>
                            <th scope="col" class="text-nowrap">CLIENTE</th>
                            <th scope="col" class="text-nowrap">ENDEREÇO DA OBRA</th>
                            <th scope="col" class="text-nowrap">BAIRRO</th>
                            <th scope="col" class="text-nowrap">TELEFONE</th>
                            <th scope="col" class="text-nowrap">PREÇO UNIT.</th>
                            <th scope="col" class="text-nowrap">COMENTÁRIOS</th>
                            <th scope="col" class="text-nowrap">TOTAL CAÇAMBAS</th>
                            <th scope="col" class="text-nowrap">TOTAL EM ABERTO2</th>
                            <th scope="col" class="text-nowrap">Nº CAÇAMBA</th>
                            <th scope="col" class="text-nowrap">QTD DE DIAS PARA RETIRAR</th>
                            <th scope="col" class="text-nowrap">PREVISÃO DE RETIRADA</th>
                            <th scope="col" class="text-nowrap">DATA RETIRADA EFETIVA</th>
                            <th scope="col" class="text-nowrap">STATUS</th>
                            <th scope="col" class="text-nowrap">ATERRO</th>
                            <th scope="col" class="text-nowrap">PERÍODO DO DIA</th>
                            <th scope="col" class="text-nowrap">MOTORISTA</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php if(isset($calldemands)): ?>

                            <?php foreach((object) $calldemands as $calldemand): ?>
                                <tr>
                                    {{-- <td><a href="/call_demand/<?php echo $calldemand->id_demand; ?>">Geral</a></td> --}}
                                    <td><?php echo $calldemand->id_demand; ?></td>
                                    <td><?php echo $calldemand->type_service; ?></td>
                                    <td><?php echo $calldemand->date_begin; ?></td>
                                    <td><?php echo $calldemand->name_client.' '.$calldemand->surname_client; ?></td>
                                    <td><?php echo $calldemand->address_service; ?></td>
                                    <td><?php echo $calldemand->district_address_service; ?></td>
                                    <td><?php echo $calldemand->phone_demand; ?></td>
                                    <td><?php echo $calldemand->price_unit; ?></td>
                                    <td><?php echo $calldemand->comments_demand; ?></td>
                                    <td><?php echo $calldemand->dumpster_total; ?></td>
                                    <td><?php echo $calldemand->dumpster_total_opened; ?></td>
                                    <td><?php echo $calldemand->dumpster_number; ?></td>
                                    <td><?php echo (strtotime($calldemand->date_end) - strtotime($calldemand->date_begin) / 86400); ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($calldemand->date_end)); ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($calldemand->updated_at)); ?></td>
                                    <td><?php echo ($calldemand->service_status == 0) ? 'PENDENTE' : 'OK'; ?></td>
                                    <td><?php echo $calldemand->id_landfill; ?></td>
                                    <td><?php echo $calldemand->period; ?></td>
                                    <td><?php echo $calldemand->driver_name.' '.$calldemand->driver_surname; ?></td>
                                </tr>     
                            <?php endforeach; ?>

                        <?php else: ?>
                            <tr>

                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                                <td>-----</td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
-->

<!--
<section id="advanced-search-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Advanced Search</h4>
                </div>

                <div class="card-body mt-2">
                    <form class="dt_adv_search" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-row mb-1">
                                    <div class="col-lg-4">
                                        <label>Name:</label>
                                        <input type="text" class="form-control dt-input dt-full-name" data-column="1" placeholder="Alaric Beslier" data-column-index="0" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Email:</label>
                                        <input type="text" class="form-control dt-input" data-column="2" placeholder="demo@example.com" data-column-index="1" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Post:</label>
                                        <input type="text" class="form-control dt-input" data-column="3" placeholder="Web designer" data-column-index="2" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-4">
                                        <label>City:</label>
                                        <input type="text" class="form-control dt-input" data-column="4" placeholder="Balky" data-column-index="3" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Date:</label>
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control dt-date flatpickr-range dt-input" data-column="5" placeholder="StartDate to EndDate" data-column-index="4" name="dt_date" />
                                            <input type="hidden" class="form-control dt-date start_date dt-input" data-column="5" data-column-index="4" name="value_from_start_date" />
                                            <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="5" data-column-index="4" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Salary:</label>
                                        <input type="text" class="form-control dt-input" data-column="6" placeholder="10000" data-column-index="5" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Salary:</label>
                                        <input type="text" class="form-control dt-input" data-column="6" placeholder="10000" data-column-index="5" />
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="my-0" />
                <div class="card-datatable">
                    <table class="dt-advanced-search table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Salary</th>

                                <th>Name</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Salary</th>

                                <th>Name</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Salary</th>

                                <th>Name</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Salary</th>

                                <th>Name</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>


                        
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>
-->


<section id="advanced-search-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Advanced Search</h4>
                </div>

                <div class="card-body mt-2">
                    <form class="dt_adv_search" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-row mb-1">
                                    <div class="col-lg-4">
                                        <label>Nome:</label>
                                        <input type="text" class="form-control dt-input dt-full-name" data-column="1" placeholder="Alaric Beslier" data-column-index="0" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Email:</label>
                                        <input type="text" class="form-control dt-input" data-column="2" placeholder="demo@example.com" data-column-index="1" />
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Colocação/Troca:</label>
                                        <input type="text" class="form-control dt-input" data-column="3" placeholder="colocação/troca" data-column-index="2" />
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Cidade:</label>
                                        <input type="text" class="form-control dt-input" data-column="3" placeholder="Web designer" data-column-index="2" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-4">
                                        <label>Data do Pedido:</label>
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control dt-date flatpickr-range dt-input" data-column="5" placeholder="StartDate to EndDate" data-column-index="4" name="dt_date" />
                                            <input type="hidden" class="form-control dt-date start_date dt-input" data-column="5" data-column-index="4" name="value_from_start_date" />
                                            <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="5" data-column-index="4" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Previsão de Retirada:</label>
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control dt-date flatpickr-range dt-input" data-column="5" placeholder="StartDate to EndDate" data-column-index="4" name="dt_date" />
                                            <input type="hidden" class="form-control dt-date start_date dt-input" data-column="5" data-column-index="4" name="value_from_start_date" />
                                            <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="5" data-column-index="4" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Data Retirada Efetiva:</label>
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control dt-date flatpickr-range dt-input" data-column="5" placeholder="StartDate to EndDate" data-column-index="4" name="dt_date" />
                                            <input type="hidden" class="form-control dt-date start_date dt-input" data-column="5" data-column-index="4" name="value_from_start_date" />
                                            <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="5" data-column-index="4" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="my-0" />
                <div class="card-datatable">
                    <table class="dt-advanced-search table">
                    <!--
                        <thead>
                            <tr>
                                <th></th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Salary</th>


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>City</th>
                                <th>Date</th>
                                <th>Salary</th>


                            </tr>
                        </tfoot>

                    -->

                    <thead>
                        <tr>
                            <th></th>
                            <th>COLOCAÇÃO/TROCA</th>
                            <th>DATA PEDIDO</th>
                            <th>CLIENTE</th>
                            <th>ENDEREÇO</th>
                            <th>BAIRRO</th>
                            <th>TELEFONE</th>
                            <th>PREÇO UNIT.</th>
                            <th>COMENTÁRIOS</th>
                            <th>TOTAL CAÇAMBAS</th>
                            <th>Nº CAÇAMBA</th>
                            <th>QNTD DE DIAS PARA RETIRAR</th> 
                            <th>PREVISÃO DE RETIRADA</th>
                            <th>DATA RETIRADA EFETIVA</th>
                            <th>FEITO?</th>
                            <th>ATERRO</th>
                            <th>PERÍODO DO DIA</th>
                            <th>MOTORISTA</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>COLOCAÇÃO/TROCA</th>
                            <th>DATA PEDIDO</th>
                            <th>CLIENTE</th>
                            <th>ENDEREÇO</th>
                            <th>BAIRRO</th>
                            <th>TELEFONE</th>
                            <th>PREÇO UNIT.</th>
                            <th>COMENTÁRIOS</th>
                            <th>TOTAL CAÇAMBAS</th>
                            <th>Nº CAÇAMBA</th>
                            <th>QNTD DE DIAS PARA RETIRAR</th>                                         
                            <th>PREVISÃO DE RETIRADA</th>
                            <th>DATA RETIRADA EFETIVA</th>
                            <th>FEITO?</th>
                            <th>ATERRO</th>
                            <th>PERÍODO DO DIA</th>
                            <th>MOTORISTA</th>



                        </tr>
                    </tfoot>


                    <!--
                        <thead>
                            <tr>
                                
                                {{-- 
                                    <th></th>
                                <th>id_demand</th>
                                <th>type_service</th>
                                <th>date_begin</th>
                                <th>name_client</th>
                                <th>date_end</th>
                                <th>address_service</th>
                                <th>district_address_service</th>
                                <th>phone_demand</th>
                                <th>price_unit</th>
                                <th>comments_demand</th>
                                <th>dumpster_total</th>
                                <th>dumpster_total_opened</th>
                                <th>dumpster_number</th>
                                <th>date_difference</th>
                                <th>id_landfill</th>
                                <th>update_at</th>
                                <th>service_status</th>
                                <th>period</th>
                                <th>name_driver</th>
                                <th>updated_at</th> --}}
                            </tr>


                        </thead>
                        <tfoot>
                            <tr>
                                {{-- 
                                    <th></th>
                                <th>id_demand</th>
                                <th>type_service</th>
                                <th>date_begin</th>
                                <th>name_client</th>
                                <th>date_end</th>
                                <th>address_service</th>
                                <th>district_address_service</th>
                                <th>phone_demand</th>
                                <th>price_unit</th>
                                <th>comments_demand</th>
                                <th>dumpster_total</th>
                                <th>dumpster_total_opened</th>
                                <th>dumpster_number</th>
                                <th>date_difference</th>
                                <th>id_landfill</th>
                                <th>update_at</th>
                                <th>service_status</th>
                                <th>period</th>
                                <th>name_driver</th>
                                <th>updated_at</th> --}}


                            </tr>
                        </tfoot>                    
                    -->                        
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>


@include('partials.footer')