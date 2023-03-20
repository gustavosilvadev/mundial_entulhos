
<?php
    // echo '<pre>';
    //     print_r($calldemands);
    // echo '</pre>';

    // die();
    // foreach ($calldemands as $value) {
    //     echo $value->name_client.' '.$value->surname_client;
    //     echo "<BR/>";
    // }
    // die();
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

@include('partials.header')
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    td {
        /* padding: 5px;
        text-align: center; */
        width: 8rem;
    }
</style>

<section id="responsive-datatable" style="margin-top:120px">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Responsive Datatable</h4>
                </div>
                <div class="card-datatable">
                    {{-- <table class="dt-responsive table"> --}}

                    <table class="table table-stripped" id="table_teste_gustavo" style="width: 100%">
                        <thead>
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
                        </thead>
                            <?php foreach ($calldemands as $value):?>

                                <tr class="odd">

                                    <td class="control sorting_1" tabindex="0" style="display:none;"></td>
                                    
                                    <td class="text-nowrap"><a href="/editcalldemand/{{$value->id_demand}}" class="btn btn-info">Detalhes</a></td>
                                    <td class="text-nowrap"><?php echo $value->type_service; ?></td>
                                    <td class="text-nowrap"><?php echo $value->date_begin; ?></td>
                                    <td class="text-nowrap"><?php echo $value->name_client.' '.$value->surname_client; ?></td>
                                    <td class="text-nowrap"><?php echo $value->address_service; ?></td>
                                    <td class="text-nowrap"><?php echo $value->district_address_service; ?></td>
                                    <td class="text-nowrap"><?php echo $value->phone_demand; ?></td>
                                    <td class="text-nowrap"><?php echo $value->price_unit; ?></td>
                                    <td class="text-nowrap"><?php echo $value->comments_demand; ?></td>
                                    <td class="text-nowrap"><?php echo $value->dumpster_total; ?></td>
                                    <td class="text-nowrap"><?php echo $value->date_removal_dumpster; ?></td>
                                    <td class="text-nowrap"><?php echo $value->date_effective_removal_dumpster; ?></td>
                                    <td class="text-nowrap"><?php echo $value->service_status; ?></td>
                                    <td class="text-nowrap"><?php echo $value->id_landfill; ?></td>
                                    <td class="text-nowrap"><?php echo $value->period; ?></td>
                                    <td class="text-nowrap"><?php echo $value->driver_name; ?></td>


                                </tr>

                            <?php endforeach;?>


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
            </div>
        </div>
    </div>
</section>



@include('partials.footer')