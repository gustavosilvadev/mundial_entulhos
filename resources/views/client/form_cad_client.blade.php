@include('partials.header')
@include('partials.nav')

    <!-- BEGIN: Content-->

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
                                <div class="todo-app-list">
                                    <section id="multiple-column-form">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">CADASTRO</ins> <mark class="bg-dark text-white">CLIENTE!</mark></h3>    
                                                    </div>

                                                    <div class="card-body">
                                                
                                                        <form action="save_client" method= "POST" id="form" class="form-validate">
                                                            @csrf
                                                            <input type="hidden" name="id" />
                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="name">Nome</label>
                                                                        <input type="text" class="form-control" name="name"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="surname">Sobrenome</label>
                                                                        <input type="text" class="form-control" name="surname"/>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="email">E-mail</label>
                                                                        <input type="text" class="form-control" name="email"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="phone">Telefone</label>
                                                                        <div class="input-group input-group-merge">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">(11)</span>
                                                                            </div>
                                                                            <input type="text" class="form-control phone-number-mask"  id="phone-number" name="phone" />
                                                                        </div>
                                                                    
                                                                    </div>


                                                                    
                                                                </div>

                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="cpf_cnpj">CNPJ/CPF</label>
                                                                        <input type="text" class="form-control" name="cpf_cnpj" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="address">Endereço</label>
                                                                        <input type="text" class="form-control" name="address"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="number">Número</label>
                                                                        <input type="text" class="form-control" name="number"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="district">Bairro</label>
                                                                        <input type="text" class="form-control" name="district"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="zipcode">CEP</label>
                                                                        <input type="text" class="form-control" name="zipcode"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="city">Cidade</label>
                                                                        <input type="text" class="form-control" name="city"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-12">
                                                                    <div class="form-group">
                                                                        <label for="state">Estado</label>
                                                                        <input type="text" class="form-control" name="state"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
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
            </div>
        </div>
    </div>
    <!-- END: Content -->

@include('partials.footer')

<script>

$(document).ready(function(){
    $("#form").validate({
        rules: {
            name: {
                required: true,
                
            },
            
            surname: {
                required: true,
                
            },

            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                
            },

            cpf_cnpj: {
                required: true,
                
            },

            address: {
                required: true,
                
            },

            number: {
                required: true,
                
            },
            
            zipcode: {
                required: true,
                
            },

            district: {
                required: true,
            },
            
            city: {
                required: true,

            },
            state: {
                required: true,
                minlength: 2,
                maxlength: 2
            }

        },

        messages:{
            name: "Campo <b>Nome</b> deve ser preenchido!",
            surname: "Campo <b>Sobrenome</b> deve ser preenchido!",
            email: "Campo <b>E-mail</b> deve ser preenchido!",
            phone: "Campo <b>Telefone</b> deve ser preenchido!",
            cpf_cnpj: "Campo <b>CPF</b>/CNPJ deve ser preenchido!",
            address: "Campo <b>Endereço</b> deve ser preenchido!",
            number: "Campo <b>Número</b> deve ser preenchido!",
            zipcode: "Campo <b>CEP</b> deve ser preenchido!",
            district: "Campo <b>Bairro</b> deve ser preenchido!",
            city: "Campo <b>Cidade</b> deve ser preenchido!",
            state: "Campo <b>Estado</b> deve ser preenchido!"

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