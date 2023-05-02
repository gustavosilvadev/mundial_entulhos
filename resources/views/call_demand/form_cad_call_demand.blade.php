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

<div class="app-content content-designed">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h3 class="content-header-title float-left mb-0">CADASTRO</h3>
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
            {{-- <section class="horizontal-wizard"> --}}
            <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                            
                                    <form action="/save_call_demand" method= "POST" id="form" class="form-validate" autocomplete="off">
                                        @csrf
                                        <div class="row invoice-add">
                        
                                            <div class="col-xl-9 col-md-8 col-12">
                                                <div class="card invoice-preview-card">
                        
                                                    <section class="app-user-edit">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="tab-content">
                        
                                                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                        
                                                                        <div class="media mb-2">
                                                                            <?php if($errors->any()){ ?>
                                                                                <h4 class="text-danger">{{$errors->first()}}</h4>
                                                                            <?php } ?>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="id_client">CLIENTE</label>
                                                                                    <select class="select2 form-control form-control-lg" name="id_client" id="search_data_client">
                                                                                        <option value="">----</option>
                                                                                        <?php if(isset($clients)):?>
                                                                                            <?php foreach($clients as $client):?>
                                                                                                <option value="<?php echo $client->id; ?>"><?php echo $client->name; ?></option>
                                                                                            <?php endforeach; ?>
                                                                                        <?php endif; ?>
                                                                                    </select>
                                    
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="id_client">CLIENTE NOVO</label>
                                                                                    <input type="text" class="form-control only-text" name="client_name_new" id="client_name_new" minlength="2" maxlength="44"/>
                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="type_service">Serviço desejado</label>
                                                                                    <select class="select2 form-control form-control-lg" id="type_service" name="type_service">
                                                                                        <option value="" selected>----</option>
                                                                                        <option value="COLOCACAO">COLOCAÇÃO</option>
                                                                                        <option value="TROCA">TROCA</option>
                                                                                    </select>            
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr />                                                                        
                                                                        <div class="row">
                                                                          
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="zipcode">CEP</label>
                                                                                        <input type="text" class="form-control zipcode-mask" name="zipcode" id="zipcode" placeholder="00000-00" />
                                                                                </div>
                                                                            </div>                                                                                        
                                    
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="address">Endereço</label>
                                                                                    <input type="text" class="form-control only-text" name="address" id="address" minlength="2" maxlength="44" />
                                                                                </div>
                                                                            </div>
                                    
                                                                            <div class="col-md-2">
                                                                                <div class="form-group">
                                                                                    <label for="number">Número</label>
                                                                                    <input type="text" class="form-control" name="number" id="number" minlength="1" maxlength="6"/>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="district">Bairro</label>
                                                                                    <input type="text" class="form-control only-text" name="district" id="district" minlength="2" maxlength="44"/>
                                    
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-2">
                                                                                <div class="form-group">
                                                                                    <label for="city">Cidade</label>
                                                                                    <input type="text" class="form-control only-text" name="city" id="city" minlength="2" maxlength="50"/>
                                    
                                                                                </div>
                                                                            </div>
                                    
                                                                            <div class="col-md-1">
                                                                                <div class="form-group">
                                                                                    <label for="state">Estado</label>
                                                                                    <input type="text" class="form-control only-text" name="state" id="state" maxlength="2" onkeydown="return /[a-z]/i.test(event.key)"/>
                                    
                                                                                </div>
                                                                            </div>
                                    
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="phone">Telefone</label>
                                                                                    <input type="phone" class="form-control phone-number-mask" name="phone" id="phone" placeholder="xx xxxxx-xxxx" id="phone-number" onkeypress="return onlynumber()" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="dumpster_quantity">QUANTIDADE DE CAÇAMBAS</label>
                                                                                    <input type="number" name="dumpster_quantity" class="form-control"  id="dumpster_quantity" min="0" max="1000" placeholder="" />
                                                                                </div>
                                                                            </div>                                                                            
                                    
                                                                            <div class="col-md-3">
                                                                                <div class="form-group input-icon">
                                                                                    <label for="price_unit">Preço UNIDADE.</label>
                                                                                    <input type="text" name="price_unit" class="form-control price_unit" id="price_unit" value="330,00"/>
                                                                                    <i>R$</i>
                                                                                </div>
                                                                            </div>
{{-- 
                                                                            <div class="col-md-2">
                                                                                <div class="form-group input-icon">
                                                                                    <label for="price_unit">Desconto(%).</label>
                                                                                    <input type="number" name="discount_value" class="form-control discount_value" id="discount_value" maxlength="5"/>
                                                                                    <i style="float: right;position: relative;bottom: 19px;">%</i>
                                                                                    
                                                                                </div>
                                                                            </div>
--}}
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="driver">MOTORISTA</label>
                                                                                    <select class="select2 form-control form-control-lg" name="id_driver">
                                                                                        <option value="0" selected>----</option>
                                                                                        <?php if(isset($drivers)):?>
                                                                                            <?php foreach($drivers as $driver):?>
                                                                                                <option value="<?php echo $driver->id; ?>"><?php echo $driver->name.' '.$driver->surname; ?></option>
                                                                                            <?php endforeach; ?>
                                                                                        <?php endif; ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group mb-2">
                                                                                    <label for="note" class="form-label font-weight-bold">COMENTÁRIOS:</label>
                                                                                    <textarea class="form-control" rows="2" id="note" name="comments"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">

                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="period">PERÍODO DO DIA</label>
                                                                                    <select class="select2 form-control form-control-lg" id="period" name="period">
                                                                                        <option value="">----</option>
                                                                                        <option value="DIURNO">DIURNO</option>
                                                                                        <option value="NOTURNO">NOTURNO</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <span class="title" for="date_allocation_dumpster">DATA ALOCAÇÃO:</span>
                                                                                    <input type="text" name="date_allocation_dumpster" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format date_allocation_dumpster date_format_allocation" data-column="5"  data-column-index="4" onchange="validaData(this);"/>

                                                                                </div>    
                                                                            </div>

                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <span class="title" for="date_removal_dumpster">DATA PREV RETIRADA:</span>
                                                                                    <input type="text" name="date_removal_dumpster" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format date_format_removal" data-column="5"  data-column-index="4" onchange="validaDateRemovalDumpster();" />
                                                                                    <div class="loadingMask text-primary" style="display:none;">Loading...</div>
                                                                                </div>    
                                                                            </div>

                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <span class="title">TOTAL DE DIAS</span>
                                                                                    <input type="number" name="total_days" class="form-control total_days" value="0" min="1" max="1000" placeholder="0" onkeyup="validaTotalDays(this);"/>
                                                                                    <div class="loadingMask text-primary" style="display:none;">Loading...</div>
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
                                                        <button type="submit" class="btn btn-success btn-block mb-75">Salvar</button>
                                                        <button type="reset" class="btn btn-warning btn-block mb-75">Limpar Formulário</button>
                                                    </div>
                                                </div>
                                            </div>
                        
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
</div>

{{-- @include('partials.footer') --}}
@include('partials.footer_teste') 

<script>

    $(document).ready(function(){
        const price_unit_origin = $("#price_unit").val();


        // $('.date_effective_removal_dumpster').blur(function(){

        //     let data_alocacao_cacamba = $('.date_allocation_dumpster').val().split('/');
        //     mes = data_alocacao_cacamba[1];
        //     dia = data_alocacao_cacamba[0];
        //     ano = data_alocacao_cacamba[2];

        //     data_alocacao  = new Date(mes + '/' + dia + '/' + ano);

        //     let data_retirada_efetiva  = $(this).val().split('/');
        //     mes = data_retirada_efetiva[1];
        //     dia = data_retirada_efetiva[0];
        //     ano = data_retirada_efetiva[2];

        //     data_retirada_efetiva  = new Date(mes + '/' + dia + '/' + ano);

        //     const diffTime = Math.abs(data_retirada_efetiva - data_alocacao);
        //     const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
            
        //     if(isNaN(diffDays) == false){
        //         $('.total_days').val(diffDays);
        //     }


        // });

        // ZipCode
        $("#zipcode").change(function(){

            let zipcodeStr = $(this).val().replace(/[\s,-]/g,"");
            let zipcode     = parseInt($(this).val().replace(/[\s,-]/g,""));

            if(zipcodeStr.length == 8 && typeof zipcode == "number"){

                let settings = {
                "url": "https://viacep.com.br/ws/" + zipcodeStr + "/json/",
                "method": "GET",
                "timeout": 0,
                };

                $.ajax(settings).done(function (dataResponse) {

                    $("#address").val(dataResponse.logradouro);
                    $("#district").val(dataResponse.bairro);
                    $("#city").val(dataResponse.localidade);
                    $("#state").val(dataResponse.uf);

                });
            
            }else{
                alert("CEP inválido!");
                $(this).val("");
                $("#address").val("");
                $("#district").val("");
                $("#city").val("");
                $("#state").val("");
                return false;
            }            

        });
        // ZipCode

        $("#discount_value").on( "keyup", function() {
            
            let price_unit = $("#price_unit").val().replace(/,/g, '.');
            if($("#discount_value").val() === 0 || $("#discount_value").val() === "")
            {
                $("#price_unit").val(price_unit_origin);

            }else{
                let discount_value = Number($("#discount_value").val()) / 100;
                let totalValue = price_unit - (price_unit * discount_value)
                totalValue = totalValue.toFixed(2).toString().replace(".", ",");
                $("#price_unit").val(totalValue);
            }

        } );

        let today = new Date();
        $('#date_begin').val(((today.getDate() )) + "/" + ((today.getMonth() + 1)) + "/" + today.getFullYear());

        let dateObj = new Date();
        let month   = dateObj.getUTCMonth() + 1; //months from 1-12
        let day     = dateObj.getUTCDate();
        let year    = dateObj.getUTCFullYear();
        let  newDate  = day + "/" + month + "/" + year;
        $('.date_today').val(newDate);

        $("#search_data_client").on('change', function(){
            
            let id_demand_client = $(this).val();
            findDemandClient(id_demand_client);
        });


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
                    $('.date_format_removal').val(dataResponse.date_removal_dumpster);

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
                date_allocation_dumpster: {
                    required: true
                },
                date_removal_dumpster: {
                    required: true
                },
                total_days: {
                    required: true
                },
                // date_effective_removal_dumpster: {
                //     required: true
                // },
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
                id_landfill: {
                    required: true
                },
                period: {
                    required: true
                },
                id_driver: {
                    required: true
                },
                note: {
                    required: true
                }

            },

            messages:{
                type_service: "Campo <b>Serviço</b> deve ser preenchido!",
                date_begin: "Campo <b>Data Pedido</b> deve ser preenchido!",
                date_allocation_dumpster: "Campo <b>Data de Alocação</b> deve ser preenchido!",
                date_removal_dumpster: "Campo <b>Previsao de Retirada</b> deve ser preenchido!",
                total_days: "Campo <b>Total de Dias</b> deve ser maior que que 0!",
                // date_effective_removal_dumpster: "Campo <b>Previsão de Retirada Efetiva</b> deve ser preenchido!",
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


    let validaData = (dataAlocacao) => {

        let city = $('#city').val();

        if(city.length > 0){

            if(dataAlocacao.value.length > 0){
                $('.loadingMask').show();
                
                $.ajax({
                        method: 'GET',
                        url: '/dias_municipio',
                        data: {city : city},
                        success: function(dataResponse) {

                            $('.loadingMask').hide();
                            $("input[name='date_removal_dumpster']").val(adicionaDiasEmData(dataResponse));
                            // $("input[name='date_effective_removal_dumpster']").val(adicionaDiasEmData(dataResponse));
                            // $("input[name='total_days']").val(quantidadeDias());
                            $("input[name='total_days']").val(dataResponse);
                            
                        },
                        error: function(responseError){
                            $('.loadingMask').hide();
                            alert(responseError);
                        }
                });
            }
            
        }else {

            $("#form").submit();
        }
    };

    let validaDateRemovalDumpster = _ => {
        $("input[name=total_days]").val("");
        let dateAllocationDumpster  = $("input[name=date_allocation_dumpster]").val();
        let dateRemovalDumpster     = $("input[name=date_removal_dumpster]").val();
        dateAllocationDumpsterEdit  = dateAllocationDumpster.split("/");
        dateAllocationDumpster      = new Date(dateAllocationDumpsterEdit[2] + "-" + dateAllocationDumpsterEdit[1] + "-" + dateAllocationDumpsterEdit[0]);

        dateRemovalDumpsterEdit     = dateRemovalDumpster.split("/");
        dateRemovalDumpster         = new Date(dateRemovalDumpsterEdit[2] + "-" + dateRemovalDumpsterEdit[1] + "-" + dateRemovalDumpsterEdit[0]);

        diffInDays = (dateRemovalDumpster - dateAllocationDumpster) / (1000 * 60 * 60 * 24);

        $("input[name=total_days]").val(diffInDays);

    };

    let validaTotalDays = (days) => {

        let dateAllocationDumpster  = $("input[name=date_allocation_dumpster]").val();

        if(dateAllocationDumpster !== '' && days.value > 0)
            $("input[name='date_removal_dumpster']").val(adicionaDiasEmData(days.value));

        else
            $("input[name='date_removal_dumpster']").val("");
    };

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

        // let date_effective_removal_dumpster = $("input[name='date_effective_removal_dumpster']").val();
        // let format_date_effective_removal_dumpster = date_effective_removal_dumpster.split("/");
        // let data_retirada_efetiva  = format_date_effective_removal_dumpster[1] + '/' + format_date_effective_removal_dumpster[0] + '/'+ format_date_effective_removal_dumpster[2];

        const date1 = new Date(data_alocacao);
        // const date2 = new Date(data_retirada_efetiva);
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

        return diffDays;
    }
    
</script>