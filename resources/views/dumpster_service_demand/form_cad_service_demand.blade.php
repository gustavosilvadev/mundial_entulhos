@include('partials.header')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-add-wrapper">
                <form action="save_dumpster_service_demand" method= "POST" id="form" class="form-validate">
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
                                                        <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">CADASTRO</ins> <mark class="bg-dark text-white">demanda motorista!</mark></h3>    
                                                    </div>
                                                    <!-- users edit media object ends -->
                                                    <!-- users edit account form start -->

                                                    <div class="row">
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="username">Motorista</label>
                                                                <select class="select2 form-control form-control-lg" name="id_driver">
                                                                    <option value="">----</option>
                                                                    <?php if(isset($drivers)):?>
                                                                        <?php foreach($drivers as $driver):?>
                                                                            <option value="<?php echo $driver->id; ?>"><?php echo $driver->name; ?></option>
                                                                        <?php endforeach; ?> 
                                                                    <?php endif; ?>
                                                                </select>
                
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="username">Chamado</label>
                                                                <select class="select2 form-control form-control-lg" name="id_call_demand">
                                                                    <option value="">----</option>
                                                                    <?php if(isset($call_demands)):?>
                                                                        <?php foreach($call_demands as $call_demand):?>
                                                                            {{-- <option value="<?php echo $call_demand->id; ?>"><?php echo $client->created_at.' - '.$call_demand->type_service; ?></option> --}}
                                                                            <option value="<?php echo $call_demand->id; ?>"><?php echo date_format($call_demand->created_at, 'd/m/Y').' - '.$call_demand->type_service.' - '.$call_demand->address.', '.$call_demand->number.' - '.$call_demand->district.', '.$call_demand->city; ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </select>
                
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
                                    <button type="submit" class="btn btn-success btn-block mb-75">Iniciar</button>
                                </div>
                            </div>
                        </div>
                        <!-- Invoice Add Right ends -->
                    </div>
                </form>
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