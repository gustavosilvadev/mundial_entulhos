{{-- @include('partials.header')
@include('partials.nav') --}}
@include('partials.header_teste')
@include('partials.nav_teste');


    <!-- BEGIN: Content-->
    {{-- <div class="app-content content "> --}}
        <div class="app-content content-designed">
        {{-- <div class="content-overlay"></div> --}}
        {{-- <div class="header-navbar-shadow"></div> --}}
        {{-- <div class="content-wrapper container-xxl p-0"> --}}
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">LISTA DE FUNCIONÁRIOS</h2>

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


                <section id="ajax-datatable">
                    <div class="row">
                        <div class="col-12">
                            {{-- <div class="card">
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
                            </div> --}}
                            <div class="card">
                                <div class="card-header">
                                    <a href="/createemployee" class="btn btn-success">NOVO</a>
                                </div>
                                <div style="display: block;overflow-x: auto;white-space: nowrap;" >
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>-</th>
                                            </tr>
                                        </thead>
    
                                        <?php if(isset($employees)): ?>
                                            
                                            <?php foreach($employees as $employee): ?>
    
                                            <tbody>
                                                <td>
                                                    <a href="employee/{{$employee->id}}" class="href">
                                                        <span class="todo-title"><?php echo $employee->name.' '.$employee->surname; ?></span>
                                                    </a>
                                                </td>
                                                <td><a href="/employee/<?php echo $employee->id; ?>">Editar</a></td>
                                                
                                            </tbody>
    
                                        <?php endforeach; ?>
                                        <?php else: ?>
    
                                            <tbody>
    
                                                <td>-----</td>
                                                <td>-----</td>
    
                                            </tbody>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </section>
            </div>
        {{-- </div> --}}
    </div>
    <!-- END: Content-->


{{-- @include('partials.footer') --}}
@include('partials.footer_teste') 