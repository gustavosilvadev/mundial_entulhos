{{-- 
    
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
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{$title}}</title>
        <link rel="apple-touch-icon" href="../../../public/app-assets/images/ico/apple-icon-120.png">
        <link rel="shortcut icon" type="image/x-icon" href="../../../public/app-assets/images/ico/favicon.ico">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    
        
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/forms/select/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/editors/quill/katex.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/forms/select/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/extensions/dragula.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/extensions/toastr.min.css') }}">  
    
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/components.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/themes/bordered-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/themes/semi-dark-layout.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/forms/form-quill-editor.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/pages/page-blog.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/forms/form-validation.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/forms/form-wizard.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/pages/app-todo.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/datatables/dataTables.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/datatables/buttons.dataTables.min.css') }}">
        
    </head>
    
    <style>
    
        .content-designed{
            padding: calc(1rem + 1rem) 2rem 0;
            position: relative; 
            transition: 300ms ease all; 
            backface-visibility: hidden; 
            min-height: calc(100% - 3.35rem);
        }
    </style>
    
    <body class="vertical-layout vertical-menu-modern 1-column navbar-floating footer-static">
 
--}}


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

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
<meta name="description" content="Ideias, pensamentos, conhecimentos e o que se diz ser Coerente">
<meta name="keywords" content="blog, tecnologia, motivacional, pensamentos, psicologia, pensamentos humanos">
<meta name="author" content="GUSTAVOSILVA">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{$title}}</title>
<link rel="apple-touch-icon" href="../../../public/app-assets/images/ico/apple-icon-120.png">
<link rel="shortcut icon" type="image/x-icon" href="../../../public/app-assets/images/ico/favicon.ico">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">




        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/forms/select/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/editors/quill/katex.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/forms/select/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/extensions/dragula.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/extensions/toastr.min.css') }}">  
        
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/components.css') }}">
        {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/themes/dark-layout.css') }}"> --}}
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/themes/bordered-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/themes/semi-dark-layout.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/forms/form-quill-editor.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/pages/page-blog.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/forms/form-validation.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/plugins/forms/form-wizard.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/app-assets/css/pages/app-todo.css') }}">


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

</style>

<body class="vertical-layout vertical-menu-modern content-left-sidebar navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">

