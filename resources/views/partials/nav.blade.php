<?php $categorias = App\Http\Controllers\CategoriaController::listarCategoriasHome(); ?>
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons mt-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/" data-toggle="tooltip" data-placement="top">
                        <img src="../../../app-assets/images/logo/logo_seu_coerente.svg" class="brand-text">
                        <pre>by Gustavo Silva</pre>
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

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
              
        <div class="navbar-header">
        
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="/">
                            <span class="brand-logo">
                                <img src="../../../app-assets/images/logo/logo_icon_seu_coerente.svg">
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

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice"><?php echo (session("id_user")) ? "Opções" : "Categoria";?></span></a>

                    <ul class="menu-content">
                        <?php  if(session("id_user")): ?>
                            <li class="nav-item">
                                <a class="d-flex align-items-center" href="/lista_todas_categorias_edit">

                                    <span class="menu-title text-truncate" data-i18n="Invoice">Categoria</span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="d-flex align-items-center" href="/lista_todos_conteudos_edit">

                                    <span class="menu-title text-truncate" data-i18n="Invoice">Conteúdo</span>
                                </a>                            
                            </li>

                        <?php else: ?>
                            <?php foreach($categorias as $categoria): ?>
                                <?php if($categoria->status_ativo): ?>
                                    <li><a class="d-flex align-items-center" href="/conteudo/<?php echo $categoria->slug; ?>" title="{{$categoria->categoria}}"><span class="menu-item text-truncate" data-i18n="List">{{$categoria->categoria}}</span></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>                        
                        <?php endif; ?>                        

                    </ul>
                </li>
            </ul>
        </div>
    </div>