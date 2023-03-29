
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
 @include('partials.nav_teste');

{{-- 
 <div class="app-content content ">
<div style="overflow-y: scroll;">
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>COLOCACAO/TROCA</th>
                            <th>DATA ABERTURA</th>
                            <th>DATA ALOCAÇÃO</th>
                            <th>CLIENTE</th>
                            <th>ENDEREÇO DA OBRA</th>
                            <th>BAIRRO</th>
                            <th>TELEFONE</th>
                            <th>PREÇO</th>
                            <th>COMENTÁRIOS</th>
                            <th>TOTAL CACAMBAS</th>
                            <th>PREVISAO DE RETIRADA</th>
                            <th>DATA RETIRADA EFETIVA</th>
                            <th>STATUS</th>
                            <th>ATERRO</th>
                            <th>PERIODO DO DIA</th>
                            <th>MOTORISTA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($calldemandsnodriver)): ?>
                            <?php foreach($calldemandsnodriver as $value_no_driver):?>        
                        <tr>
                            <td><a href="/editcalldemand/{{$value_no_driver->id_demand}}">Detalhes</a></td>
                            <td><?php echo $value_no_driver->type_service; ?></td>
                            <td><?php echo $value_no_driver->created_at; ?></td>
                            <td><?php echo $value_no_driver->date_allocation_dumpster; ?></td>
                            <td><?php echo $value_no_driver->name; ?></td>
                            <td><?php echo $value_no_driver->address_service; ?></td>
                            <td><?php echo $value_no_driver->district_address_service; ?></td>
                            <td><?php echo $value_no_driver->phone_demand; ?></td>
                            <td></td>
                            <td><?php echo $value_no_driver->comments_demand; ?></td>
                            <td><?php echo $value_no_driver->dumpster_total; ?></td>
                            <td><?php echo $value_no_driver->date_removal_dumpster; ?></td>
                            <td><?php echo $value_no_driver->date_effective_removal_dumpster; ?></td>
                            <td><?php echo $value_no_driver->service_status; ?></td>
                            <td></td>
                            <td><?php echo $value_no_driver->period; ?></td>



                        </tr>
                            <?php endforeach;?>
                        <?php endif; ?>      
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>COLOCACAO/TROCA</th>
                            <th>DATA PEDIDO</th>
                            <th>CLIENTE</th>
                            <th>ENDEREÇO DA OBRA</th>
                            <th>BAIRRO</th>
                            <th>TELEFONE</th>
                            <th>PREÇO</th>
                            <th>COMENTÁRIOS</th>
                            <th>TOTAL CACAMBAS</th>
                            <th>PREVISAO DE RETIRADA</th>
                            <th>DATA RETIRADA EFETIVA</th>
                            <th>STATUS</th>
                            <th>ATERRO</th>
                            <th>PERIODO DO DIA</th>
                            <th>MOTORISTA</th>
                        </tr>
                    </tfoot>
                </table>
</div>                 
--}}

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
                                    <h4 class="card-title">Ajax Sourced Server-side</h4>
                                </div>
                                <div class="card-datatable">
                                    <table id="example" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>COLOCACAO/TROCA</th>
                                                <th>DATA ABERTURA</th>
                                                <th>DATA ALOCAÇÃO</th>
                                                <th>CLIENTE</th>
                                                <th>ENDEREÇO DA OBRA</th>
                                                <th>BAIRRO</th>
                                                <th>TELEFONE</th>
                                                <th>PREÇO</th>
                                                <th>COMENTÁRIOS</th>
                                                <th>TOTAL CACAMBAS</th>
                                                <th>PREVISAO DE RETIRADA</th>
                                                <th>DATA RETIRADA EFETIVA</th>
                                                <th>STATUS</th>
                                                <th>ATERRO</th>
                                                <th>PERIODO DO DIA</th>
                                                <th>MOTORISTA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($calldemandsnodriver)): ?>
                                                <?php foreach($calldemandsnodriver as $value_no_driver):?>        
                                            <tr>
                                                <td><a href="/editcalldemand/{{$value_no_driver->id_demand}}">Detalhes</a></td>
                                                <td><?php echo $value_no_driver->type_service; ?></td>
                                                <td><?php echo $value_no_driver->created_at; ?></td>
                                                <td><?php echo $value_no_driver->date_allocation_dumpster; ?></td>
                                                <td><?php echo $value_no_driver->name; ?></td>
                                                <td><?php echo $value_no_driver->address_service; ?></td>
                                                <td><?php echo $value_no_driver->district_address_service; ?></td>
                                                <td><?php echo $value_no_driver->phone_demand; ?></td>
                                                <td></td>
                                                <td><?php echo $value_no_driver->comments_demand; ?></td>
                                                <td><?php echo $value_no_driver->dumpster_total; ?></td>
                                                <td><?php echo $value_no_driver->date_removal_dumpster; ?></td>
                                                <td><?php echo $value_no_driver->date_effective_removal_dumpster; ?></td>
                                                <td><?php echo $value_no_driver->service_status; ?></td>
                                                <td></td>
                                                <td><?php echo $value_no_driver->period; ?></td>
                    
                    
                    
                                            </tr>
                                                <?php endforeach;?>
                                            <?php endif; ?>      
                                        </tbody>                                        
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
            $('#example').DataTable( {
                scrollX: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
} );

</script>