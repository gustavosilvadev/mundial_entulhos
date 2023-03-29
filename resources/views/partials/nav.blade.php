<?php
// dd(session()->exists('id_user') && session('access_permission') == 2);
// die();
?>
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
                <?php if(session()->exists('id_user') && session('access_permission') == 1){ ?>
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
                        </ul>
                    </li>

                    <li class=" nav-item">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="file-text"></i>
                            <span class="menu-title text-truncate" data-i18n="Invoice">Aterros</span>
                        </a>

                        <ul class="menu-content">
                            <li class="nav-item">
                                <a class="d-flex align-items-center" href="/createlandfill">

                                    <span class="menu-title text-truncate" data-i18n="Invoice">Novo</span>
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a class="d-flex align-items-center" href="/lista_todos_conteudos_edit">

                                    <span class="menu-title text-truncate" data-i18n="Invoice">Lista de aterros</span>
                                </a>                            
                            </li> --}}
                        </ul>
                    </li>

                    <li class=" nav-item"><a class="d-flex align-items-center" href="/cacamba_dias_municipio">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        <span class="menu-title text-truncate" data-i18n="Todo">Dias caçamba município</span></a>
                    </li>
                <?php } ?>

                <?php 
                    if(session()->exists('id_user') && session('access_permission') == 2){ 
                ?>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="/driver_demand">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        <span class="menu-title text-truncate" data-i18n="Todo">Lista de Pedidos</span></a>
                    </li>
                <?php
                    } 
                 ?>


                <?php 
                if(session()->exists('id_user') == false){ 
                ?>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="/new_demand_client">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        <span class="menu-title text-truncate" data-i18n="Todo">Cadastro Pedido (Cliente)</span></a>
                    </li>
                <?php
                    } 
                 ?>

                <?php 
                    if(session('id_user') != null
                        && session('login') != null
                    ){
                ?>
                <li class=" nav-item"><a class="d-flex align-items-center" href="/logout">
                    <span class="menu-title text-truncate" data-i18n="Todo">SAIR</span></a>
                </li>
                <?php 
                    }
                ?>

            </ul>
        </div>
    </div>