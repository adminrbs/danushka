var formData = new FormData();
$(document).ready(function () {


    $('#btnitemaltenativ').on('click', function () {
        $('#btnNonproprietary').show();
        $('#btnUpdateNonproprietary').hide();
        $('#id').val('');
        $("#txtNonproprietary").val('');



    });

    // close

    $("#btnCloseupdate").on("click", function (e) {
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
            success: function (response) {
                $("#modalNonproprietary").modal("hide"); // This will close the modal
                var urlWithoutQuery = window.location.href.split('?')[0];
            },
            error: function (xhr, status, error) {

            }
        });
    });



    $('#btnNonproprietary').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveNonproprietary();
    });

    $('#btnUpdateNonproprietary').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateNonproprietary();
    });
    $('#btnNonproprietary').show();
    $('#btnUpdateNonproprietary').hide();


});



function nonproprietaryAllData() {

    $.ajax({
        type: "GET",
        url: "/nonproprietaryAllData",
        cache: false,
        timeout: 800000,
        beforeSend: function () { },
        success: function (response) {

            var dt = response.data;


            var data = [];
            for (var i = 0; i < dt.length; i++) {

                var isChecked = dt[i].status_id ? "checked" : "";

                data.push({

                    "item_altenative_name_id": dt[i].item_altenative_name_id,
                    "item_altenative_name": dt[i].item_altenative_name,
                    "edit": '<button class="btn btn-primary nonproprietaryupdate" data-bs-toggle="modal" data-bs-target="#modalNonproprietary" id="' + dt[i].item_altenative_name_id + '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>',
                    "delete": '&#160<button class="btn btn-danger" onclick="btnNonproprietaryDelete(' + dt[i].item_altenative_name_id + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>',
                    "status": '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxNonproprietary" value="1" onclick="cbxNonproprietaryStatus(' + dt[i].item_altenative_name_id + ')" required ' + isChecked + '></lable>',
                });
            }


            var table = $('#itemAlternativTable').DataTable();
            table.clear();
            table.rows.add(data).draw();

        },
        error: function (error) {
            console.log(error);
        },
        complete: function () { }
    })
}


nonproprietaryAllData();





//.....Nonproprietary Save.....

function saveNonproprietary() {

    formData.append('txtNonproprietary', $('#txtNonproprietary').val());

    console.log(formData);
    if (formData.txtNonproprietary == '') {
        //alert('Please enter item category level 1');
        return false;
    }

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveNonproprietary',
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
            nonproprietaryAllData();
            $('#modalNonproprietary').modal('hide');
            if (response.status) {
                showSuccessMessage('Successfully saved');
                console.log(response);
            } else {
                showErrorMessage('Something went wrong');
                $('#modalNonproprietary').modal('hide');
            }

        },
        error: function (error) {
            showErrorMessage('Something went wrong');
            $('#modalNonproprietary').modal('hide');
            console.log(error);

        },
        complete: function () {

        }

    });

}

//edit suply group


$(document).on('click', '.nonproprietaryupdate', function (e) {
    e.preventDefault();
    let item_altenative_name_id = $(this).attr('id');
    $.ajax({
        url: '/nonproprietaryEdite/' + item_altenative_name_id,
        method: 'get',
        data: {
            //id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            $('#btnNonproprietary').hide();
            $('#btnUpdateNonproprietary').show();


            $('#id').val(response.item_altenative_name_id);
            $("#txtNonproprietary").val(response.item_altenative_name);


        }
    });
});

// suply Group Update

function updateNonproprietary() {

    var id = $('#id').val();
    formData.append('txtNonproprietary', $('#txtNonproprietary').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/nonproprietaryUpdate/' + id,
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

            nonproprietaryAllData();
            $('#modalNonproprietary').modal('hide');

            showSuccessMessage('Successfully updated');


        }, error: function (error) {
            console.log(error);
            showErrorMessage('Something went wrong');
            $('#modalNonproprietary').modal('hide');
        }
    });
}

// Delete

function btnNonproprietaryDelete(id) {

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
            if (result) {
                deleteItem(id);
            } else {

            }
        }
    });
    $('.bootbox').find('.modal-header').addClass('bg-danger text-white');

}

function deleteItem(id) {

    $.ajax({
        type: 'DELETE',
        url: '/deleteNonproprietary/' + id,
        data: {
            _token: $('input[name=_token]').val()
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {

        }, success: function (response) {
            console.log(response);
            nonproprietaryAllData();

            showSuccessMessage('Successfully deleted');
        }, error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}




// Status Save


function cbxNonproprietaryStatus(item_altenative_name_id) {
    var status = $('#cbxNonproprietary').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/nonproprietaryStatus/' + item_altenative_name_id,
        type: 'POST',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'status': status
        },
        success: function (response) {
            showSuccessMessage('saved');
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
        var table = $('.datatable-fixed-both').DataTable({
            columnDefs: [
                {
                    orderable: false,
                    targets: 2
                },
                {
                    width: 200,
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
                { "data": "item_altenative_name_id" },
                { "data": "item_altenative_name" },
                { "data": "edit" },
                { "data": "delete" },
                { "data": "status" },



            ], "stripeClasses": ['odd-row', 'even-row'],
        }); table.column(0).visible(false);


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

