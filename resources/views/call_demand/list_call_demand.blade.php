@include('partials.header_teste')
@include('partials.nav_teste')

 <style>
    thead input {
        width: 100%;
    }

    .row_bg_status {
        background: lightgreen !important;
        font-weight: 600;
    }

    .row_selected_bg {
        background: rgb(218 218 218) !important;
        font-weight: 600;
    }

    .dataTables_scrollBody{
        position: relative;
        overflow: auto;
        width: 100%;
        max-height: 100% !important;
    }

    input[type="checkbox"].checkBoxDeleteId {
        width: 20px;
        height: 20px;
    }

 </style>
    <!-- BEGIN: Content-->

    <div class="app-content content-designed">

        <div class="content-body">
            <div class="row"></div>


            <section id="ajax-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body mt-2">
                                <form class="dt_adv_search" method="POST">
                                    <div class="row">
                                        <div class="col-12">

                                            <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                                                <div class="card collapse-icon">
                                                    <div class="collapse-default">
                                                        <div class="card">

                                                            <button onclick="return false;" class="btn btn-dark" data-toggle="collapse" role="button" data-target="#accordion1" aria-expanded="false" aria-controls="accordion1">
                                                                PESQUISAR
                                                            </button>
                                                            <div id="accordion1" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
                                                                <div class="card-body">
                                                                    <div class="form-row mb-1">
                                                                        <div class="col-lg-4 mb-1">
                                                                            <label>MOTORISTA</label>
                                                                            <select class="select2 form-control" id="name_search" multiple data-mdb-clear-button="true">
                                                                                <?php if($driver_name_demands):?>
                                                                                <?php foreach($driver_name_demands as $driver_name):?>
                                                                                    <option value="{{ $driver_name->name }}">{{ $driver_name->name }}</option>
                                                                                <?php endforeach;?>

                                                                                <?php endif;?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-lg-4">
                                                                            <label>DATA DA COLOCAÇÃO</label>
                                                                            <div class="form-group mb-0">
                                                                                <input type="text" class="form-control dt-date flatpickr-range dt-input  date_format_allocation_search" id="date_format_allocation_search" data-column="5" placeholder="" data-column-index="4" name="dt_date" readonly="readonly">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label>-----</label>
                                                                            <div class="form-group mb-0">
                                                                                <input type="button" class="btn btn-warning" value="Limpar Filtro" id="btn_reset_input">
                                                                                <input type="button" class="btn btn-danger" value="Deletar Pedido" id="btn_delete_demand">
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                            </div>
 

 
                                        </div>
                                    </div>

                                </form>
                            </div>                              
                            <div class="card-datatable">
                                <div class="table-responsive">
                                    <table id="tbpedido" class="table table-striped display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>&nbsp</th>
                                                <th>Nº FICHA</th>
                                                <th>COLOCAÇÃO/TROCA</th>
                                                <th>PERÍODO DO DIA</th>
                                                <th>CLIENTE</th>
                                                <th>DATA ATEND/MOTORISTA</th>
                                                <th>DATA DA COLOCAÇÃO</th>
                                                <th>DATA PREV RETIRADA</th>
                                                <th>DATA RETIRADA EFETIVA</th>
                                                <th>ENDEREÇO</th>
                                                <th>TELEFONE</th>
                                                <th>PREÇO</th>
                                                <th>COMENTÁRIOS</th>
                                                <th>INFORMAÇÕES</th>
                                                <th>NÚMERO CAÇAMBA</th>
                                                <th>STATUS</th> 
                                                <th>ATERRO</th>
                                                <th>MOTORISTA</th>
                                                <th>PAGO</th>
                                                <th>RECIBO/NF</th>
                                                <th>NF</th>
                                                <th>Data Emissão NF</th>
                                                <th>Data Vencimento NF</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($calldemands)): ?>
                                                <?php foreach($calldemands as $valDemand):?>        
                                            <tr class="{{ ($valDemand->payment_demand == true) ? 'row_bg_status' : '' }}">

                                                <td><input type="checkbox" class="checkBoxDeleteId" value="{{ $valDemand->id }}"/></td>
                                                {{-- <td><strong>{{ $valDemand->id}}</strong>/{{$valDemand->id_demand}}</td> --}}
                                                <td>{{ $valDemand->id}}/{{$valDemand->id_demand}}</td>
                                                <td><?php echo $valDemand->type_service; ?></td>
                                                <td><?php echo $valDemand->period; ?></td>
                                                <td><?php echo $valDemand->name; ?></td>
                                                {{-- <td><?php echo $valDemand->date_start; ?></td>
                                                <td><?php echo $valDemand->date_allocation_dumpster; ?></td>
                                                <td><?php echo $valDemand->date_removal_dumpster_forecast; ?></td>
                                                <td><?php echo $valDemand->date_effective_removal_dumpster; ?></td> --}}
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
                                                <td><?php echo $valDemand->comments_contract; ?></td>
                                                <td><?php echo ($valDemand->dumpster_number_substitute > 0) ? $valDemand->dumpster_number_substitute : $valDemand->dumpster_number; ?></td>
                                                <td>

                                                    <?php if($valDemand->service_status == 0):?>
                                                        <label class="text-warning font-weight-bold">PENDENTE</label>
                                                    <?php elseif($valDemand->service_status == 1):?>
                                                        <label class="text-success font-weight-bold">EM ATENDIMENTO</label>
                                                    
                                                    <?php elseif($valDemand->service_status == 5):?>
                                                        <label class="text-info font-weight-bold">FINALIZADO</label>                                                        
                                                    <?php endif;?>                                                    
                                                </td>
                                                <td><?php echo $valDemand->name_landfill; ?></td>
                                                <td>{{ (isset($valDemand->name_driver) && $valDemand->name_driver != "") ? $valDemand->name_driver : "" }}</td>
                                                <td class="text-center">
                                                    <?php if($valDemand->payment_demand == true):?>
                                                    <h4 class="text-primary">SIM</h4>
                                                    <?php else:?>
                                                    <h4 class="text-danger">Não</h4>
                                                    <?php endif;?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $valDemand->receipt_nf; ?>
                                                </td>

                                                <td>{{ $valDemand->nf }}</td>
                                                <td>{{ $valDemand->date_issue }}</td>                                                
                                                <td>{{ $valDemand->date_payment_forecast }}</td>                                                
                                            </tr>
                                                <?php endforeach;?>
                                            <?php endif; ?>      
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>Nº FICHA</th>
                                                <th>COLOCAÇÃO/TROCA</th>
                                                <th>PERÍODO DO DIA</th>
                                                <th>CLIENTE</th>
                                                <th>DATA ATEND/MOTORISTA</th>
                                                <th>DATA DA COLOCAÇÃO</th>
                                                <th>DATA PREV RETIRADA</th>
                                                <th>DATA RETIRADA EFETIVA</th>
                                                <th>ENDEREÇO</th>
                                                <th>TELEFONE</th>
                                                <th>PREÇO</th>
                                                <th>COMENTÁRIOS</th>
                                                <th>INFORMAÇÕES</th>
                                                <th>NÚMERO CAÇAMBA</th>
                                                <th>STATUS</th> 
                                                <th>ATERRO</th>
                                                <th>MOTORISTA</th>
                                                <th>PAGO</th>
                                                <th>RECIBO/NF</th>
                                                <th>NF</th>
                                                <th>Data Emissão NF</th>
                                                <th>Data Vencimento NF</th>
                                            </tr>                                            
                                        </tfoot>
                                    </table>
                                </div>
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
                    <h4 class="modal-title text-danger" id="modalTitleError"></h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="loading-content" style="text-align: center;">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Carregando...</span>
                    </div>
                </div> 

                <div class="modal-body" id="content-modal">
                    <label for="">Motorista - DESTE CHAMADO</label>
                    <select class="form-control" id="name_driver_selected">
                        <option value=""></option>
                        <?php if($driver_name_demands):?>

                            <?php foreach($driver_name_demands as $driver_name):?>
                                    <option value="{{ $driver_name->id }}">{{ $driver_name->name }}</option>
                            <?php endforeach;?>

                        <?php endif;?>
                    </select>
                    <hr />
                    <label for="">Motorista - RETIRADA</label>
                    <select class="form-control" id="name_driver_removal_selected">
                        <option value=""></option>
                        <?php if($driver_name_demands):?>

                            <?php foreach($driver_name_demands as $driver_name):?>
                                    <option value="{{ $driver_name->id }}">{{ $driver_name->name }}</option>
                            <?php endforeach;?>

                        <?php endif;?>
                    </select>

                    <label for="">Data de Retirada Efetiva</label>
                    <input type="text" name="effective_date_removal_dumpster" id="effective_date_removal_dumpster" class="form-control dt-date flatpickr-range dt-input date_format date_allocation_dumpster date_format_allocation" data-column="5"  data-column-index="4"/>


                    <label for="">Pago</label>
                    <select class="form-control" id="payment_status">
                        <option value="0">NÃO</option>
                        <option value="1">SIM</option>
                    </select>

                    <input type="hidden" id="iddemand" value="" />
                    <input type="hidden" id="idreg" value="" />
                    <button type="button" class="btn btn-success btn-lg btn-block mt-1" id="btn_driver_update" data-dismiss="modal">ATUALIZAR</button>
                </div>
                
                <div class="modal-footer" id="button-footer">
                    <a class="btn btn-info" id="btn_replace_dumpster">ACIONAR TROCA</a>
                    <a class="btn btn-warning" id="btn_edit">EDITAR PEDIDO</a>
                </div> 
               
            </div> 
        </div>
    </div>

@include('partials.footer_teste') 

<script>
$(document).ready(function() {

        $('.checkBoxDeleteId').click(function(){
            let numeroFicha = $(this).val();
            if($(this).is(':checked')){
                $('#tbpedido tr:contains("'+ numeroFicha +'/")').addClass('row_selected_bg');
            }else{
                $('#tbpedido tr:contains("'+ numeroFicha +'/")').removeClass('row_selected_bg');
            }
        });

        $("#btn_delete_demand").click(function(){
            
            let idDemands = [];
            $(':checkbox:checked').each(function(i){
                idDemands[i] = $(this).val();
            });

            if(idDemands != ""){
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
            }
        });

        $("#btn_reset_input").click(function(){

            let multiselectName = $('#name_search');
            multiselectName.select2();
            multiselectName.val(null).trigger('change');

            flatpickr(".date_format_allocation_search",{ dateFormat: "d/m/Y", allowInput: true });

            $(".flatpickr").on('input', function(e) {
                if(!this.shouldClear && !this.value.length && this._flatpickr.currentYear ) {
                    this.shouldClear = true;
                    this._flatpickr.clear();
                    this.shouldClear = false;
                }
            });

            $('.date_format_allocation_search').flatpickr({
                mode: "multiple",
                dateFormat: "d/m/Y"
            }).clear();

            tbpedido.search('').columns().search('').draw();

        });

        $('#tbpedido thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#tbpedido thead');

        let tbpedido = $('#tbpedido').DataTable( {
            "language": {
                "url": "public/assets/json/Portuguese-Brasil.json"
            },

            scrollY: "300px",
            scrollX: true,
            autoWidth: true,
            processing: true,
            scrollCollapse: true,
            paginate: true,
            fixedColumns: {
            left: 2
            },
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

        $('#tbpedido tbody tr').on('click', function (evt) {
            
            $("#loading-content").show();
            $("#content-modal").hide()
            $("#button-footer").hide();

            let selectedRows    = "";
            let selectedData    = "";
            let id_reg          = "";
            let id_demand       = "";
            let nameDriver      = "";
            let paymentStatus   = "";
            let dateEffectiveRemoval = "";
            let $cell=$(evt.target).closest('td');

            if( $cell.index()>0){

                selectedRows  = tbpedido.rows({ selected: true });
                selectedData  = selectedRows.data();
                id_reg        = $(this).find("td:eq(1)").text().split('/')[0];
                id_demand     = $(this).find("td:eq(1)").text().split('/')[1];
                nameDriver    = $(this).find("td:eq(17)").text();

                nameDriverRemoval = "";
                paymentStatus = $(this).find("td:eq(18)").text().toUpperCase();
                dateEffectiveRemoval = $(this).find("td:eq(8)").text();

                $("#modal-edit").modal('toggle');


                if(nameDriver !== ''){
                    // SELECIONA MOTORISTA DE ATENDIMENTO COLOCAÇÃO/TROCA
                    let opts = document.getElementById("name_driver_selected").options;
                    let indexOptionDriver = 0;
                    for(var i = 0; i < opts.length; i++) {
                        if(opts[i].innerText == nameDriver) {
                            indexOptionDriver = i;
                            break;
                        }

                    }
                    $('#name_driver_selected option').eq(indexOptionDriver).prop('selected', true);
                }else{

                    $('#name_driver_selected option').eq(0).prop('selected', true);

                }

  
                // SELECIONA MOTORISTA DE ATENDIMENTO RETIRADA
                $.get('{{ route('showremovaldumpster.demand') }}',{ id_demand_reg: id_reg, id_demand: id_demand, dumpster_removal: true }).done(function(respData){

                    if(respData.name !== undefined || respData.name !== ''){
                        // SELECIONA MOTORISTA DE ATENDIMENTO COLOCAÇÃO/TROCA
                        let opts = document.getElementById("name_driver_removal_selected").options;
                        let indexOptionDriverRemoval = 0;
                        for(var i = 0; i < opts.length; i++) {
                            if(opts[i].innerText == respData.name) {
                                indexOptionDriverRemoval = i;
                                break;
                            }
                        }
                        $('#name_driver_removal_selected option').eq(indexOptionDriverRemoval).prop('selected', true);
                    }else{

                        $('#name_driver_removal_selected option').eq(0).prop('selected', true);

                    }

                    $("#loading-content").hide();
                    $("#content-modal").show()
                    $("#button-footer").show();

                });

                if(paymentStatus.trim() != "")
                {
                    if(paymentStatus.trim() != 'SIM'){
                        $('#payment_status option').eq(0).prop('selected', true);
                    }else{
                        $('#payment_status option').eq(1).prop('selected', true);
                    }

                }else{
                    // $("#payment_status option:contains()").attr("selected", false);
                    $('#payment_status option').eq(0).prop('selected', true);
                }

                $("#effective_date_removal_dumpster").val(dateEffectiveRemoval);
                $("#idreg").val(id_reg);
                $("#iddemand").val(id_demand);
                $("#btn_edit").attr("href","editcalldemand/" + id_reg);




            }
        });

       
        $("#btn_replace_dumpster").click(function(){

            let idReg    = $("#idreg").val();
            let idDemand = $("#iddemand").val();

            window.location.href = '{{ route('calldemand.replacement')}}/' + idReg;
        });

        $("#btn_driver_update").click(function(){

            let idDemand            = $("#iddemand").val();
            let idReg               = $("#idreg").val();
            let numeroFicha         = idReg + '/' + idDemand;
            let idDriverSelected    = $("#name_driver_selected").val();
            let nameDriverSelected  = $("#name_driver_selected").find('option:selected').text()
            
            let idDriverRemovalDumpsterSelected    = $("#name_driver_removal_selected").val();
            let nameDriverRemovalDumpsterSelected  = $("#name_driver_removal_selected").find('option:selected').text()

            let effectiveDateRemoval = $("#effective_date_removal_dumpster").val();
            let paymentStatus       = ($("#payment_status").val() == "1") ? true : false;

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'POST',
                url: '{{ route('changedriver.demand') }}',
                data: { 
                    id_driver : idDriverSelected,
                    id_driver_removal_dumpster : idDriverRemovalDumpsterSelected,
                    effective_date_removal : effectiveDateRemoval,
                    payment_status : paymentStatus,
                    id_reg: idReg, 
                    id_demand : idDemand
                },
                success: function(dataResponse) {

                    if(dataResponse){
                        
                        // rowIndex = tbpedido.row().column(1).data().indexOf(idReg);
                        rowIndex = tbpedido.row().column(1).data().indexOf(numeroFicha);
                        tbpedido.cell(":eq("+rowIndex+")", 17).data(nameDriverSelected);
                        tbpedido.cell(":eq("+rowIndex+")", 18).data((paymentStatus) ? "<h4 class='text-primary'>SIM</h4>" : "<h4 class='text-danger'>Não</h4>");
                        tbpedido.cell(":eq("+rowIndex+")", 8).data(effectiveDateRemoval);

                        if(paymentStatus){
                            $('#tbpedido tr:contains("'+ numeroFicha +'")').addClass('row_bg_status');

                        }else{
                            $('#tbpedido tr:contains("'+ numeroFicha +'")').removeClass('row_bg_status');
                        }

                    }else
                        alert("Erro ao atualizar o nome do Motorista!");
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
                .columns(17)
                .search(namesList.replace(/,/g, "|"), true,false)
                .draw();
        });

        $("#date_format_allocation_search").on('change', function(a){

            let dateDemandFilter = String($("#date_format_allocation_search").val()).replace(/\s/g,'');

            tbpedido
                .columns(6)
                .search(dateDemandFilter.replace(/,/g,"|"), true,false)
                .draw();            

        });
});

</script>