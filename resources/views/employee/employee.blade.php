{{-- @include('partials.header')
@include('partials.nav') --}}
@include('partials.header_teste')
@include('partials.nav_teste');

{{-- 
<div class="app-content content">

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>

        <div class="content-body">

            <section id="advanced-search-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="todo-app-list">
                                <section id="multiple-column-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">ATUALIZAÇÃO</ins> <mark class="bg-dark text-white">FUNCIONÁRIO!</mark></h3>
                                                </div>

                                                <div class="card-body">

                                                    @if(isset($response))
                                                        @if($response['code'] === 200)
                                                            <div class="alert alert-success" role="alert">
                                                                <h4 class="alert-heading"><?php echo $response['status']?></h4>
                                                            </div>
                                                        @else
                                                    
                                                            <div class="alert alert-danger" role="alert">
                                                                <h4 class="alert-heading"><?php echo $response['status']?></h4>
                                                            </div>
                                                    
                                                        @endif
                                                    @endif
                                            
                                                    <form action="/update_employee" method= "POST" id="form" class="form-validate" autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="id" value="<?php echo $employee->id; ?>"/>
                                                        <div class="row">
                                                            <div class="col-md-4 col-4">
                                                                <div class="form-group">
                                                                    <label for="role">Perfil</label>
                                                                    <select class="select2 form-control form-control-lg"  name="access_permission" required>
                                                                        <option value="0">---</option>
                                                                        <option value="1">Administrador</option>
                                                                        <option value="2">Motorista</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                        
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Nome</label>
                                                                    <input type="text" id="first-name-column" class="form-control" name="name" value="<?php echo $employee->name; ?>"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Sobrenome</label>
                                                                    <input type="text" id="first-name-column" class="form-control" name="surname" value="<?php echo $employee->surname; ?>"/>
                                                                </div>
                                                            </div>                                
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="last-name-column">E-mail</label>
                                                                    <input type="email" id="last-name-column" class="form-control" name="email" value="<?php echo $employee->email; ?>"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Login</label>
                                                                    <input type="text" id="first-name-column" class="form-control" name="login" value="<?php echo $employee->login; ?>"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Senha</label>
                                                                    <input type="password" id="first-name-column" class="form-control" name="password"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">Repetir senha</label>
                                                                    <input type="password" id="first-name-column" class="form-control" name="password_repeat"/>
                                                                </div>
                                                            </div>                                                                                                    
                                                            
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="last-name-column">Telefone</label>
                                                                    <input type="text" id="last-name-column" class="form-control" name="phone" value="<?php echo $employee->phone; ?>"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="last-name-column">CNPJ/CPF</label>
                                                                    <input type="text" id="last-name-column" class="form-control" name="cpf_cnpj" value="<?php echo $employee->cpf_cnpj; ?>" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="last-name-column">Endereço</label>
                                                                    <input type="text" id="last-name-column" class="form-control" name="address" value="<?php echo $employee->address ?>"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="last-name-column">CEP</label>
                                                                    <input type="text" id="last-name-column" class="form-control" name="zipcode" value="<?php echo $employee->zipcode; ?>"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="last-name-column">Cidade</label>
                                                                    <input type="text" id="last-name-column" class="form-control" name="city" value="<?php echo $employee->city; ?>"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="last-name-column">Estado</label>
                                                                    <input type="text" id="last-name-column" class="form-control" name="state" value="<?php echo $employee->state; ?>"/>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-warning mb-1 mb-sm-0 mr-0 mr-sm-1">Atualizar</button>
                                                            </div>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
 --}}

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">ATUALIZAÇÃO</h2>

                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <div class="row">
                <!-- 
                    <div class="col-12">
                        <div class="alert alert-primary" role="alert">
                            <div class="alert-body"><strong>Info:</strong> Use this layout to set menu (navigation) default collapsed. Please check the&nbsp;<a class="text-primary" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-layout-collapsed-menu.html" target="_blank">Layout collapsed menu documentation</a>&nbsp; for more details.</div>
                        </div>
                    </div>
                -->
 
                </div>
                <section class="horizontal-wizard">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">ATUALIZAÇÃO</ins> <mark class="bg-dark text-white">FUNCIONÁRIO!</mark></h3>
                                </div>

                                <div class="card-body">

                                    @if(isset($response))
                                        @if($response['code'] === 200)
                                            <div class="alert alert-success" role="alert">
                                                <h4 class="alert-heading"><?php echo $response['status']?></h4>
                                            </div>
                                        @else
                                    
                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading"><?php echo $response['status']?></h4>
                                            </div>
                                    
                                        @endif
                                    @endif
                            
                                    <form action="/update_employee" method= "POST" id="form" class="form-validate" autocomplete="off">
                                        @csrf
                                        <input type="hidden" name="id" value="<?php echo $employee->id; ?>"/>
                                        <div class="row">
                                            <div class="col-md-4 col-4">
                                                <div class="form-group">
                                                    <label for="role">Perfil</label>
                                                    <select class="select2 form-control form-control-lg"  name="access_permission" required>
                                                        <option value="0">---</option>
                                                        <option value="1">Administrador</option>
                                                        <option value="2">Motorista</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                        
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Nome</label>
                                                    <input type="text" id="first-name-column" class="form-control" name="name" value="<?php echo $employee->name; ?>"/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Sobrenome</label>
                                                    <input type="text" id="first-name-column" class="form-control" name="surname" value="<?php echo $employee->surname; ?>"/>
                                                </div>
                                            </div>                                
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">E-mail</label>
                                                    <input type="email" id="last-name-column" class="form-control" name="email" value="<?php echo $employee->email; ?>"/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Login</label>
                                                    <input type="text" id="first-name-column" class="form-control" name="login" value="<?php echo $employee->login; ?>"/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Senha</label>
                                                    <input type="password" id="first-name-column" class="form-control" name="password"/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Repetir senha</label>
                                                    <input type="password" id="first-name-column" class="form-control" name="password_repeat"/>
                                                </div>
                                            </div>                                                                                                    
                                            
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Telefone</label>
                                                    <input type="text" id="last-name-column" class="form-control" name="phone" value="<?php echo $employee->phone; ?>"/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">CNPJ/CPF</label>
                                                    <input type="text" id="last-name-column" class="form-control" name="cpf_cnpj" value="<?php echo $employee->cpf_cnpj; ?>" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Endereço</label>
                                                    <input type="text" id="last-name-column" class="form-control" name="address" value="<?php echo $employee->address ?>"/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">CEP</label>
                                                    <input type="text" id="last-name-column" class="form-control" name="zipcode" value="<?php echo $employee->zipcode; ?>"/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Cidade</label>
                                                    <input type="text" id="last-name-column" class="form-control" name="city" value="<?php echo $employee->city; ?>"/>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Estado</label>
                                                    <input type="text" id="last-name-column" class="form-control" name="state" value="<?php echo $employee->state; ?>"/>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-warning mb-1 mb-sm-0 mr-0 mr-sm-1">Atualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->


{{-- @include('partials.footer') --}}
@include('partials.footer_teste') 
<script>

    $(document).ready(function(){
        $("#form").validate({
                rules: {
                    access_permission: {
                        required: true
                    },
    
                    name: {
                        required: true
                    },
                    surname: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    login: {
                        required: true
                    }
                },
    
                messages:{
                    access_permission: "Campo <b>Perfil</b> deve ser preenchido!",
                    name: "Campo <b>Nome</b> deve ser preenchido!",
                    surname: "Campo <b>Sobrenome</b> deve ser preenchido!",
                    email: "Campo <b>Email</b> deve ser preenchido!",
                    login: "Campo <b>Login</b> deve ser preenchido!"
                }            
            });
    });
    
    </script>
