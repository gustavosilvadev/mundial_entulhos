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
    taskIdDemand,
    taskTypeService,
    taskNameClient,
    taskDateBegin,
    taskDateStart,
    taskServiceStatus,
    taskDescription,
    taskPhone,
    taskDumpsterQuantity,
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
          // month = new Intl.DateTimeFormat('en', { month: 'short' }).format(selectedDate),
          month = '',
          // day = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(selectedDate),
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
/*
          $(todoTaskList).prepend(
            '<li class="todo-item">' +
              '<div class="todo-title-wrapper">' +
              '<div class="todo-title-area">' +
              feather.icons['more-vertical'].toSvg({ class: 'drag-icon' }) +
              '<div class="title-wrapper">' +
              '<div class="custom-control custom-checkbox">' +
              '<input type="checkbox" class="custom-control-input" id="customCheck' +
              checkboxId +
              '" />' +
              '<label class="custom-control-label" for="customCheck' +
              checkboxId +
              '"></label>' +
              '</div>' +
              '<span class="todo-title">' +
              todoTitle +
              '</span>' +
              '</div>' +
              '</div>' +
              '<div class="todo-item-action">' +
              '<div class="badge-wrapper mr-1">' +
              todoBadge +
              '</div>' +
              '<small class="text-nowrap text-muted mr-1">' +
              todoDate +
              '</small>' +
              '<div class="avatar">' +
              '<img src="' +
              membersImg[assignedTo] +
              '" alt="' +
              assignedTo +
              '" height="28" width="28">' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</li>'
          );
*/
        }
/*        
        toastr['success']('Data Saved', '💾 Task Action!', {
          closeButton: true,
          tapToDismiss: false,
          rtl: isRtl
        });
*/        
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
/*      
      modalTitle.html(
        '<button type="button" class="btn btn-sm btn-outline-secondary complete-todo-item waves-effect waves-float waves-light" data-dismiss="modal">Mark Complete</button>'
      );
*/      
    }
    taskTag.val('').trigger('change');
    var quill_editor = $('#task-desc .ql-editor'); // ? Dummy data as not connected with API or anything else
    quill_editor[0].innerHTML =
      'Chocolate cake topping bonbon jujubes donut sweet wafer. Marzipan gingerbread powder brownie bear claw. Chocolate bonbon sesame snaps jelly caramels oat cake.';

// Endereço da demanda
    taskTitle   = $(this).find('.todo-title-address');
    var $title  = $(this).find('.todo-title-address').html().trim();
    let addressFrom = "Rua Alberto Correia Francfort, 211 - Jardim Vista Alegre";
    let addressItem  = $title.split('-');

    $title = addressItem[0] + ' ' + addressItem[1].trim('') + ' ' + addressItem[4].trim('') + ' ' + addressItem[5].trim('') + ' ' + addressItem[6];
    // newTaskForm.find('.todo-item-title-address').text($title);

// Waze
    let $address_to = addressItem[0] + ' ' + addressItem[1].trim('') + ' ' + addressItem[4].trim('') + ' ' + addressItem[5].trim('') + ' ' + addressItem[6];
    newTaskForm.find('.todo-item-address-waze').attr("href", "https://www.waze.com/ul?q=" + $address_to);
    newTaskForm.find('.todo-item-address-waze').attr("target", "_blank");;
    newTaskForm.find('.todo-item-address-waze').text('Abrir Waze');

// Google maps 
    newTaskForm.find('.todo-item-address-google-maps').attr("href", "https://www.google.com/maps/dir/" + addressFrom + "/" + $address_to);
    newTaskForm.find('.todo-item-address-google-maps').attr("target", "_blank");;
    newTaskForm.find('.todo-item-address-google-maps').text('Abrir Google Maps');


// Data de início do atendimento
    taskDateBegin   = $(this).find('.todo-date-begin');
    var $dateBegin  = taskDateBegin.html();

    taskDateStart   = $(this).find('.todo-date-start');
    var $dateStart  = taskDateStart.text();

    taskServiceStatus   = $(this).find('.todo-service-status');
    var $serviceStatus  = taskServiceStatus.val();

    if($serviceStatus == 0){

      $("#btn_start_call_demand").css("display","block");
      $("#btn_finish_call_demand").css("display","none");

    }else{

      $("#btn_start_call_demand").css("display","none");
      $("#btn_finish_call_demand").css("display","block");


    }

// Data de início do atendimento
    // newTaskForm.find('.todo-item-date-start').text($dateStart);

//Id Demanda
    taskIdDemand   = $(this).find('.todo-id-demand');
    var $idDemand  = taskIdDemand.html();
    newTaskForm.find('.todo-id-demand').val($idDemand);

//Tipo de Serviço
    taskTypeService   = $(this).find('.todo-type-service');
    var $typeService  = taskTypeService.html();
    newTaskForm.find('.todo-type-service').val($typeService);

//Descrição / Observação    
    taskDescription   = $(this).find('.todo-description');
    var $description  = taskDescription.html();
    newTaskForm.find('.todo-item-description').text($description);

 // Nome
    taskNameClient   = $(this).find('.todo-name-client');
    var $nameClient  = taskNameClient.html();
    newTaskForm.find('.todo-name-client').text($nameClient);
 
// Telefone
    taskPhone   = $(this).find('.todo-phone');
    var $phone  = taskPhone.html();
    newTaskForm.find('.todo-phone').text($phone);

// Quantidade de caçambas
    taskDumpsterQuantity  = $(this).find('.todo-dumpster-quantity');
    var $dumpsterQuantity  = taskDumpsterQuantity.html();
    
    newTaskForm.find('.todo-item-dumpster-quantity').text($dumpsterQuantity);
    
    $('#number-dumpster-repeat').empty();
    
    $.get("/show_dumpster_demand",{ id_demand: $idDemand, type_service: $typeService } )
    .done(function ( dataResponse ){
      
      $.each(dataResponse, function(kItem, item){
        let count = kItem + 1;
        newTaskForm.find('#number-dumpster-repeat').append("<div class='row d-flex align-items-end'><div class='col-6'><div class='form-group'><label for='itemname'>Nº " + count + "</label><input type='text' class='form-control dumpster_number' id='"+count+"' value='" + item.dumpster_number + "'/></div></div></div>");
      });
    });
    
/*
    for(let numberId = 0; numberId < $dumpsterQuantity; numberId++){
      newTaskForm.find('#number-dumpster-repeat').append("<div class='row d-flex align-items-end'><div class='col-6'><div class='form-group'><label for='itemname'>Nº " + numberId + "</label><input type='text' class='form-control dumpster_number' id='"+numberId+"'></div></div></div>");
    }
*/

    /*
    let numberDumspterDiv = "";
    for(let i=0; i < $dumpsterQuantity; i++){
      numberDumspterDiv = $('<div class="row d-flex align-items-end"></div>').append();
    }
    newTaskForm.find('.number-dumpster-repeat').append();
    // $('.numeber-dumpster-repeat').
    console.log("Quantidade de caçamba" + $dumpsterQuantity);
    */


    var $type_service = newTaskForm.find('.todo-type-service').val();
    $(taskTypeService).text($type_service);

    
// Carregando lista de aterros
    newTaskForm.find(".edit-landfill-list").empty();

    $.get("/listlandfill",{ id_demand: $idDemand, type_service: $type_service })
    .done(function ( dataResponse ){

      newTaskForm.find(".edit-landfill-list").append('<option value="0">----</option>');

      $.each(dataResponse, function(key, dataItem){
        let selectedStatus  = (dataItem.selected == true) ? 'selected' : '';
        newTaskForm.find(".edit-landfill-list").append('<option value="' + dataItem.id + '"' + selectedStatus + '>' + dataItem.name + '</option>');

      });      
    });

  });

  // Updating Data Values to Fields
  if (updateTodoItem.length) {
    updateTodoItem.on('click', function (e) {
      var isValid = newTaskForm.valid();
      e.preventDefault();
      if (isValid) {
        var $edit_title = newTaskForm.find('.todo-item-title-address').val();
        $(taskTitle).text($edit_title);
        
        var $edit_date_begin = newTaskForm.find('.todo-item-date-begin').val();
        $(taskDateBegin).text($edit_date_begin);


        // var $edit_date_start = newTaskForm.find('.todo-item-date-start').val();
        var $edit_date_start = "";
        $(taskDateStart).text($edit_date_start);        

        var $id_demand = newTaskForm.find('.todo-id-demand').val();
        $(taskIdDemand).text($id_demand);

        // var $type_service = newTaskForm.find('.todo-type-service').val();
        // $(taskTypeService).text($type_service);

        var $edit_description = newTaskForm.find('.todo-item-description').val();
        $(taskDescription).text($edit_description);

        var $edit_name_client = newTaskForm.find('.todo-name-client').val();
        $(taskNameClient).text($edit_name_client);

        var $edit_phone = newTaskForm.find('.todo-phone').val();
        $(taskPhone).text($edit_phone);

        var $edit_dumpster_quantity = newTaskForm.find('.todo-dumpster-quantity').val();
        $(taskDumpsterQuantity).text($edit_dumpster_quantity);
                
        toastr['success']('Data Saved', '💾 Task Action!', {
          closeButton: true,
          tapToDismiss: false,
          rtl: isRtl
        });
        $(newTaskModal).modal('hide');
      }
    });
  }

  // Sort Ascending
  if (sortAsc.length) {
    sortAsc.on('click', function () {
      todoTaskListWrapper
        .find('li')
        .sort(function (a, b) {
          return $(b).find('.todo-title-address').text().toUpperCase() < $(a).find('.todo-title-address').text().toUpperCase() ? 1 : -1;
        })
        .appendTo(todoTaskList);
    });
  }
  // Sort Descending
  if (sortDesc.length) {
    sortDesc.on('click', function () {
      todoTaskListWrapper
        .find('li')
        .sort(function (a, b) {
          return $(b).find('.todo-title-address').text().toUpperCase() > $(a).find('.todo-title-address').text().toUpperCase() ? 1 : -1;
        })
        .appendTo(todoTaskList);
    });
  }

  // Filter task
  if (todoFilter.length) {
    todoFilter.on('keyup', function () {
      var value = $(this).val().toLowerCase();
      if (value !== '') {
        $('.todo-item').filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
        var tbl_row = $('.todo-item:visible').length; //here tbl_test is table name

        //Check if table has row or not
        if (tbl_row == 0) {
          if (!$(noResults).hasClass('show')) {
            $(noResults).addClass('show');
          }
        } else {
          $(noResults).removeClass('show');
        }
      } else {
        // If filter box is empty
        $('.todo-item').show();
        if ($(noResults).hasClass('show')) {
          $(noResults).removeClass('show');
        }
      }
    });
  }

  // For chat sidebar on small screen
  if ($(window).width() > 992) {
    if (overlay.hasClass('show')) {
      overlay.removeClass('show');
    }
  }
});

$(window).on('resize', function () {
  // remove show classes from sidebar and overlay if size is > 992
  if ($(window).width() > 992) {
    if ($('.body-content-overlay').hasClass('show')) {
      $('.sidebar-left').removeClass('show');
      $('.body-content-overlay').removeClass('show');
      $('.sidebar-todo-modal').modal('hide');
    }
  }
});
