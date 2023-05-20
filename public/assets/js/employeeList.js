


const DatatableFixedColumns = function () {

    $('#frmEmployee').trigger("reset");
    //
    // Setup module components
    //

    // Basic Datatable examples
    const _componentDatatableFixedColumns = function () {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            columnDefs: [{
                orderable: false,
                width: 100,
                targets: [2]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span class="me-3">Filter:</span> <div class="form-control-feedback form-control-feedback-end flex-fill">_INPUT_<div class="form-control-feedback-icon"><i class="ph-magnifying-glass opacity-50"></i></div></div>',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span class="me-3">Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': document.dir == "rtl" ? '&larr;' : '&rarr;', 'previous': document.dir == "rtl" ? '&rarr;' : '&larr;' }
            }
        });



        // Left and right fixed columns
        var table =  $('.datatable-fixed-both').DataTable({
            columnDefs: [
                {
                    orderable: false,
                    targets: 2
                },
                {
                    width:200,
                    targets: 0
                },
                {
                    width: '100%',
                    targets: 1
                },
                {
                    width: 200,
                    targets: [2]
                },

            ],
            scrollX: true,
            scrollY: 350,
            scrollCollapse: true,
            fixedColumns: {
                leftColumns: 0,
                rightColumns: 1
            },
            "pageLength": 100,
            "order": [],
            "columns": [
                { "data": "employee_id" },
                { "data": "employee_name" },
                { "data": "action" },

            ],"stripeClasses": [ 'odd-row', 'even-row' ],
        });table.column(0).visible(false);


        //
        // Fixed column with complex headers
        //

    };


    //
    // Return objects assigned to module
    //

    return {
        init: function () {
            _componentDatatableFixedColumns();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function () {
    DatatableFixedColumns.init();
});







$(document).ready(function () {
    getCustomerDetails();

});


function edit(id) {

    url= "/employee?id=" + id + "&action=edit";
    window.open(url,"_blank");
}

function view(id) {
   url= "/employee?id=" + id + "&action=view";
     window.open(url,"_blank");
}





function getCustomerDetails() {

    $.ajax({
        type: "GET",
        url: "/getEmployeeDetails",
        cache: false,
        timeout: 800000,
        beforeSend: function () { },
        success: function (response) {
            var dt = response.data;


            var data = [];
            for (var i = 0; i < dt.length; i++) {
               data.push({
                   "employee_id": dt[i].employee_id,
                   "employee_name": dt[i].employee_name,
                   "action":'<button  class="btn btn-primary" onclick="edit(' + dt[i].employee_id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>&#160<button class="btn btn-success" onclick="view(' + dt[i].employee_id + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>&#160<button class="btn btn-danger" onclick="_delete(' + dt[i].employee_id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>',
               });
            }


            var table = $('#employeeListTable').DataTable();
                table.clear();
                table.rows.add(data).draw();

        },
        error: function (error) {
            console.log(error);
        },
        complete: function () { }
    })
}


function _delete(id) {
bootbox.confirm({
    title: 'Delete confirmation',
    message: '<div class="d-flex justify-content-center align-items-center mb-3"><i class="fa fa-times fa-5x text-danger" ></i></div><div class="d-flex justify-content-center align-items-center "><p class="h2">Are you sure?</p></div>',
    buttons: {
        confirm: {
            label: '<i class="fa fa-check"></i>&nbsp;Yes',
            className: 'btn-Danger'
        },
        cancel: {
            label: '<i class="fa fa-times"></i>&nbsp;No',
            className: 'btn-info'
        }
    },
    callback: function (result) {
       console.log(result);
       if(result){
        deleteEmployee(id);
       }else{

       }
    }
});
$('.bootbox').find('.modal-header').addClass('bg-danger text-white');

}

function deleteEmployee(id) {
    $.ajax({
        type: 'DELETE',
        url: '/deleteEmployee/' + id,
        data: {
            _token: $('input[name=_token]').val()
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {

        },success:function(response){
            console.log(response);
            getCustomerDetails()
            showSuccessMessage('Successfully deleted');
        },error:function(xhr,status,error){
            console.log(xhr.responseText);
        }
    });
}



