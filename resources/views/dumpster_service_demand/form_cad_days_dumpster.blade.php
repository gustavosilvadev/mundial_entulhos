

@include('partials.header')
@include('partials.nav')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">

            <div class="row" id="table-responsive ">
                {{-- <div class="col-12" style="margin-top:120px"> --}}
                <div class="col-12">
                    <div class="card">
                        <div class="todo-app-list">
                            <section id="multiple-column-form">
                                <div class="row">
                                 
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="brand-logo display-5" href="/" data-toggle="tooltip" data-placement="top"><ins style="text-color:black">Quantidade de Dias</ins> <mark class="bg-dark text-white">Municipio!</mark></h3>
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    <code>.Municípios correspondentes ao estado de São Paulo
                                                </p>
                                                <form class="needs-validation" novalidate>
                                                    <div class="form-row">
                                                        <div class="col-md-4 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="type_service">Municípios</label>
                                                                <select class="select2 form-control form-control-lg" name="type_service">
                                                                    <option value="" selected>----</option>
                                                                    <option value="COLOCACAO">COLOCAÇÃO</option>
                                                                    <option value="TROCA">TROCA</option>
                                                                    <option value="RETIRADA">RETIRADA</option>
                                                                </select>            
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="col-md-4 col-12 mb-3">
                                                            <label for="validationTooltip02">Quantidade de Dias</label>
                                                            <input type="number" name="dumpster_total" class="form-control" value="0" min="0" max="1000" placeholder="0" />
                                                            <div class="valid-tooltip">Looks good!</div>
                                                            
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-success" type="submit">Atualizar</button>
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

        // ZipCode
        $("#zipcode").change(function(){
            let zipcode = $(this).val().trim().replace("-", "");
            
            let settings = {
            "url": "https://viacep.com.br/ws/" + zipcode.trim() + "/json/",
            "method": "GET",
            "timeout": 0,
            };

            $.ajax(settings).done(function (dataResponse) {

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