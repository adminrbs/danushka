var formData = new FormData();
$(document).ready(function () {

    //Search Group

    $('#suplyGroupSearch').on('keyup',function(){
        $value=$(this).val();

        if($value){
            $('#tableSuplyGroup').hide();
            $('#contentSuply').show();

        }
        else{
            $('#tableSuplyGroup').show();
            $('#contentSuply').hide();
        }

        $.ajax({

            type:'get',
            url:'/suplyGroupsearch',
            data:{'search':$value},

            success:function(data){
                console.log(data);
                $('#contentSuply').html(data);
            }
        });
        //alert($value);
    });


    $('#btnSupplygroup').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        saveSuplyGroup();
    });

    $('#btnUpdateSupplygroup').on('click', function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }

        updateSuplyGroup();
    });
    $('#btnSupplygroup').show();
    $('#btnUpdateSupplygroup').hide();

});


//...Suply Group Data

function suplyGroupAllData() {

    $.ajax({
        type: "get",
        dataType: 'json',
        url:"/suplyGroupAllData",

        success: function (data) {

            $.each(data, function (key, value) {

                var isChecked = "";
                if(value.status_id){
                    isChecked = "checked";
                }

                data = data + "<tr>"

                data = data + "<td>" + value.supply_group_id   + "</td>"
                data = data + "<td>" + value.supply_group + "</td>"

                data = data + "<td>"
                data = data + '<a href=""  type="button" class="btn btn-primary  suplyGroup" id="' + value.supply_group_id + '" data-bs-toggle="modal" data-bs-target="#modalSuplyGroup"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<input type="button"  class="btn btn-danger" name="switch_single" id="" value="Delete" onclick="btnSuplyGroupDelete(' + value.supply_group_id + ')">'

                data = data + "</td>"

                data = data + "<td>"

                data = data + '<label class="form-check form-switch"><input type="checkbox"  class="form-check-input" name="switch_single" id="cbxSuplyGroup" value="1" onclick="cbxSuplyGroupStatus(' + value.supply_group_id + ')" required '+isChecked+'></label>'

                data = data + "</td>"

                data = data + "</tr>"


            })

            $('#tableSuplyGroup').html(data);

        }

    });

}
suplyGroupAllData();





//.....suply Group Save.....

function saveSuplyGroup(){

    formData.append('txtSupplygroup', $('#txtSupplygroup').val());

    console.log(formData);
    if (formData.txtSupplygroup == '') {
        //alert('Please enter item category level 1');
        return false;
    }

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '/saveSuplyGroup',
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
            suplyGroupAllData();
            $('#modalSuplyGroup').modal('hide');
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


$(document).on('click', '.suplyGroup', function(e) {
    e.preventDefault();
    let supply_group_id  = $(this).attr('id');
    $.ajax({
        url: '/suplyGroupEdite/'+supply_group_id,
        method: 'get',
        data: {
            //id: id,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            $('#btnSupplygroup').hide();
            $('#btnUpdateSupplygroup').show();


            $('#id').val(response.supply_group_id );
            $("#txtSupplygroup").val(response.supply_group);


        }
    });
});

// suply Group Update

function updateSuplyGroup(){

    var id = $('#id').val();
    formData.append('txtSupplygroup', $('#txtSupplygroup').val());

    console.log(formData);
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/supltGroupUpdate/'+id,
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

            suplyGroupAllData();
            $('#modalSuplyGroup').modal('hide');


        }, error: function (error) {
            console.log(error);
        }
    });
}


function btnSuplyGroupDelete(id) {

    if (confirm("Do you want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            url: "/deleteSuplygroup/" + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $("input[name=_token]").val()
            },

            success: function(response) {
                suplyGroupAllData();

            }
        });

    }
}

// Status Save


function cbxSuplyGroupStatus(supply_group_id) {
    var status = $('#cbxSuplyGroup').is(':checked') ? 1 : 0;


    $.ajax({
        url: '/SuplyGroupStatus/'+supply_group_id,
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
