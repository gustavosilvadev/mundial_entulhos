
@include('partials.header')
@include('partials.nav')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Formulário de Cadastro</h2>

                        </div>
                    </div>
                </div>
               
            </div>
            <div class="content-body">
               
             
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Formulário de Cadastro</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Nome</label>
                                                    <input type="text" id="first-name-column" class="form-control"  name="fname-column" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Sobrenome </label>
                                                    <input type="text" id="last-name-column" class="form-control"  name="lname-column" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email-id-column">Email</label>
                                                    <input type="email" id="email-id-column" class="form-control" name="email-id-column" />
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-12">
                                                <div class=form-group">
                                                    <label for="fp-default">Login</label>
                                                    <input type="text" id="fp-default" class="form-control flatpickr-basic" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                        <label for="password">Senha</label>
                                                        <input type="password" id="password" class="form-control" name="password"  />
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                        <label for="password">Repita a senha</label>
                                                        <input type="password" id="password" class="form-control" name="password"  />
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <button type="reset" class="btn btn-success mr-1">Cadastrar</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@include('partials.footer')
