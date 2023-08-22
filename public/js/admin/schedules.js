(function($){

    "use strict";
  
    //active
    $('#schedules').addClass('active');
   

// define a render function
function myCustomRenderFunctionfrom(data, type, row, meta) {
   if(type === 'display') {
       return row['start']// this is used to display in the table
   } else { 
       return data; // original data of the cell from your source. this is used for functionalities other than display (like sorting, odering)
   }
}
function myCustomRenderFunctionto(data, type, row, meta) {
   if(type === 'display') {
       return row['end'] // this is used to display in the table
   } else { 
       return data; // original data of the cell from your source. this is used for functionalities other than display (like sorting, odering)
   }
}
    //schedules datatable
    var table=$('#schedules_table').DataTable( {
      dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-4'i><'col-sm-8'p>>",
      buttons: [
        {
            extend:    'copyHtml5',
            text:      '<i class="fas fa-copy"></i> '+trans("Copy"),
            titleAttr: 'Copy'
        },
        {
            extend:    'excelHtml5',
            text:      '<i class="fas fa-file-excel"></i> '+trans("Excel"),
            titleAttr: 'Excel'
        },
        {
            extend:    'csvHtml5',
            text:      '<i class="fas fa-file-csv"></i> '+trans("CVS"),
            titleAttr: 'CSV'
        },
        {
            extend:    'pdfHtml5',
            text:      '<i class="fas fa-file-pdf"></i> '+trans("PDF"),
            titleAttr: 'PDF'
        },
        {
          extend:    'colvis',
          text:      '<i class="fas fa-eye"></i>',
          titleAttr: 'PDF'
        }
        
      ],
      "processing": true,
      "serverSide": true,
      "bSort" : false,
      "ajax": {
        url: url("admin/get_schedules")
      },
      // orderCellsTop: true,
      fixedHeader: true,
      "columns": [
         {data:"id"},
         {data:"posted_by"},
         {data:"title"},
         {data:"venue"},
         {
            data: null, 
            render: myCustomRenderFunctionfrom
        },
        {
         data: null, 
         render: myCustomRenderFunctionto
     },
         {data:"roles"},
         {data:"action",searchable:false,orderable:false,sortable:false}//action

         
      ],
      "language": {
        "sEmptyTable":     trans("No data available in table"),
        "sInfo":           trans("Showing")+" _START_ "+trans("to")+" _END_ "+trans("of")+" _TOTAL_ "+trans("records"),
        "sInfoEmpty":      trans("Showing")+" 0 "+trans("to")+" 0 "+trans("of")+" 0 "+trans("records"),
        "sInfoFiltered":   "("+trans("filtered")+" "+trans("from")+" _MAX_ "+trans("total")+" "+trans("records")+")",
        "sInfoPostFix":    "",
        "sInfoThousands":  ",",
        "sLengthMenu":     trans("Show")+" _MENU_ "+trans("records"),
        "sLoadingRecords": trans("Loading..."),
        "sProcessing":     trans("Processing..."),
        "sSearch":         trans("Search")+":",
        "sZeroRecords":    trans("No matching records found"),
        "oPaginate": {
            "sFirst":    trans("First"),
            "sLast":     trans("Last"),
            "sNext":     trans("Next"),
            "sPrevious": trans("Previous")
        },
      }

      
   });
  

 $('#users_roles_link').addClass('active');
    $('#users_roles').addClass('menu-open');
  
   
   //prepare edit user page
   var user_roles=$('#user_roles').val();

   if(user_roles!=null)
   {
       var user_roles= JSON.parse(user_roles);
       var roles=[];
       console.log('yes');
       user_roles.forEach(function(role){
           roles.push(parseInt(role.emp_id));
           
       });
       console.log(roles);

       $('#roles_assign').val(roles).trigger('change');
       
   }

   $('.select2').select2();


   $('#filter_date').on( 'cancel.daterangepicker', function(){
      $(this).val('');
      table.draw();
   });
 
   $('#filter_date').on('apply.daterangepicker',function(){
      table.draw();
   });

   $('.datepickerrange').val('');




   //get office select2 intialize
   $('#office').select2({
      width:"100%",
      placeholder:trans("Office"),
      ajax: {
         beforeSend:function()
         {
            $('.preloader').show();
            $('.loader').show();
         },
         url: ajax_url('get_offices'),
         processResults: function (data) {
               return {
                     results: $.map(data, function (item) {
                        return {
                           text: item.office_desc,
                           id: item.office_id
                        }
                     })
               };
            },
            complete:function()
            {
               $('.preloader').hide();
               $('.loader').hide();
            }
         }
    });




   //get division select2 intialize
   $('#division').select2({
      width:"100%",
      placeholder:trans("Division"),
      ajax: {
         beforeSend:function()
         {
            $('.preloader').show();
            $('.loader').show();
         },
         url: ajax_url('get_divisions'),
         processResults: function (data) {
               return {
                     results: $.map(data, function (item) {
                        return {
                           text: item.acronym,
                           id: item.div_id
                        }
                     })
               };
            },
            complete:function()
            {
               $('.preloader').hide();
               $('.loader').hide();
            }
         }
    });
  
    $(document).on('select2:select','#division', function (e) {
      var el=$(e.target);
      var data = e.params.data;
      $.ajax({
          url:ajax_url('get_sections_by_div'+'?div_id='+ data.id),
          beforeSend:function(){
            $('.preloader').show();
            $('.loader').show();
          },

          success:function(sec)
          {
            $('#sec_id').empty();
            $.each(sec, function(index, item) {
                //alert(item.muncit_desc);
                $('#sec_id').append('<option value="' + item.sec_id + '">' + item.sec_desc + '</option>'); // name refers to the objects value when you do you ->lists('name', 'id') in laravel
            });


          },
          complete:function()
          {
            $('.preloader').hide();
            $('.loader').hide();
          }
      });
    });
  
 

   // $(document).on('select2:select','#position', function (e) {
   //    var el=$(e.target);
   //    var data = e.params.data;
   //    $.ajax({
   //        // url:ajax_url('get_muncits_by_prov'+'?prov_code='+ data.id),
   //        beforeSend:function(){
   //          $('.preloader').show();
   //          $('.loader').show();
   //        },

   //        success:function(nvm_this)
   //        {
   //          $('#roles_assign').prop('disabled', false);
          

   //        },
   //        complete:function()
   //        {
   //          $('.preloader').hide();
   //          $('.loader').hide();
   //        }
   //    });
   //  });

   
    $('#attendee').select2({
      width:"100%",
      placeholder:trans("Attendee"),
      ajax: {
         beforeSend:function()
         {
            $('.preloader').show();
            $('.loader').show();
         },
         url: ajax_url('get_attendees'),
         processResults: function (data) {
               return {
                     results: $.map(data, function (item) {
                        return {
                           text: item.last_name,
                           id: item.emp_id
                        }
                     })
               };
            },
            complete:function()
            {
               $('.preloader').hide();
               $('.loader').hide();
            }
         }
    });

    //get position select2 intialize
    $('#position').select2({
      width:"100%",
      placeholder:trans("Position Status"),
      ajax: {
         beforeSend:function()
         {
            $('.preloader').show();
            $('.loader').show();
         },
         url: ajax_url('get_positions'),
         processResults: function (data) {
               return {
                     results: $.map(data, function (item) {
                        return {
                           text: item.pos_desc,
                           id: item.pos_id
                        }
                     })
               };
            },
            complete:function()
            {
               $('.preloader').hide();
               $('.loader').hide();
            }
         }
    });
 
    $(document).on('select2:select','#position', function (e) {
      var el=$(e.target);
      var data = e.params.data;
      $.ajax({
          url:ajax_url('get_attendees_by_pos'+'?pos_id='+ data.id),
          beforeSend:function(){
            $('.preloader').show();
            $('.loader').show();
          },

          success:function(sec)
          {
            $('#emp_id').empty();
            $.each(sec, function(index, item) {
                //alert(item.muncit_desc);
                $('#emp_id').append('<option value="' + item.emp_id + '">' + item.last_name + '</option>'); // name refers to the objects value when you do you ->lists('name', 'id') in laravel
            });


          },
          complete:function()
          {
            $('.preloader').hide();
            $('.loader').hide();
          }
      });
    });
  
 
    //delete schedule
    $(document).on('click','.delete_schedules',function(e){
        e.preventDefault();
        var el=$(this);
        swal({
          title: trans("Are you sure to delete schedule ?"),
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: trans("Delete"),
          cancelButtonText: trans("Cancel"),
          closeOnConfirm: false
        },
        function(){
          $(el).parent().submit();
        });
    });
  

  })(jQuery);
  
  