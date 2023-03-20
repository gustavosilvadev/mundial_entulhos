
@include('partials.header')
@include('partials.nav')

    <!-- BEGIN: Content-->
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        
        <div class="content-area-wrapper container-xxl p-0">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content todo-sidebar">
                        <div class="todo-app-menu">
                            <div class="add-task">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#new-task-modal">
                                    Novo Usuário
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">

                        <div class="body-content-overlay"></div>


                        <div class="todo-app-list">
                            <!-- Todo search starts -->
                            <div class="app-fixed-search d-flex align-items-center">
                                <div class="sidebar-toggle d-block d-lg-none ml-1">
                                    <i data-feather="menu" class="font-medium-5"></i>
                                </div>
                                <div class="d-flex align-content-center justify-content-between w-100">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="todo-search" placeholder="Pesquisar usuário" aria-label="Search..." aria-describedby="todo-search" />
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle hide-arrow mr-1" id="todoActions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="more-vertical" class="font-medium-2 text-body"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="todoActions">
                                        <a class="dropdown-item sort-asc" href="javascript:void(0)">Sort A - Z</a>
                                        <a class="dropdown-item sort-desc" href="javascript:void(0)">Sort Z - A</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Sort Assignee</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Sort Due Date</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Sort Today</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Sort 1 Week</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Sort 1 Month</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Todo search ends -->

                            <!-- Todo List starts -->
                            <div class="todo-task-list-wrapper list-group">
                                <!-- <ul class="todo-task-list media-list" id="todo-task-list"> -->
                                <ul class="todo-task-list media-list" id="todo-task-list">

                                    <li>
                                        <div class="todo-title-wrapper">
                                            <div class="todo-title-area">
                                                <i data-feather="more-vertical" class="drag-icon"></i>
                                                <div class="title-wrapper">
                                                    <span class="todo-title">Fix Responsiveness for new structure</span>
                                                </div>
                                            </div>
                                            <div class="todo-item-action">
                                                <div class="badge-wrapper mr-1">
                                                    <div class="badge badge-pill badge-light-warning todo-item">Editar</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="todo-title-wrapper">
                                            <div class="todo-title-area">
                                                <i data-feather="more-vertical" class="drag-icon"></i>
                                                <div class="title-wrapper">
                                                    <span class="todo-title">Plan a party for development team 🎁</span>
                                                </div>
                                            </div>
                                            <div class="todo-item-action">
                                                <div class="badge-wrapper mr-1">
                                                    <div class="badge badge-pill badge-light-warning todo-item">Editar</div>
                                                </div>
                                            </div>                                        </div>
                                    </li>
                                    <li>
                                        <div class="todo-title-wrapper">
                                            <div class="todo-title-area">
                                                <i data-feather="more-vertical" class="drag-icon"></i>
                                                <div class="title-wrapper">
                                                    <span class="todo-title">Hire 5 new Fresher or Experienced, frontend and backend developers </span>
                                                </div>
                                            </div>
                                            <div class="todo-item-action">
                                                <div class="badge-wrapper mr-1">
                                                    <div class="badge badge-pill badge-light-warning todo-item">Editar</div>
                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="todo-title-wrapper">
                                            <div class="todo-title-area">
                                                <i data-feather="more-vertical" class="drag-icon"></i>
                                                <div class="title-wrapper">
                                                    <span class="todo-title">Send PPT with real-time reports</span>
                                                </div>
                                            </div>
                                            <div class="todo-item-action">
                                                <div class="badge-wrapper mr-1">
                                                    <div class="badge badge-pill badge-light-warning todo-item">Editar</div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="todo-title-wrapper">
                                            <div class="todo-title-area">
                                                <i data-feather="more-vertical" class="drag-icon"></i>
                                                <div class="title-wrapper">
                                                    <span class="todo-title">Submit quotation for Abid's ecommerce website and admin project </span>
                                                </div>
                                            </div>
                                            <div class="todo-item-action">

                                                <div class="badge-wrapper mr-1">
                                                    <div class="badge badge-pill badge-light-warning todo-item">Editar</div>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    
                                    
                                </ul>
                                <div class="no-results">
                                    <h5>No Items Found</h5>
                                </div>
                            </div>
                            <!-- Todo List ends -->
                        </div>

                        <!-- Right Sidebar starts -->
                        <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
                            <div class="modal-dialog sidebar-lg">
                                <div class="modal-content p-0">
                                    <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false">
                                        <div class="modal-header align-items-center mb-1">
                                            <h5 class="modal-title">Adicionar Categoria</h5>
                                            <div class="todo-item-action d-flex align-items-center justify-content-between ml-auto">
                                                <button type="button" class="close font-large-1 font-weight-normal py-0" data-dismiss="modal" aria-label="Close">
                                                    ×
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                            <div class="action-tags">

                                                <div class="form-group">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-title">Título</label>
                                                        <input type="text" id="blog-edit-title" class="form-control" value="" />
                                                    </div>                                                
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-slug">Slug</label>
                                                        <input type="text" id="blog-edit-slug" class="form-control" value="o-seu-slug" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <p class="mb-50">Status</p>
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch111" checked />
                                                    <label class="custom-control-label" for="customSwitch111">
                                                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                                                    </label>
                                                </div>


                                            </div>
                                            <div class="form-group my-1">
                                                <button type="submit" class="btn btn-success d-none add-todo-item mr-1">Criar</button>
                                                <button type="button" class="btn btn-outline-secondary add-todo-item d-none" data-dismiss="modal">
                                                    Cancelar
                                                </button>
                                                <button type="button" class="btn btn-warning d-none update-btn update-todo-item mr-1">Atualizar</button>
                                                <button type="button" class="btn btn-outline-danger update-btn d-none" data-dismiss="modal">Deletar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Right Sidebar ends -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

@include('partials.footer')
