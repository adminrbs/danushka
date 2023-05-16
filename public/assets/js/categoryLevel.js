var formData = new FormData();
$(document).ready(function () {

    $('#btnCategory1').on('click', function () {
        $('#btnSaveCategorylevel1').show();
        $('#btnUpdateCategorylevel1').hide();
        $('#id').val('');
        $("#txtCategorylevel1").val('');
        $("#categoryLevel1Search").val('');


    });

    $('#btnCategory2').on('click', function () {
        $('#btnSaveCategorylevel2').show();
        $('#btnUpdateCategorylevel2').hide();
        $('#id').val('');
        $("#cmbLeve1").val('');
        $("#txtCategorylevel2").val('');


    });


    $('#btnCategory3').on('click', function () {
        $('#btnSaveCategorylevel3').show();
            $('#btnUpdateCategorylevel3').hide();
            $('#id').val('');
            $("#cmbLeve2").val('');




    });


    $('#btnDesgination').on('click', function () {
        $('#btnSaveDesgination').show();
        $('#btnUpdateDesgination').hide();
        $('#id').val('');
        $("#txtDesgination").val('');



    });
    $('#btnStatuss').on('click', function () {
        $('#btnSaveStatus').show();
            $('#btnUpdateStatus').hide();
            $("#status1Search").val('');
            $('#id').val('');



    });

    ///////////////////////////close//////////

// close

$("#btnClose1").on("click", function(e) {
    // Prevent the default form submission behavior
    e.preventDefault();
    var formData = $("form").serialize();
    $.ajax({
      type: "POST",
      url: '/close',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      data: formData,
      success: function(response) {
        $("#modelcategoryLevel").modal("hide"); // This will close the modal
        var urlWithoutQuery = window.location.href.split('?')[0];
    },
      error: function(xhr, status, error) {

      }
    });
  });


$("#btnClose2").on("click", function(e) {
    // Prevent the default form submission behavior
    e.preventDefault();
    var formData = $("form").serialize();
    $.ajax({
      type: "POST",
      url: '/close',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      data: formData,
      success: function(response) {
        $("#modelcategoryLeve2").modal("hide"); // This will close the modal
        var urlWithoutQuery = window.location.href.split('?')[0];
    },
      error: function(xhr, status, error) {

      }
    });
  });


$("#btnClose3").on("click", function(e) {
    // Prevent the default form submission behavior
    e.preventDefault();
    var formData = $("form").serialize();
    $.ajax({
      type: "POST",
      url: '/close',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      data: formData,
      success: function(response) {
        $("#modelcategoryLeve3").modal("hide"); // This will close the modal
        var urlWithoutQuery = window.location.href.split('?')[0];
    },
      error: function(xhr, status, error) {

      }
    });
  });


$("#btnClose4").on("click", function(e) {
    // Prevent the default form submission behavior
    e.preventDefault();
    var formData = $("form").serialize();
    $.ajax({
      type: "POST",
      url: '/close',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      data: formData,
      success: function(response) {
        $("#modelDesgination").modal("hide"); // This will close the modal
        var urlWithoutQuery = window.location.href.split('?')[0];
    },
      error: function(xhr, status, error) {

      }
    });
  });




$("#btnClose5").on("click", function(e) {
    // Prevent the default form submission behavior
    e.preventDefault();
    var formData = $("form").serialize();
    $.ajax({
      type: "POST",
      url: '/close',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      data: formData,
      success: function(response) {
        $("#modelStatus1").modal("hide"); // This will close the modal
        var urlWithoutQuery = window.location.href.split('?')[0];
    },
      error: function(xhr, status, error) {

      }
    });
  });



    /////////////////////////////////////////////
    //......category Level 1 Search

    $('#categoryLevel1Search').on('keyup',function(){
        $value=$(this).val();



        $.ajax({

            type:'get',
            url:'/catLevel1_search',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#tabalCategoryLevel1').empty();
                $('#tabalCategoryLevel1').html(data);
            }
        });
        //alert($value);
    });

     //......category Level 2 Search

     $('#categoryLevel2Search').on('keyup',function(){
        $value=$(this).val();

        $.ajax({

            type:'get',
            url:'/catLevel2_search',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#tabalCategoryLevel2').empty();
                $('#tabalCategoryLevel2').html(data);


            }
        });
        //alert($value);
    });



     //......category Level 3 Search

     $('#categoryLevel3Search').on('keyup',function(){
        $value=$(this).val();


        $.ajax({

            type:'get',
            url:'/catLevel3_search',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#tabalCategoryLevel3').empty();
                $('#tabalCategoryLevel3').html(data);
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


        $.ajax({

            type:'get',
            url:'/desginathionsearch',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#tabalDesgination').empty();
                $('#tabalDesgination').html(data);
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

        $.ajax({

            type:'get',
            url:'/empStatussearch',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#tabalStatus1').empty();
                $('#tabalStatus1').html(data);
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
        url: "/categoryLevelData",
        success: function (data) {
            var htmlData = ""; // Variable to store the generated HTML markup
            var rowIndex = 0;
            $.each(data, function (key, value) {
                var isChecked = value.status_id ? "checked" : "";
                var rowClass = rowIndex % 2 === 0 ? "even-row" : "odd-row";

                htmlData += '<tr class="' + rowClass + '">';
                htmlData += "<td>" + value.item_category_level_1_id + "</td>";
                htmlData += "<td>" + value.category_level_1 + "</td>";
                htmlData += "<td>";
                htmlData += '<a href="" type="button" class="btn btn-primary categorylevel1" id="' + value.item_category_level_1_id + '" data-bs-toggle="modal" data-bs-target="#modelcategoryLevel"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                htmlData += "</td>";
                htmlData += "<td>";
                htmlData += '<input type="button" class="btn btn-danger" name="switch_single" id="btnCategorylevel1" value="Delete" onclick="btnCategorylevel1Delete(' + value.item_category_level_1_id + ')">';
                htmlData += "</td>";
                htmlData += "<td>";
                htmlData += '<label class="form-check form-switch"><input type="checkbox" class="form-check-input" name="switch_single" id="cbxCategorylevel1" value="1" onclick="cbxCategorylevel1Status(' + value.item_category_level_1_id + ')" required ' + isChecked + '></label>';
                htmlData += "</td>";
                htmlData += "</tr>";

                rowIndex++;
            });

            $('#tabalCategoryLevel1').html(htmlData);
        }
    });
}

Category1AllData();



//.....saveCategoryLevel1 Save.....

function saveCategoryLevel1(){

    formData.append('txtCategorylevel1', $('#txtCategorylevel1').val());

    console.log(formData);
    if (formData.txtCategorylevel1 == '') {
        //alert('Please enter item category level 1');
        return false;
    }

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
            $("#categoryLevel3Search").val('');
           console.log(response);


        },
        error: function (error) {
            $('.category1').text('This field is required.');
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
            $('#categoryLevel1Search').val('');


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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                $('#categoryLevel1Search').val('');
                Category1AllData();

            }
        });

    }
}


//##############################....Category Level 2.......######################################

function loadcategory2(){
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/loadcategory2",

        success: function (data) {
            $('#cmbLeve1').empty();
            $.each(data, function (key, value) {
                $('#cmbLeve1').append('<option value="'+value.item_category_level_1_id +'">'+value.category_level_1+'</option>');
            })


        }

    });
}

function Category2AllData() {
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/categoryLevel2Data",
        success: function (data) {
            var htmlData = ""; // Variable to store the generated HTML markup
            var rowIndex = 1;
            $.each(data, function (key, value) {
                var isChecked = value.status_id ? "checked" : "";
                var rowClass = rowIndex % 2 === 0 ? "even-row" : "odd-row";

                htmlData += '<tr class="' + rowClass + '">';
                htmlData += "<td>" + value.Item_category_level_2_id + "</td>";
                htmlData += "<td>" + value.category_level_1 + "</td>";
                htmlData += "<td>" + value.category_level_2 + "</td>";
                htmlData += "<td>";
                htmlData += '<a href="" type="button" class="btn btn-primary categorylevel2" id="' + value.Item_category_level_2_id + '" data-bs-toggle="modal" data-bs-target="#modelcategoryLeve2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                htmlData += "</td>";
                htmlData += "<td>";
                htmlData += '<input type="button" class="btn btn-danger" name="switch_single" id="btnCategorylevel2" value="Delete" onclick="btnCategorylevel2Delete(' + value.Item_category_level_2_id + ')">';
                htmlData += "</td>";
                htmlData += "<td>";
                htmlData += '<label class="form-check form-switch"><input type="checkbox" class="form-check-input" name="switch_single" id="cbxCategorylevel2" value="1" onclick="cbxCategorylevel2Status(' + value.Item_category_level_2_id + ')" required ' + isChecked + '></label>';
                htmlData += "</td>";
                htmlData += "</tr>";

                rowIndex++;
            });

            $('#tabalCategoryLevel2').html(htmlData);
        }
    });
}

Category2AllData();



//.....saveCategoryLevel2 Save.....

function saveCategoryLevel2(){

    formData.append('cmbLeve1', $('#cmbLeve1').val());
    formData.append('txtCategorylevel2', $('#txtCategorylevel2').val());

    if (formData.cmbLeve1 == '' && formData.txtCategorylevel2=='') {
        alert('Please enter item category level 1');
        return false;
    }


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
            $("#categoryLevel2Search").val('');
           console.log(response);


        },
        error: function (error) {
            $('.category2').text('This field is required.');
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
            $('#categoryLevel2Search').val('');
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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                Category2AllData();
                $('#categoryLevel2Search').val('');

            }
        });

    }
}


//############## Level 3   ###############################


function loadcategory3(){
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/loadcategory3",

        success: function (data) {
            $('#cmbLeve2').empty();
            $.each(data, function (key, value) {
                $('#cmbLeve2').append('<option value="'+value.Item_category_level_2_id  +'">'+value.category_level_2+'</option>');
            })


        }

    });
}
function Category3AllData() {
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "/categoryLevel3Data",
        success: function (data) {
            var htmlData = ""; // Variable to store the generated HTML markup
            var rowIndex = 1;
            $.each(data, function (key, value) {
                var isChecked = value.status_id ? "checked" : "";
                var rowClass = rowIndex % 2 === 0 ? "even-row" : "odd-row";

                htmlData += '<tr class="' + rowClass + '">';
                htmlData += "<td>" + value.Item_category_level_3_id + "</td>";
                htmlData += "<td>" + value.category_level_2 + "</td>";
                htmlData += "<td>" + value.category_level_3 + "</td>";
                htmlData += "<td>";
                htmlData += '<a href="" type="button" class="btn btn-primary categorylevel3" id="' + value.Item_category_level_3_id + '" data-bs-toggle="modal" data-bs-target="#modelcategoryLeve3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                htmlData += "</td>";
                htmlData += "<td>";
                htmlData += '<input type="button" class="btn btn-danger" name="switch_single" id="btnCategorylevel3" value="Delete" onclick="btnCategorylevel3Delete(' + value.Item_category_level_3_id + ')">';
                htmlData += "</td>";
                htmlData += "<td>";
                htmlData += '<label class="form-check form-switch"><input type="checkbox" class="form-check-input" name="switch_single" id="cbxCategorylevel3" value="1" onclick="cbxCategorylevel3Status(' + value.Item_category_level_3_id + ')" required ' + isChecked + '></label>';
                htmlData += "</td>";
                htmlData += "</tr>";

                rowIndex++;
            });

            $('#tabalCategoryLevel3').html(htmlData);
        }
    });
}

Category3AllData();



//.....saveCategoryLevel3 Save.....

function saveCategoryLevel3(){

    formData.append('cmbLeve2', $('#cmbLeve2').val());
    formData.append('txtCategorylevel3', $('#txtCategorylevel3').val());

    console.log(formData);
    if (formData.cmbLeve2 == '' && formData.txtCategorylevel3=='') {
       // alert('Please enter item category level 1');
        return false;
    }
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
            $("#txtCategorylevel3").val('');
           console.log(response);


        },
        error: function (error) {
            $('.category3').text('This field is required.');
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
            $('#categoryLevel3Search').val('');
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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                Category3AllData();
                $('#categoryLevel3Search').val('');

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
            var htmlData = ""; // Variable to store the generated HTML markup
            var rowIndex = 1;
            $.each(data, function (key, value) {
                var isChecked = value.status_id ? "checked" : "";
                var rowClass = rowIndex % 2 === 0 ? "even-row" : "odd-row";

                htmlData += '<tr class="' + rowClass + '">';
                htmlData += "<td>" + value.employee_designation_id + "</td>";
                htmlData += "<td>" + value.employee_designation + "</td>";
                htmlData += "<td>";
                htmlData += '<a href="" type="button" class="btn btn-primary editDesgination" id="' + value.employee_designation_id + '" data-bs-toggle="modal" data-bs-target="#modelDesgination"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                htmlData += "</td>";
                htmlData += "<td>";
                htmlData += '<input type="button" class="btn btn-danger" name="switch_single" id="btnDesgination" value="Delete" onclick="btnDesginationDelete(' + value.employee_designation_id + ')">';
                htmlData += "</td>";
                htmlData += "<td>";
                htmlData += '<label class="form-check form-switch"><input type="checkbox" class="form-check-input" name="switch_single" id="cbxDesginationStatus" value="1" onclick="cbxDesgination(' + value.employee_designation_id + ')" required ' + isChecked + '></label>';
                htmlData += "</td>";
                htmlData += "</tr>";

                rowIndex++;
            });

            $('#tabalDesgination').html(htmlData);
        }
    });
}

allDesgination();


//....save Disgination

function saveDesgination(){

    formData.append('txtDesgination', $('#txtDesgination').val());

    if (formData.txtDesgination == '') {
        //alert('Please enter item category level 1');
        return false;
    }
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
            $("#desginationSearch").val('');
            allDesgination();
           console.log(response);


        },
        error: function (error) {
            $('.desgination').text('This field is required.');
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
            $('#desginationSearch').val('');

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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                allDesgination();
                $('#desginationSearch').val('');


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
            var htmlData = ""; // Variable to store the generated HTML markup
            var rowIndex = 1;
            $.each(data, function (key, value) {
                var isChecked = value.status_id ? "checked" : "";
                var rowClass = rowIndex % 2 === 0 ? "even-row" : "odd-row";

                htmlData += '<tr class="' + rowClass + '">';
                htmlData += "<td>" + value.employee_status_id + "</td>";
                htmlData += "<td>" + value.employee_status + "</td>";
                htmlData += "<td>";
                htmlData += '<a href="" type="button" class="btn btn-primary editEmpStatus" id="' + value.employee_status_id + '" data-bs-toggle="modal" data-bs-target="#modelStatus1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                htmlData += "</td>";
                htmlData += "<td>";
                htmlData += '<input type="button" class="btn btn-danger" name="switch_single" id="btnEmpStatus" value="Delete" onclick="btnEmpStatusDelete(' + value.employee_status_id + ')">';
                htmlData += "</td>";
                htmlData += "<td>";
                htmlData += '<label class="form-check form-switch"><input type="checkbox" class="form-check-input" name="switch_single" id="cbxEmpStatus" value="1" onclick="cbxEmpStatus(' + value.employee_status_id + ')" required ' + isChecked + '></label>';
                htmlData += "</td>";
                htmlData += "</tr>";

                rowIndex++;
            });

            $('#tabalStatus1').html(htmlData);
        }
    });
}

allempStatus();


//....save Disgination

function saveStatus(){

    formData.append('txtStatus', $('#txtStatus').val());

    if (formData.txtStatus == '') {
        $('.status').text('Please enter item category level 1');
        return false;
    }
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
            $("#txtStatus").val('');
            allempStatus();
           console.log(response);


        },
        error: function (error) {
            $('.status').text('This field is required.');
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

            $('#id').val(response.employee_status_id );
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
            $('#status1Search').val('');

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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                allempStatus();
                $('#status1Search').val('');

            }
        });

    }
}

