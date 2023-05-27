<!-- Modal -->

<div class="modal fade" id="data-chooser-modal" tabindex="-1" aria-labelledby="data-chooser-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header transaction-lbl">
                <h5 class="modal-title" id="data-chooser-modalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <table class="table datatable-fixed-both table-striped responsive" id="data-chooser-modal-tbl">

                    <tbody>

                        <tr>
                            <td>001</td>
                            <td>Colombo</td>
                            <td><button class="btn btn-primary" style="float: right;">Select</button></td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Gampaha</td>
                            <td><button class="btn btn-primary" style="float: right;">Select</button></td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Matara</td>
                            <td><button class="btn btn-primary" style="float: right;">Select</button></td>
                        </tr>
                        <tr>
                            <td>004</td>
                            <td>Ratnapura</td>
                            <td><button class="btn btn-primary" style="float: right;">Select</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/datatables.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/fixed_columns.min.js')}}"></script>
<script src="{{URL::asset('assets/rbs-js/data_chooser.js')}}"></script>
