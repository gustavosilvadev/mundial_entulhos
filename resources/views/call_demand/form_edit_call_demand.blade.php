
<?php 

// print_r($info_demand);
// echo '<BR /> *** <BR />';
// echo '<BR /> *** <BR />';



// print($landfills);

// die();
// foreach($clients as $client){
    
//     echo  $client->id.' -> '.$client->name.' '.$client->surname."<BR />";
// }

// die();
?>

@include('partials.header')
@include('partials.nav')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">

            <div class="row" id="table-responsive">        
                <div class="col-12">
                    <div class="card">
                        <div class="todo-app-list">
                            <section id="multiple-column-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">EDITAR</ins> <mark class="bg-dark text-white">DEMANDA!</mark></h3>                                            
                                            </div>

                                            <div class="card-body">
                                        
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

                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label for="id_client">CLIENTE</label>
                                                                                                <select class="select2 form-control form-control-lg" name="id_client" id="search_data_client">
                                                                                                    <option value="">----</option>
                                                                                                    <?php if(isset($clients)):?>
                                                                                                        <?php foreach($clients as $client):?>
                                                                                                            <option value="<?php echo $client->id; ?>"><?php echo $client->name.' '.$client->surname; ?></option>
                                                                                                        <?php endforeach; ?>
                                                                                                    <?php endif; ?>
                                                                                                </select>
                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <hr />
                                                                                    
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <label for="type_service">Tipo de Serviço</label>
                                                                                                <select class="select2 form-control form-control-lg" name="type_service">
                                                                                                    <option value="" selected>----</option>
                                                                                                    <option value="COLOCACAO">COLOCAÇÃO</option>
                                                                                                    <option value="TROCA">TROCA</option>
                                                                                                    <option value="RETIRADA">RETIRADA</option>
                                                                                                </select>            
                                                                                            </div>
                                                                                        </div>                                                    
                                    
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <span class="title" for="date_begin">DATA DO PEDIDO:</span>
                                                                                                <input type="text" name="date_begin" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format date_today" data-column="5"  data-column-index="4"/>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <span class="title" for="date_allocation_dumpster">DATA DE ALOCAÇÃO:</span>
                                                                                                <input type="text" name="date_allocation_dumpster" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format" data-column="5"  data-column-index="4"/>
                                                                                            </div>    
                                                                                        </div>

                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <span class="title" for="date_removal_dumpster">PREVISÃO DE RETIRADA:</span>
                                                                                                <input type="text" name="date_removal_dumpster" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format" data-column="5"  data-column-index="4"/>
                                                                                            </div>    
                                                                                        </div>

                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <span class="title" for="date_effective_removal_dumpster">PREVISÃO DE RETIRADA EFETIVA:</span>
                                                                                                <input type="text" name="date_effective_removal_dumpster" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format" data-column="5"  data-column-index="4"/>
                                                                                            </div>    
                                                                                        </div>                                                                                        
                                                                                        
                                                                                        {{-- <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <label for="id_client">CLIENTE</label>
                                                                                                <select class="select2 form-control form-control-lg" name="id_client">
                                                                                                    <option value="">----</option>
                                                                                                    <?php if(isset($clients)):?>
                                                                                                        <?php foreach($clients as $client):?>
                                                                                                            <option value="<?php echo $client->id; ?>"><?php echo $client->name.' '.$client->surname; ?></option>
                                                                                                        <?php endforeach; ?>
                                                                                                    <?php endif; ?>
                                                                                                </select>
                                                
                                                                                            </div>
                                                                                        </div> --}}
                                                
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
                                                                                                <label for="zipcode">CEP</label>
                                                                                                    <input type="text" class="form-control zipcode-mask" name="zipcode" id="zipcode" placeholder="00000-00" />
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
                                                                                                <input type="text" class="form-control only-text" name="city" id="city" minlength="2" maxlength="18"/>
                                                
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
                                                                                                {{-- <input type="phone" class="form-control phone-number-mask" name="phone" placeholder="xx xxxxx-xxxx" id="phone-number" onkeydown="return /^\d*$/.test(value)"/> --}}
                                                                                                <input type="phone" class="form-control phone-number-mask" name="phone" id="phone" placeholder="xx xxxxx-xxxx" id="phone-number" onkeypress="return onlynumber()" />
                                                                                            </div>
                                                                                        </div>
                                                
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label for="price_unit">Preço UNIT.</label>
                                                                                                <input type="text" name="price_unit" class="form-control price_unit" value="0" />
                                                                                                
                                    
                                                                                            </div>
                                                                                        </div>
                                                
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label for="dumpster_total">TOTAL DE CAÇAMBAS</label>
                                                                                                <input type="number" name="dumpster_total" class="form-control" value="0" min="0" max="1000" placeholder="0" />
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label for="dumpster_total_opened">TOTAL EM ABERTO</label>
                                                                                                <input type="number" name="dumpster_total_opened" class="form-control" value="0" min="0" max="1000" placeholder="0" />
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label for="dumpster_total_opened">Nº CAÇAMBA</label>
                                                                                                <input type="number" name="dumpster_number" class="form-control" value="0" min="0" max="1000" placeholder="0" />
                                                                                            </div>
                                                                                        </div>
                                    
                                    
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <label for="landfill">ATERRO</label>
                                                                                                <select class="select2 form-control form-control-lg" name="id_landfill">
                                                                                                
                                                                                                    <option value="">----</option>
                                                                                                    <?php if(isset($landfills)):?>
                                                                                                        <?php foreach($landfills as $landfill):?>
                                                                                                            <option value="<?php echo $landfill->id; ?>"><?php echo $landfill->name; ?></option>
                                                                                                        <?php endforeach; ?>
                                                                                                    <?php endif; ?>                                                                
                                                                                                
                                                                                                </select>
                                                
                                                                                            </div>
                                                                                        </div>                                                    
                                    
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <label for="period">PERÍODO DO DIA</label>
                                                                                                <select class="select2 form-control form-control-lg" name="period">
                                                                                                    <option value="">----</option>
                                                                                                    <option value="DIURNO">DIURNO</option>
                                                                                                    <option value="NOTURNO">NOTURNO</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                    
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <label for="driver">MOTORISTA</label>
                                                                                                <select class="select2 form-control form-control-lg" name="id_driver">
                                                                                                    <option value="">----</option>
                                                                                                    <?php if(isset($drivers)):?>
                                                                                                        <?php foreach($drivers as $driver):?>
                                                                                                            <option value="<?php echo $driver->id; ?>"><?php echo $driver->name.' '.$driver->surname; ?></option>
                                                                                                        <?php endforeach; ?>
                                                                                                    <?php endif; ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                    
                                    
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group mb-2">
                                                                                                <label for="note" class="form-label font-weight-bold">COMENTÁRIOS:</label>
                                                                                                <textarea class="form-control" rows="2" id="note" name="comments"></textarea>
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
                                                                    <button type="submit" class="btn btn-warning btn-block mb-75">ATUALIZAR</button>                                
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
                </div>
            </div>

            <section id="basic-modals">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="demo-inline-spacing">
                                    <div class="basic-modal">
                                        <div class="modal fade text-left" id="alert_demand_opened" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel1">Aviso!</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p>
                                                            Este cliente possui uma atividade em aberta. Deseja abrir um novo chamado mesmo assim?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="redirect_list_demand_client">Visualizar chamado </button>
                                                        <button type="button" class="btn btn-success" data-dismiss="modal" id="no_redirect_list_demand_client">Sim</button>
                                                    </div>
                                                </div>
                                            </div>
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
</div>


@include('partials.footer')

<script>

    $(document).ready(function(){

        let id_demand = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);

        $.get("/getInfoDemand/" + id_demand).done(function( data ){
            
            $("input[name='date_begin']").val(data.date_begin);
            $("input[name='date_allocation_dumpster']").val(data.date_allocation_dumpster);
            $("input[name='date_removal_dumpster']").val(data.date_removal_dumpster);
            $("input[name='date_effective_removal_dumpster']").val(data.date_effective_removal_dumpster);
            $("input[name='address']").val(data.address_service);
            $("input[name='number']").val(data.number_address_service);
            $("input[name='zipcode']").val(data.zipcode_address_service);
            $("input[name='district']").val(data.district_address_service);
            $("input[name='city']").val(data.city_address_service);
            $("input[name='state']").val(data.state_address_service);
            $("input[name='phone']").val(data.phone_demand);
            $("input[name='price_unit']").val(data.price_unit);
            $("input[name='dumpster_total']").val(data.dumpster_total);
            $("input[name='dumpster_total_opened']").val(data.dumpster_total_opened);
            $("input[name='dumpster_number']").val(data.dumpster_number);
            $("textarea").val(data.comments_demand);


        }).fail(function(){
            alert('Erro ao carregar as informações!!');
        });


        let today = new Date();
        $('#date_begin').val(((today.getDate() )) + "/" + ((today.getMonth() + 1)) + "/" + today.getFullYear());

        let dateObj = new Date();
        let month   = dateObj.getUTCMonth() + 1; //months from 1-12
        let day     = dateObj.getUTCDate();
        let year    = dateObj.getUTCFullYear();
        let  newDate  = day + "/" + month + "/" + year;
        $('.date_today').val(newDate);

        $("#search_data_client").on('change', function(){
            
            let id_client = $(this).val();

            $.ajax({
                method: 'GET',
                url: '/find_demmand_client',
                data: {id : id_client},
                success: function(dataResponse) {

                    if(dataResponse)
                    {
                        $("#alert_demand_opened").modal('show');
                    }

                    findDemandClient(id_client);

                },
                error: function(responseError){
                    alert(responseError);
                }
            });
        });

        $('#redirect_list_demand_client').click(function(){
            let id_client = $("#search_data_client option:selected").val();
            window.location.replace("demand_list_client/" + id_client);

        });

        $('#no_redirect_list_demand_client').click(function(){
            $("#alert_demand_opened").modal('hide');
            findDemandClient(id_client);
        });


        function findDemandClient(id_client){
            $.ajax({
                method: 'GET',
                url: '/show_info_client',
                data: {id : id_client},
                success: function(dataResponse) {
                    $("#address").val(dataResponse.address);
                    $("#number").val(dataResponse.number);
                    $("#zipcode").val(dataResponse.zipcode);
                    $("#district").val(dataResponse.district);
                    $("#state").val(dataResponse.state);
                    $("#city").val(dataResponse.city);
                    $("#phone").val(dataResponse.phone);

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
                id_client: {
                    required: true
                },
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

</script>