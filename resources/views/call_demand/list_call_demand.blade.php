
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
    {{-- <div class="app-content content "> --}}
    <div class="app-content content-designed">
        {{-- <div class="content-overlay"></div> --}}
        {{-- <div class="header-navbar-shadow"></div> --}}
        {{-- <div class="content-wrapper container-xxl p-0"> --}}
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
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label>DATA DE ABERTURA</label>
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control dt-date flatpickr-range dt-input  date_format_allocation_search" id="date_format_allocation_search" data-column="5" placeholder="" data-column-index="4" name="dt_date" readonly="readonly">
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
                                                <th>DATA PEDIDO</th>
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
                                                
                                                {{-- <td><a href="/editcalldemand/{{$valDemand->id_demand}}" class="btn btn-info">Editar</a></td> --}}
                                                <td>{{ $valDemand->id }}</td>
                                                
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
                                                        $valDemand->state_address_service.' '; 
                                                    ?>
                                                </td>
                                                <td><?php echo $valDemand->phone_demand; ?></td>
                                                <td><?php echo $valDemand->price_unit; ?></td>
                                                <td><?php echo $valDemand->comments_demand; ?></td>
                                                <td><?php echo $valDemand->dumpster_quantity; ?></td>
                                                <td><?php echo $valDemand->dumpster_number; ?></td>
                                                {{-- <td><?php echo $valDemand->date_end; ?></td> --}}
                                                <td><?php echo $valDemand->service_status; ?></td>
                                                <td><?php echo $valDemand->name_landfill; ?></td>
                                                <td>{{ ($valDemand->name_driver != "") ? $valDemand->name_driver : "" }}</td>
                                            </tr>
                                                <?php endforeach;?>
                                            <?php endif; ?>      
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Nº FICHA</th>
                                                <th>COLOCACAO/TROCA</th>
                                                <th>PERIODO DO DIA</th>
                                                <th>CLIENTE</th>
                                                <th>DATA PEDIDO</th>  
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
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        
        {{-- </div> --}}
    </div>
    <!-- END: Content-->

    <div class="modal text-left" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel6">EDITAR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>MOTORISTAS</p>
                    {{-- <select class="select2 form-control" id="name_driver_selected"> --}}
                    <select class="form-control" id="name_driver_selected">
                        <option value=""></option>
                        <?php if($driver_name_demands):?>

                            <?php foreach($driver_name_demands as $driver_name):?>
                                    <option value="{{ $driver_name->name }}">{{ $driver_name->name }}</option>
                            <?php endforeach;?>

                        <?php endif;?>
                    </select>
                    <div class="form-check form-check-info">
                        <input type="checkbox" class="form-check-input" id="all_drivers" checked="">
                        <label class="form-check-label" for="colorCheck6">Atualizar para todos</label>
                    </div>

                    <input type="hidden" id="iddemand" value="" />
                    <input type="hidden" id="idreg" value="" />
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id= "btn_driver_update" data-dismiss="modal">ATUALIZAR MOTORISTA</button>
                    <a class="btn btn-warning" id="btn_edit">EDITAR</a>
                </div> 
               
            </div> 


        
        </div>
    </div>

{{-- @include('partials.footer')  --}}
@include('partials.footer_teste') 

<script>
$(document).ready(function() {

        let tbpedido = $('#tbpedido').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            },
            order: [[0, 'desc']],
            scrollX: true,
            dom: 'Bfrtip',
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
                'copy', 'csv', 'excel'
            ]
        } );

        $('#tbpedido tbody').on('click', 'tr', function () {


            let selectedRows = tbpedido.rows({ selected: true });
            let selectedData = selectedRows.data();
            let id_reg       = selectedData[tbpedido.row( this ).index()][0];
            let id_demand    = selectedData[tbpedido.row( this ).index()][1];
            let nameDriver   = "";

            nameDriver = selectedData[tbpedido.row( this ).index()][18];
            
            $("#all_drivers").prop("checked", true);
            $("#modal-edit").modal('toggle');

            if(nameDriver != "")
            {
                $("#name_driver_selected").val( $('option:contains("' + nameDriver + '")').val());
            }else {

                $("#name_driver_selected").val( $('option:contains("----")').val());
            }

            $("#idreg").val(id_reg);
            $("#iddemand").val(id_demand);
            $("#btn_edit").attr("href","/editcalldemand/" + id_reg);

        });

        $("#btn_driver_update").click(function(){

            let idDemand            = $("#iddemand").val();
            let idReg               = $("#idreg").val();
            let nameDriverSelected  = $("#name_driver_selected").val();
            let all_drivers_checked = $("#all_drivers")[0].checked;


            if(all_drivers_checked === true){
                console.log("Atualizará todos os pedidos");
                console.log("ID do pedido: " + idDemand);
            }else{
                console.log("Atualizará somente 1 pedido");
                console.log("ID do registro: " + idReg);

            }




            let selectedRows = tbpedido.rows({ selected: true });
            let selectedData = selectedRows.data();
            let nameDriver   = selectedData[tbpedido.row( $('tr td:contains(' + idReg + ')') ).index()][18];
            console.log("********************************************");
            
            
            // console.log(selectedData[tbpedido.row( $('tr td:contains(' + idReg + ')') ).index()]);
            // selectedData;
            console.log("+++++++++++++++++++++++++++++++++++++++++++++");
            console.log("Nome: " + selectedData[tbpedido.row( $('tr td:contains(' + idReg + ')') ).index()][18]);

            console.log("Nome selecionado: " + nameDriverSelected);
            console.log("Id registro: " + idReg + "\n" + "Nome: " + nameDriver);
            console.log("#############################################");

            // $.post('editcalldemand',{drivers_checked : all_drivers_checked,  id_reg: idReg, id_demand : idDemand}).done(function(dataResponse){

            //     console.log(dataResponse);

            // }).fail(function(errorMessage){
            //     console.log(errorMessage);
            // })

            
            /*
            console.log("********************************************");
            // tbpedido.columns(18).search(nameDriverSelected, true,false);
            // console.log(Object.values(tbpedido.columns(2)));

            data = tbpedido.columns(1).search('24').data();
            console.log(data);
            console.log("++++++++++++++++++++++++++++++++++++++++++++");
            */

        })

        $("#name_search").on('change', function(a){

            let namesList = String($("#name_search").val());

            tbpedido
                .columns(18)
                .search(namesList.replace(/,/g, "|"), true,false)
                .draw();
        });

        $("#date_format_allocation_search").on('change', function(a){

            let dateDemandFilter = String($("#date_format_allocation_search").val()).replace(/\s/g,'');
            
            tbpedido
                .columns(5)
                .search(dateDemandFilter.replace(/,/g,"|"), true,false)
                .draw();            

        });

        $("btn-driver-option").click(function(){
            
            console.log("++++++++++");
            console.log(this.text());
            console.log("**********");
        });

        

});




</script>