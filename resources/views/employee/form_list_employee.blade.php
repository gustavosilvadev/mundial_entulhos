
@include('partials.header_teste')
@include('partials.nav_teste');


    <!-- BEGIN: Content-->

        <div class="app-content content-designed">

            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">LISTA DE FUNCIONÁRIOS</h2>

                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">

                <section id="ajax-datatable">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <a href="createemployee" class="btn btn-success">NOVO</a>
                                </div>
                                <div style="display: block;overflow-x: auto;white-space: nowrap;" >
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>-</th>
                                            </tr>
                                        </thead>
    
                                        <?php if(isset($employees)): ?>
                                            
                                            <?php foreach($employees as $employee): ?>
                                                <?php if($employee->id != session('id_user')){ ?>
                                                    <tbody>
                                                        <td>
                                                            <a href="employee/{{$employee->id}}" class="href">
                                                                <span class="todo-title"><?php echo $employee->name.' '.$employee->surname; ?></span>
                                                            </a>
                                                        </td>
                                                        <td><a href="/employee/<?php echo $employee->id; ?>">Editar</a></td>
                                                        
                                                    </tbody>
                                                <?php } ?>
    
                                        <?php endforeach; ?>
                                        <?php else: ?>
    
                                            <tbody>
    
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
    </div>
    <!-- END: Content-->


{{-- @include('partials.footer') --}}
@include('partials.footer_teste') 