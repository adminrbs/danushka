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

    $('#customerAppSearch').on('keyup',function(){
        $value=$(this).val();

        $.ajax({

            type:'get',
            url:'/customerAppSearch',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#tableCustomerApp').empty();
                $('#tableCustomerApp').html(data);
            }
        });
        //alert($value);
    });



});




function customeerUserappAllData() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/customeruserApp",

        success: function (data) {

            $.each(data, function (key, value) {

                var isChecked = "";
                if (value.status_id) {
                    isChecked = "checked";
                }


                data = data + "<tr>"

                data = data + "<td>" + value.customer_app_user_id + "</td>"
                data = data + "<td>" + value.customer_name + "</td>"
                data = data + "<td>" + value.email + "</td>"
                data = data + "<td>" + value.mobile + "</td>"



                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  customerEdit" id="' + value.customer_app_user_id + '" data-bs-toggle="modal" data-bs-target="#modalCustomerApp"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="btncustomerApp" value="Delete" onclick="btnCustommerAppDelete(' + value.customer_app_user_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCustomerApp" value="1" onclick="cbxCustomerappStatus(' + value.customer_app_user_id + ')" required ' + isChecked + '></label>'

                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tableCustomerApp').html(data);

          

        }

    });

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



/*
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


                data = data + "<option id='customeerUserappoption' value="+ value.customer_id  + ">" + value.customer_name + "</option>"


            })

            $('#cmbcustomerApp').html(data);

        }

    });

}
customeername();*/
