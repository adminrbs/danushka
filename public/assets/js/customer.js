let dropzoneSingle = undefined;
$(document).ready(function () {
    $('#frmCustomer').trigger("reset");
    $('.select2').select2();

    const bbForm = document.querySelector('#bootbox_form');

    if (bbForm) {
        bbForm.addEventListener('click', function () {

            // create a new form element to hold the Dropzone
            const dropzoneForm = document.createElement('form');
            const dropzoneDiv = document.createElement('div');
            dropzoneDiv.classList.add('dropzone');
            dropzoneDiv.setAttribute('id', 'dropzone_single');
            dropzoneDiv.setAttribute('action', '#');
            dropzoneForm.appendChild(dropzoneDiv);

            bootbox.dialog({
                title: 'Upload a file.',
                message: '<form action="">' +
                    '<label class="col-md-4 col-form-label">Description</label>' +
                    '<textarea rows="3" class="form-control" style="margin-bottom:5px;"></textarea>' +
                    '<div class="row mb-3">' +
                    '<div class="col-md-8">' +
                    dropzoneForm.innerHTML + // add the Dropzone form element here
                    '</div>' +
                    '</div>' +
                    '</form>',
                buttons: {
                    Upload: {
                        label: 'Upload',
                        className: 'btn-success',
                        callback: function () {
                            // manually process the Dropzone queue
                            dropzoneSingle.processQueue();
                            return false;
                        }
                    },
                    Cancel: {
                        label: 'Cancel',
                        className: 'btn-danger',
                        callback: function () {
                            // remove any uploaded files
                            dropzoneSingle.removeAllFiles(true);
                            return true;
                        }
                    }
                }
            });

            // initialize the Dropzone after the modal has been created
            dropzoneSingle = new Dropzone("#dropzone_single", {
                /* url: "/path/to/upload_script", */
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 1, // MB
                maxFiles: 1,
                dictDefaultMessage: 'Drop file to upload <span>or CLICK</span>',
                autoProcessQueue: false,
                addRemoveLinks: true,
                init: function () {
                    this.on('addedfile', function (file) {
                        //formData.append("file", file);
                        if (this.fileTracker) {
                            this.removeFile(this.fileTracker);
                        }
                        this.fileTracker = file;
                    });
                    this.on("success", function (file, responseText) {
                        console.log(responseText); // console should show the ID you pointed to
                    });
                    this.on("complete", function (file) {

                        this.removeAllFiles(true);
                        console.log(file);
                    });
                }
            });

        });
    }




    $('#btnSave').on('click', function (event) {

    });
    $('#frmCustomer').submit(function (e) {
        e.preventDefault();
        dropzoneSingle.processQueue();
    });

    // reset form
    $('#btnReset').on('click', function () {
        $('.validation-invalid-label').empty();
        $('#frmCustomer').trigger('reset');
    });

    $('#tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });


    addContactRow(0123);
    addDelivaerypointRow(0321);


});


//add contact row
function addContactRow(id) {

    $('#' + id).text("Remove");
    $('#' + id).attr('class', 'btn btn-danger remove');
    $('#' + id).attr('onclick', '');

    var btn_id = guidGenerator();
    var string_id = "'" + btn_id + "'";
    var newRow = '<tr id="' + id + '">' +
        '<td><input type="text" style=" width: 200px;" class="form-control form-control-sm validate" required></td>' +
        '<td><input type="text" style="width:200px" class="form-control form-control-sm validate" required></td>' +
        '<td><input type="tel" style="width:200px" class="form-control form-control-sm validate" name="numbers"></td>' +
        '<td><input type="tel" style="width:100px" class="form-control form-control-sm validate" name="numbers"></td>' +
        '<td><input type="email" style="width:200px" class="form-control form-control-sm validate" required></td>' +
        '<td><button id="' + btn_id + '" type="button" class="btn btn-success" id="addRowBtn" onclick="addContactRow(' + string_id + ')">Add</button></td></tr>';

    $('#customer_contact tbody').append(newRow);

    $(".remove").click(function () {
        $(this).closest("tr").remove();
    });

}


//add delivery point row
function addDelivaerypointRow(id) {

    $('#' + id).text("Remove");
    $('#' + id).attr('class', 'btn btn-danger remove');
    $('#' + id).attr('onclick', '');

    var btn_id = guidGenerator();
    var string_id = "'" + btn_id + "'";
    var newDeliverpointRow = '<tr id="' + id + '">' +
        '<td><input type="text" style=" width: 200px;" class="form-control form-control-sm validate" required></td>' +
        '<td><textarea rows="3" style="width: 200px;" class="form-control" required></textarea></td>' +
        '<td><input type="tel" style=" width: 100px;" class="form-control form-control-sm validate" name="numbers"></td>' +
        '<td><input type="tel" style=" width: 100px;" class="form-control form-control-sm validate" name="numbers">' +
        '<td><textarea rows="3" style="width: 200px;" class="form-control" required></textarea></td></td>' +
        '<td><input type="text" style=" width: 200px;" class="form-control form-control-sm validate" required></td>' +
        '<td><button id="' + btn_id + '" type="button" class="btn btn-success" id="addDeliverypointbtn" onclick="addDelivaerypointRow(' + string_id + ')">Add</button></td></tr>';

    $('#customer_delivery_points tbody').append(newDeliverpointRow);

    $(".remove").click(function () {
        $(this).closest("tr").remove();
    });

}







function guidGenerator() {
    var S4 = function () {
        return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
    };
    return (S4() + S4());
}






/* function saveCustomer() {
    //$("#form").submit();
    $.ajax({
        type: "POST",
        url: '/CustomerController/saveCustomer',
        data: {
            'customer_id': $('#customer_id').val(),
            'customer_name': $('#customer_name').val(),
            'credit_limit': $('#credit_limit').val(),
            'customer_address': $('#customer_address').val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        timeout: 800000,
        beforeSend: function () {
            $("#form").submit();
        },
        success: function (response) {
            console.log(response);
            if (response.ValidationException) validate(response.ValidationException);

            if (response.status) {
                $('#form').trigger('reset');
                $("div.alert-success").show();
            } else {
                $("div.alert-danger").show();
            }

        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });
}
 */

function addCustomer() {
    var formData = $('#frmCustomer').serialize();
    $.ajax({
        url: '/CustomerController/saveCustomer',
        method: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            console.log(response);
            $('#frmCustomer')[0].reset();
        }, error: function (data) {
            console.log(data)
        }
    });


}



function validate(ValidationException) {
    $('.error_validation').empty();
    if (ValidationException) {
        $('#error_validation_' + ValidationException.id).html(ValidationException.message);
    }


}

