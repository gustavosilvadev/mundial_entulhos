<!--
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons mt-0">
                <li class="nav-item">
                    <a class="nav-link" href="/" data-toggle="tooltip" data-placement="top">
                    {{-- <img src="../../../app-assets/images/logo/logo_seu_coerente.svg" class="brand-text"> --}}
                    {{-- <pre>by Gustavo Silva</pre> --}}
                    </a>
                </li>
            </ul>
        </div>

        <ul class="nav navbar-nav align-items-center ml-auto">
            <?php  if(session("id_user")): ?>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <span class="avatar">

                        <div style="background: #871c17;border-radius: 50%;width: 40px;height: 40px;">GU</div>
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="/">
                        <i class="mr-50" data-feather="user"></i> Perfil
                    </a>
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/">
                        <i class="mr-50" data-feather="settings"></i> Configurações
                    </a>

                    <a class="dropdown-item" href="/logout">
                        <i class="mr-50" data-feather="power"></i> Sair
                    </a>
                </div>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
-->

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
              
        <div class="navbar-header">
        
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="/">
                            <span class="brand-logo">
                                <img src="../../../app-assets/images/logo/logo_temp.svg">
                            </span>
                        </a>
                    </li>
                </ul>
                
            </div>
        </div>

        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            
            <ul class="navigation navigation-main mt-3" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span data-i18n="User Interface">Menu</span><i data-feather="more-horizontal"></i></li>                

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Pedidos</span></a>

                    <ul class="menu-content">
                        <li class="nav-item">
                            <a class="d-flex align-items-center" href="/createcalldemand">

                                <span class="menu-title text-truncate" data-i18n="Invoice">Novo Pedido</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="d-flex align-items-center" href="/call_demand">

                                <span class="menu-title text-truncate" data-i18n="Invoice">Lista de Pedidos</span>
                            </a>                            
                        </li>
                    </ul>
                </li>


                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Clientes</span></a>

                    <ul class="menu-content">
                        {{-- 
                        <li class="nav-item">
                            <a class="d-flex align-items-center" href="/createclient">

                                <span class="menu-title text-truncate" data-i18n="Invoice">Novo Cliente</span>
                            </a>
                        </li> 
                        --}}

                        <li class="nav-item">
                            <a class="d-flex align-items-center" href="/client">

                                <span class="menu-title text-truncate" data-i18n="Invoice">Clientes</span>
                            </a>                            
                        </li>
                    </ul>
                </li>
                
                
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Invoice">Funcionários</span></a>

                    <ul class="menu-content">
                        <li class="nav-item">
                            <a class="d-flex align-items-center" href="/createemployee">

                                <span class="menu-title text-truncate" data-i18n="Invoice">Novo</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="d-flex align-items-center" href="/employee">

                                <span class="menu-title text-truncate" data-i18n="Invoice">Lista de funcionário</span>
                            </a>                            
                        </li>
                    </ul>
                </li>                
                
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Motoristas</span></a>

                    <ul class="menu-content">
                        <li class="nav-item">
                            <a class="d-flex align-items-center" href="/createdriver">

                                <span class="menu-title text-truncate" data-i18n="Invoice">Novo</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="d-flex align-items-center" href="#">

                                <span class="menu-title text-truncate" data-i18n="Invoice">Lista de Motoristas</span>
                            </a>                            
                        </li>
                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Aterros</span></a>

                    <ul class="menu-content">
                        <li class="nav-item">
                            <a class="d-flex align-items-center" href="/createlandfill">

                                <span class="menu-title text-truncate" data-i18n="Invoice">Cadastrar</span>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="d-flex align-items-center" href="/lista_todos_conteudos_edit">

                                <span class="menu-title text-truncate" data-i18n="Invoice">Lista de aterros</span>
                            </a>                            
                        </li> --}}
                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="/driver_demand">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    <span class="menu-title text-truncate" data-i18n="Todo">Area do Motorista</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="/area_cliente_temp">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    <span class="menu-title text-truncate" data-i18n="Todo">Area do CLIENTE</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="/cacamba_dias_municipio">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    <span class="menu-title text-truncate" data-i18n="Todo">Dias caçamba município</span></a>
                </li>

            </ul>
        </div>
    </div>