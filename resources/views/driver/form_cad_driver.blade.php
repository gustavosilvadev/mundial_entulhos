
{{-- 
@include('partials.header')
@include('partials.nav') 
--}}

@include('partials.header_teste')
@include('partials.nav_teste');
 
    <!-- BEGIN: Content-->
        <div class="app-content content-designed">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">CADASTRO DE MOTORISTA</h2>

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
                    <section class="app-user-edit">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Account Tab starts -->
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->
                                        <div class="media mb-2">
                                            {{-- <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">CADASTRO</ins> <mark class="bg-dark text-white">MOTORISTA!</mark></h3>     --}}
                                        </div>
                                        <!-- users edit media object ends -->
                                        <!-- users edit account form start -->
                                        <form action="save_driver" method= "POST" id="form" class="form-validate">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="username">Nome do Funcionário</label>
                                                        <select class="select2 form-control form-control-lg" name="employee">
                                                            <option value="">----</option>
                                                            <?php foreach($employees as $employee):?>
                                                                <?php if($employee->id != session('id_user')){ ?>
                                                                    <option value="<?php echo $employee->id; ?>"><?php echo $employee->name; ?></option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                    <button type="submit" class="btn btn-success mb-1 mb-sm-0 mr-0 mr-sm-1">Criar</button>
    
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                    <!-- Account Tab ends -->
                                </div>
                            </div>
                        </div>
                    </section>

                {{-- </section> --}}
            </div>
        {{-- </div> --}}
    </div>
    <!-- END: Content-->


{{-- @include('partials.footer') --}}
@include('partials.footer_teste') 
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