@include('partials.header')
@include('partials.nav')

<div class="app-content content">

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
            <div class="content-body">
                
                <section class="app-user-edit">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    
                                    <div class="media mb-2">
                                        <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">CADASTRO</ins> <mark class="bg-dark text-white">FUNCIONÁRIO!</mark></h3>    
                                    </div>
                                    
                                    
                                    <form action="/save_employee" method= "POST" id="form" class="form-validate">
                                        @csrf

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

                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


@include('partials.footer')

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
                // phone: {
                //     required: true
                // },
                // cpf_cnpj: {
                //     required: true
                // },
                // address: {
                //     required: true
                // },
                // zipcode: {
                //     required: true
                // },
                // city: {
                //     required: true
                // },
                // state: {
                //     required: true
                // }

            }
        });

        $("#email").blur(function(){

            let email = $(this).val();

            $.ajax({
                'url': 'gera_login?email='+email,
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