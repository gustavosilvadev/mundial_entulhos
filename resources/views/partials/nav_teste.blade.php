<?php

// echo "<pre>";
    // print_r(url());
    // echo request()->getHttpHost();    
// echo "</pre>";

// $host = request()->getHttpHost();
// echo $host ."<br/>";
// $getHost = request()->getHost();
// echo $getHost ."<br/>";
// $hostwithHttp = request()->getSchemeAndHttpHost();
// echo $hostwithHttp ."<br/>";
// Path to the project's root folder  
/*  
echo base_path();

echo "<BR />";
// Path to the 'app' folder    
echo app_path();        

echo "<BR />";
// Path to the 'public' folder    
echo public_path();

echo "<BR />";
// Path to the 'storage' folder    
echo storage_path();

echo "<BR />";
// Path to the 'storage/app' folder    
echo storage_path('app');
echo "<BR />";



die();
echo url()->current();
echo "<BR />";
echo url()->full();
echo "<BR />";
echo url()->previous();
echo "<BR />";
die();
*/
$name_perfil = '';

if(session('access_permission') == 1){
    $name_perfil = 'Admin';
}else{
    $name_perfil = 'Motorista';
}    
?>

<!-- BEGIN: Header-->

    <nav class="header-navbar navbar navbar-expand-lg navbar-shadow container-fluid">
        <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">


        <?php if(session('access_permission') == 1){ ?>
            <div class="bd-example">
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PEDIDOS</button>
                    <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 40px; left: 0px; transform: translate3d(0px, -2px, 0px);">
                        <a class="dropdown-item" href="call_demand">BASE PEDIDOS</a>
                        <a class="dropdown-item" href="call_demand_resume">RESUMO PEDIDOS</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="createcalldemand">NOVO</a>

                    </div>
                </div><!-- /btn-group -->
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FUNCIONÁRIOS</button>
                    <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 40px; left: 0px; transform: translate3d(0px, -2px, 0px);">
                        <a class="dropdown-item" href="employee">LISTA</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="createemployee">NOVO</a>

                    </div>
                </div><!-- /btn-group -->
{{--                 
                <div class="btn-group">
                    <a type="button" class="btn dropdown-toggle" href="createdriver">MOTORISTAS</a>

                </div><!-- /btn-group --> 
--}}
{{-- 
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">ATERROS</button>
                    <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 40px; left: 0px; transform: translate3d(0px, -164px, 0px);">
                        <a class="dropdown-item" href="createlandfill">NOVO</a>
                    </div>
                </div><!-- /btn-group -->
 --}}

                <div class="btn-group">
                    <a class="btn dropdown-toggle" href="createlandfill">ATERROS</a>

                </div><!-- /btn-group -->

{{--                 
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MUNICÍPIOS</button>
                    <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 40px; left: 0px; transform: translate3d(0px, -2px, 0px);">
                        <a class="dropdown-item" href="cacamba_dias_municipio">NOVO</a>
                    </div>
                </div><!-- /btn-group --> 
--}}

                <div class="btn-group">
                    <a class="btn dropdown-toggle" href="cacamba_dias_municipio">MUNICÍPIOS</a>
                </div><!-- /btn-group -->


                <div class="btn-group">
                    {{-- <a type="button" href="activities" class="btn dropdown-toggle">ATIVIDADES</a> --}}
                </div><!-- /btn-group -->
            </div>
        <?php } ?>
        </div>            
            

            <ul class="nav navbar-nav align-items-center ml-auto">
               
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">{{ session('name') }}</span>
                            <span class="user-status">{{ $name_perfil }}</span>
                        </div>
                            <span class="avatar">
                                <img class="round" src="{{ URL::asset('public/app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" height="40" width="40">
                                <span class="avatar-status-online"></span>
                            </span>
                        
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user"><a class="dropdown-item" href="page-profile.html">
                        
                        {{-- <i class="mr-50" data-feather="user"></i> Perfil</a><a class="dropdown-item" href="#"> --}}
                        
                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="employee/{{session('id_user')}}"><i class="mr-50" data-feather="settings"></i> Configurações</a> --}}
                        <a class="dropdown-item" href="logout"><i class="mr-50" data-feather="power"></i> SAIR</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <!-- END: Header-->
