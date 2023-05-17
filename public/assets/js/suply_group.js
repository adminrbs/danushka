var formData = new FormData();
$(document).ready(function () {


    $('#btnSuplyGroup').on('click', function () {
        $('#btnSupplygroup').show();
        $('#btnUpdateSupplygroup').hide();
        $('#id').val('');
        $("#txtSupplygroup").val('');


    });

    $("#btnCloseupdate").on("click", function(e) {
        // Prevent the default form submission behavior
        e.preventDefault();
        var formData = $("form").serialize();
        $.ajax({
          type: "POST",
          url: '/close',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          data: formData,
          success: function(response) {
            $("#modalSuplyGroup").modal("hide"); // This will close the modal
            var urlWithoutQuery = window.location.href.split('?')[0];
        },
          error: function(xhr, status, error) {

          }
        });
      });



    $('#btnSupplygroup').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveSuplyGroup();
    });

    $('#btnUpdateSupplygroup').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateSuplyGroup();
    });
    $('#btnSupplygroup').show();
    $('#btnUpdateSupplygroup').hide();


});


//...Suply Group Data
function suplyGroupAllData() {

    $.ajax({
        type: "GET",
        url: "/suplyGroupAllData",
        cache: false,
        timeout: 800000,
        beforeSend: function () { },
        success: function (response) {

            var dt = response.data;
            console.log(dt);


            var data = [];
            for (var i = 0; i < dt.length; i++) {

                var isChecked = dt[i].status_id ? "checked" : "";

               data.push({

                   "supply_group_id": dt[i].supply_group_id ,
                   "supply_group": dt[i].supply_group,
                   "edit":'<button class="btn btn-primary suplyGroup" data-bs-toggle="modal" data-bs-target="#modalSuplyGroup" id="' + dt[i].supply_group_id  + '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>',
                   "delete":'&#160<button class="btn btn-danger" onclick="btnSuplyGroupDelete(' + dt[i].supply_group_id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>',
                   "status":'<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxSuplyGroup" value="1" onclick="cbxSuplyGroupStatus('+ dt[i].supply_group_id + ')" required '+isChecked+'></lable>',
               });
            }


            var table = $('#suplyGroupTable').DataTable();
                table.clear();
                table.rows.add(data).draw();

        },
        error: function (error) {
            console.log(error);
        },
        complete: function () { }
    })


}

suplyGroupAllData();



//.....suply Group Save.....

function saveSuplyGroup(){

    formData.append('txtSupplygroup', $('#txtSupplygroup').val());

    console.log(formData);
    if (formData.txtSupplygroup == '') {
        //alert('Please enter item category level 1');
        return false;
    }

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveSuplyGroup',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 800000,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        timeout: 800000,
        beforeSend: function () {

        },
        success: function (response) {
            suplyGroupAllData();
            $('#modalSuplyGroup').modal('hide');
            $("#suplyGroupSearch").val('');
           console.log(response);


        },
        error: function (error) {

            console.log(error);

        },
        complete: function () {

        }

    });

}

//edit suply group


$(document).on('click', '.suplyGroup', function(e) {
    e.preventDefault();
    let supply_group_id  = $(this).attr('id');
    $.ajax({
        url: '/suplyGroupEdite/'+supply_group_id,
        method: 'get',
        data: {
            //id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $('#btnSupplygroup').hide();
            $('#btnUpdateSupplygroup').show();


            $('#id').val(response.supply_group_id );
            $("#txtSupplygroup").val(response.supply_group);


        }
    });
});

// suply Group Update

function updateSuplyGroup(){

    var id = $('#id').val();
    formData.append('txtSupplygroup', $('#txtSupplygroup').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/supltGroupUpdate/'+id,
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 800000,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        timeout: 800000,
        beforeSend: function () {

        },
        success: function (response) {

            suplyGroupAllData();
            $('#modalSuplyGroup').modal('hide');
            $('#suplyGroupSearch').val('');

        }, error: function (error) {
            console.log(error);
        }
    });
}


function btnSuplyGroupDelete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deleteSuplygroup/" + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                suplyGroupAllData();
                $('#suplyGroupSearch').val('');

            }
        });

    }
}

// Status Save


function cbxSuplyGroupStatus(supply_group_id) {
    var status = $('#cbxSuplyGroup').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/suplyGroupStatus/'+supply_group_id,
        type: 'POST',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'status': status
        },
        success: function (response) {
         console.log("data save");
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}


///////////////////////////////////////////////////////////////////////



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
                { "data": "supply_group_id"},
                { "data": "supply_group" },
                { "data": "edit" },
                { "data": "delete" },
                { "data": "status" },



            ],"stripeClasses": [ 'odd-row', 'even-row' ],
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

