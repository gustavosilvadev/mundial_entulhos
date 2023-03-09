@include('partials.header')
@include('partials.nav')

<div class="app-content content">

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>

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
                                            <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">CADASTRO</ins> <mark class="bg-dark text-white">DEMANDA!</mark></h3>                                            
                                        </div>

                                        <div class="card-body">
                                    
                                            <form action="/save_call_demand" method= "POST" id="form" class="form-validate">
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
                                                                                    
                                                                                </div>
                                                                                
                                                                                
                                
                                                                                <div class="row">
                                
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="type_service">Tipo de Serviço</label>
                                                                                            <select class="select2 form-control form-control-lg" name="type_service">
                                                                                                <option value="" selected>----</option>
                                                                                                <option value="COLOCACAO">COLOCAÇÃO</option>
                                                                                                <option value="TROCA">TROCA</option>
                                                                                            </select>            
                                                                                        </div>
                                                                                    </div>                                                    
                                
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <span class="title" for="date_begin">DATA PEDIDO:</span>
                                                                                            <input type="text" name="date_begin" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format" data-column="5"  data-column-index="4"/>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <span class="title" for="date_end">PREVISÃO DE RETIRADA:</span>
                                                                                            <input type="text" name="date_end" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format" data-column="5"  data-column-index="4"/>
                                                                                        </div>    
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="client">CLIENTE</label>
                                                                                            <select class="select2 form-control form-control-lg" name="id_client">
                                                                                                <option value="">----</option>
                                                                                                <?php if(isset($clients)):?>
                                                                                                    <?php foreach($clients as $client):?>
                                                                                                        <option value="<?php echo $client->id; ?>"><?php echo $client->name.' '.$client->surname; ?></option>
                                                                                                    <?php endforeach; ?>
                                                                                                <?php endif; ?>
                                                                                            </select>
                                            
                                                                                        </div>
                                                                                    </div>
                                            
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="address">Endereço</label>
                                                                                            <input type="text" class="form-control" name="address" />
                                                                                        </div>
                                                                                    </div>
                                            
                                                                                    <div class="col-md-2">
                                                                                        <div class="form-group">
                                                                                            <label for="number">Número</label>
                                                                                            <input type="text" class="form-control" name="number" />
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="zipcode">CEP</label>
                                                                                            <input type="text" class="form-control" name="zipcode" />
                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="city">Cidade</label>
                                                                                            <input type="text" class="form-control" name="city" />
                                            
                                                                                        </div>
                                                                                    </div>
                                            
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="district">Bairro</label>
                                                                                            <input type="text" class="form-control" name="district" />
                                            
                                                                                        </div>
                                                                                    </div>
                                            
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="state">Estado</label>
                                                                                            <input type="text" class="form-control" name="state" />
                                            
                                                                                        </div>
                                                                                    </div>
                                            
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="phone">Telefone</label>
                                                                                            <input type="text" class="form-control" name="phone" />
                                                                                        </div>
                                                                                    </div>
                                            
                                                                                    <div class="col-md-2">
                                                                                        <div class="form-group">
                                                                                            <label for="price_unit">Preço UNIT.</label>
                                                                                            <input type="number" name="price_unit" class="form-control" value="0" />
                                                                                            
                                
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
                                                                <button type="submit" class="btn btn-success btn-block mb-75">Salvar</button>                                
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
    </div>




    </div>
</div>


@include('partials.footer')

<script>

    $(document).ready(function(){

        var today = new Date();
        $('#date_begin').val(((today.getDate() )) + "/" + ((today.getMonth() + 1)) + "/" + today.getFullYear());

        $("#form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            }
        });


        $("#form").validate({
        rules: {
            type_service: {
                required: true
            },
            date_begin: {
                required: true
            },
            date_end: {
                required: true
            },
            client: {
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
            landfill: {
                required: true
            },
            period: {
                required: true
            },
            driver: {
                required: true
            },
            note: {
                required: true
            }

        },

        messages:{
            type_service: "Campo <b>Tipo de serviço</b> deve ser preenchido!",
            date_begin: "Campo <b>Data Pedido</b> deve ser preenchido!",
            date_end: "Campo <b>Previsao de Retirada</b> deve ser preenchido!",
            client: "Campo <b>Cliente</b> deve ser preenchido!",
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
            landfill: "Campo <b>Aterro</b> deve ser preenchido!",
            period: "Campo <b>Período</b> deve ser preenchido!",
            driver: "Campo <b>Motorista</b> deve ser preenchido!",
            note: "Campo <b>Observação</b> deve ser preenchido!"            

        }            
    });        


    });

</script>