
@include('partials.adm.header')


<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
 
                                <h4 class="card-title mb-1">Acesse o portal!</h4>

                                <form class="auth-login-form mt-2" action="login" method="POST" autocomplete='on'>
                                    @csrf

                                    <?php if(isset($response)): ?>
                                        <div class="text-danger">{{ $response }}</div>
                                    <?php 
                                            unset($response);
                                        endif; 
                                    ?>
                                    
                                    <div class="form-group">
                                        <label for="login-email" class="form-label">Email/Login</label>
                                        <input type="text" class="form-control" id="login-email" name="login"  aria-describedby="login-email" tabindex="1" autofocus autocomplete="on"/>
                                    </div>

                                    <div class="form-group">
{{--                                         
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">Senha</label>
                                            <a href="page-auth-forgot-password-v1.html">
                                                <small>Esqueci a senha</small>
                                            </a>
                                        </div> 
--}}

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" aria-describedby="login-password" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
{{-- 
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="remember_me" id="remember-me" type="checkbox" tabindex="3" />
                                            <label class="custom-control-label" for="remember-me"> Lembrar Senha</label>
                                        </div>
                                    </div>  
--}}


                                    <div class="form-group">
                                        <a class="" href="perfil-create">Criar conta </a>
                                    </div>
                                    <button class="btn btn-success btn-block" tabindex="4">Acessar</button>
                                </form>


                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>

@include('partials.footer')
