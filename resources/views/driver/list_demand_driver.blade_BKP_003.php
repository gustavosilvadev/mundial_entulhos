@include('partials.header_mobile')
@include('partials.nav_mobile')

    <!-- BEGIN: Header-->

    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a href="javascript:void(0);">
                <h6 class="section-label mt-75 mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="../../../app-assets/images/icons/xls.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="../../../app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="../../../app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="mr-75"><img src="../../../app-assets/images/icons/doc.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a href="javascript:void(0);">
                <h6 class="section-label mt-75 mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="../../../app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-75"><img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->



    <!-- BEGIN: Content-->
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper container-xxl p-0">

            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="body-content-overlay"></div>
                        <div class="todo-app-list">

                            <div class="app-fixed-search d-flex align-items-center">
                                <div class="d-flex align-content-center justify-content-between w-100">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="todo-search" placeholder="Search task" aria-label="Search..." aria-describedby="todo-search" />
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
                                <ul class="todo-task-list media-list" id="todo-task-list">
                                    <li class="todo-item">
                                        <div class="todo-title-wrapper">
                                            <div class="todo-title-area">
                                                <i data-feather="more-vertical" class="drag-icon"></i>
                                                <div class="title-wrapper">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                                        <label class="custom-control-label" for="customCheck1"></label>
                                                    </div>
                                                    <span class="todo-title">Fix Responsiveness for new structure 💻</span>
                                                </div>
                                            </div>
                                            <div class="todo-item-action">
                                                <div class="badge-wrapper mr-1">
                                                    <div class="badge badge-pill badge-light-primary">Team</div>
                                                </div>
                                                <small class="text-nowrap text-muted mr-1">Aug 08</small>
                                                <div class="avatar">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-4.jpg" alt="user-avatar" height="32" width="32" />
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="todo-item">
                                        <div class="todo-title-wrapper">
                                            <div class="todo-title-area">
                                                <i data-feather="more-vertical" class="drag-icon"></i>
                                                <div class="title-wrapper">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                                        <label class="custom-control-label" for="customCheck2"></label>
                                                    </div>
                                                    <span class="todo-title">Plan a party for development team 🎁</span>
                                                </div>
                                            </div>
                                            <div class="todo-item-action">
                                                <div class="badge-wrapper mr-1">
                                                    <div class="badge badge-pill badge-light-primary">Team</div>
                                                    <div class="badge badge-pill badge-light-danger">High</div>
                                                </div>
                                                <small class="text-nowrap text-muted mr-1">Aug 30</small>
                                                <div class="avatar bg-light-warning">
                                                    <div class="avatar-content">MB</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="todo-item">
                                        <div class="todo-title-wrapper">
                                            <div class="todo-title-area">
                                                <i data-feather="more-vertical" class="drag-icon"></i>
                                                <div class="title-wrapper">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck3" />
                                                        <label class="custom-control-label" for="customCheck3"></label>
                                                    </div>
                                                    <span class="todo-title">Hire 5 new Fresher or Experienced, frontend and backend developers </span>
                                                </div>
                                            </div>
                                            <div class="todo-item-action">
                                                <div class="badge-wrapper mr-1">
                                                    <div class="badge badge-pill badge-light-info">Update</div>
                                                    <div class="badge badge-pill badge-light-warning">Medium</div>

                                                    
                                                </div>
                                                <small class="text-nowrap text-muted mr-1">Aug 28</small>
                                                <div class="avatar">
                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-5.jpg" alt="user-avatar" height="32" width="32" />
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
                            <div class="modal-dialog sidebar-lg w-100">
                                <div class="modal-content p-0">
                                    <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false">
                                        <div class="modal-header align-items-center mb-1">
                                            <p class="h3">NOME DO CLIENTE</p>
                                            <div class="todo-item-action d-flex align-items-center justify-content-between ml-auto">
                                                <span class="todo-item-favorite cursor-pointer mr-75"><i data-feather="star" class="font-medium-2"></i></span>
                                                <button type="button" class="close font-large-1 font-weight-normal py-0" data-dismiss="modal" aria-label="Close">
                                                    X
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                            
                                            <div class="action-tags">


                                                <div class="form-group p-1 mb-1 bg-primary text-white">COLOCAÇÃO</div>
                                                <div class="form-group p-1 mb-1 bg-warning text-white">TROCA</div>
                                                <div class="form-group p-1 mb-1 bg-success text-white">RETIRADA</div>

                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 1 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>
                                                    

                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 2 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 1 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>

                                                </div>                                                
                                                <div class="form-group position-relative">
                                                    <label for="task-assigned" class="form-label d-block">Aterro</label>
                                                    <select class="select2 form-control" id="task-assigned" name="task-assigned">
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-3.jpg" value="Phill Buffer" selected>
                                                            Phill Buffer
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-1.jpg" value="Chandler Bing">
                                                            Chandler Bing
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-4.jpg" value="Ross Geller">
                                                            Ross Geller
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-6.jpg" value="Monica Geller">
                                                            Monica Geller
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-2.jpg" value="Joey Tribbiani">
                                                            Joey Tribbiani
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-11.jpg" value="Rachel Green">
                                                            Rachel Green
                                                        </option>
                                                    </select>
                                                </div>

                                                <button type="button" class="btn btn-success  update-btn update-todo-item mr-1">ATENDENR</button>
                                                <button type="button" class="btn btn-info update-btn " data-dismiss="modal">FINALIZAR</button>                                                

                                            </div>
                                            
                                            <hr>
                                            <hr>


                                            <div class="action-tags">


                                                <div class="form-group p-1 mb-1 bg-primary text-white">COLOCAÇÃO</div>
                                                <div class="form-group p-1 mb-1 bg-warning text-white">TROCA</div>
                                                <div class="form-group p-1 mb-1 bg-success text-white">RETIRADA</div>

                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 1 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>
                                                    

                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 2 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <label for="task-due-date" class="form-label">CAÇAMBA 1 </label>
                                                        <input class="form-control" id="ex1" type="text">
                                                    </div>

                                                </div>                                                
                                                <div class="form-group position-relative">
                                                    <label for="task-assigned" class="form-label d-block">Aterro</label>
                                                    <select class="select2 form-control" id="task-assigned" name="task-assigned">
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-3.jpg" value="Phill Buffer" selected>
                                                            Phill Buffer
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-1.jpg" value="Chandler Bing">
                                                            Chandler Bing
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-4.jpg" value="Ross Geller">
                                                            Ross Geller
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-6.jpg" value="Monica Geller">
                                                            Monica Geller
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-2.jpg" value="Joey Tribbiani">
                                                            Joey Tribbiani
                                                        </option>
                                                        <option data-img="../../../app-assets/images/portrait/small/avatar-s-11.jpg" value="Rachel Green">
                                                            Rachel Green
                                                        </option>
                                                    </select>
                                                </div>

                                                <button type="button" class="btn btn-success  update-btn update-todo-item mr-1">ATENDENR</button>
                                                <button type="button" class="btn btn-info update-btn " data-dismiss="modal">FINALIZAR</button>                                                

                                            </div>


                                            <div class="form-group my-1">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                                    Fechar
                                                </button>
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

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

@include('partials.footer_mobile') 

