@include('partials.header')


    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">

                    <section class="invoice-preview-wrapper">
                        <div class="row invoice-preview">
                            <!-- Invoice -->
                            <div class="col-xl-9 col-md-8 col-12">
                                <section id="complex-header-datatable">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header border-bottom">
                                                    <h4 class="card-title">Chamados</h4>
                                                </div>
                                                <div class="card-datatable">
                                                    {{-- <table class="dt-complex-header table table-bordered table-responsive"> --}}
                                                        <table class="datatables-basic table">
                                                        <thead>
                                                            <tr>
                                                                <th>Data abertura</th>
                                                                <th>Local</th>
                                                                <th>Data da operacao</th>
                                                                <th>Data da finalização</th>
                                                                <th class="cell-fit">Status</th>
                                                            </tr>
                                                        </thead>

                                                        <?php if(isset($calldemands)): ?>
                                                            <?php foreach($calldemands as $calldemand): ?>
                                                                    
                                                            <tbody>
                                                                <td><?php echo date_format($calldemand->created_at,'d/m/Y H:i:s'); ?></td>
                                                                <td><?php echo $calldemand->district.', '.$calldemand->city ;?></td>
                                                                <td><?php echo date("d/m/Y", strtotime($calldemand->date_begin)); ?></td>
                                                                <td><?php echo date("d/m/Y", strtotime($calldemand->date_end)); ?></td>
                                                                <td><?php echo $calldemand->service_status; ?></td>

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
                            <!-- /Invoice -->

                            <!-- Invoice Actions -->
                            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="btn btn-warning btn-block mb-75" data-toggle="modal" data-target="#send-invoice-sidebar">
                                            Novo
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

            </div>
        </div>
    </div>
    <!-- END: Content-->

@include('partials.footer')
