var formData = new FormData();
$(document).ready(function () {

    $('#btnSave_commonSetting').on('click',function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveCommonsetting();
    });




});


function allData() {
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/commonall",

        success: function(data) {
            $.each(data, function(key, value) {

                data = data + "<tr>"

                data = data + "<td>" + value.district_id  + "</td>"
                data = data + "<td>" + value.district_name + "</td>"

                data = data + "<td>"
                    data = data + "<button type='button' class='btn btn-primary'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>"

                 data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox" class="form-check-input" name="switch_single" required></label>'


                data = data + "</td>"

                data = data + "</tr>"


            })

            $('tbody').html(data);


        }

    });

}
allData();





//........save......

function saveCommonsetting(){

    formData.append('txtDistrict', $('#txtDistrict').val());


    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveDistric',
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
            console.log(response.district_id );
            allData();
            $('#exampleModal').modal('hide');


        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });
}
