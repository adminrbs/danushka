$(document).ready(function () {


    var data = [];
    for (var i = 0; i < 10; i++) {
        var str_id = "'" + i + "'";
        data.push({
            "first_name": 'Tiger',
            "last_name": 'Nixon',
            "position": 'System Architect',
            "office": 'Edinburgh',
            "age": '61',
            "start_date": '2011/04/25',
            "salary": '<span class="badge bg-info bg-opacity-10 text-info">$320,800</span>',
            "extn": '5421',
            "action": '<button class="btn btn-primary" onclick="edit(' + i + ')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>&#160<button class="btn btn-success" onclick="view(' + i + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>&#160<button class="btn btn-danger" onclick="_delete(' + i + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>',

        });
    }


    //table
    var table = $('#myTable').DataTable();
    table.clear();
    table.rows.add(data).draw();

});



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
                targets: [5]
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
                    targets: 5
                },
                {
                    width: 200,
                    targets: 0
                },
                {
                    width: 100,
                    targets: 1
                },
                {
                    width: 200,
                    targets: [5, 6]
                },
                {
                    width: 100,
                    targets: 4
                }
            ],
            scrollX: true,
            scrollY: 350,
            scrollCollapse: true,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            },
            "pageLength": 100,
            "order": [],
            "columns": [
                { "data": "first_name" },
                { "data": "last_name" },
                { "data": "position" },
                { "data": "office" },
                { "data": "age" },
                { "data": "start_date" },
                { "data": "salary" },
                { "data": "extn" },
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


function edit(id){
    alert(id);
}


function view(id){
    alert(id);
}


function _delete(id){
    alert(id);
}
