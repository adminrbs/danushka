var formData = new FormData();
$(document).ready(function () {





    $('#btnCustomApp').on('click', function () {
        $('#btncustomeruserApp').show();
        $('#btnUpdatecustomeruserApp').hide();
        $('#passName').html("Password<span class='text-danger'>*</span>");
        $('#id').val('');
        $("#cmbcustomerApp").val('');
        $("#txtEmailcustomer").val('');
        $("#txtMobilphonecustomer").val('');
        $("#txtPasswordcustomer").val('');




    });
    // Default initialization
    //$('.select').select2();
    $(".select").select2({
        dropdownParent: $("#modalCustomerApp")
    });
    // End of Default initialization
    ///////////////////////////close//////////


    // close

    $("#btnCloseCustomerApp").on("click", function (e) {
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
                $("#modalCustomerApp").modal("hide"); // This will close the modal
                var urlWithoutQuery = window.location.href.split('?')[0];
            },
            error: function (xhr, status, error) {

            }
        });
    });

    // Customer user App

    $('#btncustomeruserApp').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveCustomeerUserapp();
    });

    //...Customer user App Update

    $('#btnUpdatecustomeruserApp').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateCustomeerUserapp();
    });

    $('#btncustomeruserApp').show();
    $('#btnUpdatecustomeruserApp').hide();

//search



});




function customeerUserappAllData() {


    $.ajax({
        type: "GET",
        url: "/customeruserApp",
        cache: false,
        timeout: 800000,
        beforeSend: function () { },
        success: function (response) {

            var dt = response.data;


            var data = [];
            for (var i = 0; i < dt.length; i++) {

                var isChecked = dt[i].status_id ? "checked" : "";

               data.push({

                   "customer_app_user_id": dt[i].customer_app_user_id,
                   "customer_id": dt[i].customer_name,
                   "email": dt[i].email,
                   "mobile": dt[i].mobile,
                   "edit":'<button class="btn btn-primary customerEdit" data-bs-toggle="modal" data-bs-target="#modalCustomerApp" id="' + dt[i].customer_app_user_id   + '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>',
                   "delete":'&#160<button class="btn btn-danger" onclick="btnCustommerAppDelete(' + dt[i].customer_app_user_id  + ')"><i class="fa fa-trash" aria-hidden="true"></i></button>',
                   "status":'<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCustomerApp" value="1" onclick="cbxCustomerappStatus('+ dt[i].customer_app_user_id  + ')" required '+isChecked+'></lable>',
               });
            }


            var table = $('#customerAppTable').DataTable();
                table.clear();
                table.rows.add(data).draw();

        },
        error: function (error) {
            console.log(error);
        },
        complete: function () { }
    })

}

customeerUserappAllData();



//.....saveCategoryLevel2 Save.....

function saveCustomeerUserapp() {
    formData.append('cmbcustomerApp', $('#cmbcustomerApp').val());
    formData.append('txtEmailcustomer', $('#txtEmailcustomer').val());
    formData.append('txtMobilphonecustomer', $('#txtMobilphonecustomer').val());
    formData.append('txtPasswordcustomer', $('#txtPasswordcustomer').val());



    if (formData.txtEmailcustomer == '' && formData.txtMobilphonecustomer == '' && formData.txtPasswordcustomer == '') {
        //alert('Please enter item category level 1');
        return false;
    }

    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveCustomeerUserapp',
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
            customeerUserappAllData();
            $('#modalCustomerApp').modal('hide');
            $('#customerAppSearch').val('');
            console.log(response);


        },
        error: function (error) {
            $('.category2').text('This field is required.');
            console.log(error);



        },
        complete: function () {

        }

    });

}


//.......edit......

$(document).on('click', '.customerEdit', function (e) {

    e.preventDefault();
    let customer_app_user_id = $(this).attr('id');
    $.ajax({
        url: '/customerEdit/'+ customer_app_user_id,
        method: 'get',
        data: {
            //id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {

            $('#btncustomeruserApp').hide();
            $('#btnUpdatecustomeruserApp').show();


            $('#id').val(response.customer_app_user_id);
            $("#cmbcustomerApp").val(response.customer_id).trigger('change');
            $("#txtEmailcustomer").val(response.email);
            $("#txtMobilphonecustomer").val(response.mobile);
            $("#txtPasswordcustomer").val("");
            $('#passName').html("Update Password");



        }
    });
});


//....lavel2 Update


function updateCustomeerUserapp() {

    var id = $('#id').val();
    formData.append('cmbcustomerApp', $('#cmbcustomerApp').val());
    formData.append('txtEmailcustomer', $('#txtEmailcustomer').val());
    formData.append('txtMobilphonecustomer', $('#txtMobilphonecustomer').val());
    formData.append('txtPasswordcustomer', $('#txtPasswordcustomer').val());


    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/customerAppUpdate/'+ id,
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
            console.log(response);

            customeerUserappAllData();
            $('#modalCustomerApp').modal('hide');
            $('#customerAppSearch').val('');



        }, error: function (error) {
            console.log(error);
        }
    });
}



function btnCustommerAppDelete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deletecustomerApp/" + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                customeerUserappAllData();
                $('#customerAppSearch').val('');


            }
        });

    }
}



function cbxCustomerappStatus(customer_app_user_id) {
    var status = $('#cbxCustomerApp').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/customerAppStatus/'+customer_app_user_id,
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




function customeername() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/customername",

        success: function (data) {

            $.each(data, function (key, value) {

                var isChecked = "";
                if (value.status_id) {
                    isChecked = "checked";
                }


                data = data + "<option id='' value="+ value.customer_id  + ">" + value.customer_name + "</option>"


            })

            $('#cmbcustomerApp').html(data);

        }

    });

}
customeername();





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
                    targets: 2,

                },
                {
                    width:200,
                    targets: 0,

                },
                {
                    width: '100%',
                    targets: 1,


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
                { "data": "customer_app_user_id"},
                { "data": "customer_id" },
                { "data": "email" },
                { "data": "mobile" },
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
//.............................Auto Complete.............
