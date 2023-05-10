var formData = new FormData();
$(document).ready(function () {

    // close

    $("#btnCloseupdate").on("click", function(e) {
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
            $("#modalNonproprietary").modal("hide"); // This will close the modal
            var urlWithoutQuery = window.location.href.split('?')[0];
        },
          error: function(xhr, status, error) {

          }
        });
      });



    //Search Group

    $('#nonproprietarySearch').on('keyup',function(){
        $value=$(this).val();

        if($value){
            $('#tableNonproprietary').hide();
            $('#contentNonproprietary').show();

        }
        else{
            $('#tableNonproprietary').show();
            $('#contentNonproprietary').hide();
        }

        $.ajax({

            type:'get',
            url:'/nonproprietarysearch',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#contentNonproprietary').html(data);
            }
        });
        //alert($value);
    });


    $('#btnNonproprietary').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveNonproprietary();
    });

    $('#btnUpdateNonproprietary').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateNonproprietary();
    });
    $('#btnNonproprietary').show();
    $('#btnUpdateNonproprietary').hide();



});


//...Suply Group Data

function nonproprietaryAllData() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url:"/nonproprietaryAllData",

        success: function (data) {

            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.item_altenative_name_id    + "</td>"
                data = data + "<td>" + value.item_altenative_name + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  nonproprietaryupdate" id="' + value.item_altenative_name_id  + '" data-bs-toggle="modal" data-bs-target="#modalNonproprietary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="" value="Delete" onclick="btnNonproprietaryDelete(' + value.item_altenative_name_id  + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxNonproprietary" value="1" onclick="cbxNonproprietaryStatus(' + value.item_altenative_name_id  + ')" required '+isChecked+'></label>'

                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tableNonproprietary').html(data);

        }

    });

}
nonproprietaryAllData();





//.....Nonproprietary Save.....

function saveNonproprietary(){

    formData.append('txtNonproprietary', $('#txtNonproprietary').val());

    console.log(formData);
    if (formData.txtNonproprietary == '') {
        //alert('Please enter item category level 1');
        return false;
    }

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveNonproprietary',
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
            nonproprietaryAllData();
            $('#modalNonproprietary').modal('hide');
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

//edit suply group


$(document).on('click', '.nonproprietaryupdate', function(e) {
    e.preventDefault();
    let item_altenative_name_id  = $(this).attr('id');
    $.ajax({
        url: '/nonproprietaryEdite/'+item_altenative_name_id,
        method: 'get',
        data: {
            //id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $('#btnNonproprietary').hide();
            $('#btnUpdateNonproprietary').show();


            $('#id').val(response.item_altenative_name_id  );
            $("#txtNonproprietary").val(response.item_altenative_name);


        }
    });
});

// suply Group Update

function updateNonproprietary(){

    var id = $('#id').val();
    formData.append('txtNonproprietary', $('#txtNonproprietary').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/nonproprietaryUpdate/'+id,
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

            nonproprietaryAllData();
            $('#modalNonproprietary').modal('hide');


        }, error: function (error) {
            console.log(error);
        }
    });
}

// Delete
function btnNonproprietaryDelete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deleteNonproprietary/"+id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                nonproprietaryAllData();

            }
        });

    }
}

// Status Save


function cbxNonproprietaryStatus(item_altenative_name_id) {
    var status = $('#cbxNonproprietary').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/nonproprietaryStatus/'+item_altenative_name_id,
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

