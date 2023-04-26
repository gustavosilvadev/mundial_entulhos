<?php

// dd($calldemand);
// dd($driver_name_demands);
// dd($landfill_name_demands);
?>
{{-- @include('partials.header')
@include('partials.nav') --}}
@include('partials.header_teste')
@include('partials.nav_teste');

<style>
    .input-icon {
        position: relative;
    }

    .input-icon > i {
    position: absolute;
    display: block;
    transform: translate(0, -50%);
    top: 68%;
    pointer-events: none;
    width: 25px;
    text-align: center;
        font-style: normal;
    }

    .input-icon > input {
    padding-left: 25px;
        padding-right: 0;
    }
</style>

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
                        <h2 class="content-header-title float-left mb-0">EDITAR CHAMADO</h2>

                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">

            <div class="row" id="table-responsive ">

                <div class="col-12">
                    <div class="card">
                        <div class="todo-app-list">
                            <section id="multiple-column-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                {{-- <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">Editar</ins> <mark class="bg-dark text-white">PEDIDO!</mark></h3>                                             --}}
                                            </div>

                                            <div class="card-body">
                                        

                                                <?php
                                                if(!empty($calldemand)):
                                                    foreach ($calldemand as $key => $value):
                                                ?>                                                
                                                        <form action="/change_call_demand" method= "POST" id="form" class="form-validate" autocomplete="off">
                                                            @csrf
                                                            <div class="row invoice-add">
                                                                <div class="col-xl-9 col-md-8 col-12">
                                                                    <div class="card invoice-preview-card">
                                            
                                                                        <section class="app-user-edit">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="tab-content">


                                                                                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                                
                                                                                                <div class="media mb-2"></div>
                                                                                                <input type="hidden" name="id_demand_reg" value={{ $value->id }}>
                                                                                                <input type="hidden" name="id_demand" value={{ $value->id_demand }}>
                                                                                                <div class="row">

                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="id_client">CLIENTE NOVO</label>
                                                                                                            <input type="text" class="form-control only-text" name="client_name_new" id="client_name_new" minlength="2" maxlength="44" value="{{ $value->name }}"/>
                                                            
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="type_service">Tipo de Serviço</label>
                                                                                                            <select class="select2 form-control form-control-lg" id="type_service" name="type_service">
                                                                                                                <option value="">----</option>
                                                                                                                <?php if($value->type_service == 'COLOCACAO'): ?>
                                                                                                                    <option value="COLOCACAO" selected>COLOCAÇÃO</option>
                                                                                                                    <option value="TROCA">TROCA</option>
                                                                                                                <?php elseif($value->type_service == 'TROCA'): ?>
                                                                                                                <option value="COLOCACAO">COLOCAÇÃO</option>
                                                                                                                <option value="TROCA" selected>TROCA</option>
                                                                                                                <?php else: ?>
                                                                                                                    <option value="COLOCACAO">COLOCAÇÃO</option>
                                                                                                                    <option value="TROCA">TROCA</option>
                                                                                                                <?php endif; ?>
                                                                                                                
                                                                                                            </select>            
                                                                                                        </div>
                                                                                                    </div> 
                                                                                                </div>
                                                                                            
                                                                                                <hr />
                                                                                                
                                                                                                <div class="row">
                                                                                                
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label for="zipcode">CEP</label>
                                                                                                                <input type="text" class="form-control zipcode-mask" name="zipcode" id="zipcode" placeholder="00000-00" value="{{ $value->zipcode_address_service }}"/>
                                                                                                        </div>
                                                                                                    </div>                                                                                        
                                                            
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label for="address">Endereço</label>
                                                                                                            <input type="text" class="form-control only-text" name="address" id="address" minlength="2" maxlength="44" value="{{ $value->address_service }}"/>
                                                                                                        </div>
                                                                                                    </div>
                                                            
                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="number">Número</label>
                                                                                                            <input type="text" class="form-control" name="number" id="number" minlength="1" maxlength="6" value="{{ $value->number_address_service }}"/>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label for="district">Bairro</label>
                                                                                                            <input type="text" class="form-control only-text" name="district" id="district" minlength="2" maxlength="44" value="{{ $value->district_address_service }}"/>
                                                            
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="city">Cidade</label>
                                                                                                            <input type="text" class="form-control only-text" name="city" id="city" minlength="2" maxlength="50" value="{{ $value->city_address_service }}"/>
                                                            
                                                                                                        </div>
                                                                                                    </div>
                                                            
                                                                                                    <div class="col-md-1">
                                                                                                        <div class="form-group">
                                                                                                            <label for="state">Estado</label>
                                                                                                            <input type="text" class="form-control only-text" name="state" id="state" maxlength="2" onkeydown="return /[a-z]/i.test(event.key)" value="{{ $value->state_address_service }}"/>
                                                            
                                                                                                        </div>
                                                                                                    </div>
                                                            
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label for="phone">Telefone</label>
                                                                                                            
                                                                                                            <input type="phone" class="form-control phone-number-mask" name="phone" id="phone" placeholder="xx xxxxx-xxxx" id="phone-number" onkeypress="return onlynumber()" value="{{ $value->phone_demand }}"/>
                                                                                                        </div>
                                                                                                    </div>
                                                            
                                                                                                    <div class="col-md-3">
                                                                                                        <div class="form-group input-icon">
                                                                                                            <label for="price_unit">Preço UNIT.</label>
                                                                                                            <input type="text" name="price_unit" class="form-control price_unit" id="price_unit" value="{{ $value->price_unit }}"/>
                                                                                                            <i>R$</i>
                                                
                                                                                                        </div>
                                                                                                    </div>
                                                            
                                                                                                    <div class="col-md-3">
                                                                                                        <div class="form-group">
                                                                                                            <label for="dumpster_total">QUANTIDADE DE CAÇAMBAS</label>
                                                                                                            <input type="number" name="dumpster_total" class="form-control"  id="dumpster_total" min="0" max="1000" placeholder="0" value="{{ $value->dumpster_quantity }}"/>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-3">
                                                                                                        <div class="form-group">
                                                                                                            <label for="dumpster_total_opened">NÚMERO CAÇAMBA</label>
                                                                                                            <input type="number" name="dumpster_total_opened" class="form-control" id="dumpster_total_opened" min="0" max="1000" placeholder="0" value="{{ $value->dumpster_number }}"/>
                                                                                                        </div>
                                                                                                    </div>
                                                
                                                                                                    <div class="col-md-3">
                                                                                                        <div class="form-group">
                                                                                                            <label for="landfill">ATERRO</label>
                                                                                                            <select class="select2 form-control form-control-lg" id="landfill" name="id_landfill">
                                                                                                            
                                                                                                                <option value="">----</option>
                                                                                                                <?php if(isset($landfills)):?>
                                                                                                                    <?php foreach($landfills as $landfill):?>
                                                                                                                        <?php if($landfill->id == $value->id_landfill): ?>
                                                                                                                            <option value="<?php echo $landfill->id; ?>" selected><?php echo $landfill->name; ?></option>
                                                                                                                        <?php else: ?>
                                                                                                                            <option value="<?php echo $landfill->id; ?>"><?php echo $landfill->name; ?></option>
                                                                                                                        <?php endif; ?>                                                                                                                    
                                                                                                                    <?php endforeach; ?>
                                                                                                                <?php endif; ?>                                                                
                                                                                                            
                                                                                                            </select>
                                                            
                                                                                                        </div>
                                                                                                    </div>                                                    
                                                
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label for="driver">MOTORISTA</label>
                                                                                                            {{-- <input type="hidden" id="id_driver_saved" value="{{ (isset($value->id_driver) ? $value->id_driver : 0) }}"/> --}}
                                                                                                            <select class="select2 form-control form-control-lg" id="driver" name="id_driver">
                                                                                                                <option value="">----</option>
                                                                                                                <?php if(isset($drivers)):?>
                                                                                                                    <?php foreach($drivers as $driver):?>

                                                                                                                        <?php if($driver->id == $value->id_driver): ?>
                                                                                                                            <option value="<?php echo $driver->id; ?>" selected><?php echo $driver->name; ?></option>
                                                                                                                        <?php else: ?>
                                                                                                                            <option value="<?php echo $driver->id; ?>"><?php echo $driver->name; ?></option>
                                                                                                                        <?php endif; ?>
                                                                                                                    <?php endforeach; ?>
                                                                                                                <?php endif; ?>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                
                                                
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group mb-2">
                                                                                                            <label for="note" class="form-label font-weight-bold">COMENTÁRIOS:</label>
                                                                                                            <textarea class="form-control" rows="2" id="note" name="comments" >{{ $value->comments_demand }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                
                                                                                                </div>
                                                
                                                                                                <div class="row">
                                                                                                                                                        

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="period">PERÍODO DO DIA</label>
                                                                                                            <select class="select2 form-control form-control-lg" id="period" name="period">
                                                                                                                <option value="">----</option>
                                                                                                                <?php if($value->period == 'DIURNO'): ?>
                                                                                                                    <option value="DIURNO" selected>DIURNO</option>
                                                                                                                    <option value="NOTURNO">NOTURNO</option>
                                                                                                                <?php elseif($value->period == 'NOTURNO'): ?>
                                                                                                                    <option value="DIURNO">DIURNO</option>
                                                                                                                    <option value="NOTURNO" selected>NOTURNO</option>
                                                                                                                <?php else: ?>
                                                                                                                    <option value="DIURNO">DIURNO</option>
                                                                                                                    <option value="NOTURNO">NOTURNO</option>
                                                                                                                <?php endif; ?>
                                                                                                                
                                                                                                            </select>   

                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">

                                                                                                            <label for="period">DATA ALOCAÇÃO</label>
                                                                                                            <input type="text" name="date_allocation_dumpster" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format date_allocation_dumpster date_format_allocation" data-column="5"  data-column-index="4" onblur="validaData(this);" value="{{ $value->date_allocation_dumpster }}"/>
                                                                                                        </div>    
                                                                                                    </div>

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="period">PREVISÃO RETIRADA</label>
                                                                                                            {{-- <input type="text" name="date_removal_dumpster_forecast" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format date_format_removal" data-column="5"  data-column-index="4" value="{{ $value->date_removal_dumpster_forecast }}"/> --}}
                                                                                                            <input type="text" name="date_removal_dumpster_forecast" id="date_format" class="form-control dt-date date-mask" data-column="5"  data-column-index="4"  value="{{ $value->date_removal_dumpster_forecast }}"/>
                                                                                                        </div>    
                                                                                                    </div>

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="period">RETIRADA EFETIVA</label>
                                                                                                            {{-- <input type="text" name="date_effective_removal_dumpster" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format date_effective_removal_dumpster date_format_effective_removal" data-column="5"  data-column-index="4" value="{{ $value->date_effective_removal_dumpster }}" disabled /> --}}
                                                                                                            <input type="text" name="date_effective_removal_dumpster" id="date_format" class="form-control dt-date  date_format" data-column="5"  data-column-index="4" value="{{ $value->date_effective_removal_dumpster }}" disabled />
                                                                                                        </div>    
                                                                                                    </div> 

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="period">TOTAL DE DIAS</label>
                                                                                                            <input type="number" name="total_days" class="form-control total_days" min="0" max="1000"  value="{{ $value->days_allocation }}" />
                                                                                                        </div>    
                                                                                                    </div> 

                                                                                                </div>
                                                                                            </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </section>                            
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-3 col-md-4 col-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <button type="submit" class="btn btn-success btn-block mb-75">ATUALIZAR</button>
                                                                            <?php if($value->date_effective_removal_dumpster == null || $value->date_effective_removal_dumpster == "" ): ?>
                                                                                <button class="btn btn-dark btn-block mb-75" id="btn_finish_demand">ENCERRAR ESTE CHAMADO</button>
                                                                                <button class="btn btn-dark btn-warning mb-75" id="btn_finish_all_demands">ENCERRAR TODOS OS CHAMADOS RELACIONADOS</button>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                            
                                                            </div>
                                                        </form>
                                                <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </div>
            </div>                    
        </div>
    {{-- </div> --}}
</div>
<!-- END: Content-->


{{-- @include('partials.footer') --}}
@include('partials.footer_teste') 
<script>

    $(document).ready(function(){

        // let id_demand_client = $(this).val();
        // findDemandClient(id_demand_client);

        $('.date_effective_removal_dumpster').blur(function(){

            let data_alocacao_cacamba = $('.date_allocation_dumpster').val().split('/');
            mes = data_alocacao_cacamba[1];
            dia = data_alocacao_cacamba[0];
            ano = data_alocacao_cacamba[2];

            data_alocacao  = new Date(mes + '/' + dia + '/' + ano);

            let data_retirada_efetiva  = $(this).val().split('/');
            mes = data_retirada_efetiva[1];
            dia = data_retirada_efetiva[0];
            ano = data_retirada_efetiva[2];

            data_retirada_efetiva  = new Date(mes + '/' + dia + '/' + ano);

            const diffTime = Math.abs(data_retirada_efetiva - data_alocacao);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
            
            if(isNaN(diffDays) == false){
                $('.total_days').val(diffDays);
            }


        });

        // ZipCode
        $("#zipcode").change(function(){
            let zipcode = $(this).val().trim().replace("-", "");
            
            let settings = {
            "url": "https://viacep.com.br/ws/" + zipcode.trim() + "/json/",
            "method": "GET",
            "timeout": 0,
            };

            $.ajax(settings).done(function (dataResponse) {

                $("#address").val(dataResponse.logradouro);
                $("#district").val(dataResponse.bairro);
                $("#city").val(dataResponse.localidade);
                $("#state").val(dataResponse.uf);

            });

        });
        // ZipCode

        let today = new Date();
        $('#date_begin').val(((today.getDate() )) + "/" + ((today.getMonth() + 1)) + "/" + today.getFullYear());

        let dateObj = new Date();
        let month   = dateObj.getUTCMonth() + 1; //months from 1-12
        let day     = dateObj.getUTCDate();
        let year    = dateObj.getUTCFullYear();
        let  newDate  = day + "/" + month + "/" + year;
        $('.date_today').val(newDate);

        function findDemandClient(id_demand){
            $.ajax({
                method: 'GET',
                url: '/show_info_client',
                data: {id : id_demand},
                success: function(dataResponse) {
                    $("#client_name_new").val(dataResponse.name);
                    $("#address").val(dataResponse.address);
                    $("#number").val(dataResponse.number);
                    $("#zipcode").val(dataResponse.zipcode);
                    $("#district").val(dataResponse.district);
                    $("#state").val(dataResponse.state);
                    $("#city").val(dataResponse.city);
                    $("#phone").val(dataResponse.phone);

                    $('#price_unit').val((dataResponse.price_unit).replace('.',','));
                    $('#dumpster_total').val(dataResponse.dumpster_total);
                    $('#dumpster_total_opened').val(dataResponse.dumpster_total_opened);
                    $('#dumpster_number').val(dataResponse.dumpster_number);
                    
                    $('#note').val(dataResponse.comments);

                    $('.date_format_allocation').val(dataResponse.date_allocation_dumpster);
                    $('.date_format_removal').val(dataResponse.date_removal_dumpster);
                    $('.date_format_effective_removal').val(dataResponse.date_effective_removal_dumpster);

                },
                error: function(responseError){
                    alert(responseError);
                }
            });
        }
        
        $("#form").validate({
            rules: {
                type_service: {
                    required: true
                },
                date_begin: {
                    required: true
                },
                date_removal_dumpster: {
                    required: true
                },
                date_effective_removal_dumpster: {
                    required: true
                },
                // id_client: {
                //     required: true
                // },
                address: {
                    required: true
                },
                number: {
                    required: true
                },
                zipcode: {
                    required: true
                },
                city: {
                    required: true
                },
                district: {
                    required: true
                },
                state: {
                    required: true,
                    minlength: 2,
                    maxlength: 2
                },
                phone: {
                    required: true
                },
                price_unit: {
                    required: true
                },
                dumpster_total: {
                    required: true
                },
                dumpster_total_opened: {
                    required: true
                },
                // id_landfill: {
                //     required: true
                // },
                period: {
                    required: true
                },
                // id_driver: {
                //     required: true
                // },
                note: {
                    required: true
                }

            },

            messages:{
                type_service: "Campo <b>Tipo de serviço</b> deve ser preenchido!",
                date_begin: "Campo <b>Data Pedido</b> deve ser preenchido!",
                date_removal_dumpster: "Campo <b>Previsao de Retirada</b> deve ser preenchido!",
                date_effective_removal_dumpster: "Campo <b>Previsão de Retirada Efetiva</b> deve ser preenchido!",
                id_client: "Campo <b>Cliente</b> deve ser preenchido!",
                address: "Campo <b>Endereço</b> deve ser preenchido!",
                number: "Campo <b>Número</b> deve ser preenchido!",
                zipcode: "Campo <b>CEP</b> deve ser preenchido!",
                city: "Campo <b>Cidade</b> deve ser preenchido!",
                district: "Campo <b>Bairro</b> deve ser preenchido!",
                state: "Campo <b>Estado</b> deve ser preenchido!",
                phone: "Campo <b>Telefone</b> deve ser preenchido!",
                price_unit: "Campo <b>Preço Unidade</b> deve ser preenchido!",
                dumpster_total: "Campo <b>Total de Caçambas</b> deve ser preenchido!",
                dumpster_total_opened: "Campo <b>Total em aberto</b> deve ser preenchido!",
                id_landfill: "Campo <b>Aterro</b> deve ser preenchido!",
                period: "Campo <b>Período</b> deve ser preenchido!",
                id_driver: "Campo <b>Motorista</b> deve ser preenchido!",
                note: "Campo <b>Observação</b> deve ser preenchido!"            

            }            
        });

    });
    
    function onlynumber(evt) {
        let theEvent = evt || window.event;
        let key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        //let regex = /^[0-9.,]+$/;
        let regex = /^[0-9.]+$/;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }          


    validaData = (dataAlocacao) => {
        let city = $('#city').val();

        if(dataAlocacao.value.length > 0 && city.length > 0){
            $.ajax({
                    method: 'GET',
                    url: '/dias_municipio',
                    data: {city : city},
                    success: function(dataResponse) {

                        $("input[name='date_removal_dumpster']").val(adicionaDiasEmData(dataResponse));
                        // $("input[name='date_effective_removal_dumpster']").val(adicionaDiasEmData(dataResponse));
                        $("input[name='date_removal_dumpster_forecast']").val(adicionaDiasEmData(dataResponse));
                        $("input[name='total_days']").val(dataResponse);
                        

                    },
                    error: function(responseError){
                        alert(responseError);
                    }
            });
        }
    }

    let adicionaDiasEmData = (days) => {

        let format_data_alocacao = $('.date_format_allocation').val().split('/');
        format_data_alocacao = format_data_alocacao[1] + '/' + format_data_alocacao[0] + '/' + format_data_alocacao[2];

        let d = new Date(format_data_alocacao);

        d.setDate(d.getDate() + parseInt(days));

        let year = d.getFullYear()
        let month = String(d.getMonth() + 1)
        let day = String(d.getDate())

        month = month.length == 1 ? 
        month.padStart('2', '0') : month;

        day = day.length == 1 ? 
        day.padStart('2', '0') : day;

        return `${day}/${month}/${year}`;
    };
    
    let quantidadeDias = () => {

        let date_allocation_dumpster = $("input[name='date_allocation_dumpster']").val();
        let format_date_allocation_dumpster = date_allocation_dumpster.split("/");
        let data_alocacao  = format_date_allocation_dumpster[1] + '/' + format_date_allocation_dumpster[0] + '/'+ format_date_allocation_dumpster[2];

        let date_effective_removal_dumpster = $("input[name='date_effective_removal_dumpster']").val();
        let format_date_effective_removal_dumpster = date_effective_removal_dumpster.split("/");
        let data_retirada_efetiva  = format_date_effective_removal_dumpster[1] + '/' + format_date_effective_removal_dumpster[0] + '/'+ format_date_effective_removal_dumpster[2];

        const date1 = new Date(data_alocacao);
        const date2 = new Date(data_retirada_efetiva);
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

        return diffDays;
    }



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


    $("#btn_finish_demand").on('click', function(e){
        e.preventDefault();
        finishDemand(false);
    });

    $("#btn_finish_all_demands").on('click', function(e){
        e.preventDefault();
        finishDemand(true);
    });
    
    function finishDemand(isAllDemand){
        let idDemandReg = $('input[name=id_demand_reg]').val();
        let idDemand    = $('input[name=id_demand]').val();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method: 'POST',
            url: '/finish_demand',
            data: { 
                id_call_demand_reg: idDemandReg,
                id_call_demand: idDemand,
                is_all_demand: isAllDemand
            },
            success: function(dataResponse) {

                if(dataResponse){
                    window.location.reload();
                }else
                    alert("Erro ao encerrar o chamado!");
            },
            error: function(responseError){
                alert("Erro interno: " + responseError);
                console.log(responseError);
                console.log("***********");
            }
        });  


    }
    
</script>