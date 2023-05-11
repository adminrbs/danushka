


const DatatableFixedColumns = function () {


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
        $('.datatable-fixed-both').DataTable({
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

            ],
        });


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

    location.href = "/employee?id=" + id + "&action=edit";
}

function view(id) {
    location.href = "/employee?id=" + id + "&action=view";
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
                   "action":'<button class="btn btn-primary" onclick="edit(' + dt[i].employee_id + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>&#160<button class="btn btn-success" onclick="view(' + dt[i].employee_id + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>&#160<button class="btn btn-danger" onclick="deleteEmployee(' + dt[i].employee_id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>',
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
        title: 'Confirm dialog',
        message: 'Are you sure want to delete this record?.',
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-primary'
            },
            cancel: {
                label: 'Cancel',
                className: 'btn-link'
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

}

function deleteEmployee(id) {
    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: '/deleteEmployee/' + id,
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function (data) {

                console.log(data);
                getCustomerDetails();


            }
        });
    }
}



