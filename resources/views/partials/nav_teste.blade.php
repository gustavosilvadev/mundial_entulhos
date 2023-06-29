<?php
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
                    <a class="{{ request()->is('call_demand') ? 'btn btn-outline-success' : 'btn dropdown-toggle waves-effect waves-float waves-light' }}" href="{{ request()->is('call_demand') ? '#' : url('call_demand') }}">BASE PEDIDOS</a>
                </div>

                <div class="btn-group">
                    <a class="{{ request()->is('call_demand_resume') ? 'btn btn-outline-success' : 'btn dropdown-toggle waves-effect waves-float waves-light' }}" href="{{ request()->is('call_demand_resume') ? '#' : url('call_demand_resume') }}">RESUMO PEDIDOS</a>
                </div>

                <div class="btn-group">
                    <a class="{{ request()->is('createcalldemand') ? 'btn btn-outline-success' : 'btn dropdown-toggle waves-effect waves-float waves-light' }}" href="{{ request()->is('createcalldemand') ? '#' : url('createcalldemand') }}"><u>NOVA ALOCAÇÃO</u></a>
                </div>
{{--                 
                <div class="btn-group">
                    <a class="{{ request()->is('create_replacement_calldemand') ? 'btn btn-outline-success' : 'btn dropdown-toggle waves-effect waves-float waves-light' }}" href="{{ request()->is('create_replacement_calldemand') ? '#' : url('create_replacement_calldemand') }}">NOVA TROCA</a>
                </div> --}}

                <div class="btn-group">
                    <button type="button" class="{{ (request()->is('dumpsters') || request()->is('createlandfill') || request()->is('cacamba_dias_municipio') || request()->is('employee') || request()->is('createemployee')) ? 'btn btn-outline-success' : 'btn dropdown-toggle' }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CONFIGURAÇÕES</button>
                    <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 40px; left: 0px; transform: translate3d(0px, -2px, 0px);">
                        <a class="dropdown-item" href="{{ url('dumpsters') }}">CAÇAMBAS</a>
                        <a class="dropdown-item" href="{{ url('createlandfill') }}">ATERROS</a>
                        <a class="dropdown-item" href="{{ url('cacamba_dias_municipio') }}">MUNICÍPIOS</a>
                        <label class="dropdown-item" href="#">FUNCIONÁRIOS</label>
                        <ul class="menu-content">
                            <li>
                                <a class="dropdown-item" href="{{ url('employee') }}">LISTA</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('createemployee') }}">NOVO</a>
                            </li>
                        </ul>

                    </div>
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
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="employee/{{session('id_user')}}"><i class="mr-50" data-feather="settings"></i> Configurações</a> --}}
                        <a class="dropdown-item" href="{{ url('logout') }}">
                            <i class="mr-50" data-feather="power"></i> SAIR
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <!-- END: Header-->
