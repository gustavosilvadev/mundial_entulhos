@include('partials.header')

<section id="advanced-search-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Advanced Search</h4>
                </div>
                <!--Search Form -->
                <div class="card-body mt-2">
                    <form class="dt_adv_search" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-row mb-1">
                                    <div class="col-lg-4">
                                        <label>Name:</label>
                                        <input type="text" class="form-control dt-input dt-full-name" data-column="1" placeholder="Alaric Beslier" data-column-index="0" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Email:</label>
                                        <input type="text" class="form-control dt-input" data-column="2" placeholder="demo@example.com" data-column-index="1" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Post:</label>
                                        <input type="text" class="form-control dt-input" data-column="3" placeholder="Web designer" data-column-index="2" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-4">
                                        <label>City:</label>
                                        <input type="text" class="form-control dt-input" data-column="4" placeholder="Balky" data-column-index="3" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Date:</label>
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control dt-date flatpickr-range dt-input" data-column="5" placeholder="StartDate to EndDate" data-column-index="4" name="dt_date" />
                                            <input type="hidden" class="form-control dt-date start_date dt-input" data-column="5" data-column-index="4" name="value_from_start_date" />
                                            <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="5" data-column-index="4" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Salary:</label>
                                        <input type="text" class="form-control dt-input" data-column="6" placeholder="10000" data-column-index="5" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="my-0" />
                <div class="card-datatable">
<!--
                    <table class="table">
                        <thead>
                            <tr>

                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 137px;" aria-label="COLOCAÇÃO/TROCA: activate to sort column ascending">COLOCAÇÃO/TROCA</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 67px;" aria-label="DATA PEDIDO: activate to sort column ascending">DATA PEDIDO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 57px;" aria-label="CLIENTE: activate to sort column ascending">CLIENTE</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">SDADASDAD</th>                            
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="odd"><td class="control sorting_1" tabindex="0">3</td><td>COLOCACAO</td><td>14/03/2023</td><td>Carlos de Souza Oliveira</td><td>Estrada Aguachuma</td><td>Zona de Expansão (Robalo)</td><td>Aracaju</td><td>98544-7725</td><td>R$124,36</td><td>Alguma sendo preenchida</td><td>3</td><td>5</td><td></td><td></td><td></td><td style="display: none;">OK</td><td style="display: none;">Formiga - Coleta e Gerenciamento Ambiental</td><td style="display: none;">DIURNO</td><td style="display: none;">Wellington Alencar Monteiro da Silva Santos</td></tr>                            
                            <tr class="odd"><td class="control sorting_1" tabindex="0">3</td><td>AAAA</td><td>14/03/2023</td><td>Carlos de Souza Oliveira</td><td>Estrada Aguachuma</td><td>Zona de Expansão (Robalo)</td><td>Aracaju</td><td>98544-7725</td><td>R$124,36</td><td>Alguma sendo preenchida</td><td>3</td><td>5</td><td></td><td></td><td></td><td style="display: none;">OK</td><td style="display: none;">Formiga - Coleta e Gerenciamento Ambiental</td><td style="display: none;">DIURNO</td><td style="display: none;">Wellington Alencar Monteiro da Silva Santos</td></tr>                            
                            <tr class="odd"><td class="control sorting_1" tabindex="0">3</td><td>BBBB</td><td>14/03/2023</td><td>Carlos de Souza Oliveira</td><td>Estrada Aguachuma</td><td>Zona de Expansão (Robalo)</td><td>Aracaju</td><td>98544-7725</td><td>R$124,36</td><td>Alguma sendo preenchida</td><td>3</td><td>5</td><td></td><td></td><td></td><td style="display: none;">OK</td><td style="display: none;">Formiga - Coleta e Gerenciamento Ambiental</td><td style="display: none;">DIURNO</td><td style="display: none;">Wellington Alencar Monteiro da Silva Santos</td></tr>                            
                            <tr class="odd"><td class="control sorting_1" tabindex="0">3</td><td>CCCC</td><td>14/03/2023</td><td>Carlos de Souza Oliveira</td><td>Estrada Aguachuma</td><td>Zona de Expansão (Robalo)</td><td>Aracaju</td><td>98544-7725</td><td>R$124,36</td><td>Alguma sendo preenchida</td><td>3</td><td>5</td><td></td><td></td><td></td><td style="display: none;">OK</td><td style="display: none;">Formiga - Coleta e Gerenciamento Ambiental</td><td style="display: none;">DIURNO</td><td style="display: none;">Wellington Alencar Monteiro da Silva Santos</td></tr>                            
                        </tbody>

                        <tfoot>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 137px;" aria-label="COLOCAÇÃO/TROCA: activate to sort column ascending">COLOCAÇÃO/TROCA</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 67px;" aria-label="DATA PEDIDO: activate to sort column ascending">DATA PEDIDO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 57px;" aria-label="CLIENTE: activate to sort column ascending">CLIENTE</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">ENDEREÇO</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="ENDEREÇO: activate to sort column ascending">SDADASDAD</th>
                            </tr>
                        </tfoot>
                    </table>
-->
<table class="dt-responsive table">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Post</th>
            <th>City</th>
            <th>Date</th>
            <th>Salary</th>
            <th>Age</th>
            <th>Experience</th>
            <th>Status</th>
        </tr>
    </thead>
<tbody><tr class="odd"><td class="control sorting_1" tabindex="0" style="display: none;"></td><td>Korrie O'Crevy</td><td>kocrevy0@thetimes.co.uk</td><td>Nuclear Power Engineer</td><td>Krasnosilka</td><td>09/23/2016</td><td>$23896.35</td></tr><tr class="even"><td class="control sorting_1" tabindex="0" style="display: none;"></td><td>Bailie Coulman</td><td>bcoulman1@yolasite.com</td><td>VP Quality Control</td><td>Hinigaran</td><td>05/20/2018</td><td>$13633.69</td></tr><tr class="odd"><td class="control sorting_1" tabindex="0" style="display: none;"></td><td>Stella Ganderton</td><td>sganderton2@tuttocitta.it</td><td>Operator</td><td>Golcowa</td><td>03/24/2018</td><td>$13076.28</td></tr><tr class="even"><td class="control sorting_1" tabindex="0" style="display: none;"></td><td>Dorolice Crossman</td><td>dcrossman3@google.co.jp</td><td>Cost Accountant</td><td>Paquera</td><td>12/03/2017</td><td>$12336.17</td></tr><tr class="odd"><td class="control sorting_1" tabindex="0" style="display: none;"></td><td>Harmonia Nisius</td><td>hnisius4@gnu.org</td><td>Senior Cost Accountant</td><td>Lucan</td><td>08/25/2017</td><td>$10909.52</td></tr><tr class="even"><td class="control sorting_1" tabindex="0" style="display: none;"></td><td>Genevra Honeywood</td><td>ghoneywood5@narod.ru</td><td>Geologist</td><td>Maofan</td><td>06/01/2017</td><td>$17803.80</td></tr><tr class="odd"><td class="control sorting_1" tabindex="0" style="display: none;"></td><td>Eileen Diehn</td><td>ediehn6@163.com</td><td>Environmental Specialist</td><td>Lampuyang</td><td>10/15/2017</td><td>$18991.67</td></tr><tr class="even"><td class="control sorting_1" tabindex="0" style="display: none;"></td><td>Richardo Aldren</td><td>raldren7@mtv.com</td><td>Senior Sales Associate</td><td>Skoghall</td><td>11/05/2016</td><td>$19230.13</td></tr><tr class="odd"><td class="control sorting_1" tabindex="0" style="display: none;"></td><td>Allyson Moakler</td><td>amoakler8@shareasale.com</td><td>Safety Technician</td><td>Mogilany</td><td>12/29/2018</td><td>$11677.32</td></tr><tr class="even"><td class="control sorting_1" tabindex="0" style="display: none;"></td><td>Merline Penhalewick</td><td>mpenhalewick9@php.net</td><td>Junior Executive</td><td>Kanuma</td><td>04/19/2019</td><td>$15939.52</td></tr></tbody>

    <tfoot>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Post</th>
            <th>City</th>
            <th>Date</th>
            <th>Salary</th>
            <th>Age</th>
            <th>Experience</th>
            <th>Status</th>
        </tr>
    </tfoot>
</table>
                </div>
            </div>
        </div>
    </div>
</section>


@include('partials.footer')