{{-- @include('partials.header')
@include('partials.nav') --}}
@include('partials.header_teste')
@include('partials.nav_teste');


    <!-- BEGIN: Content-->
        <div class="app-content content-designed">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">CADASTRO DE FUNCIONÁRIO</h2>


                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <div class="row">

 
                </div>
                <section class="horizontal-wizard">
                    <form action="save_employee" method= "POST" id="form" class="form-validate">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 col-12">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="username">Nome</label>
                                    <input type="text" class="form-control"  name="name" id="username" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="surname">Sobrenome</label>
                                    <input type="text" class="form-control"  name="surname" id="user_surname" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" name="email" id="email"/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="login">Login</label>
                                    <input type="text" class="form-control" name="login" id="login"/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Senha</label>
                                    <input type="password" class="form-control" name="password" id="password"/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password_repeat">Repetir Senha</label>
                                    <input type="password" class="form-control" name="password_repeat" id="password"/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input type="text" class="form-control" name="phone" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cpf_cnpj">CPF/CNPJ</label>
                                    <input type="text" class="form-control" name="cpf_cnpj" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <input type="text" class="form-control" name="address" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="zipcode">CEP</label>
                                    <input type="text" pattern="[0-9]{5}" class="form-control" name="zipcode" />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">Cidade</label>
                                    <input type="text" class="form-control" name="city" />

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">Estado</label>
                                    <input type="text" class="form-control" name="state" />

                                </div>
                            </div>

                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                <button type="submit" class="btn btn-success mb-1 mb-sm-0 mr-0 mr-sm-1">Criar</button>

                            </div>
                        </div>
                    </form>
                </section>
            </div>
        {{-- </div> --}}
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
                    required: true,
                    email: true
                },
                login: {
                    required: true
                },
                password: {
                    required: true
                },
                password_repeat: {
                    required: true
                },

            }
        });

        $("#email").blur(function(){

            let email = $(this).val();

            $.ajax({
                'url': 'ger-login?email='+email,
                'type': 'GET',
                'data': {},

                success: function(response){
                    $('input[name=login]').val(response);

                },
                error: function(response){
                    alert('Error'+ Object.value(response));
                }
            });            
        });
    });

</script>