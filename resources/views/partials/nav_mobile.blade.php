<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="#">
                       
                        <h2 class="text-success mb-0">Mundial Entulhos</h2>
                        <!-- <h2 class="text-success mb-0"><img class="" src="../../../app-assets/images/logo/logo.svg" style="height: 65px;"/></h2> -->
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-dark toggle-icon font-medium-4" data-feather="chevrons-left"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">

            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item"><a class="nav-link d-flex align-items-center h1" href="{{ url('driver_demand') }}"><i data-feather="home"></i><span>Geral</span></a></li>
                {{-- <li class="nav-item"><a class="nav-link d-flex align-items-center" href="#"><i data-feather="alert-circle"></i><span></span><span>Pendentes</span></a></li> --}}
                <li class="nav-item"><a class="nav-link d-flex align-items-center h1" href="{{ url('pending_demand') }}"><i data-feather="alert-triangle"></i><span>Em atrasos</span></a></li>
                <li class="nav-item"><a class="nav-link d-flex align-items-center h1" href="#"><i data-feather="check-square"></i><span>Finalizados</span></a></li>
                <li><div class="dropdown-divider"></div></li>
                <li class="nav-item">
                    {{-- <label class="text-dark ml-2">{{ session('name') }}</label> --}}
                    <a class="nav-link d-flex align-items-center h1" href="{{ url('logout') }}"><span>Sair</span></a>
                </li>
                
            </ul>
        </div>
    </div>
</div>