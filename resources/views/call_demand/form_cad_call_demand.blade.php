@include('partials.header')
<!--
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-add-wrapper">
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
                                                    <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">CADASTRO</ins> <mark class="bg-dark text-white">DEMANDA!</mark></h3>    
                                                </div>
                                                
                                                

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="username">Tipo de Serviço</label>
                                                            <select class="form-control" name="type_service">
                                                                <option value="" selected>----</option>
                                                                <option value="COLOCACAO">COLOCAÇÃO</option>
                                                                <option value="TROCA">TROCA</option>
                                                            </select>            
                                                        </div>
                                                    </div>                                                    

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <span class="title">DATA PEDIDO:</span>
                                                            <input type="text" name="date_begin" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format" data-column="5"  data-column-index="4"/>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <span class="title">PREVISÃO DE RETIRADA:</span>
                                                            <input type="text" name="date_end" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format" data-column="5"  data-column-index="4"/>
                                                        </div>    
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="username">CLIENTE</label>
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
                                                            {{-- <input type="text" pattern="[0-9]{5}" class="form-control" name="zipcode" /> --}}
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

                <div class="modal modal-slide-in fade" id="add-new-customer-sidebar" aria-hidden="true">
                    <div class="modal-dialog sidebar-lg">
                        <div class="modal-content p-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title">
                                    <span class="align-middle">Add Customer</span>
                                </h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <form>
                                    <div class="form-group">
                                        <label for="customer-name" class="form-label">Customer Name</label>
                                        <input type="text" class="form-control" id="customer-name" placeholder="John Doe" />
                                    </div>
                                    <div class="form-group">
                                        <label for="customer-email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="customer-email" placeholder="example@domain.com" />
                                    </div>
                                    <div class="form-group">
                                        <label for="customer-address" class="form-label">Customer Address</label>
                                        <textarea class="form-control" id="customer-address" cols="2" rows="2" placeholder="1307 Lady Bug Drive New York"></textarea>
                                    </div>
                                    <div class="form-group position-relative">
                                        <label for="customer-country" class="form-label">Country</label>
                                        <select class="form-control" id="customer-country" name="customer-country">
                                            <option label="select country"></option>
                                            <option value="Australia">Australia</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United States of America">United States of America</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer-contact" class="form-label">Contact</label>
                                        <input type="number" class="form-control" id="customer-contact" placeholder="763-242-9206" />
                                    </div>
                                    <div class="form-group d-flex flex-wrap mt-2">
                                        <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Add</button>
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
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
-->


<div class="app-content content ">
    
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">

                <div class="row" id="table-responsive">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-header">
                                <a href="/createcalldemand" class="btn btn-success">NOVO</a>
                            </div>
                            <div style="display: block;overflow-x: auto;white-space: nowrap;" >
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
                                                                        <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">CADASTRO</ins> <mark class="bg-dark text-white">DEMANDA!</mark></h3>    
                                                                    </div>
                                                                    
                                                                    
                    
                                                                    <div class="row">
                    
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="username">Tipo de Serviço</label>
                                                                                <select class="form-control" name="type_service">
                                                                                    <option value="" selected>----</option>
                                                                                    <option value="COLOCACAO">COLOCAÇÃO</option>
                                                                                    <option value="TROCA">TROCA</option>
                                                                                </select>            
                                                                            </div>
                                                                        </div>                                                    
                    
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <span class="title">DATA PEDIDO:</span>
                                                                                <input type="text" name="date_begin" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format" data-column="5"  data-column-index="4"/>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <span class="title">PREVISÃO DE RETIRADA:</span>
                                                                                <input type="text" name="date_end" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format" data-column="5"  data-column-index="4"/>
                                                                            </div>    
                                                                        </div>
                                                                        
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="username">CLIENTE</label>
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
                                                                                {{-- <input type="text" pattern="[0-9]{5}" class="form-control" name="zipcode" /> --}}
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
    });

</script>