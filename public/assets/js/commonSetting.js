var formData = new FormData();
$(document).ready(function () {

    $('#btnSaveDistric').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }
        $('#btnSaveDistric').show();
        $('#btnUpdateDistrict').hide();
        saveDistric();
    });
    $('#btnUpdateDistrict').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateDistrict();
    });




    //...Town


    $('#btnSaveTown').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }
        $('#btnSaveTown').show();
    $('#btnUpdateTown').hide();
        saveTown();
    });

    $('#btnUpdateTown').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateTown();
    });


    //...Group


    $('#btnSaveGroup').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }
        $('#btnSaveGroup').show();
        $('#btnUpdateGroup').hide();

        saveGroup();
    });
    $('#btnUpdateGroup').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateGroup();
    });


    //...Grade


    $('#btnSavegrade').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }
        $('#btnSavegrade').show();
        $('#btnUpdateGrade').hide();
        saveGrade();
    });


    $('#btnUpdateGrade').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateGrade();
    });



    $('#btnSaveDistric').show();
    $('#btnUpdateDistrict').hide();

    $('#btnSaveTown').show();
    $('#btnUpdateTown').hide();

    $('#btnSavegrade').show();
    $('#btnUpdateGrade').hide();

    $('#btnSaveGroup').show();
    $('#btnUpdateGroup').hide();




});

$(document).on('click', '.editDistrict', function (e) {
    e.preventDefault();
    let district_id = $(this).attr('id');
    $.ajax({
        url: '/districtEdite/'+district_id,
        method: 'get',
        data: {
            //district_id: district_id,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            console.log(response);
            $('#btnSaveDistric').hide();
            $('#btnUpdateDistrict').show();
            $('#id').val(response.district_id  );
            $("#txtDistrict").val(response.district_name);

        }
    });
});

function updateDistrict(){
    var id = $('#id').val();
    formData.append('txtDistrict', $('#txtDistrict').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/districtUpdate/'+id,
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

            allData();
            $('#modelDistric').modal('hide');

            console.log(data);
        }, error: function (error) {
            console.log(error);
        }
    });
}


function cbxStatus($district_id) {

    var cbxStatus = $('#cbxStatus').val();

    if (cbxStatus == 1) {
        alert(cbxStatus)
    } else if (cbxStatus == null) {
        alert("cbxStatus")
    }



}


function allData() {
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/districtData",

        success: function (data) {
            $.each(data, function (key, value) {

                data = data + "<tr>"

                data = data + "<td>" + value.district_id + "</td>"
                data = data + "<td>" + value.district_name + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  editDistrict" id="' + value.district_id + '" data-bs-toggle="modal" data-bs-target="#modelDistric"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxStatus" value="1" onclick="cbxStatus(' + value.district_id + ')" required></label>'



                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tableDistrict').html(data);


        }

    });

}
allData();







//........save......

function saveDistric() {

    formData.append('txtDistrict', $('#txtDistrict').val());



    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveDistrict',
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
            console.log(response.district_id);
            allData();
            $('#modelDistric').modal('hide');


        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });

}





//############################.....Town.....#######################################################


/*

function cbxStatus($district_id){

    var cbxStatus = $('#cbxStatus').val();

   if(cbxStatus == 1){
  alert(cbxStatus)
   }else if(cbxStatus == null){
    alert("cbxStatus")
   }



}
*/


function allDataTown() {
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/twonAlldata",

        success: function (data) {
            $.each(data, function (key, value) {

                data = data + "<tr>"

                data = data + "<td>" + value.town_id + "</td>"
                data = data + "<td>" + value.town_name + "</td>"
                data = data + "<td>" + value.district_name + "</td>"

                data = data + "<td>"
                data = data + '<a href="#"  type="button" class="btn btn-primary  editTwon" id="' + value.town_id + '" data-bs-toggle="modal" data-bs-target="#modelTown"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxStatus" value="1" onclick="cbxStatus(' + value.town_id + ')" required></label>'



                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tbodyTown').html(data);


        }

    });

}
allDataTown();

//........save......

function saveTown() {

    formData.append('txtTown', $('#txtTown').val());
    formData.append('cmbDistrict', $('#cmbDistrict').val());



    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveTown',
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
            console.log(response.district_id);
            allDataTown();
            $('#modelTown').modal('hide');


        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });

}
   //.......edit......

   $(document).on('click', '.editTwon', function(e) {
    e.preventDefault();
    let town_id = $(this).attr('id');
    $.ajax({
        url: '/townEdite/'+town_id,
        method: 'get',
        data: {
           // id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $('#btnSaveTown').hide();
            $('#btnUpdateTown').show();

            $('#id').val(response.town_id );
            $("#txtTown").val(response.town_name);
            $("#cmbDistrict").val(response.district_id);

        }
    });
});



function updateTown(){
    var id = $('#id').val();
    formData.append('cmbDistrict', $('#cmbDistrict').val());
    formData.append('txtTown', $('#txtTown').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/townUpdate/'+id,
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

            allDataTown();
            $('#modelTown').modal('hide');

            console.log(data);
        }, error: function (error) {
            console.log(error);
        }
    });
}





//############################...Group.......#######################################################


/*
$(document).on('click', '.editDistrict', function(e) {
    e.preventDefault();
    let district_id = $(this).attr('id');
    $.ajax({
        url: '/districdata',
        method: 'get',
        data: {
            district_id: district_id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
           $("#txtDistrict").val(response.district_name);

        }
    });
});

function cbxStatus($district_id){

    var cbxStatus = $('#cbxStatus').val();

   if(cbxStatus == 1){
  alert(cbxStatus)
   }else if(cbxStatus == null){
    alert("cbxStatus")
   }



}
*/


function allDataGroup() {
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/groupAlldata",

        success: function (data) {
            $.each(data, function (key, value) {

                data = data + "<tr>"

                data = data + "<td>" + value.customer_group_id  + "</td>"
                data = data + "<td>" + value.group + "</td>"

                data = data + "<td>"
                data = data + '<a href="#"  type="button" class="btn btn-primary  editGroup" id="' + value.customer_group_id + '" data-bs-toggle="modal" data-bs-target="#modalGroup"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxStatus" value="1" onclick="cbxStatus(' + value.customer_group_id + ')" required></label>'



                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tbodyGrouo').html(data);


        }

    });

}
allDataGroup();







//........save......

function saveGroup() {

    formData.append('txtGroup', $('#txtGroup').val());




    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveGroup',
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
            console.log(response.district_id);
            allDataGroup();
            $('#modalGroup').modal('hide');


        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });

}
   //.......edit......

   $(document).on('click', '.editGroup', function(e) {
    e.preventDefault();
    let customer_group_id  = $(this).attr('id');

    $.ajax({
        url: '/groupEdite/'+customer_group_id,
        method: 'get',
        data: {
            //id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $('#btnSaveGroup').hide();
            $('#btnUpdateGroup').show();

            $('#id').val(response.customer_group_id);
            $("#txtGroup").val(response.group);

        }
    });
});

function updateGroup(){
    var id = $('#id').val();
    formData.append('txtGroup', $('#txtGroup').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/groupUpdate/'+id,
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

            allDataGroup();
            $('#modalGroup').modal('hide');

            console.log(data);
        }, error: function (error) {
            console.log(error);
        }
    });
}




//############################...Grade.......#######################################################


/*

function cbxStatus($district_id){

    var cbxStatus = $('#cbxStatus').val();

   if(cbxStatus == 1){
  alert(cbxStatus)
   }else if(cbxStatus == null){
    alert("cbxStatus")
   }



}
*/


function allDataGrade() {
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/gradeAlldata",

        success: function (data) {
            $.each(data, function (key, value) {

                data = data + "<tr>"

                data = data + "<td>" + value.customer_grade_id   + "</td>"
                data = data + "<td>" + value.grade + "</td>"

                data = data + "<td>"
                data = data + '<a href="#"  type="button" class="btn btn-primary  editGrade" id="' + value.customer_grade_id + '" data-bs-toggle="modal" data-bs-target="#modalGroup"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxStatus" value="1" onclick="cbxStatus(' + value.customer_grade_id + ')" required></label>'



                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tabalGroup').html(data);


        }

    });

}
allDataGrade();



//........save......

function saveGrade() {

    formData.append('txtgrade', $('#txtgrade').val());




    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/savegrade',
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
            console.log(response.district_id);
            allDataGrade();
            $('#modalGrade').modal('hide');


        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });

}
    //.......edit......

   $(document).on('click', '.editGrade', function(e) {
    e.preventDefault();
    let id = $(this).attr('id');
    $.ajax({
        url: '/gradeEdite',
        method: 'get',
        data: {
            id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $('#btnSavegrade').hide();
            $('#btnUpdategrade').show();
            var grade = response.grade;
            $('#id').val(grade.customer_grade_id);
            $("#txtgrade").val(grade.grade);


        }
    });
});


function updateGrade(){
    var id = $('#id').val();
    formData.append('txtgrade', $('#txtgrade').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/gradeUpdate/'+id,
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

            allDataGroup();
            $('#modalGroup').modal('hide');

            console.log(data);
        }, error: function (error) {
            console.log(error);
        }
    });
}
