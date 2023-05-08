var formData = new FormData();
$(document).ready(function () {


       //...District Search...

       $('#distSearch').on('keyup',function(){
        $value=$(this).val();

        if($value){
            $('#tableDistrict').hide();
            $('.districtSer').show();

        }
        else{
            $('#tableDistrict').show();
            $('.districtSer').hide();
        }

        $.ajax({

            type:'get',
            url:'/dist_search',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#content3').html(data);
            }
        });
        //alert($value);
    });




       //...Town Search...

       $('#townSearch').on('keyup',function(){
        $value=$(this).val();

        if($value){
            $('#tbodyTown').hide();
            $('.townSer').show();

        }
        else{
            $('#tbodyTown').show();
            $('.townSer').hide();
        }

        $.ajax({

            type:'get',
            url:'/town_search',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#content2').html(data);
            }
        });
        //alert($value);
    });



    //...group Search...

    $('#groupSearch').on('keyup',function(){
        $value=$(this).val();

        if($value){
            $('#tbodyGrouo').hide();
            $('.groupSer').show();

        }
        else{
            $('#tbodyGrouo').show();
            $('.groupSer').hide();
        }

        $.ajax({

            type:'get',
            url:'/group_search',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#content1').html(data);
            }
        });
        //alert($value);
    });



//............grade search
 $('#gradeSearch').on('keyup',function(){
    $value=$(this).val();

    if($value){
        $('#tabalGroup').hide();
        $('.searhdata').show();

    }
    else{
        $('#tabalGroup').show();
        $('.searhdata').hide();
    }

    $.ajax({

        type:'get',
        url:'/grade_search',
        data:{'search':$value},

        success:function(data){
            console.log(data);
            $('#content').html(data);
        }
    });
    //alert($value);
});




    $('#btnSaveDistric').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            alert("asd");
            return;
        }

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


function cbxStatus(district_id) {
    var status = $('#cbxDistricrStatus').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/updateDistrictStatus/'+district_id,
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





function allData() {
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/districtData",

        success: function (data) {
            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.district_id + "</td>"
                data = data + "<td>" + value.district_name + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  editDistrict" id="' + value.district_id + '" data-bs-toggle="modal" data-bs-target="#modelDistric"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="btndistrict" value="Delete" onclick="btndistrictDelete(' + value.district_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxDistricrStatus" value="1" onclick="cbxStatus(' + value.district_id + ')" required data-district-id="1" '+isChecked+'></label>'

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


function btndistrictDelete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deleteDistrict/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                allData();

            }
        });

    }
}




//############################.....Town.....#######################################################


function cbxTownStatus(town_id) {
var status = $('#cbxTownStatus').is(':checked') ? 1 : 0;


$.ajax({
    url: '/townUpdateStatus/'+town_id,
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




function allDataTown() {
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/twonAlldata",

        success: function (data) {
            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id == 1){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.town_id + "</td>"
                data = data + "<td>" + value.town_name + "</td>"
                data = data + "<td>" + value.district_name + "</td>"

                data = data + "<td>"
                data = data + '<a href="#"  type="button" class="btn btn-primary  editTwon" id="' + value.town_id + '" data-bs-toggle="modal" data-bs-target="#modelTown"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="btnTown" value="Delete" onclick="btnTownDelete(' + value.town_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxTownStatus" value="1" onclick="cbxTownStatus(' + value.town_id + ')" required  '+ isChecked +'></label>'



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
        data:formData,
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



function btnTownDelete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deleteTown/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                allDataTown();

            }
        });

    }
}


//############################...Group.......#######################################################



    function cbxGroupStatus(customer_group_id) {
        var status = $('#cbxGroupStatus').is(':checked') ? 1 : 0;


        $.ajax({
            url: '/groupUpdateStatus/'+customer_group_id,
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



function allDataGroup() {
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/groupAlldata",

        success: function (data) {
            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.customer_group_id  + "</td>"
                data = data + "<td>" + value.group + "</td>"

                data = data + "<td>"
                data = data + '<a href="#"  type="button" class="btn btn-primary  editGroup" id="' + value.customer_group_id + '" data-bs-toggle="modal" data-bs-target="#modalGroup"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="btnGroup" value="Delete" onclick="btnGroupDelete(' + value.customer_group_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxGroupStatus" value="1" onclick="cbxGroupStatus(' + value.customer_group_id + ')" required '+isChecked+'></label>'



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



function btnGroupDelete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deleteGroup/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                allDataGroup();

            }
        });

    }
}


//############################...Grade.......#######################################################


var district_id = $('#cbxGradeStatus').attr('data-district-id');
    $.ajax({
        url: '/updateStatusGrade/'+district_id,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status == 'true') {
                $('#cbxGradeStatus').prop('checked', response.status_id == 1);
            } else {
                $('#cbxGradeStatus').prop('checked', response.status_id == 0);
            }
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });



    function cbxGradeStatus(customer_grade_id) {
        var status = $('#cbxGradeStatus').is(':checked') ? 1 : 0;


        $.ajax({
            url: '/gradeUpdateStatus/'+customer_grade_id,
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


function allDataGrade() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/gradeAlldata",

        success: function (data) {
            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.customer_grade_id   + "</td>"
                data = data + "<td>" + value.grade + "</td>"

                data = data + "<td>"
                data = data + '<a href="#"  type="button" class="btn btn-primary  editGrade" id="' + value.customer_grade_id + '" data-bs-toggle="modal" data-bs-target="#modalGrade"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="btnGrade" value="Delete" onclick="btnGradeDelete(' + value.customer_grade_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxGradeStatus" value="1" onclick="cbxGradeStatus(' + value.customer_grade_id + ')" required '+isChecked+'></label>'



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
    let customer_grade_id  = $(this).attr('id');
    $.ajax({
        url: '/gradeEdite/'+customer_grade_id,
        method: 'get',
        data: {
            //id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $('#btnSavegrade').hide();
            $('#btnUpdateGrade').show();

            $('#id').val(response.customer_grade_id );
            $("#txtgrade").val(response.grade);


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

            allDataGrade();
            $('#modalGrade').modal('hide');

            console.log(data);
        }, error: function (error) {
            console.log(error);
        }
    });
}



function btnGradeDelete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deleteGrade/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                allDataGrade();

            }
        });

    }
}
