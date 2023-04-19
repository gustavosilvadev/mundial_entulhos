
{{-- @include('partials.header') --}}
@include('partials.header_teste')


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
                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->
                                    <form action="/perfil-save" method= "POST" id="form" class="form-validate" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="username">Nome</label>
                                                    {{-- <input type="text" class="form-control"  name="name" id="username" autocomplete="off"/> --}}

                                                    <input type="text" name="name" id="username_fake" class="hidden" autocomplete="off" style="display: none;" />
                                                    <input type="text" name="name" id="username" class="form-control" autocomplete="off" />

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Sobrenome</label>
                                                    <input type="text" class="form-control" name="surname" autocomplete="off"/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">E-mail</label>
                                                    <input type="text" class="form-control" name="email" id="email" autocomplete="off"/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Login</label>
                                                    <input type="text" class="form-control" name="login" autocomplete="off"/>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Senha</label>
                                                    <input type="password" class="form-control" name="password" />

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="role">Repitir senha</label>
                                                    <input type="password" class="form-control" name="repeat_password" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="role">Perfil</label>
                                                    <select class="select2 form-control form-control-lg"  name="access_permission">
                                                        <option value="0">---</option>
                                                        <option value="1">Administrador</option>
                                                        <option value="2">Motorista</option>
                                                    </select>
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


{{-- @include('partials.footer') --}}
@include('partials.footer_teste')

<script>

    $(document).ready(function(e){
        
        $('form')[0].reset();


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