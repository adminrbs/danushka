var formData = new FormData();
$(document).ready(function () {

    $('#empshow').hide();
    if ($('#cmbuserTypeRole').val() === '1') {
        $('#empshow').show();
    }

    // Listen for changes on the "User Type" dropdown
    $('#cmbuserTypeRole').change(function() {
        if ($(this).val() === '1') {
            $('#empshow').show();
        } else {
            $('#empshow').hide();
        }
    });

    $(".select2").select2({
        dropdownParent: $("#userform")

    });


    $('#btnusersave').on('click', function (e) {

        e.preventDefault();


        formData.append('txtname', $('#txtname').val());
        formData.append('txtEmail', $('#txtEmail').val());
        formData.append('txtPassword', $('#txtPassword').val());
        formData.append('txtConformPassword', $('#txtConformPassword').val());
        formData.append('cmbuserRole', $('#cmbuserRole').val());
        formData.append('cmbuserTypeRole', $('#cmbuserTypeRole').val());
        formData.append('cmbuEmployee', $('#cmbuEmployee').val());




        console.log(formData);


        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: '/savenewUser',
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
                resetForm();
                if (response.status) {
                showSuccessMessage('Successfully saved');

               console.log(response);
                }else{
                    showErrorMessage('Something went wrong');

                }

            },
            error: function (error) {
    showErrorMessage('Something went wrong');

                console.log(error);

            },
            complete: function () {

            }

        });

    });

});



//....... user Role Loard



function userRole() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/userrole",

        success: function (data) {


            $.each(data, function (key, value) {

                data = data + "<option  id='' value=" + value.id  + ">" + value.name + "</option>"

            })

            $('#cmbuserRole').html(data);

        }

    });

}
userRole();


//..Empolyeee loard



function employee() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/getemployee",

        success: function (data) {


            $.each(data, function (key, value) {

                data = data + "<option  id='' value=" + value.employee_id   + ">" + value.employee_name + "</option>"

            })

            $('#cmbuEmployee').html(data);

        }

    });

}
employee();


function resetForm() {

    $('#form').trigger('reset');
}
