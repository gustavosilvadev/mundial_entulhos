
@include('partials.header_teste')
@include('partials.nav_teste');


    <!-- BEGIN: Content-->
        <div class="app-content content-designed">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">QUANTIDADE CAÇAMBAS</h2>

                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">

                <section class="horizontal-wizard">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="needs-validation" onsubmit ='return false;' novalidate>
                                    <div class="form-row">
                                        <div class="col-md-4 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="type_service">Caçambas Disponíveis</label>
                                                    <?php if(isset($number_available)):?>
                                                    <input type="number" name="number_available" class="form-control" id="number_available" value="{{ $number_available }}" min="0"  placeholder="0" />
                                                    <?php  endif; ?>
 
                                            </div>
                                            <div class="form-group">
                                                <label for="type_service">Total</label>
                                                    <?php if(isset($number_total)):?>
                                                    <input type="number" name="number_total" class="form-control" id="number_total" value="{{ $number_total }}" min="0"  placeholder="0" />
                                                    <?php  endif; ?>
 
                                            </div>
                                            <div class="valid-feedback">Atualizado com sucesso!</div>
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

        
        $('#btn_atualizar').click(function(){
            
            let numberAvailable = $('#number_available').val();
            let numberTotal = $('#number_total').val();

            $('.valid-feedback').hide();

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'POST',
                url: 'change_dumpster_number',
                data: {
                    number_available : numberAvailable,
                    number_total : numberTotal
                },
                success: function(dataResponse) {
                    
                    if(dataResponse == true){
                        $('.valid-feedback').show();
                    }
                },
                error: function(responseError){
                    alert(responseError);
                }
            });



        });
        

    });


</script>