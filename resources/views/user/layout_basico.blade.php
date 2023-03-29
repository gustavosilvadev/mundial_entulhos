
    @include('partials.header_teste')
    @include('partials.nav_teste');


    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Cabeçalho >>></h2>

                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <div class="row">
                <!-- 
                    <div class="col-12">
                        <div class="alert alert-primary" role="alert">
                            <div class="alert-body"><strong>Info:</strong> Use this layout to set menu (navigation) default collapsed. Please check the&nbsp;<a class="text-primary" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-layout-collapsed-menu.html" target="_blank">Layout collapsed menu documentation</a>&nbsp; for more details.</div>
                        </div>
                    </div>
                -->
 
                </div>
                <section class="horizontal-wizard">
                    <div class="bs-stepper horizontal-wizard-example">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#account-details">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">1</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Account Details</span>
                                        <span class="bs-stepper-subtitle">Setup Account Details</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#personal-info">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">2</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Personal Info</span>
                                        <span class="bs-stepper-subtitle">Add Personal Info</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#address-step">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">3</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Address</span>
                                        <span class="bs-stepper-subtitle">Add Address</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#social-links">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">4</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Social Links</span>
                                        <span class="bs-stepper-subtitle">Add Social Links</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <div id="account-details" class="content">
                                <div class="content-header">
                                    <h5 class="mb-0">Account Details</h5>
                                    <small class="text-muted">Enter Your Account Details.</small>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="johndoe" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-password-toggle col-md-6">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        </div>
                                        <div class="form-group form-password-toggle col-md-6">
                                            <label class="form-label" for="confirm-password">Confirm Password</label>
                                            <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-outline-secondary btn-prev" disabled>
                                        <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="personal-info" class="content">
                                <div class="content-header">
                                    <h5 class="mb-0">Personal Info</h5>
                                    <small>Enter Your Personal Info.</small>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="first-name">First Name</label>
                                            <input type="text" name="first-name" id="first-name" class="form-control" placeholder="John" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="last-name">Last Name</label>
                                            <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Doe" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="country">Country</label>
                                            <select class="select2 w-100" name="country" id="country">
                                                <option label=" "></option>
                                                <option>UK</option>
                                                <option>USA</option>
                                                <option>Spain</option>
                                                <option>France</option>
                                                <option>Italy</option>
                                                <option>Australia</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="language">Language</label>
                                            <select class="select2 w-100" name="language" id="language" multiple>
                                                <option>English</option>
                                                <option>French</option>
                                                <option>Spanish</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="address-step" class="content">
                                <div class="content-header">
                                    <h5 class="mb-0">Address</h5>
                                    <small>Enter Your Address.</small>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="address">Address</label>
                                            <input type="text" id="address" name="address" class="form-control" placeholder="98  Borough bridge Road, Birmingham" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="landmark">Landmark</label>
                                            <input type="text" name="landmark" id="landmark" class="form-control" placeholder="Borough bridge" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pincode1">Pincode</label>
                                            <input type="text" id="pincode1" class="form-control" placeholder="658921" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="city1">City</label>
                                            <input type="text" id="city1" class="form-control" placeholder="Birmingham" />
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="social-links" class="content">
                                <div class="content-header">
                                    <h5 class="mb-0">Social Links</h5>
                                    <small>Enter Your Social Links.</small>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="twitter">Twitter</label>
                                            <input type="text" id="twitter" name="twitter" class="form-control" placeholder="https://twitter.com/abc" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="facebook">Facebook</label>
                                            <input type="text" id="facebook" name="facebook" class="form-control" placeholder="https://facebook.com/abc" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="google">Google+</label>
                                            <input type="text" id="google" name="google" class="form-control" placeholder="https://plus.google.com/abc" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="linkedin">Linkedin</label>
                                            <input type="text" id="linkedin" name="linkedin" class="form-control" placeholder="https://linkedin.com/abc" />
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-success btn-submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

                <section id="ajax-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Ajax Sourced Server-side</h4>
                                </div>
                                <div class="card-datatable">
                                    <table id="example" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                                <th>Extn.</th>
                                                <th>E-mail</th>

                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                                <th>Extn.</th>
                                                <th>E-mail</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger</td>
                                                <td>Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011-04-25</td>
                                                <td>$320,800</td>
                                                <td>5421</td>
                                                <td>t.nixon@datatables.net</td>

                                                <td>Tiger</td>
                                                <td>Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011-04-25</td>
                                                <td>$320,800</td>
                                                <td>5421</td>
                                                <td>t.nixon@datatables.net</td>                                                
                                            </tr>
                                            <tr>
                                                <td>Garrett</td>
                                                <td>Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011-07-25</td>
                                                <td>$170,750</td>
                                                <td>8422</td>
                                                <td>g.winters@datatables.net</td>

                                                <td>Garrett</td>
                                                <td>Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011-07-25</td>
                                                <td>$170,750</td>
                                                <td>8422</td>
                                                <td>g.winters@datatables.net</td>                                                
                                            </tr>
                                            <tr>
                                                <td>Ashton</td>
                                                <td>Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009-01-12</td>
                                                <td>$86,000</td>
                                                <td>1562</td>
                                                <td>a.cox@datatables.net</td>

                                                <td>Ashton</td>
                                                <td>Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009-01-12</td>
                                                <td>$86,000</td>
                                                <td>1562</td>
                                                <td>a.cox@datatables.net</td>                                                
                                            </tr>
                                            <tr>
                                                <td>Cedric</td>
                                                <td>Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012-03-29</td>
                                                <td>$433,060</td>
                                                <td>6224</td>
                                                <td>c.kelly@datatables.net</td>

                                                <td>Cedric</td>
                                                <td>Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012-03-29</td>
                                                <td>$433,060</td>
                                                <td>6224</td>
                                                <td>c.kelly@datatables.net</td>                                                
                                            </tr>
                                            <tr>
                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>

                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>                                                
                                            </tr>

                                            <tr>
                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>

                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>                                                
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>

                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>                                                
                                            </tr>
                                            
                                            <tr>
                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>

                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>                                                
                                            </tr>
                                            
                                            <tr>
                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>

                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>                                                
                                            </tr>
                                            
                                            <tr>
                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>

                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>                                                
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>

                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>                                                
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>

                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>                                                
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>

                                                <td>Airi</td>
                                                <td>Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                                <td>5407</td>
                                                <td>a.satou@datatables.net</td>                                                
                                            </tr>                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    @include('partials.footer_teste') 

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                scrollX: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
        
    </script>