<?php

$name_perfil = '';

if(session('access_permission') == 1){
    $name_perfil = 'Admin';
}else{
    $name_perfil = 'Motorista';
}    
?>

<!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
{{--
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon" data-feather="mail"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon" data-feather="calendar"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning" data-feather="star"></i></a>
                        <div class="bookmark-input search-input">
                            <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                            <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
                            <ul class="search-list search-list-bookmark"></ul>
                        </div>
                    </li>
                </ul> --}}

            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
               
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">{{ session('name') }}</span>
                            <span class="user-status">{{ $name_perfil }}</span>
                        </div>
                            <span class="avatar">
                                <img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40">
                                <span class="avatar-status-online"></span>
                            </span>
                        
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user"><a class="dropdown-item" href="page-profile.html">
                        
                        <i class="mr-50" data-feather="user"></i> Perfil</a><a class="dropdown-item" href="#">
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="mr-50" data-feather="settings"></i> Configurações</a>
                        <a class="dropdown-item" href="/logout"><i class="mr-50" data-feather="power"></i> SAIR</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                        <span class="brand-logo">
                            <img src="../../../app-assets/images/logo/logo_temp.svg">
                        </span>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="index.html"><i data-feather="check-square"></i><span class="menu-title text-truncate" data-i18n="Dashboards">PEDIDOS</span><span class="badge badge-light-warning badge-pill ml-auto mr-1">2</span></a> --}}
                <?php if(session()->exists('id_user') && session('access_permission') == 1){ ?>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="index.html"><i data-feather="check-square"></i><span class="menu-title text-truncate" data-i18n="Dashboards">PEDIDOS</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="/createcalldemand"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Novo</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="/call_demand"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">BASE PEDIDOS</span></a>
                            </li>
                            {{-- <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">RESUMO PEDIDOS</span></a> --}}
                            </li>
                        </ul>
                    </li>
                    <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">++++</span><i data-feather="more-horizontal"></i>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">FUNCIONÁRIOS</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="/createemployee"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Novo</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="/employee"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="View">Lista</span></a>
                            </li>

                        </ul>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">MOTORISTAS</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="/createdriver"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Novo</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="map"></i><span class="menu-title text-truncate" data-i18n="User">ATERROS</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="/createlandfill"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Novo</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center" href="/cacamba_dias_municipio"><i data-feather="calendar"></i><span class="menu-title text-truncate" data-i18n="Calendar">DIAS MUNICÍPIOS</span></a>
                    </li> 
                <?php } ?>

                <?php 
                if(session()->exists('id_user') && session('access_permission') == 2){ 
                ?>

                    <li class=" nav-item"><a class="d-flex align-items-center" href="/driver_demand"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Calendar">LISTA DE PEDIDOS</span></a>
                    </li> 
                <?php } ?>

                <?php 
                if(session()->exists('id_user') == false){ 
                ?>

                    <li class=" nav-item"><a class="d-flex align-items-center" href="/new_demand_client"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Calendar">CADASTRO DE PEDIDO (CLI)</span></a>
                    </li> 
                <?php } ?>

{{--                 
                <li class=" nav-item"><a class="d-flex align-items-center" href="app-chat.html"><i data-feather="message-square"></i><span class="menu-title text-truncate" data-i18n="Chat">Chat</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="app-todo.html"><i data-feather="check-square"></i><span class="menu-title text-truncate" data-i18n="Todo">Todo</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="app-calendar.html"><i data-feather="calendar"></i><span class="menu-title text-truncate" data-i18n="Calendar">Calendar</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="app-kanban.html"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Kanban">Kanban</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Invoice</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="app-invoice-list.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="app-invoice-preview.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">Preview</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="app-invoice-edit.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Edit</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="app-invoice-add.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Add</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="app-file-manager.html"><i data-feather="save"></i><span class="menu-title text-truncate" data-i18n="File Manager">File Manager</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="shopping-cart"></i><span class="menu-title text-truncate" data-i18n="eCommerce">eCommerce</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="app-ecommerce-shop.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Shop</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="app-ecommerce-details.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Details">Details</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="app-ecommerce-wishlist.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Wish List">Wish List</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="app-ecommerce-checkout.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Checkout">Checkout</span></a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Pages">Pages</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Authentication">Authentication</span></a>
                            <ul class="menu-content">
                                <li><a class="d-flex align-items-center" href="page-auth-login-v1.html" target="_blank"><span class="menu-item text-truncate" data-i18n="LoginV1">Login v1</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-auth-login-v2.html" target="_blank"><span class="menu-item text-truncate" data-i18n="LoginV2">Login v2</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-auth-register-v1.html" target="_blank"><span class="menu-item text-truncate" data-i18n="RegisterV1">Register v1</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-auth-register-v2.html" target="_blank"><span class="menu-item text-truncate" data-i18n="RegisterV2">Register v2</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-auth-forgot-password-v1.html" target="_blank"><span class="menu-item text-truncate" data-i18n="ForgotPasswordV1">Forgot Password v1</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-auth-forgot-password-v2.html" target="_blank"><span class="menu-item text-truncate" data-i18n="ForgotPasswordV2">Forgot Password v2</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-auth-reset-password-v1.html" target="_blank"><span class="menu-item text-truncate" data-i18n="ResetPasswordV1">Reset Password v1</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-auth-reset-password-v2.html" target="_blank"><span class="menu-item text-truncate" data-i18n="ResetPasswordV2">Reset Password v2</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="d-flex align-items-center" href="page-account-settings.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Account Settings">Account Settings</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="page-profile.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Profile</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="page-faq.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">FAQ</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="page-knowledge-base.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Knowledge Base">Knowledge Base</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="page-pricing.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Pricing">Pricing</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Blog">Blog</span></a>
                            <ul class="menu-content">
                                <li><a class="d-flex align-items-center" href="page-blog-list.html"><span class="menu-item text-truncate" data-i18n="List">List</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-blog-detail.html"><span class="menu-item text-truncate" data-i18n="Detail">Detail</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-blog-edit.html"><span class="menu-item text-truncate" data-i18n="Edit">Edit</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Mail Template">Mail Template</span></a>
                            <ul class="menu-content">
                                <li><a class="d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-welcome.html" target="_blank"><span class="menu-item text-truncate" data-i18n="Welcome">Welcome</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-reset-password.html" target="_blank"><span class="menu-item text-truncate" data-i18n="Reset Password">Reset Password</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-verify-email.html" target="_blank"><span class="menu-item text-truncate" data-i18n="Verify Email">Verify Email</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-deactivate-account.html" target="_blank"><span class="menu-item text-truncate" data-i18n="Deactivate Account">Deactivate Account</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-invoice.html" target="_blank"><span class="menu-item text-truncate" data-i18n="Invoice">Invoice</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-promotional.html" target="_blank"><span class="menu-item text-truncate" data-i18n="Promotional">Promotional</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Miscellaneous">Miscellaneous</span></a>
                            <ul class="menu-content">
                                <li><a class="d-flex align-items-center" href="page-misc-coming-soon.html" target="_blank"><span class="menu-item text-truncate" data-i18n="Coming Soon">Coming Soon</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-misc-not-authorized.html" target="_blank"><span class="menu-item text-truncate" data-i18n="Not Authorized">Not Authorized</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-misc-under-maintenance.html" target="_blank"><span class="menu-item text-truncate" data-i18n="Maintenance">Maintenance</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="page-misc-error.html" target="_blank"><span class="menu-item text-truncate" data-i18n="Error">Error</span></a>
                                </li>
                            </ul>
                        </li>
--}}
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
