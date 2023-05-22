 @include('partials.header_teste')
 @include('partials.nav_teste')

 <style>
    thead input {
        width: 100%;
    }
 </style>
    <!-- BEGIN: Content-->

    <div class="app-content content-designed">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">

                        {{-- <h1>{{ $parse['host'] }}</h1> --}}
                        <h2 class="content-header-title float-left mb-0 text-info" style="text-decoration: underline">BASE PEDIDOS</h2>

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
                                {{-- <h4 class="card-title">PESQUISA</h4> --}}
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
                                                    <label>DATA DE ALOCAÇÃO</label>
                                                    <div class="form-group mb-0">
                                                        <input type="text" class="form-control dt-date flatpickr-range dt-input  date_format_allocation_search" id="date_format_allocation_search" data-column="5" placeholder="" data-column-index="4" name="dt_date" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="reset" class="btn btn-warning" value="Limpar">
                                    <input type="button" class="btn btn-danger" value="Deletar" id="btn_delete_demand">
                                </form>
                            </div>                              
                            <div class="card-datatable">

                                <table id="tbpedido" class="table table-striped display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nº FICHA</th>
                                            <th>Nº PEDIDO</th>
                                            <th>COLOCAÇÃO/TROCA</th>
                                            <th>PERÍODO DO DIA</th>
                                            <th>CLIENTE</th>
                                            <th>DATA PEDIDO</th>
                                            <th>DATA OPERAÇÃO</th>
                                            <th>DATA ALOCAÇÃO</th>
                                            <th>DATA PREV RETIRADA</th>
                                            <th>DATA RETIRADA EFETIVA</th>
                                            <th>ENDEREÇO</th>
                                            <th>TELEFONE</th>
                                            <th>PREÇO</th>
                                            <th>COMENTÁRIOS</th>
                                            <th>QUANTIDADE CACAMBAS</th>
                                            <th>NÚMERO CAÇAMBA</th>
                                            <th>STATUS</th> 
                                            <th>ATERRO</th>
                                            <th>MOTORISTA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($calldemands)): ?>
                                            <?php foreach($calldemands as $valDemand):?>        
                                        <tr>

                                            <td><input type="checkbox" class="checkBoxDeleteId" value="{{ $valDemand->id }}"/></td>
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
                                            <th>Nº PEDIDO</th>
                                            <th>COLOCAÇÃO/TROCA</th>
                                            <th>PERÍODO DO DIA</th>
                                            <th>CLIENTE</th>
                                            <th>DATA PEDIDO</th>  
                                            <th>DATA OPERAÇÃO</th>
                                            <th>DATA ALOCAÇÃO</th>
                                            <th>DATA PREV RETIRADA</th>
                                            <th>DATA RETIRADA EFETIVA</th>
                                            <th>ENDEREÇO</th>
                                            <th>TELEFONE</th>
                                            <th>PREÇO</th>
                                            <th>COMENTÁRIOS</th>
                                            <th>QUANTIDADE CACAMBAS</th>
                                            <th>NÚMERO CAÇAMBA</th>
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

                    <select class="form-control" id="name_driver_selected">
                        <option value=""></option>
                        <?php if($driver_name_demands):?>

                            <?php foreach($driver_name_demands as $driver_name):?>
                                    <option value="{{ $driver_name->id }}">{{ $driver_name->name }}</option>
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
                    <button type="button" class="btn btn-success" id="btn_driver_update" data-dismiss="modal">ATUALIZAR MOTORISTA</button>
                    <a class="btn btn-warning" id="btn_edit">EDITAR</a>
                </div> 
               
            </div> 


        
        </div>
    </div>

@include('partials.footer_teste') 

<script>
$(document).ready(function() {

        $("#btn_delete_demand").click(function(){
            
            let idDemands = [];
            $(':checkbox:checked').each(function(i){
                idDemands[i] = $(this).val();
            });

            idDemands.splice(-1);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'POST',
                url: 'delete_demand',
                data: { 
                    id_demands : idDemands
                    
                },
                success: function(dataResponse) {
                    
                    location.reload();

                },
                error: function(responseError){
                    alert("Erro ao deletar registros: " + responseError);
                    console.log(responseError);
                }
            });
        });


        $('#tbpedido thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#tbpedido thead');

        let tbpedido = $('#tbpedido').DataTable( {
            "language": {
                // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                "url": "public/assets/json/Portuguese-Brasil.json"
            },
            order: [[2, 'asc']],
            scrollX: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel'
            ],
            // Adicionando filtros em todas as colunas

            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function () {
                var api = this.api();

                // For each column
                api
                    .columns()
                    .every(function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
    
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
    
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    })
                    .eq(0)
                    .each(function (colIdx) {

                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );

                        var title = $(cell).text();
                        $(cell).html('<input type="text" />');

                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('change', function (e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})';

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function (e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });

                    });
            },

        } );
/*
        $('#tbpedido tbody').on('click', 'tr', function () {

            let selectedRows = tbpedido.rows({ selected: true });
            let selectedData = selectedRows.data();
            let id_reg       = $(this).find("td:eq(1)").text();
            let id_demand    = $(this).find("td:eq(2)").text();
            let nameDriver   = $(this).find("td:eq(19)").text();

            $("#all_drivers").prop("checked", true);
            $("#modal-edit").modal('toggle');

            if(nameDriver != "")
            {
                $("#name_driver_selected  option:contains("+ nameDriver +")").attr("selected", "selected");

            }else {

                $("#name_driver_selected  option:contains()").attr("selected", false);
            }

            $("#idreg").val(id_reg);
            $("#iddemand").val(id_demand);
            $("#btn_edit").attr("href","editcalldemand/" + id_reg);
  
        });
*/
        $('#tbpedido tbody tr').on('click', function (evt) {
            
            let $cell=$(evt.target).closest('td');
            
            if( $cell.index()>0){

                let selectedRows = tbpedido.rows({ selected: true });
                let selectedData = selectedRows.data();
                let id_reg       = $(this).find("td:eq(1)").text();
                let id_demand    = $(this).find("td:eq(2)").text();
                let nameDriver   = $(this).find("td:eq(19)").text();

                $("#all_drivers").prop("checked", true);
                $("#modal-edit").modal('toggle');

                if(nameDriver != "")
                {
                    $("#name_driver_selected  option:contains("+ nameDriver +")").attr("selected", "selected");

                }else {

                    $("#name_driver_selected  option:contains()").attr("selected", false);
                }

                $("#idreg").val(id_reg);
                $("#iddemand").val(id_demand);
                $("#btn_edit").attr("href","editcalldemand/" + id_reg);


            }
        });

        $("#btn_driver_update").click(function(){

            let idDemand            = $("#iddemand").val();
            let idReg               = $("#idreg").val();
            let idDriverSelected    = $("#name_driver_selected").val();
            let nameDriverSelected  = $("#name_driver_selected").find('option:selected').text()
            let all_drivers_checked = $("#all_drivers")[0].checked;

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'POST',
                url: 'changedriverdemand',
                data: { 
                    drivers_checked : all_drivers_checked, 
                    id_driver : idDriverSelected, 
                    id_reg: idReg, 
                    id_demand : idDemand
                },
                success: function(dataResponse) {
                    
                    if(dataResponse){
                        rowIndex = tbpedido.row().column(1).data().indexOf(idReg);
                        tbpedido.cell(":eq("+rowIndex+")", 19).data(nameDriverSelected);
                    }else
                        alert("Erro na atualização do nomes!");
                },
                error: function(responseError){
                    alert("Erro interno: " + responseError);
                    console.log(responseError);
                }
            });              

        })

        $("#name_search").on('change', function(a){

            let namesList = String($("#name_search").val());

            tbpedido
                .columns(19)
                .search(namesList.replace(/,/g, "|"), true,false)
                .draw();
        });

        $("#date_format_allocation_search").on('change', function(a){

            let dateDemandFilter = String($("#date_format_allocation_search").val()).replace(/\s/g,'');

            tbpedido
                .columns(8)
                .search(dateDemandFilter.replace(/,/g,"|"), true,false)
                .draw();            

        });


});




</script>