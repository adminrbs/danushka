
var formData = new FormData();
$(document).ready(function () {

    $('#tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('#btnSave').on('click',function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveEmployee();
    });
//..........update employee.....

$('#btnupdate').on('click',function (e) {
    e.preventDefault();

    // check if the input is valid using a 'valid' property
    if (!$(this).valid) {
        return;
    }

    getEmployeeupdate();
});

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
    formData.append('txtDesignation', $('#txtDesignation').val());
    formData.append('txtRepotno', $('#txtRepotno').val());
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

            } else {
            }

        },
        error: function (error) {
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
            $('#txtDesignation').val(employee.desgination_id);
            $('#txtRepotno').val(employee.report_to);
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
    formData.append('txtDesignation', $('#txtDesignation').val());
    formData.append('txtRepotno', $('#txtRepotno').val());
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

            console.log(data);
        }, error: function (error) {
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
            $('#txtDesignation').val(employee.desgination_id);
            $('#txtRepotno').val(employee.report_to);
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




