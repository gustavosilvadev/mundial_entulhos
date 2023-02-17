@include('partials.header')
{{-- 
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">

                    <section class="invoice-preview-wrapper">
                        <div class="row invoice-preview">
                            <div class="col-xl-9 col-md-8 col-12">
                                <section id="complex-header-datatable">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header border-bottom">
                                                    <h4 class="card-title">Chamados</h4>
                                                </div>
                                                <div class="card-datatable">

                                                        <table class="datatables-basic table">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº FICHA</th>
                                                                <th>COLOCAÇÃO/TROCA</th>
                                                                <th>DATA PEDIDO</th>
                                                                <th>CLIENTE</th>
                                                                <th>ENDEREÇO DA OBRA</th>
                                                                <th>BAIRRO</th>
                                                                <th>TELEFONE</th>
                                                                <th>PREÇO UNIT.</th>
                                                                <th>COMENTÁRIOS</th>
                                                                <th>TOTAL CAÇAMBAS</th>
                                                                <th>TOTAL EM ABERTO2</th>
                                                                <th>Nº CAÇAMBA</th>
                                                                <th>QTD DE DIAS PARA RETIRAR</th>
                                                                <th>PREVISÃO DE RETIRADA</th>
                                                                <th>DATA RETIRADA EFETIVA</th>
                                                                <th>STATUS</th>
                                                                <th>ATERRO</th>
                                                                <th>PERÍODO DO DIA</th>
                                                                <th>MOTORISTA</th>
                                                            </tr>
                                                        </thead>

                                                        <?php if(isset($calldemands)): ?>
                                                            <?php foreach((object) $calldemands as $calldemand): ?>

                                                            <tbody>

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
                                                                
                                                            </tbody>

                                                        <?php endforeach; ?>
                                                        <?php else: ?>

                                                            <tbody>

                                                                <td>-----</td>
                                                                <td>-----</td>
                                                                <td>-----</td>
                                                                <td>-----</td>
                                                                <td>-----</td>

                                                            </tbody>
                                                        <?php endif; ?>


                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="/createcalldemand" class="btn btn-warning btn-block mb-75">Novo</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
    </div>
--}}
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">

                <div class="row" id="table-responsive">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Responsive tables</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    Responsive tables allow tables to be scrolled horizontally with ease. Make any table responsive across all
                                    viewports by adding <code class="highlighter-rouge">.table-responsive</code> class on
                                    <code class="highlighter-rouge">.table</code>. Or, pick a maximum breakpoint with which to have a responsive
                                    table up to by adding <code class="highlighter-rouge"> .table-responsive{-sm|-md|-lg|-xl}</code>. Read full
                                    documentation
                                    <a href="https://getbootstrap.com/docs/4.3/content/tables/#responsive-tables" target="_blank">here.</a>
                                </p>
                                <div class="alert alert-info">
                                    <div class="alert-body">
                                        <h4 class="text-warning">Vertical clipping/truncation</h4>
                                        <p>
                                            Responsive tables make use of <code class="highlighter-rouge">overflow-y: hidden</code>, which clips off
                                            any content that goes beyond the bottom or top edges of the table. In particular, this can clip off
                                            dropdown menus and other third-party widgets.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nº FICHA</th>
                                            <th>COLOCAÇÃO/TROCA</th>
                                            <th>DATA PEDIDO</th>
                                            <th>CLIENTE</th>
                                            <th>ENDEREÇO DA OBRA</th>
                                            <th>BAIRRO</th>
                                            <th>TELEFONE</th>
                                            <th>PREÇO UNIT.</th>
                                            <th>COMENTÁRIOS</th>
                                            <th>TOTAL CAÇAMBAS</th>
                                            <th>TOTAL EM ABERTO2</th>
                                            <th>Nº CAÇAMBA</th>
                                            <th>QTD DE DIAS PARA RETIRAR</th>
                                            <th>PREVISÃO DE RETIRADA</th>
                                            <th>DATA RETIRADA EFETIVA</th>
                                            <th>STATUS</th>
                                            <th>ATERRO</th>
                                            <th>PERÍODO DO DIA</th>
                                            <th>MOTORISTA</th>
                                        </tr>
                                    </thead>

                                    <?php if(isset($calldemands)): ?>
                                        <?php foreach((object) $calldemands as $calldemand): ?>

                                        <tbody>

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
                                            
                                        </tbody>

                                    <?php endforeach; ?>
                                    <?php else: ?>

                                        <tbody>

                                            <td>-----</td>
                                            <td>-----</td>
                                            <td>-----</td>
                                            <td>-----</td>
                                            <td>-----</td>

                                        </tbody>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@include('partials.footer')