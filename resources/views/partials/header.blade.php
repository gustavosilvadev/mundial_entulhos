<?php 
$title = "";
if(str_contains(url()->full(),"page")){

    if(strripos(url()->full(),"page/") > 0){

        $title = explode("page/", url()->full());
    
    }else if(strripos(url()->full(),"page=") > 0){

        $title = explode("=", url()->full());
    }

    $title = strtoupper($title[1]);

}else{
    $url    = url()->full();
    $title  = substr($url,strripos($url,"/") + 1);
}
 ?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Ideias, pensamentos, conhecimentos e o que se diz ser Coerente">
    <meta name="keywords" content="blog, tecnologia, motivacional, pensamentos, psicologia, pensamentos humanos">
    <meta name="author" content="GUSTAVOSILVA">
    <title>{{$title}}</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/vendors.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/extensions/dragula.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/extensions/toastr.min.css') }}">  

    

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/plugins/forms/form-quill-editor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/pages/page-blog.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/pages/app-todo.css') }}">
    <!-- END: Page CSS-->

    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
{{-- @include('partials.nav_admin') --}}

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
            <div class="content-body">

                <!-- NAVIGATION -->
                <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                    <button class="btn btn-icon navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i data-feather="align-justify" class="font-medium-5"></i>
                    </button>
                    <div class="collapse navbar-collapse bg-dark text-white" id="navbarSupportedContent">
                
                        <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                            <ul class="nav nav-pills mb-0">
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold " href="/call_demand">
                                        <span class="d-none d-md-block" style="color:white">Pedidos</span>
                                        <i data-feather="rss" class="d-block d-md-none"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="/client">
                                        <span class="d-none d-md-block" style="color:white">Clientes</span>
                                        <i data-feather="info" class="d-block d-md-none"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="javascript:void(0)">
                                        <span class="d-none d-md-block" style="color:white">Funcionários</span>
                                        <i data-feather="image" class="d-block d-md-none"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="javascript:void(0)">
                                        <span class="d-none d-md-block" style="color:white">Motoristas</span>
                                        <i data-feather="users" class="d-block d-md-none"></i>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bold" href="javascript:void(0)">
                                        <span class="d-none d-md-block" style="color:white">Aterros</span>
                                        <i data-feather="users" class="d-block d-md-none"></i>
                                    </a>
                                </li>
                            </ul>
                
                        </div>
                    </div>
                </nav>

                <div class="p-1">
                    <div class="app-content content ">
                        <div class="content-header row">
                            <div class="content-header-left col-md-9 col-12 mb-2">
                                <div class="row breadcrumbs-top">
                                    <div class="col-12">
                                        <h2 class="content-header-title float-left mb-0">Pedidos</h2>
                                        <div class="breadcrumb-wrapper">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                                </li>
                                                <li class="breadcrumb-item active">Pedidos
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="content-body">

                        