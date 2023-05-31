var formData = new FormData();
$(document).ready(function () {


    $('#btnsaveChange').on('click', function (e) {
        e.preventDefault();

        updatePassword();
        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

    });


});


function updatePassword() {
    var newPassword = $('#txtnewPassword').val();
    var confirmPassword = $('#txtConformPassword').val();
if(newPassword == confirmPassword){



    formData.append('txtusername', $('#txtusername').val());
    formData.append('txtcurrentPassword', $('#txtcurrentPassword').val());
    formData.append('txtnewPassword', $('#txtnewPassword').val());
    formData.append('txtConformPassword', $('#txtConformPassword').val());



    console.log(formData);



$.ajax({
    type: "POST",
    enctype: 'multipart/form-data',
    url: '/changePassword',
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


        if (response.status) {
            showSuccessMessage('Successfully saved');
            resetForm();


       console.log(response);
        }else{
            showErrorMessage('Password or User Name invalid');


        }

    },
    error: function (error) {
showErrorMessage('Password does not match');

        console.log(error);

    },
    complete: function () {

    }

});

}else{
    showErrorMessage('New Password does not match');
}


}


function resetForm() {

    $('#form').trigger('reset');




}
