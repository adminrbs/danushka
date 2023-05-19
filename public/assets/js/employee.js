
var formData = new FormData();
$(document).ready(function () {
    $('#txtNote').on('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
      });

    $('#tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    /*$('#btnSave').on('click',function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveEmployee();
    });*/
//..........update employee.....

/*$('#btnupdate').on('click',function (e) {
    e.preventDefault();

    // check if the input is valid using a 'valid' property
    if (!$(this).valid) {
        return;
    }

    getEmployeeupdate();
});*/

    $('#btnReset').on('click', function () {
        resetForm();
    });

    //   catch data

    if (window.location.search.length > 0) {
        var sPageURL = window.location.search.substring(1);
        var param = sPageURL.split('?');
        var id = param[0].split('=')[1].split('&')[0];
        action = param[0].split('=')[2].split('&')[0];

        if (action == 'edit') {

            getEmployeedata(id);


        } else if (action == 'view') {
            getEmployeeview(id);


        }


    }

    $('#btnSave').show();
    $('#btnupdate').hide();

    $('#btnSave').on('click', function (event) {
        bootbox.confirm({
            title: 'Save confirmation',
            message: '<div class="d-flex justify-content-center align-items-center mb-3"><i id="question-icon" class="fa fa-question fa-5x text-warning animate-question"></i></div><div class="d-flex justify-content-center align-items-center"><p class="h2">Are you sure?</p></div>',
            buttons: {
                confirm: {
                    label: '<i class="fa fa-check"></i>&nbsp;Yes',
                    className: 'btn-warning'
                },
                cancel: {
                    label: '<i class="fa fa-times"></i>&nbsp;No',
                    className: 'btn-link'
                }
            },
            callback: function (result) {
                console.log(result);
                if (result) {

                        saveEmployee();
                    }
            },
            onShow: function () {
                $('#question-icon').addClass('swipe-question');
            },
            onHide: function () {
                $('#question-icon').removeClass('swipe-question');
            }
        });

        $('.bootbox').find('.modal-header').addClass('bg-warning text-white');



    });


    $('#btnupdate').on('click', function (event) {
        bootbox.confirm({
            title: 'Save confirmation',
            message: '<div class="d-flex justify-content-center align-items-center mb-3"><i id="question-icon" class="fa fa-question fa-5x text-warning animate-question"></i></div><div class="d-flex justify-content-center align-items-center"><p class="h2">Are you sure?</p></div>',
            buttons: {
                confirm: {
                    label: '<i class="fa fa-check"></i>&nbsp;Yes',
                    className: 'btn-warning'
                },
                cancel: {
                    label: '<i class="fa fa-times"></i>&nbsp;No',
                    className: 'btn-link'
                }
            },
            callback: function (result) {
                console.log(result);
                if (result) {

                    getEmployeeupdate();
                    }





            },
            onShow: function () {
                $('#question-icon').addClass('swipe-question');
            },
            onHide: function () {
                $('#question-icon').removeClass('swipe-question');
            }
        });

        $('.bootbox').find('.modal-header').addClass('bg-warning text-white');



    });





});



//........... employee save..........
function saveEmployee() {

    formData.append('txtName', $('#txtName').val());
    formData.append('txtOfficemobileno', $('#txtOfficemobileno').val());
    formData.append('txtOfficeemail', $('#txtOfficeemail').val());
    formData.append('txtPersionalmobile', $('#txtPersionalmobile').val());
    formData.append('txtPersionalfixedno', $('#txtPersionalfixedno').val());
    formData.append('txtPersionalemail', $('#txtPersionalemail').val());
    formData.append('txtAddress', $('#txtAddress').val());
    formData.append('cmbDesgination', $('#cmbDesgination').val());
    formData.append('cmbReport', $('#cmbReport').val());
    formData.append('txtDateofjoined', $('#txtDateofjoined').val());
    formData.append('txtDateofresign', $('#txtDateofresign').val());
    formData.append('cmbStatus', $('#cmbStatus').val());
    formData.append('txtNote', $('#txtNote').val());

    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveEmployee',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 800000,
        async:false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        timeout: 800000,
        beforeSend: function () {

        },
        success: function (response) {
            console.log(response.file);
            if (response.status) {

                resetForm();
                showSuccessMessage('Successfully saved');

            } else {
            }

        },
        error: function (error) {
            showErrorMessage('Something went wrong');
            console.log(error);

        },
        complete: function () {

        }

    });
}

//...........load Data....

function getEmployeedata(id) {

    $.ajax({
        type: "GET",
        url: '/getEmployeedata/' + id,
        processData: false,
        contentType: false,
        cache: false,

        beforeSend: function () {

        },
        success: function (response) {
            $('#btnSave').hide();
            $('#btnupdate').show();
            console.log(response);
            var employee = response.employee;
            $('#id').val(employee.employee_id );
            $('#txtName').val(employee.employee_name);
            $('#txtOfficemobileno').val(employee.office_mobile);
            $('#txtOfficeemail').val(employee.Office_email);
            $('#txtPersionalmobile').val(employee.persional_mobile);
            $('#txtPersionalfixedno').val(employee.persional_fixed);
            $('#txtPersionalemail').val(employee.persional_email);
            $('#txtAddress').val(employee.address);
            $('#cmbDesgination').val(employee.desgination_id);
            $('#cmbReport').val(employee.report_to);
            $('#txtDateofjoined').val(employee.date_of_joined);
            $('#txtDateofresign').val(employee.date_of_resign);
            $('#cmbStatus').val(employee.status_id);
            $('#txtNote').val(employee.note);



        },
        error: function (error) {
            console.log(error);





        },
        complete: function () {

        }

    });
}


//........... employee update..........


function getEmployeeupdate() {
    var id = $('#id').val();
    formData.append('txtName', $('#txtName').val());
    formData.append('txtOfficemobileno', $('#txtOfficemobileno').val());
    formData.append('txtOfficeemail', $('#txtOfficeemail').val());
    formData.append('txtPersionalmobile', $('#txtPersionalmobile').val());
    formData.append('txtPersionalfixedno', $('#txtPersionalfixedno').val());
    formData.append('txtPersionalemail', $('#txtPersionalemail').val());
    formData.append('txtAddress', $('#txtAddress').val());
    formData.append('cmbDesgination', $('#cmbDesgination').val());
    formData.append('cmbReport', $('#cmbReport').val());
    formData.append('txtDateofjoined', $('#txtDateofjoined').val());
    formData.append('txtDateofresign', $('#txtDateofresign').val());
    formData.append('cmbStatus', $('#cmbStatus').val());
    formData.append('txtNote', $('#txtNote').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/Employee/update/'+id,
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

            window.location.href = '/employeeList';
            showSuccessMessage('Updated');

            console.log(data);
        }, error: function (error) {
            showErrorMessage('Error');
            console.log(error);
        }
    });
}

//..........employee view......

function getEmployeeview(id){
    $.ajax({
        type: "GET",
        url: '/getEmployeeview/' + id,
        processData: false,
        contentType: false,
        cache: false,

        beforeSend: function () {

        },
        success: function (response) {
            $('#btnSave').hide();
            $('#btnupdate').hide();
            $('#btnReset').hide();
            console.log(response);
            var employee = response.employee;
            $('#id').val(employee.employee_id );
            $('#txtName').val(employee.employee_name);
            $('#txtOfficemobileno').val(employee.office_mobile);
            $('#txtOfficeemail').val(employee.Office_email);
            $('#txtPersionalmobile').val(employee.persional_mobile);
            $('#txtPersionalfixedno').val(employee.persional_fixed);
            $('#txtPersionalemail').val(employee.persional_email);
            $('#txtAddress').val(employee.address);
            $('#cmbDesgination').val(employee.desgination_id);
            $('#cmbReport').val(employee.report_to);
            $('#txtDateofjoined').val(employee.date_of_joined);
            $('#txtDateofresign').val(employee.date_of_resign);
            $('#cmbStatus').val(employee.status_id);
            $('#txtNote').val(employee.note);

        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });
}

function resetForm() {
    $('.validation-invalid-label').empty();
    $('#frmEmployee').trigger('reset');
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




//..................combo box loard...................

function empdesgnation() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/empdesgnation",

        success: function (data) {


            $.each(data, function (key, value) {

                var isChecked = "";
                if (value.status_id) {
                    isChecked = "checked";
                }


                data = data + "<option id='' value="+ value.employee_designation_id  + ">" + value.employee_designation + "</option>"


            })

            $('#cmbDesgination').html(data);

        }

    });

}
empdesgnation();


function empreport() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/empreport",

        success: function (data) {


            $.each(data, function (key, value) {

                var isChecked = "";
                if (value.status_id) {
                    isChecked = "checked";
                }


                data = data + "<option id='' value="+ value.employee_id    + ">" + value.employee_name + "</option>"


            })

            $('#cmbReport').html(data);

        }

    });

}
empreport();


