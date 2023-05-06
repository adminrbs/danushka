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
            $('#contentl3').show();

        }
        else{
            $('#tabalCategoryLevel3').show();
            $('#contentl3').hide();
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


    //##.......Distination..........


    $('#btnSaveDesgination').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveDesgination();
    });

    //...Distination Update

    $('#btnUpdateDesgination').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateDesgination();
    });

    $('#btnSaveDesgination').show();
    $('#btnUpdateDesgination').hide();

    //..search


    $('#desginationSearch').on('keyup',function(){
        $value=$(this).val();

        if($value){
            $('#tabalDesgination').hide();
            $('.desgination').show();

        }
        else{
            $('#tabalDesgination').show();
            $('#contentDesgination').hide();
        }

        $.ajax({

            type:'get',
            url:'/desginathionsearch',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#contentDesgination').html(data);
            }
        });
        //alert($value);
    });



     //##.......Status..........



    $('#btnSaveStatus').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveStatus();
    });

    //...level 1 Update

    $('#btnUpdateStatus').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateStatus();
    });


    $('#status1Search').on('keyup',function(){
        $value=$(this).val();

        if($value){
            $('#tabalStatus1').hide();
            $('.status1').show();

        }
        else{
            $('#tabalStatus1').show();
            $('#contentStatus').hide();
        }

        $.ajax({

            type:'get',
            url:'/empStatussearch',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#contentStatus').html(data);
            }
        });
        //alert($value);
    });


    $('#btnSaveStatus').show();
    $('#btnUpdateStatus').hide();





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

                data = data + "<td>" + value.item_category_level_1_id  + "</td>"
                data = data + "<td>" + value.category_level_1 + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  categorylevel1" id="' + value.item_category_level_1_id + '" data-bs-toggle="modal" data-bs-target="#modelcategoryLevel"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="btnCategorylevel1" value="Delete" onclick="btnCategorylevel1Delete(' + value.item_category_level_1_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCategorylevel1" value="1" onclick="cbxCategorylevel1Status(' + value.item_category_level_1_id + ')" required '+isChecked+'></label>'

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

            $('#id').val(response.item_category_level_1_id  );
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


function btnCategorylevel1Delete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deletelevel1/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                Category1AllData();

            }
        });

    }
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

                data = data + "<td>" + value.Item_category_level_2_id   + "</td>"
                data = data + "<td>" + value.category_level_1 + "</td>"
                data = data + "<td>" + value.category_level_2 + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  categorylevel2" id="' + value.Item_category_level_2_id + '" data-bs-toggle="modal" data-bs-target="#modelcategoryLeve2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="btnCategorylevel2" value="Delete" onclick="btnCategorylevel2Delete(' + value.Item_category_level_2_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCategorylevel2" value="1" onclick="cbxCategorylevel2Status(' + value.Item_category_level_2_id + ')" required '+isChecked+'></label>'

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

            $('#id').val(response.Item_category_level_2_id  );
            $("#cmbLeve1").val(response.Item_category_level_1_id);
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


function btnCategorylevel2Delete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deletelevel2/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                Category2AllData();

            }
        });

    }
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

                data = data + "<td>" + value.Item_category_level_3_id    + "</td>"
                data = data + "<td>" + value.category_level_2 + "</td>"
                data = data + "<td>" + value.category_level_3 + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  categorylevel3" id="' + value.Item_category_level_3_id + '" data-bs-toggle="modal" data-bs-target="#modelcategoryLeve3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="btnCategorylevel3" value="Delete" onclick="btnCategorylevel3Delete(' + value.Item_category_level_3_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxCategorylevel3" value="1" onclick="cbxCategorylevel3Status(' + value.Item_category_level_3_id + ')" required '+isChecked+'></label>'

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

            $('#id').val(response.Item_category_level_3_id);
            $("#cmbLeve2").val(response.Item_category_level_2_id);
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


function cbxCategorylevel1Status(item_category_level_1_id) {
    var status = $('#cbxCategorylevel1').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/updateCatLevel1tStatus/'+item_category_level_1_id,
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


function cbxCategorylevel2Status(Item_category_level_2_id) {
    var status = $('#cbxCategorylevel2').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/updateCatLevel2tStatus/'+Item_category_level_2_id,
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


function cbxCategorylevel3Status(Item_category_level_3_id) {
    var status = $('#cbxCategorylevel3').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/updateCatLevel3tStatus/'+Item_category_level_3_id,
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

//...............delete......



function btnCategorylevel3Delete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deletelevel3/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                Category3AllData();

            }
        });

    }
}

//#####################..Disgination...........

// all data

function allDesgination() {
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/disginationData",

        success: function (data) {
            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.employee_designation_id  + "</td>"
                data = data + "<td>" + value.employee_designation + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  editDesgination" id="' + value.employee_designation_id + '" data-bs-toggle="modal" data-bs-target="#modelDesgination"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="btnDesgination" value="Delete" onclick="btnDesginationDelete(' + value.employee_designation_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxDesginationStatus" value="1" onclick="cbxDesgination(' + value.employee_designation_id + ')" required  '+isChecked+'></label>'

                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tabalDesgination').html(data);


        }

    });

}
allDesgination();


//....save Disgination

function saveDesgination(){

    formData.append('txtDesgination', $('#txtDesgination').val());


    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveDesgination',
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

            $('#modelDesgination').modal('hide');
            allDesgination();
           console.log(response);


        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });

}
//edite desgination



$(document).on('click', '.editDesgination', function (e) {

    e.preventDefault();
    let employee_designation_id = $(this).attr('id');

    $.ajax({
        url: '/desginationEdite/'+employee_designation_id,
        method: 'get',
        data: {

            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            console.log(response);
            $('#btnSaveDesgination').hide();
            $('#btnUpdateDesgination').show();

            $('#id').val(response.employee_designation_id   );
            $("#txtDesgination").val(response.employee_designation);

        }
    });
});


// Update desgination



function updateDesgination(){
    var id = $('#id').val();
    formData.append('txtDesgination', $('#txtDesgination').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/desginationtUpdate/'+id,
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

            $('#modelDesgination').modal('hide');
            allDesgination();

            console.log(data);
        }, error: function (error) {
            console.log(error);
        }
    });
}


//desgination status


function cbxDesgination(employee_designation_id) {
    var status = $('#cbxDesginationStatus').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/updateDesginationStatus/'+employee_designation_id,
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

// desgination Delete



function btnDesginationDelete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deletedesgination/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                allDesgination();


            }
        });

    }
}





//#####################..Employee Status...........

// all data

function allempStatus() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/empStatusData",

        success: function (data) {
            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.employee_status_id  + "</td>"
                data = data + "<td>" + value.employee_status + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  editEmpStatus" id="' + value.employee_status_id + '" data-bs-toggle="modal" data-bs-target="#modelStatus1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="btnEmpStatus" value="Delete" onclick="btnEmpStatusDelete(' + value.employee_status_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxEmpStatus" value="1" onclick="cbxEmpStatus(' + value.employee_status_id + ')" required  '+isChecked+'></label>'

                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tabalStatus1').html(data);


        }

    });

}
allempStatus();


//....save Disgination

function saveStatus(){

    formData.append('txtStatus', $('#txtStatus').val());


    console.log(formData);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/empSaveStatus',
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

            $('#modelStatus1').modal('hide');
            allempStatus();
           console.log(response);


        },
        error: function (error) {
            console.log(error);

        },
        complete: function () {

        }

    });

}
//edite desgination



$(document).on('click', '.editEmpStatus', function (e) {

    e.preventDefault();
    let employee_status_id  = $(this).attr('id');

    $.ajax({
        url: '/empStatusEdite/'+employee_status_id ,
        method: 'get',
        data: {

            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            console.log(response);
            $('#btnSaveStatus').hide();
            $('#btnUpdateStatus').show();

            $('#id').val(response.employee_status_id    );
            $("#txtStatus").val(response.employee_status);

        }
    });
});


// Update desgination



function updateStatus(){
    var id = $('#id').val();
    formData.append('txtStatus', $('#txtStatus').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/empStatusUpdate/'+id,
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

            $('#modelStatus1').modal('hide');
            allempStatus();

            console.log(data);
        }, error: function (error) {
            console.log(error);
        }
    });
}


//desgination status


function cbxEmpStatus(employee_status_id) {
    var status = $('#cbxEmpStatus').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/updateempStatus/'+employee_status_id,
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

// desgination Delete



function btnEmpStatusDelete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deleteempStatus/" + id,
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                allempStatus();


            }
        });

    }
}

