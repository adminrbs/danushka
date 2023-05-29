var tableData = undefined;
$(document).ready(function () {
    DataChooser.setTitle('City');
    DataChooser.setDataSourse([
        { "hidden_id": "1", "id": "001", "value": "colombo" },
        { "hidden_id": "2", "id": "002", "value": "Gampaha" },
        { "hidden_id": "3", "id": "003", "value": "Matara" },
        { "hidden_id": "4", "id": "004", "value": "Ratnapura" },
        { "hidden_id": "5", "id": "005", "value": "Kaduwela" },
    ]);

    var select_option = [{ "value": 1, "text": "Abc" }, { "value": 2, "text": "xx" },{ "value": 3, "text": "xwx" }];
    tableData = $('#tblData').transactionTable({
        "columns": [
            { "type": "label", "value": "", "style": "max-height:30px;", "event": "clickx(1)", "width": "*" },
            { "type": "text", "class": "form-control form-control-sm", "value": "", "style": "max-height:30px;", "event": "DataChooser.showChooser(this)" },
            { "type": "select", "class": "form-control form-control-sm", "value": select_option, "style": "max-height:50px;", "width": "*" },
            { "type": "button", "class": "btn btn-danger", "value": "Remove", "style": "max-height:30px;", "event": "removeRow(this)", "width": 30 }
        ],
        "auto_focus": 1,
    });

    tableData.addRow();



    /*for (var i = 0; i < 10; i++) {
        var row = [
            { "type": "label", "value": "", "style": "max-height:30px;", "event": "clickx(1)", "width": "*" },
            { "type": "text", "class": "form-control form-control-sm", "value": "", "style": "max-height:30px;", "event": "abc(event)" },
            { "type": "select", "class": "form-control form-control-sm", "value": select_option, "style": "max-height:30px;", "width": "*" },
            { "type": "button", "class": "btn btn-danger", "value": "Remove", "style": "max-height:30px;", "event": "clickx(0)", "width": 30 }
        ];
        tableData.appendRow(row);
    }*/

    $('#form').submit(function (e) {
        e.preventDefault();

        // check if the input is valid using a 'valid' property
        if (!$(this).valid) {
            return;
        }
    });

    $('#btnSave').on('click', function () {
        //DatatableFixedColumns.setDataSourse();
        //console.log(tableData.getDataSourceObject()[0][1].attr('data-id'));
    });



});


function abc(event) {

}

function clickx(id) {
    tableData.clear();
}


function transactionTableKeyEnterEvent(event, id) {

    if (id == 'tblData') {
        tableData.addRow();
    }
}
