
@include('partials.header')

<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="app-user-edit">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- Account Tab starts -->
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- users edit media object start -->
                                    <div class="media mb-2">
                                        <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">CADASTRO</ins> <mark class="bg-dark text-white">CLIENTE!</mark></h3>    
                                    </div>
                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->
                                    <form action="/save_client" method= "POST" id="form" class="form-validate">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="username">Nome</label>
                                                    <input type="text" class="form-control"  name="name" id="name" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="username">Sobrenome</label>
                                                    <input type="text" class="form-control"  name="surname" id="surname" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">E-mail</label>
                                                    <input type="email" class="form-control" name="email" id="email"/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Telefone</label>
                                                    <input type="text" class="form-control" name="phone" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">CPF/CNPJ</label>
                                                    <input type="text" class="form-control" name="cpf_cnpj" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Endereço</label>
                                                    <input type="text" class="form-control" name="address" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Número</label>
                                                    <input type="text" class="form-control" name="number" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">CEP</label>
                                                    <input type="text" class="form-control" name="zipcode" />

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Bairro</label>
                                                    <input type="text" class="form-control" name="district" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Cidade</label>
                                                    <input type="text" class="form-control" name="city" />

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Estado</label>
                                                    <input type="text" class="form-control" name="state" />
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                <button type="submit" class="btn btn-success mb-1 mb-sm-0 mr-0 mr-sm-1">Criar</button>

                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit account form ends -->
                                </div>
                                <!-- Account Tab ends -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->

            </div>
        </div>
    </div>


@include('partials.footer')

<script>

    $(document).ready(function(){
        $("#form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
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