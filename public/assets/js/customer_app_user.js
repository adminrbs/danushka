var formData = new FormData();
$(document).ready(function () {
///////////////////////////close//////////

// close

$("#btnCloseCustomerApp").on("click", function(e) {
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
        $("#modalCustomerApp").modal("hide"); // This will close the modal
        var urlWithoutQuery = window.location.href.split('?')[0];
    },
      error: function(xhr, status, error) {

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


});




function customeerUserappAllData() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url:"/customeruserApp",

        success: function (data) {

            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.customer_app_user_id  + "</td>"
                data = data + "<td>" + value.customer_app_user_id + "</td>"
                data = data + "<td>" + value.email + "</td>"
                data = data + "<td>" + value.mobile + "</td>"
                data = data + "<td>" + value.password + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  categorylevel2" id="' + value.customer_app_user_id + '" data-bs-toggle="modal" data-bs-target="#modelcategoryLeve2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="btnCategorylevel2" value="Delete" onclick="btnCategorylevel2Delete(' + value.customer_app_user_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCategorylevel2" value="1" onclick="cbxCategorylevel2Status(' + value.customer_app_user_id + ')" required '+isChecked+'></label>'

                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tableCustomerApp').html(data);

        }

    });

}
customeerUserappAllData();



//.....saveCategoryLevel2 Save.....

function saveCustomeerUserapp(){
    formData.append('cmbcustomerApp', "1");
    formData.append('txtEmailcustomer', $('#txtEmailcustomer').val());
    formData.append('txtMobilphonecustomer', $('#txtMobilphonecustomer').val());
    formData.append('txtPasswordcustomer', $('#txtPasswordcustomer').val());

    if (formData.txtEmailcustomer == '' && formData.txtMobilphonecustomer=='' && formData.txtPasswordcustomer=='') {
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

