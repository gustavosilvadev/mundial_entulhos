
<?php

/** 
 * COLOCACAO/TROCA
 * DATA PEDIDO
 * CLIENTE (NOME/SOBRENOME)
 * ENDEREÇO DA OBRA
 * BAIRRO
 * TELEFONE
 * PREÇO
 * COMENTÁRIOS
 * TOTAL CACAMBAS
 * PREVISAO DE RETIRADA
 * DATA RETIRADA EFETIVA
 * STATUS
 * ATERRO
 * PERIODO DO DIA
 * MOTORISTA
 * 
 * **/

?>
 
 @include('partials.header_teste')
 @include('partials.nav_teste')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Lista de Pedidos</h2>

                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <div class="row">
                <!-- 
                    <div class="col-12">
                        <div class="alert alert-primary" role="alert">
                            <div class="alert-body"><strong>Info:</strong> Use this layout to set menu (navigation) default collapsed. Please check the&nbsp;<a class="text-primary" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-layout-collapsed-menu.html" target="_blank">Layout collapsed menu documentation</a>&nbsp; for more details.</div>
                        </div>
                    </div>
                -->
 
                </div>


                <section id="ajax-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">PESQUISA</h4>
                                </div>

                                <div class="card-body mt-2">
                                    <form class="dt_adv_search" method="POST">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-row mb-1">
                                                    <div class="col-lg-4 mb-1">
                                                        <label>MOTORISTA</label>
                                                        <select class="select2 form-control" id="name_search" multiple>
                                                            <?php if($driver_name_demands):?>
                                                            <?php foreach($driver_name_demands as $driver_name):?>
                                                                <option value="{{ $driver_name->name }}">{{ $driver_name->name }}</option>
                                                            <?php endforeach;?>

                                                            <?php endif;?>
                                                            <option value="Teste">Teste</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label></label>
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control dt-date flatpickr-range dt-input flatpickr-input" data-column="5" placeholder="StartDate to EndDate" data-column-index="4" name="dt_date" readonly="readonly">
                                                            <input type="hidden" class="form-control dt-date start_date dt-input" data-column="5" data-column-index="4" name="value_from_start_date">
                                                            <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="5" data-column-index="4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="reset" class="btn btn-warning" value="Limpar">
                                    </form>
                                </div>                              
                                <div class="card-datatable">

                                    <table id="tbpedido" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nº FICHA</th>
                                                <th>COLOCACAO/TROCA</th>
                                                <th>PERIODO DO DIA</th>
                                                <th>CLIENTE</th>
                                                <th>DATA ABERTURA</th>  
                                                <th>DATA OPERACAO</th>
                                                <th>DATA ALOCAÇÃO</th>
                                                <th>DATA PREV RETIRADA</th>
                                                <th>DATA RETIRADA EFETIVA</th>
                                                <th>ENDEREÇO</th>
                                                <th>TELEFONE</th>
                                                <th>PREÇO</th>
                                                <th>COMENTÁRIOS</th>
                                                <th>QUANTIDADE CACAMBAS</th>
                                                <th>NÚMERO CAÇAMBA</th>
                                                {{-- <th>DATA RETIRADA EFETIVA</th>  --}}
                                                <th>STATUS</th> 
                                                <th>ATERRO</th>
                                                <th>MOTORISTA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($calldemands)): ?>
                                                <?php foreach($calldemands as $valDemand):?>        
                                            <tr>
                                                <td><a href="/editcalldemand/{{$valDemand->id_demand}}" class="btn btn-info">Editar</a></td>
                                                <td>{{ $valDemand->id_demand }}</td>
                                                <td><?php echo $valDemand->type_service; ?></td>
                                                <td><?php echo $valDemand->period; ?></td>
                                                <td><?php echo $valDemand->name; ?></td>
                                                <td><?php echo $valDemand->created_at; ?></td>
                                                <td><?php echo $valDemand->date_start; ?></td>
                                                <td><?php echo $valDemand->date_allocation_dumpster; ?></td>
                                                <td><?php echo $valDemand->date_removal_dumpster_forecast; ?></td>
                                                <td><?php echo $valDemand->date_effective_removal_dumpster; ?></td>
                                                <td>
                                                    <?php echo $valDemand->address_service.' '.
                                                $valDemand->number_address_service.' '.
                                                $valDemand->district_address_service.' '.
                                                $valDemand->city_address_service.' '.
                                                $valDemand->state_address_service.' '; ?>
                                                </td>
                                                <td><?php echo $valDemand->phone_demand; ?></td>
                                                <td><?php echo $valDemand->price_unit; ?></td>
                                                <td><?php echo $valDemand->comments_demand; ?></td>
                                                <td><?php echo $valDemand->dumpster_quantity; ?></td>
                                                <td><?php echo $valDemand->dumpster_number; ?></td>
                                                {{-- <td><?php echo $valDemand->date_end; ?></td> --}}
                                                <td><?php echo $valDemand->service_status; ?></td>
                                                <td><?php echo $valDemand->name_landfill; ?></td>
                                                {{-- <td><?php echo $valDemand->name_driver; ?></td> --}}
                                                
                                                <td>
                                                    <?php 
                                                    if($valDemand->name_driver != ""){

                                                        echo $valDemand->name_driver; 
                                                    }else
                                                        echo "Teste";
                                                    ?>
                                                </td>
{{--                                                 
                                                <td>

                                                    <select class="select2 form-control" id="name_driver_selected">
                                                        <option>---</option>
                                                        <?php if($driver_name_demands):?>

                                                            <?php foreach($driver_name_demands as $driver_name):?>
                                                                <?php if($driver_name->name == $valDemand->name_driver): ?>
                                                                    <option selected>{{ $driver_name->name }}</option>
                                                                <?php else: ?>
                                                                <option>{{ $driver_name->name }}</option>
                                                                <?php endif; ?>
                                                            <?php endforeach;?>

                                                        <?php endif;?>
                                                    </select>                                                    
                                                </td> 
--}}

                                            </tr>
                                                <?php endforeach;?>
                                            <?php endif; ?>      
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID PED</th>
                                                <th>COLOCACAO/TROCA</th>
                                                <th>PERIODO DO DIA</th>
                                                <th>CLIENTE</th>
                                                <th>DATA ABERTURA</th>  
                                                <th>DATA OPERACAO</th>
                                                <th>DATA ALOCAÇÃO</th>
                                                <th>DATA PREV RETIRADA</th>
                                                <th>ENDEREÇO</th>
                                                <th>TELEFONE</th>
                                                <th>PREÇO</th>
                                                <th>COMENTÁRIOS</th>
                                                <th>QUANTIDADE CACAMBAS</th>
                                                <th>NÚMERO CAÇAMBA</th>
                                                <th>DATA RETIRADA EFETIVA</th> 
                                                <th>STATUS</th> 
                                                <th>ATERRO</th>
                                                <th>MOTORISTA</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->



{{-- @include('partials.footer')  --}}
@include('partials.footer_teste') 

<script>
$(document).ready(function() {

    $(document).ready(function() {

        var tbpedido = $('#tbpedido').DataTable( {
                scrollX: true,
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv', 'excel', 'pdf', 'print'
                    'copy', 'csv', 'excel'
                ]
            } );

        $('#tbpedido tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                tbpedido.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }

        });


        $("#name_search").on('change', function(a, b, c){
            // console.log(this.value + " ++ \n");
            tbpedido
                .columns(18)
                .search( this.value )
                .draw();
        });
    });

});




</script>