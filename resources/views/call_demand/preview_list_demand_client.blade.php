@include('partials.header')
@include('partials.nav')

<div class="app-content content">

    <div class="content-overlay"></div>

    <div class="content-wrapper">
        <div class="content-body">

            <div class="row" id="table-responsive">        
                <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Cliente: <?php echo $infoclient->name.' '.$infoclient->surname ?></h4>
                            </div>
                            <div class="card-datatable">

                                
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>-</th>
                                                <th>Tipo de Serviço</th>
                                                <th>Data do Pedido</th>
                                                <th>Feito?</th>
                                                <th>Aterro</th>
                                                <th>Período do Dia</th>
                                                <th>Motorista</th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <?php foreach ($calldemands as $calldemand): ?>
    
                                            <tr class="odd">

                                                <td>
                                                    <a href="#">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </a>
                                                </td>                                                
                                                        <td class="sorting_1"><?php echo $calldemand['type_service'];?></td>
                                                        <td><?php echo $calldemand['date_begin']; ?></td>
                                                        <td>
                                                            <?php 

                                                                if($calldemand['service_status'] == 'PENDENTE'){
                                                                    echo '<span class="badge rounded-pill  badge-light-danger">'.$calldemand['service_status'].'</span>';
                                                                }else {
                                                                    echo '<span class="badge rounded-pill  badge-light-success">'.$calldemand['service_status'].'</span>';


                                                                }
                                                            ?>
                                                        </td>

                                                        <td><?php echo $calldemand['landfill_name']; ?></td>
                                                        <td><?php echo $calldemand['period']; ?></td>
                                                        <td><?php echo $calldemand['driver_name']; ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        </tbody>
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
