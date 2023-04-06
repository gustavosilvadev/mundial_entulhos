
<?php

/** 
 * COLOCACAO/TROCA
 * DATA PEDIDO
 * CLIENTE (NOME/SOBRENOME)
 * ENDEREÇO DA OBRA
 * BAIRRO
 * TELEFONE
 * PREÇO
 * COMENTÁRIOS
 * TOTAL CACAMBAS
 * PREVISAO DE RETIRADA
 * DATA RETIRADA EFETIVA
 * STATUS
 * ATERRO
 * PERIODO DO DIA
 * MOTORISTA
 * 
 * **/

// echo '<pre>';
// print_r($calldemandsnodriver);
// echo '</pre>';

/*
foreach($calldemandsnodriver as $value_no_driver){

echo "<BR />id_demand = ".$value_no_driver->id_demand; // => 1
echo "<BR />type_service = ".$value_no_driver->type_service; // => COLOCACAO
echo "<BR />period = ".$value_no_driver->period; // => DIURNO
echo "<BR />name = ".$value_no_driver->name; // => CLIENTE TESTE 001
echo "<BR />date_start = ".$value_no_driver->date_start; // => 
echo "<BR />date_allocation_dumpster = ".$value_no_driver->date_allocation_dumpster; // => 05/04/2023
echo "<BR />date_removal_dumpster_forecast = ".$value_no_driver->date_removal_dumpster_forecast; // => 10/04/2023
echo "<BR />date_end = ".$value_no_driver->date_end; // => 
echo "<BR />created_at = ".$value_no_driver->created_at; // => 03/04/2023
echo "<BR />address_service = ".$value_no_driver->address_service; // => Rua Mirandinha
echo "<BR />number_address_service = ".$value_no_driver->number_address_service; // => 22
echo "<BR />zipcode_address_service = ".$value_no_driver->zipcode_address_service; // => 03641-000
echo "<BR />city_address_service = ".$value_no_driver->city_address_service; // => São Paulo
echo "<BR />district_address_service = ".$value_no_driver->district_address_service; // => Penha de França
echo "<BR />state_address_service = ".$value_no_driver->state_address_service; // => SP
echo "<BR />comments_demand = ".$value_no_driver->comments_demand; // => TESTE COMENTÁRIOS
echo "<BR />phone_demand = ".$value_no_driver->phone_demand; // => 1198552-2144
echo "<BR />price_unit = ".$value_no_driver->price_unit; // => 0.00
echo "<BR />dumpster_quantity = ".$value_no_driver->dumpster_quantity; // => 2
echo "<BR />dumpster_number = ".$value_no_driver->dumpster_number; // => 0
echo "<BR />id_landfill = ".$value_no_driver->id_landfill; // => 
echo "<BR />service_status = ".$value_no_driver->service_status; // => 0
echo "<BR />updated_at = ".$value_no_driver->updated_at; // => 03/04/2023
die();

}

die();
*/
?>
 
 @include('partials.header_teste')
 @include('partials.nav_teste')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Lista de Pedidos</h2>

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
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">PESQUISA</h4>
                                </div>

                                <div class="card-body mt-2">
                                    <form class="dt_adv_search" method="POST">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-row mb-1">
                                                    <div class="col-lg-4 mb-1">
                                                        <label>MOTORISTA</label>
                                                        <select class="select2 form-control" id="name_search" multiple>
                                                            <?php if($driver_name_demands):?>
                                                            <?php foreach($driver_name_demands as $driver_name):?>
                                                                <option>{{ $driver_name->name }}</option>
                                                            <?php endforeach;?>

                                                            <?php endif;?>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label></label>
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control dt-date flatpickr-range dt-input flatpickr-input" data-column="5" placeholder="StartDate to EndDate" data-column-index="4" name="dt_date" readonly="readonly">
                                                            <input type="hidden" class="form-control dt-date start_date dt-input" data-column="5" data-column-index="4" name="value_from_start_date">
                                                            <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="5" data-column-index="4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="reset" class="btn btn-warning" value="Limpar">
                                    </form>
                                </div>                              
                                <div class="card-datatable">

                                    <table id="tbpedido" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID PED</th>
                                                <th>COLOCACAO/TROCA</th>
                                                <th>PERIODO DO DIA</th>
                                                <th>CLIENTE</th>
                                                <th>DATA ABERTURA</th>  
                                                <th>DATA OPERACAO</th>
                                                <th>DATA ALOCAÇÃO</th>
                                                <th>DATA PREV RETIRADA</th>
                                                <th>ENDEREÇO</th>
                                                <th>TELEFONE</th>
                                                <th>PREÇO</th>
                                                <th>COMENTÁRIOS</th>
                                                <th>QUANTIDADE CACAMBAS</th>
                                                <th>NÚMERO CAÇAMBA</th>
                                                <th>DATA RETIRADA EFETIVA</th> 
                                                <th>STATUS</th> 
                                                <th>ATERRO</th>
                                                <th>MOTORISTA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($calldemandsnodriver)): ?>
                                                <?php foreach($calldemandsnodriver as $value_no_driver):?>        
                                            <tr>
                                                <td><a href="/editcalldemand/{{$value_no_driver->id_demand}}">{{ $value_no_driver->id_demand }}</a></td>
                                                <td><?php echo $value_no_driver->type_service; ?></td>
                                                <td><?php echo $value_no_driver->period; ?></td>
                                                <td><?php echo $value_no_driver->name; ?></td>
                                                <td><?php echo $value_no_driver->created_at; ?></td>
                                                <td><?php echo $value_no_driver->date_start; ?></td>
                                                <td><?php echo $value_no_driver->date_allocation_dumpster; ?></td>
                                                <td><?php echo $value_no_driver->date_removal_dumpster_forecast; ?></td>
                                                
                                                <td>
                                                    <?php echo $value_no_driver->address_service.' '.
                                                $value_no_driver->number_address_service.' '.
                                                $value_no_driver->district_address_service.' '.
                                                $value_no_driver->city_address_service.' '.
                                                $value_no_driver->state_address_service.' '; ?>
                                                </td>
                                                <td><?php echo $value_no_driver->phone_demand; ?></td>
                                                <td><?php echo $value_no_driver->price_unit; ?></td>
                                                <td><?php echo $value_no_driver->comments_demand; ?></td>
                                                <td><?php echo $value_no_driver->dumpster_quantity; ?></td>
                                                <td><?php echo $value_no_driver->dumpster_number; ?></td>
                                                <td><?php echo $value_no_driver->date_end; ?></td>
                                                <td><?php echo $value_no_driver->service_status; ?></td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                                <?php endforeach;?>
                                            <?php endif; ?>      
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID PED</th>
                                                <th>COLOCACAO/TROCA</th>
                                                <th>PERIODO DO DIA</th>
                                                <th>CLIENTE</th>
                                                <th>DATA ABERTURA</th>  
                                                <th>DATA OPERACAO</th>
                                                <th>DATA ALOCAÇÃO</th>
                                                <th>DATA PREV RETIRADA</th>
                                                <th>ENDEREÇO</th>
                                                <th>TELEFONE</th>
                                                <th>PREÇO</th>
                                                <th>COMENTÁRIOS</th>
                                                <th>QUANTIDADE CACAMBAS</th>
                                                <th>NÚMERO CAÇAMBA</th>
                                                <th>DATA RETIRADA EFETIVA</th> 
                                                <th>STATUS</th> 
                                                <th>ATERRO</th>
                                                <th>MOTORISTA</th>
                                            </tr>
                                        </tfoot>
                                    </table>



                                <!--
                                    <button id="button">Delete selected row</button>
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011-04-25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011-07-25</td>
                                                <td>$170,750</td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009-01-12</td>
                                                <td>$86,000</td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012-03-29</td>
                                                <td>$433,060</td>
                                            </tr>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008-11-28</td>
                                                <td>$162,700</td>
                                            </tr>
                                            <tr>
                                                <td>Brielle Williamson</td>
                                                <td>Integration Specialist</td>
                                                <td>New York</td>
                                                <td>61</td>
                                                <td>2012-12-02</td>
                                                <td>$372,000</td>
                                            </tr>
                                            <tr>
                                                <td>Herrod Chandler</td>
                                                <td>Sales Assistant</td>
                                                <td>San Francisco</td>
                                                <td>59</td>
                                                <td>2012-08-06</td>
                                                <td>$137,500</td>
                                            </tr>
                                            <tr>
                                                <td>Rhona Davidson</td>
                                                <td>Integration Specialist</td>
                                                <td>Tokyo</td>
                                                <td>55</td>
                                                <td>2010-10-14</td>
                                                <td>$327,900</td>
                                            </tr>
                                            <tr>
                                                <td>Colleen Hurst</td>
                                                <td>Javascript Developer</td>
                                                <td>San Francisco</td>
                                                <td>39</td>
                                                <td>2009-09-15</td>
                                                <td>$205,500</td>
                                            </tr>
                                            <tr>
                                                <td>Sonya Frost</td>
                                                <td>Software Engineer</td>
                                                <td>Edinburgh</td>
                                                <td>23</td>
                                                <td>2008-12-13</td>
                                                <td>$103,600</td>
                                            </tr>
                                            <tr>
                                                <td>Jena Gaines</td>
                                                <td>Office Manager</td>
                                                <td>London</td>
                                                <td>30</td>
                                                <td>2008-12-19</td>
                                                <td>$90,560</td>
                                            </tr>
                                            <tr>
                                                <td>Quinn Flynn</td>
                                                <td>Support Lead</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2013-03-03</td>
                                                <td>$342,000</td>
                                            </tr>
                                            <tr>
                                                <td>Charde Marshall</td>
                                                <td>Regional Director</td>
                                                <td>San Francisco</td>
                                                <td>36</td>
                                                <td>2008-10-16</td>
                                                <td>$470,600</td>
                                            </tr>
                                            <tr>
                                                <td>Haley Kennedy</td>
                                                <td>Senior Marketing Designer</td>
                                                <td>London</td>
                                                <td>43</td>
                                                <td>2012-12-18</td>
                                                <td>$313,500</td>
                                            </tr>
                                            <tr>
                                                <td>Tatyana Fitzpatrick</td>
                                                <td>Regional Director</td>
                                                <td>London</td>
                                                <td>19</td>
                                                <td>2010-03-17</td>
                                                <td>$385,750</td>
                                            </tr>
                                            <tr>
                                                <td>Michael Silva</td>
                                                <td>Marketing Designer</td>
                                                <td>London</td>
                                                <td>66</td>
                                                <td>2012-11-27</td>
                                                <td>$198,500</td>
                                            </tr>
                                            <tr>
                                                <td>Paul Byrd</td>
                                                <td>Chief Financial Officer (CFO)</td>
                                                <td>New York</td>
                                                <td>64</td>
                                                <td>2010-06-09</td>
                                                <td>$725,000</td>
                                            </tr>
                                            <tr>
                                                <td>Gloria Little</td>
                                                <td>Systems Administrator</td>
                                                <td>New York</td>
                                                <td>59</td>
                                                <td>2009-04-10</td>
                                                <td>$237,500</td>
                                            </tr>
                                            <tr>
                                                <td>Bradley Greer</td>
                                                <td>Software Engineer</td>
                                                <td>London</td>
                                                <td>41</td>
                                                <td>2012-10-13</td>
                                                <td>$132,000</td>
                                            </tr>
                                            <tr>
                                                <td>Dai Rios</td>
                                                <td>Personnel Lead</td>
                                                <td>Edinburgh</td>
                                                <td>35</td>
                                                <td>2012-09-26</td>
                                                <td>$217,500</td>
                                            </tr>
                                            <tr>
                                                <td>Jenette Caldwell</td>
                                                <td>Development Lead</td>
                                                <td>New York</td>
                                                <td>30</td>
                                                <td>2011-09-03</td>
                                                <td>$345,000</td>
                                            </tr>
                                            <tr>
                                                <td>Yuri Berry</td>
                                                <td>Chief Marketing Officer (CMO)</td>
                                                <td>New York</td>
                                                <td>40</td>
                                                <td>2009-06-25</td>
                                                <td>$675,000</td>
                                            </tr>
                                            <tr>
                                                <td>Caesar Vance</td>
                                                <td>Pre-Sales Support</td>
                                                <td>New York</td>
                                                <td>21</td>
                                                <td>2011-12-12</td>
                                                <td>$106,450</td>
                                            </tr>
                                            <tr>
                                                <td>Doris Wilder</td>
                                                <td>Sales Assistant</td>
                                                <td>Sydney</td>
                                                <td>23</td>
                                                <td>2010-09-20</td>
                                                <td>$85,600</td>
                                            </tr>
                                            <tr>
                                                <td>Angelica Ramos</td>
                                                <td>Chief Executive Officer (CEO)</td>
                                                <td>London</td>
                                                <td>47</td>
                                                <td>2009-10-09</td>
                                                <td>$1,200,000</td>
                                            </tr>
                                            <tr>
                                                <td>Gavin Joyce</td>
                                                <td>Developer</td>
                                                <td>Edinburgh</td>
                                                <td>42</td>
                                                <td>2010-12-22</td>
                                                <td>$92,575</td>
                                            </tr>
                                            <tr>
                                                <td>Jennifer Chang</td>
                                                <td>Regional Director</td>
                                                <td>Singapore</td>
                                                <td>28</td>
                                                <td>2010-11-14</td>
                                                <td>$357,650</td>
                                            </tr>
                                            <tr>
                                                <td>Brenden Wagner</td>
                                                <td>Software Engineer</td>
                                                <td>San Francisco</td>
                                                <td>28</td>
                                                <td>2011-06-07</td>
                                                <td>$206,850</td>
                                            </tr>
                                            <tr>
                                                <td>Fiona Green</td>
                                                <td>Chief Operating Officer (COO)</td>
                                                <td>San Francisco</td>
                                                <td>48</td>
                                                <td>2010-03-11</td>
                                                <td>$850,000</td>
                                            </tr>
                                            <tr>
                                                <td>Shou Itou</td>
                                                <td>Regional Marketing</td>
                                                <td>Tokyo</td>
                                                <td>20</td>
                                                <td>2011-08-14</td>
                                                <td>$163,000</td>
                                            </tr>
                                            <tr>
                                                <td>Michelle House</td>
                                                <td>Integration Specialist</td>
                                                <td>Sydney</td>
                                                <td>37</td>
                                                <td>2011-06-02</td>
                                                <td>$95,400</td>
                                            </tr>
                                            <tr>
                                                <td>Suki Burks</td>
                                                <td>Developer</td>
                                                <td>London</td>
                                                <td>53</td>
                                                <td>2009-10-22</td>
                                                <td>$114,500</td>
                                            </tr>
                                            <tr>
                                                <td>Prescott Bartlett</td>
                                                <td>Technical Author</td>
                                                <td>London</td>
                                                <td>27</td>
                                                <td>2011-05-07</td>
                                                <td>$145,000</td>
                                            </tr>
                                            <tr>
                                                <td>Gavin Cortez</td>
                                                <td>Team Leader</td>
                                                <td>San Francisco</td>
                                                <td>22</td>
                                                <td>2008-10-26</td>
                                                <td>$235,500</td>
                                            </tr>
                                            <tr>
                                                <td>Martena Mccray</td>
                                                <td>Post-Sales support</td>
                                                <td>Edinburgh</td>
                                                <td>46</td>
                                                <td>2011-03-09</td>
                                                <td>$324,050</td>
                                            </tr>
                                            <tr>
                                                <td>Unity Butler</td>
                                                <td>Marketing Designer</td>
                                                <td>San Francisco</td>
                                                <td>47</td>
                                                <td>2009-12-09</td>
                                                <td>$85,675</td>
                                            </tr>
                                            <tr>
                                                <td>Howard Hatfield</td>
                                                <td>Office Manager</td>
                                                <td>San Francisco</td>
                                                <td>51</td>
                                                <td>2008-12-16</td>
                                                <td>$164,500</td>
                                            </tr>
                                            <tr>
                                                <td>Hope Fuentes</td>
                                                <td>Secretary</td>
                                                <td>San Francisco</td>
                                                <td>41</td>
                                                <td>2010-02-12</td>
                                                <td>$109,850</td>
                                            </tr>
                                            <tr>
                                                <td>Vivian Harrell</td>
                                                <td>Financial Controller</td>
                                                <td>San Francisco</td>
                                                <td>62</td>
                                                <td>2009-02-14</td>
                                                <td>$452,500</td>
                                            </tr>
                                            <tr>
                                                <td>Timothy Mooney</td>
                                                <td>Office Manager</td>
                                                <td>London</td>
                                                <td>37</td>
                                                <td>2008-12-11</td>
                                                <td>$136,200</td>
                                            </tr>
                                            <tr>
                                                <td>Jackson Bradshaw</td>
                                                <td>Director</td>
                                                <td>New York</td>
                                                <td>65</td>
                                                <td>2008-09-26</td>
                                                <td>$645,750</td>
                                            </tr>
                                            <tr>
                                                <td>Olivia Liang</td>
                                                <td>Support Engineer</td>
                                                <td>Singapore</td>
                                                <td>64</td>
                                                <td>2011-02-03</td>
                                                <td>$234,500</td>
                                            </tr>
                                            <tr>
                                                <td>Bruno Nash</td>
                                                <td>Software Engineer</td>
                                                <td>London</td>
                                                <td>38</td>
                                                <td>2011-05-03</td>
                                                <td>$163,500</td>
                                            </tr>
                                            <tr>
                                                <td>Sakura Yamamoto</td>
                                                <td>Support Engineer</td>
                                                <td>Tokyo</td>
                                                <td>37</td>
                                                <td>2009-08-19</td>
                                                <td>$139,575</td>
                                            </tr>
                                            <tr>
                                                <td>Thor Walton</td>
                                                <td>Developer</td>
                                                <td>New York</td>
                                                <td>61</td>
                                                <td>2013-08-11</td>
                                                <td>$98,540</td>
                                            </tr>
                                            <tr>
                                                <td>Finn Camacho</td>
                                                <td>Support Engineer</td>
                                                <td>San Francisco</td>
                                                <td>47</td>
                                                <td>2009-07-07</td>
                                                <td>$87,500</td>
                                            </tr>
                                            <tr>
                                                <td>Serge Baldwin</td>
                                                <td>Data Coordinator</td>
                                                <td>Singapore</td>
                                                <td>64</td>
                                                <td>2012-04-09</td>
                                                <td>$138,575</td>
                                            </tr>
                                            <tr>
                                                <td>Zenaida Frank</td>
                                                <td>Software Engineer</td>
                                                <td>New York</td>
                                                <td>63</td>
                                                <td>2010-01-04</td>
                                                <td>$125,250</td>
                                            </tr>
                                            <tr>
                                                <td>Zorita Serrano</td>
                                                <td>Software Engineer</td>
                                                <td>San Francisco</td>
                                                <td>56</td>
                                                <td>2012-06-01</td>
                                                <td>$115,000</td>
                                            </tr>
                                            <tr>
                                                <td>Jennifer Acosta</td>
                                                <td>Junior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>43</td>
                                                <td>2013-02-01</td>
                                                <td>$75,650</td>
                                            </tr>
                                            <tr>
                                                <td>Cara Stevens</td>
                                                <td>Sales Assistant</td>
                                                <td>New York</td>
                                                <td>46</td>
                                                <td>2011-12-06</td>
                                                <td>$145,600</td>
                                            </tr>
                                            <tr>
                                                <td>Hermione Butler</td>
                                                <td>Regional Director</td>
                                                <td>London</td>
                                                <td>47</td>
                                                <td>2011-03-21</td>
                                                <td>$356,250</td>
                                            </tr>
                                            <tr>
                                                <td>Lael Greer</td>
                                                <td>Systems Administrator</td>
                                                <td>London</td>
                                                <td>21</td>
                                                <td>2009-02-27</td>
                                                <td>$103,500</td>
                                            </tr>
                                            <tr>
                                                <td>Jonas Alexander</td>
                                                <td>Developer</td>
                                                <td>San Francisco</td>
                                                <td>30</td>
                                                <td>2010-07-14</td>
                                                <td>$86,500</td>
                                            </tr>
                                            <tr>
                                                <td>Shad Decker</td>
                                                <td>Regional Director</td>
                                                <td>Edinburgh</td>
                                                <td>51</td>
                                                <td>2008-11-13</td>
                                                <td>$183,000</td>
                                            </tr>
                                            <tr>
                                                <td>Michael Bruce</td>
                                                <td>Javascript Developer</td>
                                                <td>Singapore</td>
                                                <td>29</td>
                                                <td>2011-06-27</td>
                                                <td>$183,000</td>
                                            </tr>
                                            <tr>
                                                <td>Donna Snider</td>
                                                <td>Customer Support</td>
                                                <td>New York</td>
                                                <td>27</td>
                                                <td>2011-01-25</td>
                                                <td>$112,000</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                -->                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->



{{-- @include('partials.footer')  --}}
@include('partials.footer_teste') 

<script>
$(document).ready(function() {

    $(document).ready(function() {

        var tbpedido = $('#tbpedido').DataTable( {
                scrollX: true,
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv', 'excel', 'pdf', 'print'
                    'copy', 'csv', 'excel'
                ]
            } );

        $('#tbpedido tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                tbpedido.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }

        });


        $("#name_search").on('change', function(){
            tbpedido
                .columns(17)
                .search( this.value )
                .draw();

        });
    } );

/*
    table = $('#example').DataTable();

    $("#column0_search").on('change', function(){

        table
            .columns( 0 )
            .search( this.value )
            .draw();
    });


    $('#column1_search').on( 'keyup', function () {
        table
            .columns( 1 )
            .search( this.value )
            .draw();
    } );
*/
});




</script>