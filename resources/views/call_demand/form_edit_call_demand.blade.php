<?php 

// echo "date_issue: ".$calldemandpayment->daate_issue;
// echo "<BR />";
// echo "date_payment_forecast: ".date('Y-m-d', strtotime($calldemandpayment->date_payment_forecast));

// echo "<BR />";
// echo "date_effective_paymen: ".date('Y-m-d', strtotime($calldemandpayment->date_effective_paymen));
// print_r($calldemandpayment->receipt_or_nf);
// print_r($calldemandpayment);
/*
echo '<pre>';
var_dump($calldemand[0]->dumpster_replacement == true);

// [dumpster_allocation] => 1
// [dumpster_replacement] => 0
echo '</pre>';
die();
*/

?>

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
    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
</style>

<!-- BEGIN: Content-->
<div class="app-content content-designed">
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
                                                        <form id="form" class="form-validate" autocomplete="off" onsubmit="return false;">
                                                            @csrf
                                                            <div class="row invoice-add">
                                                                <div class="col-md-12">
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

                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="id_client">CLIENTE</label>
                                                                                                            <input type="text" class="form-control only-text" name="client_name_new" id="client_name_new" minlength="2" maxlength="44" value="{{ $value->name }}" required disabled/>
                                                            
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="type_service">Tipo de Serviço</label>

                                                                                                            <select class="select2 form-control form-control-lg" id="type_service" name="type_service" required disabled>
                                                                                                                <option value="">----</option>
                                                                                                                <?php if($value->dumpster_allocation == true): ?>
                                                                                                                    <option value="COLOCACAO" selected>COLOCAÇÃO</option>

                                                                                                                <?php elseif($value->dumpster_replacement == true): ?>
                                                                                                                
                                                                                                                <option value="TROCA" selected>TROCA</option>
                                                                                                                <?php else: ?>
                                                                                                                    <option value="RETIRADA" selected>RETIRADA</option>
                                                                                                                <?php endif; ?>
                                                                                                                
                                                                                                            </select> 
                                                                                                            <input type="hidden" id="status_servico" name="" value="{{ $value->dumpster_allocation }}"/>
                                                                                                        </div>
                                                                                                    </div>                                                                                                     
                                                                                                </div>

                                                                                                <hr />
                                                                                                
                                                                                                <div class="row">
                                                                                                
                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="zipcode">CEP</label>
                                                                                                                <input type="text" class="form-control zipcode-mask" name="zipcode" id="zipcode" placeholder="00000-00" value="{{ $value->zipcode_address_service }}" required/>
                                                                                                        </div>
                                                                                                    </div>                                                                                        
                                                            
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label for="address">Endereço</label>
                                                                                                            <input type="text" class="form-control only-text" name="address" id="address" minlength="2" maxlength="44" value="{{ $value->address_service }}"/>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label for="address">Complemento</label>
                                                                                                            <input type="text" class="form-control only-text" name="address_complement" id="address_complement" minlength="2" maxlength="44" value="{{ $value->address_complement }}"/>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="number">Número</label>
                                                                                                            <input type="text" class="form-control" name="number" id="number" minlength="1" maxlength="6" value="{{ $value->number_address_service }}"/>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr />
                                                                                                <div class="row">

                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label for="district">Bairro</label>
                                                                                                            <input type="text" class="form-control only-text" name="district" id="district" minlength="2" maxlength="44" value="{{ $value->district_address_service }}"/>
                                                            
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-3">
                                                                                                        <div class="form-group">
                                                                                                            <label for="city">Cidade</label>
                                                                                                            <input type="text" class="form-control only-text" name="city" id="city" minlength="2" maxlength="50" value="{{ $value->city_address_service }}"/>
                                                            
                                                                                                        </div>
                                                                                                    </div>
                                                            
                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="state">Estado</label>
                                                                                                            <input type="text" class="form-control only-text" name="state" id="state" maxlength="2" onkeydown="return /[a-z]/i.test(event.key)" value="{{ $value->state_address_service }}"/>
                                                            
                                                                                                        </div>
                                                                                                    </div>
                                                            
                                                                                                    <div class="col-md-3">
                                                                                                        <div class="form-group">
                                                                                                            <label for="phone">Telefone</label>
                                                                                                            
                                                                                                            <input type="phone" class="form-control phone-number-mask" name="phone" id="phone" placeholder="xx xxxxx-xxxx" id="phone-number" onkeypress="return onlynumber()" value="{{ $value->phone_demand }}"/>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr />
                                                                                                <div class="row">
                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="dumpster_total">QTD CAÇAMBAS</label>
                                                                                                            <input type="number" name="dumpster_total" class="form-control"  id="dumpster_total" min="0" max="1000" placeholder="0" value="{{ $value->dumpster_quantity }}" disabled/>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group input-icon">
                                                                                                            <label for="price_unit">Preço UNIT.</label>
                                                                                                            <input type="text" name="price_unit" class="form-control price_unit" id="price_unit" value="{{ $value->price_unit }}"/>
                                                                                                            <i>R$</i>
                                                
                                                                                                        </div>
                                                                                                    </div>
                                                            

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="dumpster_total_opened">NÚMERO CAÇAMBA</label>
                                                                                                            <input type="number" name="dumpster_total_opened" class="form-control" id="dumpster_total_opened"  value="{{ $value->dumpster_number }}"/>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    
                                                                                                    <?php if($value->dumpster_replacement == true): ?>

                                                                                                        <div class="col-md-2">
                                                                                                            <div class="form-group">
                                                                                                                <label for="dumpster_number_substitute">NÚMERO CAÇAMBA TROCA</label>
                                                                                                                <input type="number" name="dumpster_number_substitute" class="form-control" id="dumpster_number_substitute"  value="{{ $value->dumpster_number_substitute }}"/>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <?php endif; ?>                                                
                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="landfill">ATERRO</label>
                                                                                                            <select class="select2 form-control form-control-lg" id="landfill" name="id_landfill" {{( $value->dumpster_replacement == true) ? '' : 'disabled'}}>
                                                                                                            
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
                                                                                                </div>
                                                                                                <hr />
                                                                                                <div class="row">                                                                                                
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group mb-2">
                                                                                                            <label for="note" class="form-label font-weight-bold">COMENTÁRIOS:</label>
                                                                                                            <textarea class="form-control" rows="2" id="note" name="comments" >{{ $value->comments_demand }}</textarea>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group mb-2">
                                                                                                            <label for="note" class="form-label font-weight-bold">COMENTÁRIOS (CONTRATUAL):</label>
                                                                                                            <textarea class="form-control" rows="2" id="note" name="comments" >{{ $value->comments_contract }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                

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
                                                                                                            {{-- <input type="hidden" id="date_allocation_dumpster" value="{{ $value->date_allocation_dumpster }}" /> --}}
                                                                                                            {{-- <input type="text" name="date_allocation_dumpster" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format date_allocation_dumpster date_format_allocation_edit" data-column="5"  data-column-index="4" onchange="validaData(this);"/> --}}
                                                                                                            {{-- <input type="text" name="date_allocation_dumpster" id="date_format" class="form-control dt-date date-mask" data-column="5"  data-column-index="4"  value="{{ $value->date_allocation_dumpster }}"/> --}}
                                                                                                            <input type="text" name="date_allocation_dumpster" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format date_allocation_dumpster date_format_allocation_edit" data-column="5"  data-column-index="4" onchange="validaData(this);" value="{{ $value->date_allocation_dumpster }}"/>
                                                                                                        </div>    
                                                                                                    </div>

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="period">PREVISÃO RETIRADA</label>
                                                                                                            <input type="text" name="date_removal_dumpster_forecast" id="date_format" class="form-control dt-date date-mask date_format" data-column="5"  data-column-index="4"  value="{{ $value->date_removal_dumpster_forecast }}"/>
                                                                                                        </div>    
                                                                                                    </div>

                                                                                                    <div class="col-md-2 d-none">
                                                                                                        <div class="form-group">
                                                                                                            <label for="period">RETIRADA EFETIVA</label>

                                                                                                            <br>
                                                                                                            {{-- <h1>{{ date_format(date_create($value->date_effective_removal_dumpster),"d/m/Y"); }}</h1> --}}
                                                                                                            <input type="text" name="date_effective_removal_dumpster" id="date_format" class="form-control dt-date  date_format" data-column="5"  data-column-index="4" value="{{ $value->date_effective_removal_dumpster == '00/00/0000' ? '' : $value->date_effective_removal_dumpster  }}" />
                                                                                                            <div class="loadingMask text-primary" style="display:none;">Loading...</div>
                                                                                                        </div>    
                                                                                                    </div> 

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="period">TOTAL DE DIAS</label>
                                                                                                            <input type="number" name="total_days" class="form-control total_days" min="0" max="1000"  value="{{ $value->days_allocation }}" onkeyup="validaTotalDays(this);" />
                                                                                                            <div class="loadingMask text-primary" style="display:none;">Loading...</div>
                                                                                                        </div>    
                                                                                                    </div> 
                                                                                                </div>
                                                                                                <hr/>
                                                                                                <div class="row">


                                                                                                    <div class="col-md-3">
                                                                                                        <div class="form-group input-icon">
                                                                                                            <label for="iss">ISS</label>
                                                                                                                <input type="text" name="iss" class="form-control iss" id="iss" value="{{  (isset($calldemandpayment->iss)) ? str_replace('.',',',$calldemandpayment->iss) : ''; }}"/>
                                                                                                            <i>R$</i>
                                                                                                        </div>
                                                                                                    </div>                                                                            
                                                                                                    <div class="col-md-3">
                                                                                                        <div class="form-group">
                                                                                                            <label for="has_paid">PAGAMENTO REALIZADO</label>
                                                                                                            <select class="select2 form-control form-control-lg" id="has_paid" name="has_paid">
                                                                                                                <?php if(isset($calldemandpayment)): ?>
                                                                                                                    <?php if($calldemandpayment->has_paid): ?>
                                                                                                                        <option value="1" selected>Sim</option>
                                                                                                                        <option value="0">Não</option>
                                                                                                                        <?php else: ?>
                                                                                                                        <option value="1">Sim</option>
                                                                                                                        <option value="0" selected>Não</option>
                                                                                                                    <?php endif; ?>    
                                                                                                                <?php else: ?>    

                                                                                                                    <option value="1">Sim</option>
                                                                                                                    <option value="0">Não</option>
                                                                                                                <?php endif; ?>    

                                                                                                            </select> 

                                                                                                        </div>
                                                                                                    </div>
                        
                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="by_bank">FORMA DE PAGAMENTO</label>
                                                                                                            <select class="select2 form-control form-control-lg" id="by_bank" name="by_bank">
                                                                                                                <option value="">----</option>

                                                                                                                <?php if(isset($calldemandpayment)): ?>
                                                                                                                 
                                                                                                                    <?php if($calldemandpayment->by_bank_transfer): ?>
                                                                                                                        <option value="1" selected>TRANSFERÊNCA</option>
                                                                                                                        <option value="2">BOLETO BANCÁRIO</option>
                                                                                                                    <?php elseif($calldemandpayment->by_bank_slip): ?>
                                                                                                                        <option value="1">TRANSFERÊNCA</option>
                                                                                                                        <option value="2" selected>BOLETO BANCÁRIO</option>
                                                                                                                    <?php else: ?>

                                                                                                                        <option value="1">TRANSFERÊNCA</option>
                                                                                                                        <option value="2">BOLETO BANCÁRIO</option>
                                                                                                                    <?php endif; ?>    

                                                                                                                <?php endif; ?>


                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                        
                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <label for="receipt_nf">RECIBO/NOTA FISCAL</label>
                                                                                                            <select class="select2 form-control form-control-lg" id="receipt_nf" name="receipt_nf">
                                                                                                                <option value="0">----</option>

                                                                                                                <?php if(isset($calldemandpayment)): ?>
                                                                                                                 
                                                                                                                <?php if($calldemandpayment->receipt_or_nf == 1): ?>
                                                                                                                    <option value="1" selected>RECIBO</option>
                                                                                                                    <option value="2">NOTA FISCAL</option>
                                                                                                                <?php elseif($calldemandpayment->receipt_or_nf == 2): ?>
                                                                                                                    <option value="1">RECIBO</option>
                                                                                                                    <option value="2" selected>NOTA FISCAL</option>

                                                                                                                <?php else: ?>
                                                                                                                    <option value="1">RECIBO</option>
                                                                                                                    <option value="2">NOTA FISCAL</option>
                                                                                                                <?php endif; ?>    

                                                                                                            <?php endif; ?>

                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-2">
                                                                                                        <div class="form-group">
                                                                                                            <span class="title" for="invoice_number">CÓDIGO NF</span>
                                                                                                            <input type="text" class="form-control only-text" name="invoice_number" id="invoice_number" value="{{ isset($calldemandpayment->invoice_number) ? $calldemandpayment->invoice_number : ''}}" autocomplete="off"/>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    
                                                                                                    
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <span class="title" for="date_issue">DATA DA EMISSÃO</span>
                                                                                                            <input type="hidden" id="date_issue" value="{{ (isset($calldemandpayment->date_issue) && $calldemandpayment->date_issue !== '0000-00-00 00:00:00') ? (date('d/m/Y', strtotime($calldemandpayment->date_issue))) : '' }}" />
                                                                                                            <input type="text" name="date_issue" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format date_payment_forecast date_issue_edit" data-column="5"  data-column-index="4" onchange="validaData(this);"/>

                                                                                                        </div>    
                                                                                                    </div>
                        
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <span class="title" for="date_payment_forecast">PREV. PAGAMENTO</span>

                                                                                                            {{-- <input type="hidden" id="date_payment_forecast" value="{{ $calldemandpayment->date_payment_forecast != 0 ? (date('d/m/Y', strtotime($calldemandpayment->date_payment_forecast))) : '' }}" /> --}}

                                                                                                            <input type="hidden" id="date_payment_forecast" value="{{ (isset($calldemandpayment->date_payment_forecast) && $calldemandpayment->date_payment_forecast !== '0000-00-00 00:00:00') ? (date('d/m/Y', strtotime($calldemandpayment->date_payment_forecast))) : '' }}" />
                                                                                                            <input type="text" name="date_payment_forecast" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format date_payment_forecast date_payment_forecast_edit" data-column="5"  data-column-index="4" onchange="validaData(this);"/>
                                                                                                        </div>    
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <span class="title" for="date_effective_paymen">PAGAMENTO EFETIVO</span>

                                                                                                            {{-- <input type="hidden" id="date_effective_paymen" value="{{ $calldemandpayment->date_effective_paymen != 0 ? (date('d/m/Y', strtotime($calldemandpayment->date_effective_paymen))) : '' }}" /> --}}
                                                                                                            <input type="hidden" id="date_effective_paymen" value="{{ (isset($calldemandpayment->date_effective_paymen) && $calldemandpayment->date_effective_paymen !== '0000-00-00 00:00:00')  ? (date('d/m/Y', strtotime($calldemandpayment->date_effective_paymen))) : '' }}" />
                                                                                                            <input type="text" name="date_effective_paymen" id="date_format" class="form-control dt-date flatpickr-range dt-input date_format date_payment_forecast date_effective_paymen_edit" data-column="5"  data-column-index="4" onchange="validaData(this);"/>

                                                                                                        </div>    
                                                                                                    </div>                                                                            
                                                                                                </div>                                                                        
                                                                                                <hr />
                                                                                                <div class="col-12 text-center action-btns">
                                                                                                
                                                                                                    <button class="btn btn-success " id="btn_update" tabindex="4">ATUALIZAR</button>
                                                                                                    <?php if($value->service_status == 0): ?>


                                                                                                        {{-- <button class="btn btn-success " id="btn_update" tabindex="4">ATUALIZAR</button> --}}
                                                                                                        <button class="btn btn-dark " id="btn_finish_demand">CONCLUIR PEDIDO</button>

                                                                                                        <h3 class="text-success text-center py-3" id="message-success" style="display:none"><b>Atualizado com sucesso!</b></h3>
                                                                                                        <h4 class="text-danger text-center py-3" id="message-error" style="display:none"><b>Erro ao atualizar o chamado!</b></h4>
                                                                                                        {{-- <h3 class="text-success text-center" id="message-success-finished" style="display:none"><b>Chamado encerrado com sucesso!</b></h3> --}}
                                                                                                        <h4 class="text-danger text-center" id="message-error-finished" style="display:none"><b>Erro ao encerrar o chamado!</b></h4>
                                                                                                        <?php endif; ?>                                                                                                 
                                                                                                    </div>

                                                                                            </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </section>                            
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
        let isRtl = $('html').attr('data-textdirection') === 'rtl';

        // $('.date_format_allocation_edit').flatpickr({
        //     dateFormat: "d/m/Y"
        // }).setDate($('#date_allocation_dumpster').val());

        $('.date_payment_forecast_edit').flatpickr({
            dateFormat: "d/m/Y"
        }).setDate($('#date_payment_forecast').val());
        
        $('.date_effective_paymen_edit').flatpickr({
            dateFormat: "d/m/Y"
        }).setDate($('#date_effective_paymen').val());
        
        $('.date_issue_edit').flatpickr({
            dateFormat: "d/m/Y"
        }).setDate($('#date_issue').val());

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

                    $('.date_format_allocation_edit').val(dataResponse.date_allocation_dumpster);
                    $('.date_format_removal').val(dataResponse.date_removal_dumpster);
                    $('.date_format_effective_removal').val(dataResponse.date_effective_removal_dumpster);

                },
                error: function(responseError){
                    alert(responseError);
                }
            });
        }
        
        function validateFormInputs(){
            $('#form').validate({
                rules: {
                    client_name_new: {
                        required: true
                    },
                    type_service: {
                        required: true
                    },
                    date_begin: {
                        required: true
                    },
                    date_removal_dumpster: {
                        required: true
                    },
                    // date_effective_removal_dumpster: {
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
                    // dumpster_total_opened: {
                    //     required: false
                    // },
                    dumpster_total: {
                        required: true
                    },
                    period: {
                        required: true
                    },
                    note: {
                        required: true
                    }

                },

                messages:{
                    client_name_new: "Campo <b>Campo Nome</b> deve ser preenchido!",
                    type_service: "Campo <b>Tipo de serviço</b> deve ser preenchido!",
                    date_begin: "Campo <b>Data Pedido</b> deve ser preenchido!",
                    date_removal_dumpster: "Campo <b>Previsao de Retirada</b> deve ser preenchido!",
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
                    // dumpster_total_opened: "Campo <b>Total em aberto</b> deve ser preenchido!",
                    id_landfill: "Campo <b>Aterro</b> deve ser preenchido!",
                    period: "Campo <b>Período</b> deve ser preenchido!",
                    id_driver: "Campo <b>Motorista</b> deve ser preenchido!",
                    note: "Campo <b>Observação</b> deve ser preenchido!"            

                }            
            });
        }            

        $("#form input").focusin(function() {
            $(this).siblings(".form-group__bar").hide()
        });        

        $("#btn_update").on('click', function(){

            $("#message-success").css("display","none");
            $("#message-error").css("display","none");

            validateFormInputs();
            
            let id_demand       = $("input[name=id_demand]").val();
            let id_demand_reg   = $("input[name=id_demand_reg]").val();
            let client_name_new = $("input[name=client_name_new]").val();
            let zipcode         = $("input[name=zipcode]").val();
            let address         = $("input[name=address]").val();
            let address_complement         = $("input[name=address_complement]").val();
            let number          = $("input[name=number]").val();
            let district        = $("input[name=district]").val();
            let city            = $("input[name=city]").val();
            let state           = $("input[name=state]").val();
            let phone           = $("input[name=phone]").val();
            let price_unit      = $("input[name=price_unit]").val();
            let dumpster_total_opened = $("#dumpster_total_opened").val();
            let dumpster_number_substitute = $("#dumpster_number_substitute").val();
            let landfill        = $("#landfill").val();
            let driver          = $("#driver").val();
            let dumpster_total  = $("input[name=dumpster_total]").val();
            let comments        = $("#note").val();
            let type_service    = $("#type_service").val();
            let period          = $("#period").val();
            let date_allocation_dumpster        = $("input[name=date_allocation_dumpster]").val();
            let date_effective_removal_dumpster = $("input[name=date_effective_removal_dumpster]").val();
            let date_removal_dumpster_forecast  = $("input[name=date_removal_dumpster_forecast]").val();
            let total_days      = $("input[name=total_days]").val();
            let iss      = $("#iss").val();
            let hasPaid      = $("#has_paid").val();
            let byBank = $('#by_bank').val();
            let receiptNf = $('#receipt_nf').val();
            let invoiceNumber  = $('#invoice_number').val();
            let dateIssue = $("input[name=date_issue]").val();
            let datePaymentForecast = $("input[name=date_payment_forecast]").val();
            let dateEffectivePaymen = $("input[name=date_effective_paymen]").val();

// console.log("dumpster_total_opened: " + dumpster_total_opened);
// console.log("dumpster_number_substitute: " + dumpster_number_substitute);
// console.log("landfill: " + landfill);
// console.log("driver: " + driver);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'POST',
                url: '{{ route('change.demand') }}',
                data: { 
                    'id_demand' : id_demand,
                    'id_demand_reg' : id_demand_reg,
                    'client_name_new' : client_name_new,
                    'zipcode' : zipcode,
                    'address' : address,
                    'number' : number,
                    'district' : district,
                    'city' : city,
                    'state' : state,
                    'phone' : phone,
                    'price_unit' : price_unit,
                    "dumpster_number" : dumpster_total_opened,
                    "dumpster_number_substitute" : dumpster_number_substitute,
                    "id_landfill" : landfill,
                    'id_driver' : driver,
                    'dumpster_total' : dumpster_total,
                    'comments' : comments,
                    'type_service' : type_service,
                    'period' : period,
                    'date_allocation_dumpster' : date_allocation_dumpster,
                    'date_effective_removal_dumpster' : date_effective_removal_dumpster,
                    'date_removal_dumpster_forecast' : date_removal_dumpster_forecast,
                    'total_days' : total_days,
                    'iss' :  iss,
                    'has_paid' :  hasPaid,
                    'by_bank' : byBank,                    
                    'receipt_nf' : receiptNf,                    
                    'invoice_number' : invoiceNumber,
                    'date_issue' : dateIssue,
                    'date_payment_forecast' : datePaymentForecast,
                    'date_effective_paymen' : dateEffectivePaymen
                },
                success: function(dataResponse) {
                    if(dataResponse){

                        // window.location.href = '{{ route('calldemand.list')}}';
                        toastr['success']('Dados atualizados', 'Atualizado com sucesso!', {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: isRtl
                        });

                    }else
                        $("#message-error").css("display","block");
                },
                error: function(responseError){
                    toastr['error']('👋 Ocorreu um erro durante a atualização dos dados.', 'Erro ao atualizar!', {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: isRtl
                    });


                    console.log(responseError);
                    console.log("***********");
                }
            });  

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
                    url: '{{ route('dias.municipio') }}',
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

    let validaTotalDays = (days) => {

        let dateAllocationDumpster  = $("input[name=date_allocation_dumpster]").val();

        if(dateAllocationDumpster !== '' && days.value > 0){
            $("input[name='date_removal_dumpster_forecast']").val(adicionaDiasEmData(days.value));
        }
        else {
            $("input[name='date_removal_dumpster_forecast']").val("");
        }
    };

    let adicionaDiasEmData = (days) => {

        let format_data_alocacao = $('.date_format_allocation_edit').val().split('/');
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

        let isRtl = $('html').attr('data-textdirection') === 'rtl';
        let dumpster_number  = $("#dumpster_total_opened").val();
        let dumpster_number_substitute  = $("#dumpster_number_substitute").val();
        let landfill  = $("#landfill").val();
        let driver    = $("#driver").val();

        if(dumpster_number_substitute !== undefined && landfill == '')
        {
            toastr['warning']('👋 Aterro não selecionado.', 'Selecione o Aterro!', {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
            });
        
            return false;
        }else if($("#driver").val() == ''){
            toastr['warning']('👋 Motorista não foi selecionado.', 'Selecione o motorista!', {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
            });

            return false;
        
        }else if(dumpster_number === "" || dumpster_number === "0"){

            toastr['warning']('👋 Preencha o númeero da caçamba.', 'Número da caçamba não preenchida!', {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
            });
        }else if(dumpster_number_substitute !== undefined && dumpster_number_substitute === "" || dumpster_number_substitute === "0"){

            toastr['warning']('👋 Preencha o númeero da caçamba substituta.', 'Caçamba substituta não preenchida!', {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
            });

            return false;
        }else if(driver === "" || driver === "0"){
            toastr['warning']('👋 Preencha no formulário o nome do motorista.', 'Selecione o motorista!', {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
            });

            return false;            
        }

        let idDemandReg = $('input[name=id_demand_reg]').val();
        let urlFinishDemand = '{{ route('finish.demand') }}';

        // let dataResponseCheckCacamba1 = checkCacambaDisponivel(idDemandReg, dumpster_number);
        // let dataResponseCheckCacamba2 = checkCacambaDisponivel(idDemandReg, dumpster_number_substitute);

        // checa caçamba:
        let checkDumpsterULR = '{{ url('available_dumpster') }}';

        $.get(checkDumpsterULR,{ id_demand_reg: idDemandReg,  dumpsterNumber: dumpster_number } )
        .done(function ( dataResponse1 ){
            let checkCacamba1 =  Boolean(dataResponse1) ;

            if(dumpster_number_substitute !== undefined)
            {
                $.get(checkDumpsterULR,{ id_demand_reg: idDemandReg,  dumpsterNumber: dumpster_number_substitute } )
                .done(function ( dataResponse2 ){            
                    let checkCacamba2 = Boolean(dataResponse2);

                    if(checkCacamba1 == true && checkCacamba2 == true){
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            method: 'POST',
                            url: urlFinishDemand,
                            data: { 
                                id_call_demand_reg: idDemandReg,
                                dumpster_number: dumpster_number,
                                dumpster_number_substitute: dumpster_number_substitute,
                                id_driver: driver,
                                id_landfill: landfill,
                                
                            },
                            success: function(dataResponse) {

                                // window.location.href = '{{ route('calldemand.list')}}';

                                toastr['success']('O pedido foi encerrado', 'Pedido encerrado com sucesso!', {
                                        closeButton: true,
                                        tapToDismiss: false,
                                        rtl: isRtl
                                        });

                                        $('.action-btns').hide();
                                        return false;
                            },
                            error: function(responseError){
                                alert("Erro interno: " + responseError);
                                console.log(responseError);
                                console.log("***********");
                            }
                        }); 
                    }else{
                        alert("Caçamba para troca inválida!");
                        return false;
                    }             
                });
            }else{

                if(checkCacamba1 == true){
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        method: 'POST',
                        url: urlFinishDemand,
                        data: { 
                            id_call_demand_reg: idDemandReg,
                            dumpster_number: dumpster_number,
                            id_driver: driver
                        },
                        success: function(dataResponse) {

                            // window.location.href = '{{ route('calldemand.list')}}';
                            toastr['success']('O pedido foi encerrado', 'Pedido encerrado com sucesso!', {
                                    closeButton: true,
                                    tapToDismiss: false,
                                    rtl: isRtl
                                    });

                                    $('.action-btns').hide();
                                    return false;
                        },
                        error: function(responseError){
                            alert("Erro interno: " + responseError);
                            console.log(responseError);
                            console.log("***********");
                            return false;
                        }
                    }); 
                }else{
                    alert("Caçamba para alocação inválida!");
                    return false;
                }                
            }
        });
    });

    function checkCacambaDisponivel(id_ficha, numeroCacamba){

        let checkDumpsterULR = '{{ url('available_dumpster') }}';

        $.get(checkDumpsterULR,{ id_demand_reg: id_ficha,  dumpsterNumber: numeroCacamba } )
        .done(function ( dataResponse ){
            return Boolean(dataResponse);
        });

    }

</script>