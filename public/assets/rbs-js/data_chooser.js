const DataChooser = function () {

    var inputFiled = undefined;

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
                    width: '100%',
                    targets: 0
                },
                {
                    width: '100%',
                    targets: 1
                },
                {
                    width: 80,
                    targets: [2]
                },

            ],
            scrollX: false,
            scrollY: 350,
            scrollCollapse: true,
            autoWidth: true,
            fixedColumns: {
                leftColumns: 0,
                rightColumns: 1
            },
            "pageLength": 100,
            "order": [],
            "columns": [
                { "data": "id", "width": "25px" },
                { "data": "value", "width": "100%" },
                { "data": "action", "width": "90px" },


            ],
            "drawCallback": function () {
                $(this.api().table().header()).hide();
            },
            "columnDefs": [{
                "targets": '_all',
                "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).css('padding', '2px')
                }
            }]
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
        },

        setDataSourse: function (data) {
            var collection = [];
            for (var i = 0; i < data.length; i++) {
                var str_hidden_id = "'" + data[i].hidden_id + "'";
                var str_id = "'" + data[i].id + "'";
                var str_value = "'" + data[i].value + "'";
                collection.push({
                    "id": '<label>' + data[i].id + '</label>',
                    "value": data[i].value,
                    "action": '<button type="button" class="btn btn-primary" style="float: right;" onclick="DataChooser.setValue(' + str_hidden_id + ',' + str_id + ',' + str_value + ')">Select</button>'
                });
            }
            var table = $('#data-chooser-modal-tbl').DataTable();
            table.clear();
            table.rows.add(collection).draw();
        },

        showChooser: function (input) {
            DataChooser.inputFiled = $(input);
            $('#data-chooser-modal').modal('show');
            $('.dataTables_length').remove();
            $(window).on('shown.bs.modal', function () {
                $("input[type=search]").val($(input).val());
                $("input[type=search]").focus();
            });

            $('.dataTables_filter input[type="search"]').css(
                { 'width': '480px', 'display': 'inline-block' }
            );
        },

        setTitle: function (title) {
            $('#data-chooser-modalLabel').text(title);
        },

        setValue: function (hidden_id, id, value) {
            if (DataChooser.inputFiled != undefined) {
                DataChooser.inputFiled.val(value);
                DataChooser.inputFiled.attr('data-id', hidden_id);
                $('#data-chooser-modal').modal('hide');
                DataChooser.inputFiled.focus();
            }

        }


    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function () {
    DataChooser.init();
});