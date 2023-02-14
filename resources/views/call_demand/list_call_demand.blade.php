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
                                        <a href="/createcalldemand" class="btn btn-warning btn-block mb-75">Novo</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Actions -->
                        </div>
                    </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

@include('partials.footer')