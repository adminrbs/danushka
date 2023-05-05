var formData = new FormData();
$(document).ready(function () {

    //......category Level 1 Search

    $('#categoryLevel1Search').on('keyup',function(){
        $value=$(this).val();

        if($value){
            $('#tabalCategoryLevel1').hide();
            $('.catLevel1').show();

        }
        else{
            $('#tabalCategoryLevel1').show();
            $('.catLevel1').hide();
        }

        $.ajax({

            type:'get',
            url:'/catLevel1_search',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#contentl1').html(data);
            }
        });
        //alert($value);
    });

     //......category Level 2 Search

     $('#categoryLevel2Search').on('keyup',function(){
        $value=$(this).val();

        if($value){
            $('#tabalCategoryLevel2').hide();
            $('.catLevel2').show();

        }
        else{
            $('#tabalCategoryLevel2').show();
            $('.catLevel2').hide();
        }

        $.ajax({

            type:'get',
            url:'/catLevel2_search',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#contentl2').html(data);
            }
        });
        //alert($value);
    });



     //......category Level 3 Search

     $('#categoryLevel3Search').on('keyup',function(){
        $value=$(this).val();

        if($value){
            $('#tabalCategoryLevel3').hide();
            $('.catLevel1').show();

        }
        else{
            $('#tabalCategoryLevel3').show();
            $('.catLevel3').hide();
        }

        $.ajax({

            type:'get',
            url:'/catLevel3_search',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#contentl3').html(data);
            }
        });
        //alert($value);
    });


    $('#btnSaveCategorylevel1').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveCategoryLevel1();
    });

    //...level 1 Update

    $('#btnUpdateCategorylevel1').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateCategory1();
    });

    $('#btnSaveCategorylevel1').show();
    $('#btnUpdateCategorylevel1').hide();



    //##########################  Level 2  ################



    $('#btnSaveCategorylevel2').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveCategoryLevel2();
    });

    //...level 1 Update

    $('#btnUpdateCategorylevel2').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateCategory2();
    });

    $('#btnSaveCategorylevel2').show();
    $('#btnUpdateCategorylevel2').hide();



    //##########################  Level 3  ################



    $('#btnSaveCategorylevel3').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveCategoryLevel3();
    });

    //...level 1 Update

    $('#btnUpdateCategorylevel3').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateCategory3();
    });

    $('#btnSaveCategorylevel3').show();
    $('#btnUpdateCategorylevel3').hide();


});

//...Category load Data

function Category1AllData() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url:"/categoryLevelData",

        success: function (data) {

            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.category_level_1_id  + "</td>"
                data = data + "<td>" + value.category_level_1 + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  categorylevel1" id="' + value.category_level_1_id + '" data-bs-toggle="modal" data-bs-target="#modelcategoryLevel"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCategorylevel1" value="1" onclick="cbxCategorylevel1Status(' + value.category_level_1_id + ')" required '+isChecked+'></label>'

                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tabalCategoryLevel1').html(data);

        }

    });

}
Category1AllData();



//.....saveCategoryLevel1 Save.....

function saveCategoryLevel1(){

    formData.append('txtCategorylevel1', $('#txtCategorylevel1').val());

    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveCategoryLevel1',
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
            Category1AllData();
            $('#modelcategoryLevel').modal('hide');
           console.log(response);


        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });

}



 //.......edit......

 $(document).on('click', '.categorylevel1', function(e) {
    e.preventDefault();
    let category_level_1_id  = $(this).attr('id');
    $.ajax({
        url: '/categorylevel1Edite/'+category_level_1_id,
        method: 'get',
        data: {
            //id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $('#btnSaveCategorylevel1').hide();
            $('#btnUpdateCategorylevel1').show();

            $('#id').val(response.category_level_1_id  );
            $("#txtCategorylevel1").val(response.category_level_1);


        }
    });
});


//....lavel1 Update


function updateCategory1(){

    var id = $('#id').val();
    formData.append('txtCategorylevel1', $('#txtCategorylevel1').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/txtCategorylevel1Update/'+id,
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

            Category1AllData();
            $('#modelcategoryLevel').modal('hide');


        }, error: function (error) {
            console.log(error);
        }
    });
}


//##############################....Category Level 2.......######################################


function Category2AllData() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url:"/categoryLevel2Data",

        success: function (data) {

            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.category_level_2_id   + "</td>"
                data = data + "<td>" + value.category_level_1 + "</td>"
                data = data + "<td>" + value.category_level_2 + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  categorylevel2" id="' + value.category_level_2_id + '" data-bs-toggle="modal" data-bs-target="#modelcategoryLeve2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCategorylevel2" value="1" onclick="cbxCategorylevel2Status(' + value.category_level_2_id + ')" required '+isChecked+'></label>'

                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tabalCategoryLevel2').html(data);

        }

    });

}
Category2AllData();



//.....saveCategoryLevel2 Save.....

function saveCategoryLevel2(){

    formData.append('cmbLeve1', $('#cmbLeve1').val());
    formData.append('txtCategorylevel2', $('#txtCategorylevel2').val());

    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveCategoryLevel2',
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
            Category2AllData();
            $('#modelcategoryLeve2').modal('hide');
           console.log(response);


        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });

}



 //.......edit......

 $(document).on('click', '.categorylevel2', function(e) {
    e.preventDefault();
    let category_level_2_id  = $(this).attr('id');
    $.ajax({
        url: '/categorylevel2Edite/'+category_level_2_id,
        method: 'get',
        data: {
            //id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $('#btnSaveCategorylevel2').hide();
            $('#btnUpdateCategorylevel2').show();

            $('#id').val(response.category_level_2_id  );
            $("#cmbLeve1").val(response.category_level_1_id);
            $("#txtCategorylevel2").val(response.category_level_2);


        }
    });
});


//....lavel2 Update


function updateCategory2(){

    var id = $('#id').val();
    formData.append('cmbLeve1', $('#cmbLeve1').val());
    formData.append('txtCategorylevel2', $('#txtCategorylevel2').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/txtCategorylevel2Update/'+id,
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

            Category2AllData();
            $('#modelcategoryLeve2').modal('hide');


        }, error: function (error) {
            console.log(error);
        }
    });
}

//############## Level 3   ###############################




function Category3AllData() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url:"/categoryLevel3Data",

        success: function (data) {

            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.category_level_3_id    + "</td>"
                data = data + "<td>" + value.category_level_2 + "</td>"
                data = data + "<td>" + value.category_level_3 + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  categorylevel3" id="' + value.category_level_3_id + '" data-bs-toggle="modal" data-bs-target="#modelcategoryLeve3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCategorylevel3" value="1" onclick="cbxCategorylevel3Status(' + value.category_level_3_id + ')" required '+isChecked+'></label>'

                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tabalCategoryLevel3').html(data);

        }

    });

}
Category3AllData();



//.....saveCategoryLevel3 Save.....

function saveCategoryLevel3(){

    formData.append('cmbLeve2', $('#cmbLeve2').val());
    formData.append('txtCategorylevel3', $('#txtCategorylevel3').val());

    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveCategoryLevel3',
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
            Category3AllData();
            $('#modelcategoryLeve3').modal('hide');
           console.log(response);


        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });

}



 //.......edit......

 $(document).on('click', '.categorylevel3', function(e) {
    e.preventDefault();
    let category_level_3_id  = $(this).attr('id');
    $.ajax({
        url: '/categorylevel3Edite/'+category_level_3_id,
        method: 'get',
        data: {
            //id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $('#btnSaveCategorylevel3').hide();
            $('#btnUpdateCategorylevel3').show();

            $('#id').val(response.category_level_3_id);
            $("#cmbLeve2").val(response.category_level_2_id);
            $("#txtCategorylevel3").val(response.category_level_3);



        }
    });
});


//....lavel3 Update


function updateCategory3(){

    var id = $('#id').val();
    formData.append('cmbLeve2', $('#cmbLeve2').val());
    formData.append('txtCategorylevel3', $('#txtCategorylevel3').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/Categorylevel3Update/'+id,
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

            Category3AllData();
            $('#modelcategoryLeve3').modal('hide');


        }, error: function (error) {
            console.log(error);
        }
    });
}

//########################################################################################################3

//status update  Level 1


function cbxCategorylevel1Status(category_level_1_id) {
    var status = $('#cbxCategorylevel1').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/updateCatLevel1tStatus/'+category_level_1_id,
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



//status update  Level 2


function cbxCategorylevel2Status(category_level_2_id) {
    var status = $('#cbxCategorylevel2').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/updateCatLevel2tStatus/'+category_level_2_id,
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



//status update  Level 3


function cbxCategorylevel3Status(category_level_3_id) {
    var status = $('#cbxCategorylevel3').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/updateCatLevel3tStatus/'+category_level_3_id,
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
