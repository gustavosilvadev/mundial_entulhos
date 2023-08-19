/*=========================================================================================
    File Name: app-todo.js
    Description: app-todo
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

'use strict';

$(function () {
  var taskTitle,
    taskIdDemandReg,
    taskIdClientDemand,
    taskIdDriver,
    taskDataAlocacao,
    flatPickr = $('.task-due-date'),
    newTaskModal = $('.sidebar-todo-modal'),
    newTaskForm = $('#form-modal-todo'),
    favoriteStar = $('.todo-item-favorite'),
    modalTitle = $('.modal-title'),
    addBtn = $('.add-todo-item'),
    addTaskBtn = $('.add-task button'),
    updateTodoItem = $('.update-todo-item'),
    updateBtns = $('.update-btn'),
    taskDesc = $('#task-desc'),
    taskAssignSelect = $('#task-assigned'),
    taskTag = $('#task-tag'),
    overlay = $('.body-content-overlay'),
    menuToggle = $('.menu-toggle'),
    sidebarToggle = $('.sidebar-toggle'),
    sidebarLeft = $('.sidebar-left'),
    sidebarMenuList = $('.sidebar-menu-list'),
    todoFilter = $('#todo-search'),
    sortAsc = $('.sort-asc'),
    sortDesc = $('.sort-desc'),
    todoTaskList = $('.todo-task-list'),
    todoTaskListWrapper = $('.todo-task-list-wrapper'),
    listItemFilter = $('.list-group-filters'),
    noResults = $('.no-results'),
    checkboxId = 100,
    isRtl = $('html').attr('data-textdirection') === 'rtl';

  var assetPath = '../../../app-assets/';
  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
  }

  // if it is not touch device
  if (!$.app.menu.is_touch_device()) {
    if (sidebarMenuList.length > 0) {
      var sidebarListScrollbar = new PerfectScrollbar(sidebarMenuList[0], {
        theme: 'dark'
      });
    }
    if (todoTaskListWrapper.length > 0) {
      var taskListScrollbar = new PerfectScrollbar(todoTaskListWrapper[0], {
        theme: 'dark'
      });
    }
  }
  // if it is a touch device
  else {
    sidebarMenuList.css('overflow', 'scroll');
    todoTaskListWrapper.css('overflow', 'scroll');
  }

  // Add class active on click of sidebar filters list
  if (listItemFilter.length) {
    listItemFilter.find('a').on('click', function () {
      if (listItemFilter.find('a').hasClass('active')) {
        listItemFilter.find('a').removeClass('active');
      }
      $(this).addClass('active');
    });
  }

  // Init D'n'D
  var dndContainer = document.getElementById('todo-task-list');
  if (typeof dndContainer !== undefined && dndContainer !== null) {
    dragula([dndContainer], {
      moves: function (el, container, handle) {
        return handle.classList.contains('drag-icon');
      }
    });
  }

  // Main menu toggle should hide app menu
  if (menuToggle.length) {
    menuToggle.on('click', function (e) {
      sidebarLeft.removeClass('show');
      overlay.removeClass('show');
    });
  }

  // Todo sidebar toggle
  if (sidebarToggle.length) {
    sidebarToggle.on('click', function (e) {
      e.stopPropagation();
      sidebarLeft.toggleClass('show');
      overlay.addClass('show');
    });
  }

  // On Overlay Click
  if (overlay.length) {
    overlay.on('click', function (e) {
      sidebarLeft.removeClass('show');
      overlay.removeClass('show');
      $(newTaskModal).modal('hide');
    });
  }

  // Assign task
  function assignTask(option) {
    if (!option.id) {
      return option.text;
    }
    var $person =
      '<div class="media align-items-center">' +
      '<img class="d-block rounded-circle mr-50" src="' +
      $(option.element).data('img') +
      '" height="26" width="26" alt="' +
      option.text +
      '">' +
      '<div class="media-body"><p class="mb-0">' +
      option.text +
      '</p></div></div>';

    return $person;
  }

  // Task Assign Select2
  if (taskAssignSelect.length) {
    taskAssignSelect.wrap('<div class="position-relative"></div>');
    taskAssignSelect.select2({
      placeholder: 'Unassigned',
      dropdownParent: taskAssignSelect.parent(),
      templateResult: assignTask,
      templateSelection: assignTask,
      escapeMarkup: function (es) {
        return es;
      }
    });
  }

  // Task Tags
  if (taskTag.length) {
    taskTag.wrap('<div class="position-relative"></div>');
    taskTag.select2({
      placeholder: 'Select tag'
    });
  }

  // Favorite star click
  if (favoriteStar.length) {
    $(favoriteStar).on('click', function () {
      $(this).toggleClass('text-warning');
    });
  }

  // Flat Picker
  if (flatPickr.length) {
    flatPickr.flatpickr({
      dateFormat: 'Y-m-d',
      defaultDate: 'today',
      onReady: function (selectedDates, dateStr, instance) {
        if (instance.isMobile) {
          $(instance.mobileInput).attr('step', null);
        }
      }
    });
  }

  // Todo Description Editor
  if (taskDesc.length) {
    var todoDescEditor = new Quill('#task-desc', {
      bounds: '#task-desc',
      modules: {
        formula: true,
        syntax: true,
        toolbar: '.desc-toolbar'
      },
      placeholder: 'Write Your Description',
      theme: 'snow'
    });
  }

  // On add new item button click, clear sidebar-right field fields
  if (addTaskBtn.length) {
    addTaskBtn.on('click', function (e) {
      addBtn.removeClass('d-none');
      updateBtns.addClass('d-none');
      modalTitle.text('Add Task');
      // newTaskModal.modal('show');
      sidebarLeft.removeClass('show');
      overlay.removeClass('show');
      newTaskModal.find('.new-todo-item-title').val('');
      var quill_editor = taskDesc.find('.ql-editor');
      quill_editor[0].innerHTML = '';
    });
  }

  // Add New ToDo List Item

  // To add new todo form
  if (newTaskForm.length) {
    newTaskForm.validate({
      ignore: '.ql-container *', // ? ignoring quill editor icon click, that was creating console error
      rules: {
        todoTitleAdd: {
          required: true
        },
        'task-assigned': {
          required: true
        },
        'task-due-date': {
          required: true
        }
      }
    });

    newTaskForm.on('submit', function (e) {
      e.preventDefault();
      var isValid = newTaskForm.valid();
      if (isValid) {
        checkboxId++;
        var assignedTo = $('#task-assigned').val(),
          todoBadge = '',
          membersImg = {
            'Phill Buffer': assetPath + 'images/portrait/small/avatar-s-3.jpg',
            'Chandler Bing': assetPath + 'images/portrait/small/avatar-s-1.jpg',
            'Ross Geller': assetPath + 'images/portrait/small/avatar-s-4.jpg',
            'Monica Geller': assetPath + 'images/portrait/small/avatar-s-6.jpg',
            'Joey Tribbiani': assetPath + 'images/portrait/small/avatar-s-2.jpg',
            'Rachel Green': assetPath + 'images/portrait/small/avatar-s-11.jpg'
          };

        var todoTitle = $('.sidebar-todo-modal .new-todo-item-title').val();
        var date = $('.sidebar-todo-modal .task-due-date').val(),
          selectedDate = new Date(date),
          month = '',
          day = '',
          todoDate = month + ' ' + day;

        // Badge calculation loop
        var selected = $('.task-tag').val();
        var badgeColor = {
          Team: 'primary',
          Low: 'success',
          Medium: 'warning',
          High: 'danger',
          Update: 'info'
        };
        $.each(selected, function (index, value) {
          todoBadge += '<div class="badge badge-pill badge-light-' + badgeColor[value] + ' mr-50">' + value + '</div>';
        });
        // HTML Output
        if (todoTitle != '') {

        }

        $(newTaskModal).modal('hide');
        overlay.removeClass('show');
      }
    });
  }

  // Task checkbox change
  todoTaskListWrapper.on('change', '.custom-checkbox', function (event) {
    var $this = $(this).find('input');
    if ($this.prop('checked')) {
      $this.closest('.todo-item').addClass('completed');
      toastr['success']('Task Completed', 'Congratulations!! 🎉', {
        closeButton: true,
        tapToDismiss: false,
        rtl: isRtl
      });
    } else {
      $this.closest('.todo-item').removeClass('completed');
    }
  });
  todoTaskListWrapper.on('click', '.custom-checkbox', function (event) {
    event.stopPropagation();
  });

  // To open todo list item modal on click of item
  $(document).on('click', '.todo-task-list-wrapper .todo-item', function (e) {
    newTaskModal.modal('show');
    addBtn.addClass('d-none');
    updateBtns.removeClass('d-none');
    if ($(this).hasClass('completed')) {
      modalTitle.html(
        '<button type="button" class="btn btn-sm btn-outline-success complete-todo-item waves-effect waves-float waves-light" data-dismiss="modal">Completed</button>'
      );
    } else {
 
    }



// Endereço da demanda
    taskTitle   = $(this).find('.todo-title-address');
    var $title  = $(this).find('.todo-title-address').html().trim();
    let addressFrom = "Rua Alberto Correia Francfort, 211 - Jardim Vista Alegre";
    let addressItem  = $title.split('-');

// Waze

    let $address_to = $title;
    newTaskForm.find('.todo-item-address-waze').attr("href", "https://www.waze.com/ul?q=" + $address_to);
    newTaskForm.find('.todo-item-address-waze').attr("target", "_blank");;
    newTaskForm.find('.todo-item-address-waze').text('Abrir Waze');

// Google maps 
    newTaskForm.find('.todo-item-address-google-maps').attr("href", "https://www.google.com/maps/dir/" + addressFrom + "/" + $address_to);
    newTaskForm.find('.todo-item-address-google-maps').attr("target", "_blank");;
    newTaskForm.find('.todo-item-address-google-maps').text('Abrir Google Maps');



  

    taskIdClientDemand   = $(this).find('.todo-id-client-demand');
    taskIdDriver   = $(this).find('.todo-id-driver');
    taskDataAlocacao   = $(this).find('.todo-data-alocacao');
  
    let $id_cliente_chamado    = taskIdClientDemand.html();
    let $id_motorista  = taskIdDriver.html();
    let $data_alocacao = taskDataAlocacao.html();
    let rota_detalhes_pedido   = $(this).find('.todo-url-show-details_demand');    
    let listlandfill           = $(this).find('.todo-url-list-landfill');
    let checkDumpsterULR       = $(this).find('.todo-url-check-dumpster');
    

    $("#body_modal").empty();
    $("#atividade_input").empty();
    
    
    $("#body_modal").append('<div class="action-tags" id="atividade_input"></div>');

    let quantidadeAlocacao = 0;
    let quantidadeTroca    = 0;
    let quantidadeRetirada = 0;
    let contadorItemsPorAtividade = 0;

    $.get(rota_detalhes_pedido.text(),{ id_cliente_chamado: $id_cliente_chamado,  idmotorista: $id_motorista , dataalocacao: $data_alocacao} )
    .done(function ( dataResponse ){

      let tipo_atividade = '';
      quantidadeAlocacao = dataResponse.filter((obj) => obj.colocacao === 1).length;
      quantidadeTroca    = dataResponse.filter((obj) => obj.troca === 1).length;
      quantidadeRetirada = dataResponse.filter((obj) => obj.remocao === 1).length;
      


      $("#nome_cliente").text(dataResponse[0].nome_cliente);
      let totalAtividade = 0;
      let arr_colocacao = [];
      let arr_troca = [];
      let arr_retirada = [];

      $.each(dataResponse, function(kItem, item) {
        if(item.colocacao == true){ arr_colocacao.push(item); }
        if(item.troca == true){ arr_troca.push(item); }
        if(item.remocao == true){ arr_retirada.push(item); }
      });

      let cacamba1   = '';
      let cacamba2   = '';

      // COLOCAÇÃO
      if(arr_colocacao.length > 0)
      {

        $("#atividade_input").append('<div class="form-group p-1 mb-1 bg-secondary text-white">COLOCAÇÃO</div>');
        // let contagem = 0;
        // let id_pedidos_arr = [];
        $.each(arr_colocacao, function(key, item) {

          $("#atividade_input").append('<div class="form-group row" id="form_group_one"></div>');
          
          let disabled = '';
          if(item.status_atendimento == 5 ){
            disabled = 'disabled';
          }

          cacamba1 =   '<div class="col-6">' +
          '<label for="task-due-date" class="form-label ">CAÇAMBA(COLOCAÇÃO)</label>' +
          '<input class="form-control col-6 mb-1" id="cacamba_'+ item.id_ficha +'" type="text" value="' + item.numero_cacamba + '" ' + disabled + '/>' +
          '</div>';

          // $("#atividade_input").append('<div class="form-group position-relative"></div>');
          $("#atividade_input").append('<br />');
          $("#form_group_one").append(cacamba1);
          
            // BOTÕES FOOTER

            if(item.status_atendimento == 0 ){
              
              let btn_encerrar = $('<button/>',
              {
                  text: 'ATENDER',
                  class: 'btn btn-success update-btn my-2',
                  click: function () { 

                      // METODO INCIAR ATENDIMENTO - BEGIN
                      let dataForm = $('#form-modal-todo');
                      let dataInfo = dataForm.serializeArray();
                      let dumpsterNumbers = $('#cacamba_' + item.id_ficha).val();
                      let dumpsterNumberSub = $('#cacamba_sub_' + item.id_ficha).val();
                      let typeService = "";
                      let idDemandReg   = 0;
                      let idDemand   = 0;
                      let idLandfill = 0;
                      let stopExec   = false; 
                      let serviceStatus = 0; 
                      let status_do_servico = 5;

                      idDemandReg   = item.id_ficha;
                      idDemand      = item.id_chamado;
                      typeService   = item.tipo_servico;
                      idLandfill    = item.id_aterro;
                      
                      if(dumpsterNumbers == undefined || dumpsterNumbers == '' || dumpsterNumbers == 0){
                        alert("Preencha o número da caçamba!");
                        stopExec = true;
                        return false;
                      }

                      if(stopExec == false){

                        $.get(checkDumpsterULR.text(),{ id_demand_reg: idDemand,  dumpsterNumber: dumpsterNumbers } )
                        .done(function ( dataResponse ){

                          if(dataResponse == true){

                            $.ajax({
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                method: 'POST',
                                url: 'start_demand',
                                data: {
                                    type_service: typeService, 
                                    id_demand_reg: idDemandReg,
                                    id_demand: idDemand,
                                    id_landfill: idLandfill,
                                    dumpster_numbers: dumpsterNumbers,
                                    dumpster_number_sub : dumpsterNumberSub,
                                    service_status  : status_do_servico
                                },
                                success: function(dataResponse) {

                                  if(dataResponse.status == false && dataResponse.message)
                                  {
                                    alert(dataResponse.message);
                                  }
                                  
                                  if(dataResponse == true)
                                      location.reload();

                                },
                                error: function(responseError){
                                    console.log(responseError);
                                }
                            });

                          }else{
                            alert('Caçamba Indisponível no momento!');

                          }
                  
                        });   


                      }else{
                          alert('Preencha todos os campos!');
                      }    
                      // METODO INCIAR ATENDIMENTO - END                
                  }
              });

              $("#form_group_one").append(btn_encerrar);
            }else if(item.status_atendimento == 5){
              let btn_executa = '<div class="alert alert-success mb-2 col-12" role="alert">PEDIDO CONCLUÍDO</div>';
              $("#form_group_one").append(btn_executa);

            }
            $("#form_group_one").append('<hr class="mb-2 col-12" style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0, 0, 0, 0.1);"/>');
            // BOTÕES FOOTER
        });
      }

      // TROCA
      if(arr_troca.length > 0){
        $("#atividade_input").append('<div class="form-group p-1 mb-1 bg-secondary text-white">TROCA</div>');

        $.each(arr_troca, function(key, item) {

          $("#atividade_input").append('<div class="form-group row" id="form_group_two"></div>');

          cacamba1 =   '<div class="col-4">' +
          '<label for="task-due-date" class="form-label ">CAÇAMBA</label>' +
          '<input class="form-control" id="cacamba_'+ item.id_ficha +'" type="text" value="' + item.numero_cacamba + '" disabled>' +
          '</div> ==> ';

          let disabled = '';
          if(item.status_atendimento == 5){
            disabled = 'disabled';
          }

          cacamba2 = '<div class="col-4">'+
              '<label for="task-due-date" class="form-label ">TROCA</label>'+
              '<input class="form-control" id="cacamba_sub_'+ item.id_ficha +'" type="text" value="' + item.numero_cacamba_substituto + '" ' + disabled + '/>' + 
              '</div>';


          $("#form_group_two").append(cacamba1);
          $("#form_group_two").append(cacamba2);
          
          // SELECIONAR ATERRO BEGIN
            $("#form_group_two").append('<div class="col-12"><strong>Aterro: </strong> <select class="select2 form-control edit-landfill-list" id="landfill_' + item.id_ficha +'" name="landfill"></div>');
            $('#landfill_' + item.id_ficha).append('<option value="0">Selecione o aterro</option>');

            $.get(listlandfill.text(),{ id_demand_reg: item.id_ficha})
            .done(function ( dataResponse ){

                $.each(dataResponse, function(key, dataItem){

                  let selectedStatus  = (dataItem.selected == true) ? true : false;


                  $('#landfill_' + item.id_ficha).append($("<option>").attr('value',dataItem.id).attr('selected', selectedStatus).text(dataItem.name));

                });    
            });
          // SELECIONAR ATERRO END
          $("#atividade_input").append('<br />');

            // BOTÕES FOOTER

            if(item.status_atendimento == 0 ){
                  let btn_encerrar = $('<button/>',
                  {
                      text: 'ATENDER',
                      class: 'btn btn-success update-btn my-2 col-12',                  
                      click: function () { 

                          // METODO INCIAR ATENDIMENTO - BEGIN
                          let dataForm = $('#form-modal-todo');
                          let dataInfo = dataForm.serializeArray();
                          let dumpsterNumbers = $('#cacamba_' + item.id_ficha).val();
                          let dumpsterNumberSub = $('#cacamba_sub_' + item.id_ficha).val();
                          let typeService = "";
                          let idDemandReg   = 0;
                          let idDemand   = 0;
                          // let idLandfill = 0;
                          let selectorIdLandfill ='#landfill_' + item.id_ficha; 
                          let idLandfill = getSelectorValue(selectorIdLandfill);

                          let stopExec   = false; 
                          let serviceStatus = 0; 
                          let status_do_servico = 5;

                          idDemandReg   = item.id_ficha;
                          idDemand      = item.id_chamado;
                          typeService   = item.tipo_servico;
                          // idLandfill    = item.id_aterro;
                          

                          if(dumpsterNumbers == undefined || dumpsterNumbers == '' || dumpsterNumbers == 0){
                            alert("Preencha o número da caçamba!");
                            stopExec = true;
                            return false;

                          }

                          // if((item.troca != true || item.remocao != true) && idLandfill == 0)
                          // {
                          //     alert('Selecione o aterro!');
                          //     stopExec = true;
                          // }

                          if(item.troca && dumpsterNumberSub == 0 || dumpsterNumberSub == '' || dumpsterNumberSub == undefined)
                          {
                            alert("Preencha o número da caçamba!");
                            stopExec = true;
                            return false;
                          }  
                          
                          if(idLandfill == undefined || idLandfill == '' || idLandfill == 0){
                            alert("Selecione o ATERRO!");
                            stopExec = true;
                            return false;
                          }                      

                          if(stopExec == false){
                            $.get(checkDumpsterULR.text(),{ id_demand_reg: idDemandReg,  dumpsterNumber: dumpsterNumberSub } )
                            .done(function ( dataResponse ){

                              if(dataResponse == true){
                                $.ajax({
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    method: 'POST',
                                    url: 'start_demand',
                                    data: {
                                        type_service: typeService, 
                                        id_demand_reg: idDemandReg,
                                        id_demand: idDemand,
                                        id_landfill: idLandfill,
                                        dumpster_numbers: dumpsterNumbers,
                                        dumpster_number_sub : dumpsterNumberSub,
                                        service_status  : status_do_servico
                                    },
                                    success: function(dataResponse) {
                                      
                                      if(dataResponse == true)
                                          location.reload();

                                    },
                                    error: function(responseError){
                                        console.log(responseError);
                                    }
                                });
                              }else{
                                alert('Caçamba indisponível no momento!');
                              }
                            });
                          }else{
                              alert('Preencha todos os campos!');
                          }    
                          // METODO INCIAR ATENDIMENTO - END                
                      }
                  });

                  $("#form_group_two").append(btn_encerrar);

            }else if(item.status_atendimento == 5){
              let btn_executa = '<div class="alert alert-success mb-2 col-12" role="alert">PEDIDO CONCLUÍDO</div>';
              $("#form_group_two").append(btn_executa);
            }
            $("#form_group_two").append('<hr class="mb-2 col-12" class="mb-2 col-12" style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0, 0, 0, 0.1);"/>');
            // BOTÕES FOOTER          
        });
      }

      // RETIRADA
      if(arr_retirada.length > 0){
        let contagem = 0;
        let seletorAterro = '';

        $("#atividade_input").append('<div class="form-group p-1 mb-1 bg-secondary text-white">RETIRADA</div>');

        $.each(arr_retirada, function(key, item) {

          $("#atividade_input").append('<div class="form-group row" id="form_group_three"></div>');
          cacamba1 =   '<div class="col-12 mb-1">' +
          '<label for="task-due-date" class="form-label ">CAÇAMBA'+key+'</label>' +
          '<input class="form-control col-2" id="cacamba_'+ item.id_ficha +'" type="text" value="' + item.numero_cacamba + '" disabled>' +
          '</div>';

          $("#form_group_three").append(cacamba1);

          // $("#atividade_input").append('<div class="form-group position-relative"></div>');

          // SELECIONAR ATERRO BEGIN
          $("#form_group_three").append('<div class="col-12 mb-1"><strong>Aterro: </strong> <select class="select2 form-control edit-landfill-list" id="landfill_' + item.id_ficha +'" name="landfill_' + item.id_ficha +'"></div>');
          $('#landfill_' + item.id_ficha).append('<option value="0">Selecione o aterro</option>');
          
          $.get(listlandfill.text(),{ id_demand_reg: item.id_ficha})
          .done(function ( dataResponse ){

            
              $.each(dataResponse, function(key, dataItem){

                let selectedStatus  = (dataItem.selected == true) ? true : false;


                $('#landfill_' + item.id_ficha).append($("<option>").attr('value',dataItem.id).attr('selected', selectedStatus).text(dataItem.name));

              });    
          });
        // SELECIONAR ATERRO END


        // BOTÕES FOOTER
        if(item.status_atendimento == 0 ){

          let btn_encerrar = $('<button/>',
          {
              text: 'ATENDER',
              class: 'btn btn-success update-btn mb-2 col-12',
              click: function () { 

                  // METODO INCIAR ATENDIMENTO - BEGIN
                  let dataForm = $('#form-modal-todo');
                  let dataInfo = dataForm.serializeArray();
                  let dumpsterNumbers = $('#cacamba_' + item.id_ficha).val();
                  let dumpsterNumberSub = $('#cacamba_sub_' + item.id_ficha).val();
                  let typeService = "";
                  let idDemandReg   = 0;
                  let idDemand   = 0;
                  let selectorIdLandfill ='#landfill_' + item.id_ficha; 
                  let idLandfill = getSelectorValue(selectorIdLandfill);


                  let stopExec   = false; 
                  let serviceStatus = 0; 
                  let status_do_servico = 5;

                  idDemandReg   = item.id_ficha;
                  idDemand      = item.id_chamado;
                  typeService   = item.tipo_servico;

                  if(dumpsterNumbers == undefined || dumpsterNumbers == '' || dumpsterNumbers == 0){
                    alert("Preencha o número da caçamba!");
                    stopExec = true;
                    return false;

                  }

                  if(idLandfill == undefined || idLandfill == '' || idLandfill == 0){
                    alert("Selecione o ATERRO!");
                    stopExec = true;
                    return false;
                  }


                  if(stopExec == false){
                    let btn_executa_change = '';
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        method: 'POST',
                        url: 'start_demand',
                        data: {
                            type_service: typeService, 
                            id_demand_reg: idDemandReg,
                            id_demand: idDemand,
                            id_landfill: idLandfill,
                            dumpster_numbers: dumpsterNumbers,
                            dumpster_number_sub : dumpsterNumberSub,
                            service_status  : status_do_servico
                        },
                        success: function(dataResponse) {
                          if(dataResponse == true)
                              location.reload();
                        },
                        error: function(responseError){
                            console.log(responseError);
                        }
                    });

                  }else{
                      alert('Preencha todos os campos!');
                  }    
                  // METODO INCIAR ATENDIMENTO - END                
              }
          });
          $("#form_group_three").append(btn_encerrar);

        }else if(item.status_atendimento == 5){
          let btn_executa = '<div class="alert alert-success mb-2 col-12" role="alert">PEDIDO CONCLUÍDO</div>';
          $("#form_group_three").append(btn_executa);

        }
        $("#form_group_three").append('<hr class="mb-2 col-12" style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0, 0, 0, 0.1);"/>');
        // BOTÕES FOOTER

        $("#atividade_input").append('<br />');

      });
    }
  });
});

  function getSelectorValue(selector){
    let seletorAterro = document.querySelector(selector).value;
    return seletorAterro;
  }

  /*
  async function checkarCacambaDisponivel(urlAvailableDumpster, id_chamado, numeroCacamba){
      
    $.get(urlAvailableDumpster.text(),{ id_demand_reg: id_chamado,  dumpsterNumber: numeroCacamba } )
      .done(await function ( dataResponse ){
        

        console.log("Retorno: " + dataResponse);
        alert('Resposta');
        return dataResponse;

      });
  }
  */

  const checkarCacambaDisponivel = (urlAvailableDumpster, id_chamado, numeroCacamba) => {
    return new Promise(resolve => {
      setTimeout(function() {
        $.get(urlAvailableDumpster.text(),{ id_demand_reg: id_chamado,  dumpsterNumber: numeroCacamba } )
        .done(function ( dataResponse ){
          

          console.log("Retorno: " + dataResponse);
          alert('Resposta');
          return dataResponse;

        });
        resolve(5)
      }, 3000);
    });
  }

});
