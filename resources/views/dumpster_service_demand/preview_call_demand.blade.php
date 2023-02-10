@include('partials.header')


    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <?php if(isset($calldemand)):?>
                    <section class="invoice-preview-wrapper">
                        <div class="row invoice-preview">
                            <!-- Invoice -->
                            <div class="col-xl-9 col-md-8 col-12">
                                <div class="card invoice-preview-card">
                                    <div class="card-body invoice-padding pb-0">
                                        <!-- Header starts -->
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
                                            {{-- <div class="mt-md-0 mt-2"> --}}
                                                <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                    {{-- <h6 class="mb-2">Informações:</h6> --}}
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
    
                                            {{-- </div> --}}
                                        </div>
                                        <!-- Header ends -->
                                    </div>

                                    {{-- <hr class="invoice-spacing" /> --}}

                                    <!-- Address and Contact starts -->
                                    <div class="card-body invoice-padding pt-0">
                                        <div class="row invoice-spacing">
                                            <div class="col-xl-8 p-0">
                                                {{-- <p class="card-text mb-25">Tipo de Serviço: <?php echo $calldemand->type_service; ?></p>
                                                <p class="card-text mb-25">Endereço: <?php echo $calldemand->address.', '.$calldemand->number. ', '. $calldemand->district. ', '. $calldemand->city; ?></p>
                                                <p class="card-text mb-25">CEP: <?php echo $calldemand->zipcode; ?></p>
                                                
                                                
                                                <p class="card-text mb-25">Small Heath, B10 0HF, UK</p>
                                                <p class="card-text mb-25">718-986-6062</p>
                                                <p class="card-text mb-0">peakyFBlinders@gmail.com</p> --}}
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Address and Contact ends -->
    
                                    <!-- Invoice Description starts -->
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
                                                        {{-- <p class="card-text font-weight-bold mb-25">Imsdsakjd asdjaskd</p>
                                                        <p class="card-text text-nowrap">
                                                            DKAL dak lsdkk dlk lsakd ksad kasld 
                                                        </p> --}}

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
                                                        <span class="font-weight-bold"><?php echo 'R$'.str_replace('.', ',', $calldemand->price_unit); ?></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Invoice Description ends -->

                                    <hr class="invoice-spacing" />

                                </div>
                            </div>
                            <!-- /Invoice -->

                            <!-- Invoice Actions -->
                            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="btn btn-primary btn-block mb-75" data-toggle="modal" data-target="#send-invoice-sidebar">
                                            Editar
                                        </button>
                                        <button class="btn btn-outline-secondary btn-block btn-download-invoice mb-75">Exportar</button>
                                        <a class="btn btn-outline-secondary btn-block mb-75" href="./app-invoice-print.html" target="_blank">
                                            Imprimir
                                        </a>
                                        <button class="btn btn-success btn-block" data-toggle="modal" data-target="#add-payment-sidebar">
                                            Enviar por email
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Actions -->
                        </div>
                    </section>

                    <!-- Send Invoice Sidebar -->
                    <div class="modal modal-slide-in fade" id="send-invoice-sidebar" aria-hidden="true">
                        <div class="modal-dialog sidebar-lg">
                            <div class="modal-content p-0">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title">
                                        <span class="align-middle">Send Invoice</span>
                                    </h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <form>
                                        <div class="form-group">
                                            <label for="invoice-from" class="form-label">From</label>
                                            <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com" placeholder="company@email.com" />
                                        </div>
                                        <div class="form-group">
                                            <label for="invoice-to" class="form-label">To</label>
                                            <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com" placeholder="company@email.com" />
                                        </div>
                                        <div class="form-group">
                                            <label for="invoice-subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="invoice-subject" value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
                                        </div>
                                        <div class="form-group">
                                            <label for="invoice-message" class="form-label">Message</label>
                                            <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="11" placeholder="Message...">
                                                Dear Queen Consolidated, Thank you for your business, always a pleasure to work with you! We have generated a new invoice in the amount of $95.59 We would appreciate payment of this invoice by 05/11/2019
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <span class="badge badge-light-primary">
                                                <i data-feather="link" class="mr-25"></i>
                                                <span class="align-middle">Invoice Attached</span>
                                            </span>
                                        </div>
                                        <div class="form-group d-flex flex-wrap mt-2">
                                            <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Send</button>
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Send Invoice Sidebar -->

                    <!-- Add Payment Sidebar -->
                    <div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
                        <div class="modal-dialog sidebar-lg">
                            <div class="modal-content p-0">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title">
                                        <span class="align-middle">Add Payment</span>
                                    </h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <form>
                                        <div class="form-group">
                                            <input id="balance" class="form-control" type="text" value="Invoice Balance: 5000.00" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="amount">Payment Amount</label>
                                            <input id="amount" class="form-control" type="number" placeholder="$1000" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="payment-date">Payment Date</label>
                                            <input id="payment-date" class="form-control date-picker" type="text" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="payment-method">Payment Method</label>
                                            <select class="form-control" id="payment-method">
                                                <option value="" selected disabled>Select payment method</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Bank Transfer">Bank Transfer</option>
                                                <option value="Debit">Debit</option>
                                                <option value="Credit">Credit</option>
                                                <option value="Paypal">Paypal</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="payment-note">Internal Payment Note</label>
                                            <textarea class="form-control" id="payment-note" rows="5" placeholder="Internal Payment Note"></textarea>
                                        </div>
                                        <div class="form-group d-flex flex-wrap mb-0">
                                            <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Send</button>
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Add Payment Sidebar -->
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- END: Content-->

@include('partials.footer')
