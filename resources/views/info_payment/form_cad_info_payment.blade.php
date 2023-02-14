
@include('partials.header')
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
                    <!-- Invoice Add Left starts -->
                    <div class="col-xl-9 col-md-8 col-12">
                        <div class="card invoice-preview-card">

                            <section class="app-user-edit">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <!-- Account Tab starts -->
                                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                                <!-- users edit media object start -->
                                                <div class="media mb-2">
                                                    <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">Info</ins> <mark class="bg-dark text-white">Pagamento</mark></h3>    
                                                </div>
                                                <!-- users edit media object ends -->
                                                <!-- users edit account form start -->

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <span class="title">Data início:</span>
                                                            <input type="text" name="date_begin" class="form-control invoice-edit-input date-picker" />
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <span class="title">Data fim:</span>
                                                            <input type="text" name="date_end" class="form-control invoice-edit-input due-date-picker" />
                                                        </div>    
                                                    </div>
{{--                                                     
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="username">Nome do cliente</label>
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
             --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="address">Endereço</label>
                                                            <input type="text" class="form-control" name="address" />
                                                        </div>
                                                    </div>
            
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="number">Número</label>
                                                            <input type="text" class="form-control" name="number" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="zipcode">CEP</label>
                                                            <input type="text" pattern="[0-9]{5}" class="form-control" name="zipcode" />
            
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
            
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="price_unit">Preço por unidade</label>
                                                            <input type="text" class="form-control" name="price_unit" />
                                                        </div>
                                                    </div>
            
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-2">
                                                            <label for="note" class="form-label font-weight-bold">Observação:</label>
                                                            <textarea class="form-control" rows="2" id="note" name="comments"></textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                             
                                                <!-- users edit account form ends -->
                                            </div>
                                            <!-- Account Tab ends -->
                                        </div>
                                    </div>
                                </div>
                            </section>                            
                        </div>
                    </div>
                    <!-- Invoice Add Left ends -->

                    <!-- Invoice Add Right starts -->
                    <div class="col-xl-3 col-md-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <button class="btn btn-success btn-block mb-75" disabled>Salvar</button> --}}
                                <button type="submit" class="btn btn-success btn-block mb-75">Salvar</button>                                
                            </div>
                        </div>
                        <div class="mt-2">
                            <p class="mb-50">Tipo de serviço</p>
                            <select class="form-control" name="type_service">
                                <option value="" selected>----</option>
                                <option value="COLOCACAO">COLOCAÇÃO</option>
                                <option value="TROCA">TROCA</option>
                            </select>
                        </div>
                    </div>
                    <!-- Invoice Add Right ends -->
                </div>
            </form>
                <!-- Add New Customer Sidebar -->
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
                <!-- /Add New Customer Sidebar -->
            </section>

        </div>
    </div>
</div>




@include('partials.footer')

<script>

    $(document).ready(function(){
        $("#form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            }
        });

        $("#email").blur(function(){

            let email = $(this).val();

            $.ajax({
                'url': 'gera_login?email='+email,
                'type': 'GET',
                'data': {},

                success: function(response){
                    $('input[name=login]').val(response);

                },
                error: function(response){
                    alert('Error'+ Object.value(response));
                }
            });
        });
    });

</script>