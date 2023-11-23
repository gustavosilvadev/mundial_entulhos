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
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="GUSTAVO">
    <title>{{$title}}</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/icon_logo.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/vendors.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/bootstrap-mobile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/components-mobile.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/themes/semi-dark-layout.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/forms/form-wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/pages/app-todo.css') }}">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.3/css/fixedColumns.dataTables.min.css">

  <!-- DataTables FixedColumns JS -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
</head>

<style>

    .prevent-select {
      -webkit-user-select: none; /* Safari */
      -ms-user-select: none; /* IE 10 and IE 11 */
      user-select: none; /* Standard syntax */
    }
    
    .ul-list{
        text-align:center;width:450px;
    }
    
    .li-item{
        display:inline-block;padding:15px;
    }

    .flatpickr-calendar {
        top: 127.094px;
        left: 16.7969px;
        right: auto;
        width: 380px;
        padding-left: 30px;
    }
    
</style>

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col=""> 
