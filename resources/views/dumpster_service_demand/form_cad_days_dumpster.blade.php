
@include('partials.header_teste')
@include('partials.nav_teste');



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
                            <h2 class="content-header-title float-left mb-0">DIAS DE ALOCAÇÃO POR MUNICÍPIO</h2>

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
                <section class="horizontal-wizard">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <p>
                                    <code>.Municípios correspondentes ao estado de São Paulo
                                </p>
                                <form class="needs-validation" onsubmit ='return false;' novalidate>
                                    <div class="form-row">
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="type_service">Municípios</label>
                                                <select class="select2 form-control form-control-lg" name="type_service" id="search_days">
                                                    <option value="" selected>----</option>
                                                    <?php if(isset($list_counties)):?>
                                                        <?php  foreach($list_counties as $value): ?>
                                                            <option value="{{$value->id}}">{{$value->name_county}}</option>
                                                        <?php  endforeach; ?>
                                                    <?php  endif; ?>
                                                </select>            
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-4 col-12 mb-3">
                                            <label for="validationTooltip02">Dias</label>
                                            <input type="number" name="dumpster_total" class="form-control" id="days_dumpster_county" value="0" min="0" max="1000" placeholder="0" />
                                            <div class="valid-feedback">Atualizado com sucesso.</div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" id="btn_atualizar">Atualizar</button>

                                </form>
                            </div>
                        </div>
                    </div>                                    

                </section>
            </div>
        {{-- </div> --}}
    </div>
    <!-- END: Content-->


{{-- @include('partials.footer') --}}
@include('partials.footer_teste') 

<script>

    $(document).ready(function(){

        $("#search_days").on('change', function(){
            
            $('.valid-feedback').hide();

            let id_county = $(this).val();

            $.ajax({
                method: 'GET',
                url: '/dias_municipio',
                data: {id : id_county},
                success: function(dataResponse) {
                    $('#days_dumpster_county').val(dataResponse);
                },
                error: function(responseError){
                    alert(responseError);
                }
            });
        });
        
        $('#btn_atualizar').click(function(){
            

            let id_county   = $('#search_days').val();
            let days_county = $('#days_dumpster_county').val();
            $('.valid-feedback').hide();

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'POST',
                url: '/atualiza_dias_cacamba_municipio',
                data: {
                    id : id_county,
                    days : days_county
                },
                success: function(dataResponse) {

                    $('.valid-feedback').show();

                },
                error: function(responseError){
                    alert(responseError);
                }
            });



        });
        

    });


</script>