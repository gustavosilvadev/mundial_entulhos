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
                        <div class="todo-app-list">
                            <section id="multiple-column-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">CADASTRO</ins> <mark class="bg-dark text-white">ATERROS!</mark></h3>
                                            </div>

                                            <div class="card-body">
                                        
                                                <form action="/save_landfill" method= "POST" id="form" class="form-validate">
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
                                                            <button type="submit" class="btn btn-success mb-1 mb-sm-0 mr-0 mr-sm-1">Cadastrar</button>
                
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


@include('partials.footer')


<script>

    $(document).ready(function(){
        // $("#form").validate({
        //     rules: {
        //         email: {
        //             required: true,
        //             email: true
        //         }
        //     }
        // });

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