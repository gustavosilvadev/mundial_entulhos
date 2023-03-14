@include('partials.header')
@include('partials.nav')


<div class="app-content content">

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
