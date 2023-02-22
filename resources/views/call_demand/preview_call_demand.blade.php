@include('partials.header')
<div class="app-content content ">
    
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
                <div class="row" id="table-responsive">
                    <div class="col-12">
                        
                        <div class="card">

                            <div style="display: block;overflow-x: auto;white-space: nowrap;" >
                                <div class="card invoice-preview-card">
                                    <div class="card-body invoice-padding pb-0">

                                        <h2 class="invoice-title">
                                            <?php echo $client->name.' '.$client->surname; ?>
                                        </h2>                                        
                                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                            <div>
                                                <p class="card-text mb-25"><?php echo $client->email; ?></p>
                                                <p class="card-text mb-25"><?php echo $client->address. ', '.$client->number. ', '.$client->district; ?></p>
                                                <p class="card-text mb-25"><?php echo $client->city. ', '.$client->state; ?></p>
                                                <p class="card-text mb-25"><?php echo $client->zipcode; ?></p>
                                                <p class="card-text mb-0"><?php echo $client->phone; ?></p>
                                            </div>

                                                <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="pr-1">Data de cadastro:</td>
                                                                <td><span class="font-weight-bold">02/01/2023</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pr-1">Status:</td>
                                                                <td>ATIVO</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pr-1">Pagamento:</td>
                                                                <td>PIX</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="card-body invoice-padding pt-0">
                                        <div class="row invoice-spacing">
                                            <div class="col-xl-8 p-0">

                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="py-1">Descrição </th>
                                                    <th class="py-1">Data Inicio</th>
                                                    <th class="py-1">Data Fim</th>
                                                    <th class="py-1">Quantidade</th>
                                                    <th class="py-1">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="py-1">
                                                        <p class="card-text mb-25">Tipo de Serviço: <?php echo $calldemand->type_service; ?></p>
                                                        <p class="card-text mb-25">Endereço: <?php echo $calldemand->address.', '.$calldemand->number. ', '. $calldemand->district. ', '. $calldemand->city; ?></p>
                                                        <p class="card-text mb-25">CEP: <?php echo $calldemand->zipcode; ?></p>
                                                        
                                                    </td>
                                                    <td class="py-1">
                                                        <span class="font-weight-bold"><?php echo $calldemand->date_begin; ?></span>
                                                    </td>
                                                    
                                                    <td class="py-1">
                                                        <span class="font-weight-bold"><?php echo $calldemand->date_end; ?></span>
                                                    </td>
                                                    <td class="py-1">
                                                        <span class="font-weight-bold">2</span>
                                                    </td>
                                                    <td class="py-1">
                                                        <span class="font-weight-bold"><?php echo 'R$'.number_format($calldemand->price_unit, 2, ',', '.'); ?></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr class="invoice-spacing" />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@include('partials.footer')