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
                        <h2 class="content-header-title float-left mb-0 text-warning" style="text-decoration: underline;">RESUMO PEDIDOS</h2>

                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            
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
                                        <div class="col-sm">
                                            <label>DATA DE ABERTURA</label>
                                            <div class="form-group mb-0">
                                                <input type="text" class="form-control dt-date flatpickr-range dt-input  date_format_allocation_search" id="date_format_allocation_search" data-column="5" placeholder="" data-column-index="4" name="dt_date" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="col-sm">

                                            <table id="tbmotoristaservicos" class="table table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">CRONOGRAMA DOS TRABALHOS</th>
                                                        <th scope="col">COLOCAÇÃO</th>
                                                        <th scope="col">TROCA</th>
                                                        <th scope="col">RETIRADA</th>
                                                        <th scope="col">TOTAL</th>
            
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- 
                                                    <tr>
                                                        <td>JUSSEIR</td>
                                                        <td>97</td>
                                                        <td>0</td>
                                                        <td>861</td>
                                                        <td>958</td>
                                                    </tr>
                                                    <tr>
                                                        <td>VINICIUS</td>
                                                        <td>52</td>
                                                        <td>1</td>
                                                        <td>680</td>
                                                        <td>733</td>                                                           
                                                    </tr> 
                                                    --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </form>
                            </div>                              
                            <div class="card-datatable">

                                <table id="tbpedido" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>COLOCACAO/TROCA</th>
                                            <th>DATA</th>
                                            <th>CLIENTE</th>
                                            <th>ENDEREÇO</th>
                                            <th>BAIRRO</th>
                                            <th>CIDADE</th>
                                            <th>COMENTÁRIOS</th>
                                            <th>MOTORISTAS</th>
                                            <th>Nº FICHA</th>
                                            <th>Nº PEDIDO</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($calldemands)): ?>
                                            <?php foreach($calldemands as $valDemand):?>        
                                        <tr>
                                            <td><?php echo $valDemand->type_service; ?></td>
                                            <td><?php echo $valDemand->created_at; ?></td>
                                            <td><?php echo $valDemand->name; ?></td>
                                            <td>
                                                <?php echo $valDemand->address_service.' '.
                                                    $valDemand->number_address_service; 
                                                ?>
                                            </td>
                                            <td><?php echo $valDemand->district_address_service; ?></td>
                                            <td><?php echo $valDemand->city_address_service; ?></td>
                                            <td><?php echo $valDemand->comments_demand; ?></td>
                                            <td>{{ ($valDemand->name_driver != "") ? $valDemand->name_driver : "" }}</td> 
                                            <td>{{ $valDemand->id }}</td>
                                            <td>{{ $valDemand->id_demand }}</td>
                                        </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>      
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>COLOCACAO/TROCA</th>
                                            <th>DATA</th>
                                            <th>CLIENTE</th>
                                            <th>ENDEREÇO</th>
                                            <th>BAIRRO</th>
                                            <th>CIDADE</th>
                                            <th>COMENTÁRIOS</th>
                                            <th>MOTORISTAS</th>
                                            <th>Nº FICHA</th>
                                            <th>Nº PEDIDO</th>
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


@include('partials.footer_teste') 

<script>
$(document).ready(function() {
    
    $.ajax({
        method: 'GET',
        url: '/show_activities_driver',
        // data: {date_search : dateSearch},
        success: function(dataResponse) {

            let newRowContent = "";
            $.each(dataResponse, function(iName, infoService){

                totalService = 0

                newRowContent += "<tr>";
                newRowContent += "<td>" + iName + "</td>";
                
                $.each(infoService, function(iTypeService, valService){

                    newRowContent += "<td>" + valService + "</td>";
                    totalService  += valService;
                });
                newRowContent += "<td>" + totalService + "</td>";
                newRowContent += "</tr>";

            });

           $("#tbmotoristaservicos tbody").append(newRowContent);

        },
        error: function(responseError){
            alert(responseError);
        }
    });

    // Formating Call Demand Table
    $('#tbpedido thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#tbpedido thead');

    let tbpedido = $('#tbpedido').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        },
        searching:false,
        order: [[0, 'desc']],
        scrollX: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ],
        // Adicionando filtros em todas as colunass

        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();

            // For each column
            api
                .columns()
                //Teste 
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
                //Teste
                .eq(0)
                .each(function (colIdx) {

                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    // $(cell).html('<input type="text" placeholder="' + title + '" />');
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
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

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

    // $('#tbpedido tbody').on('click', 'tr', function () {


    //     let selectedRows = tbpedido.rows({ selected: true });
    //     let selectedData = selectedRows.data();
    //     let id_reg       = selectedData[tbpedido.row( this ).index()][0];
    //     let id_demand    = selectedData[tbpedido.row( this ).index()][1];
    //     let nameDriver   = "";

    //     nameDriver = selectedData[tbpedido.row( this ).index()][18];
        
    //     $("#all_drivers").prop("checked", true);
    //     $("#modal-edit").modal('toggle');

    //     if(nameDriver != "")
    //     {
    //         $("#name_driver_selected").val( $('option:contains("' + nameDriver + '")').val());
    //     }else {

    //         $("#name_driver_selected").val( $('option:contains("----")').val());
    //     }

    //     $("#idreg").val(id_reg);
    //     $("#iddemand").val(id_demand);
    //     $("#btn_edit").attr("href","/editcalldemand/" + id_reg);

    // });

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
            .columns(9)
            .search(namesList.replace(/,/g, "|"), true,false)
            .draw();
    });

    $("#date_format_allocation_search").on('change', function(a){

        let dateDemandFilter = String($("#date_format_allocation_search").val()).replace(/\s/g,'');
        
        tbpedido
            .columns(1)
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