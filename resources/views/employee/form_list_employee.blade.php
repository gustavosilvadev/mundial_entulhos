@include('partials.header')
<!--
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">

                </div>
            </div>

        </div>
        
        <div class="content-area-wrapper">
            
            <?php if(session("id_user")): ?>
                @include('categoria.modal.btn_cad_categoria')
            <?php endif; ?>
            
            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">

                        <div class="body-content-overlay"></div>

                        
                        <div class="todo-app-list">
                            
                            <div class="app-fixed-search d-flex align-items-center">
                                <div class="sidebar-toggle d-block d-lg-none ml-1">
                                    <i data-feather="menu" class="font-medium-5"></i>
                                </div>

                            </div>

                            <div class="todo-task-list-wrapper list-group">
                                <?php if(isset($employees)): ?>
                                <ul class="todo-task-list media-list" id="todo-task-list">
                                    <?php foreach($employees as $employee): ?>
                                        <li>
                                            <div class="todo-title-wrapper">
                                                <div class="todo-title-area">

                                                        <i data-feather="more-vertical" class="drag-icon"></i>
                                                        <div class="title-wrapper">
                                                            <a href="employee/{{$employee->id}}" class="href">
                                                                <span class="todo-title"><?php echo $employee->name; ?></span>
                                                            </a>
                                                        </div>

                                                </div>
                                                <div class="todo-item-action">
                                                    <div class="badge-wrapper mr-1">
                                                        <a href="/employee/{{$employee->id}}"><div class="badge badge-pill badge-light-dark todo-item">Editar</div> </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php else: ?>
                                    <div class="no-results">
                                        <h5>Vazio</h5>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->

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
                            <div class="card-header">
                                <a href="/createemployee" class="btn btn-success">NOVO</a>
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

                                        <tbody>
                                            <td>
                                                <a href="employee/{{$employee->id}}" class="href">
                                                    <span class="todo-title"><?php echo $employee->name.' '.$employee->surname; ?></span>
                                                </a>
                                            </td>
                                            <td><a href="/employee/<?php echo $employee->id; ?>">Editar</a></td>
                                            
                                        </tbody>

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
        </div>
    </div>
</div>


@include('partials.footer')
