@include('partials.header')
<section id="advanced-search-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Pesquisa Avançada</h4>
                </div>

                <div class="card-body mt-2">
                    <form class="dt_adv_search" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-row mb-1">
                                    <div class="col-lg-4">
                                        <label>Cliente:</label>
                                        <input type="text" class="form-control dt-input dt-full-name" data-column="3" placeholder="" data-column-index="0" />
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <label>Colocação/Troca:</label>
                                        <input type="text" class="form-control dt-input" data-column="1" placeholder="colocação/troca" data-column-index="2" />
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Endereco:</label>
                                        <input type="text" class="form-control dt-input" data-column="4" placeholder="" data-column-index="1" />
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Cidade:</label>
                                        <input type="text" class="form-control dt-input" data-column="6" placeholder="Web designer" data-column-index="2" />
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Nº Caçamba:</label>
                                        <input type="text" class="form-control dt-input" data-column="10" placeholder="" data-column-index="1" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-4">
                                        <label>Data Pedido:</label>
                                        <div class="form-group mb-0">

                                            {{-- <input type="text" class="form-control dt-date flatpickr-range dt-input" data-column="2"  data-column-index="4" name="dt_date" /> --}}
                                            <input type="text" class="form-control dt-date flatpickr-range dt-input date_format" data-column="2"  data-column-index="4" name="dt_date" />
                                            <input type="hidden" class="form-control dt-date start_date dt-input" data-column="2" data-column-index="4" name="value_from_start_date" />
                                            <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="2" data-column-index="4" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Previsão de Retirada:</label>
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control dt-date flatpickr-range dt-input" data-column="5" placeholder="StartDate to EndDate" data-column-index="4" name="dt_date" />
                                            <input type="hidden" class="form-control dt-date start_date dt-input" data-column="5" data-column-index="4" name="value_from_start_date" />
                                            <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="5" data-column-index="4" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Data Retirada Efetiva:</label>
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control dt-date flatpickr-range dt-input" data-column="5" placeholder="StartDate to EndDate" data-column-index="4" name="dt_date" />
                                            <input type="hidden" class="form-control dt-date start_date dt-input" data-column="5" data-column-index="4" name="value_from_start_date" />
                                            <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" data-column="5" data-column-index="4" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="my-0" />
                <div class="card-datatable">
                    <table class="dt-advanced-search table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>COLOCAÇÃO/TROCA</th>
                                <th>DATA PEDIDO</th>
                                <th>CLIENTE</th>
                                <th>ENDEREÇO</th>
                                <th>BAIRRO</th>
                                <th>CIDADE</th>
                                <th>TELEFONE</th>
                                <th>PREÇO UNIT.</th>
                                <th>COMENTÁRIOS</th>
                                <th>TOTAL CAÇAMBAS</th>
                                <th>Nº CAÇAMBA</th>
                                <th>QNTD DE DIAS PARA RETIRAR</th> 
                                <th>PREVISÃO DE RETIRADA</th>
                                <th>DATA RETIRADA EFETIVA</th>
                                <th>FEITO?</th>
                                <th>ATERRO</th>
                                <th>PERÍODO DO DIA</th>
                                <th>MOTORISTA</th>

                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>


@include('partials.footer')