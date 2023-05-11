@section('content')
@extends('layouts.master')

@component('components.page-header')
@slot('title') Home @endslot
@slot('subtitle') Dashboard @endslot
@endcomponent

@section('page-header')
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')
<!-- Content area -->
<div class="content">


    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-12 mt-2">
            <div class="card">
                <div  class="card-header bg-dark text d-flex align-items-center" style="color: white;">
                    <h5 class="mb-0">Customer</h5>
                    <div class="d-inline-flex ms-auto"></div>
                </div>

                <div class="card card-body">
                    <!--tabs -->
                    <ul class="nav nav-tabs mb-0" id="tabs">
                        <li class="nav-item rbs-nav-item">
                            <a href="#general" class="nav-link active" aria-selected="true">General</a>
                        </li>
                        <li class="nav-item rbs-nav-item">
                            <a href="#contacts" class="nav-link" aria-selected="true">Contacts</a>
                        </li>
                        <li class="nav-item rbs-nav-item">
                            <a href="#customer_delivery_points" class="nav-link" aria-selected="false">Delivery points</a>
                        </li>
                        <li class="nav-item rbs-nav-item">
                            <a href="#settings" class="nav-link" aria-selected="false">Settings</a>
                        </li>
                        <li class="nav-item rbs-nav-item">
                            <a href="#Attachments" class="nav-link" aria-selected="false">Attachments</a>
                        </li>

                    </ul>
                    <!--enf of tabs -->
                    <!-- staring of form -->
                    <form id="frmCustomer" class="form-validate-jquery">

                        <div class="tab-content">
                            <!-- General tab -->
                            <div class="tab-pane fade show active" id="general">
                                <div class="row">

                                    <div class="row">
                                        <h1>General</h1>

                                        <div class="col-md-6 mb-4">
                                            <div class="mb-1">

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Name <span class="text-danger">*</span></label>

                                                <div>

                                                    <input class="form-control form-control-sm validate" type="text" id="txtName" name="Name" required>

                                                </div>

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>District <span class="text-danger">*</span></label>

                                                <div>
                                                    <select class="form-control form-control-sm validate" id="cmbDistrict" name="district">

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="mb-1">

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Address <span class="text-danger">*</span></label>

                                                <div>
                                                    <input class="form-control form-control-sm validate" type="text" id="txtAddress" name="address" required>

                                                </div>
                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Town <span class="text-danger">*</span></label>
                                                <div>
                                                    <select class="select2 form-control" name="town" data-live-search="true" id="cmbTown">
                                                        <option>Option 1</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="mb-1">

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Mobile <span class="text-danger">*</span></label>

                                                <div>
                                                    <input class="form-control form-control-sm validate" type="tel" id="txtMobile" name="numbers" required>

                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="mb-1">


                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Google map link <span class="text-danger">*</span></label>
                                                <div>
                                                    <input class="form-control form-control-sm validate" type="text" id="txtGooglemaplink" name="Googlemaplink" required>
                                                </div>

                                            </div>
                                            <div class="mb-1">

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Fixed <span class="text-danger">*</span></label>

                                                <div>
                                                    <input class="form-control form-control-sm validate" type="tel" id="txtFixed" name="numbers" required>

                                                </div>

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Customer group <span class="text-danger">*</span></label>
                                                <div>
                                                    <select class="form-control form-control-sm validate" id="cmbCustomergroup" name="cutomserGroup">

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="mb-1">

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Email <span class="text-danger">*</span></label>

                                                <div>
                                                    <input class="form-control form-control-sm validate" type="email" id="txtEMail" name="email" required>

                                                </div>

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Customer grade <span class="text-danger">*</span></label>
                                                <div>
                                                    <select class="form-control form-control-sm validate" id="cmbCustomergrade" name="customergrade">

                                                    </select>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- End of general tab -->
                            <div class="tab-pane fade show" id="contacts">
                                <div class="row">

                                    <div class="row">
                                        <h1>Contacts</h1>

                                        <div class="mb-4">
                                            <table id="customer_contact" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Designation</th>
                                                        <th>Mobile</th>
                                                        <th>Fixed</th>
                                                        <th>Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade show" id="customer_delivery_points">
                                <div class="row">

                                    <div class="row">
                                        <h1>Delivery points</h1>

                                        <div class="mb-4">
                                            <div class="table-responsive">
                                                <table id="customer_delivery_points" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Destination</th>
                                                            <th>Address</th>
                                                            <th>Mobile</th>
                                                            <th>Fixed</th>
                                                            <th>Instructions</th>
                                                            <th>Google Map Link</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="settings">
                                <div class="row">

                                    <div class="row">
                                        <h1>Settings</h1>

                                        <div class="col-md-6 mb-4">
                                            <div class="mb-1">

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Alert credit amount limit <span class="text-danger">*</span></label>


                                                <div>
                                                    <input class="form-control form-control-sm validate" type="text" id="txtAlertcreaditamountlimit" name="numbers" required>

                                                </div>

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Alert credit period limit <span class="text-danger">*</span></label>

                                                <div>
                                                    <input class="form-control form-control-sm validate" type="tel" id="txtAlertcreditperiodlimit" name="numbers" placeholder="" required>

                                                </div>


                                            </div>
                                            <div class="row mb-1">

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Hold credit amount limit <span class="text-danger">*</span></label>

                                                <div>
                                                    <input class="form-control form-control-sm validate" type="text" id="txtHoldcreditamountlimit" name="numbers" required>

                                                </div>

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Hold credit period limit <span class="text-danger">*</span></label>

                                                <div>
                                                    <input class="form-control form-control-sm validate" type="tel" id="txtHoldcreditperiodlimit" name="numbers" placeholder="" required>

                                                </div>
                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>PD cheque amount limit <span class="text-danger">*</span></label>

                                                <div>
                                                    <input class="form-control form-control-sm validate" type="text" id="txtPDchequeamountlimit" name="numbers" placeholder="" required>

                                                </div>
                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Maximum Pd cheque period <span class="text-danger">*</span></label>
                                                <div>
                                                    <input class="form-control form-control-sm validate" type="text" id="txtEMail" name="numbers" placeholder="" required>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">


                                            <div class="row mb-1">
                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Credit control by type <span class="text-danger">*</span></label>

                                                <div>
                                                    <select class="form-control form-control-sm validate" id="cmbCreditcontrolbytype" name="Creditcontrolbytype" required>
                                                        <option>Primary credit control</option>
                                                        <option>Location wise credit control</option>
                                                        <option>Product group wise credit control</option>
                                                        <option>Purchase group wise credit control</option>
                                                        <option>Agency wise credit control</option>

                                                    </select>

                                                </div>
                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>SMS notification <span class="text-danger">*</span></label>
                                                <div>
                                                    <label class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input" name="switch_single" id="chkSMSnotification" required>
                                                        <span class="form-check-label"></span>
                                                    </label>
                                                </div>

                                            </div>
                                            <div>

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Deliver to primary addess <span class="text-danger">*</span></label>
                                                <div>
                                                    <label class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input" name="switch_single" id="chkDelivertoprimaryaddess" required>
                                                        <span class="form-check-label"></span>
                                                    </label>

                                                </div>

                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>WhatsApp nofification <span class="text-danger">*</span></label>
                                                <div class="col-md-4">
                                                    <label class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input" name="switch_single" id="chkWhatsAppnofification" required>
                                                        <span class="form-check-label"></span>
                                                    </label>

                                                </div>
                                            </div>
                                            <div>



                                                <label class="col-form-label mb-0"><i class="fa fa-address-card-o fa-lg text-info" aria-hidden="true">&#160</i>Email notification <span class="text-danger">*</span></label>
                                                <div>
                                                    <label class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input" name="switch_single" id="chkEmailnotification" required>
                                                        <span class="form-check-label"></span>
                                                    </label>

                                                </div>
                                            </div>
                                            <div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade show" id="Attachments">
                                <div class="row">

                                    <div class="row">
                                        <h1>Attachments</h1>

                                        <div class="mb-4">
                                            <button type="button" class="btn btn-primary btn-icon" id="bootbox_form">Attach <i class="ph-link"></i></button>
                                            <table id="Attachments" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th>Attachment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4 mb-2">
                                <button type="submit" id="btnSave" class="btn btn-primary form-btn btn-sm">Save</button>
                                <button type="button" id="btnReset" class="btn btn-warning form-btn btn-sm">Reset</button>
                            </div>
                        </div>

                    </form>
                    <!-- end of form -->

                </div>
</div>
            </div>

        </div>

    </div>

</div>

<!-- /dashboard content -->


</div>
<!-- /content area -->

@endsection
@section('center-scripts')
<!-- Javascript -->
<script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>


<!-- Theme JS files -->
<script src="{{URL::asset('assets/js/vendor/visualization/d3/d3.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/visualization/d3/d3_tooltip.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/forms/validation/validate.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/forms/selects/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/ui/moment/moment.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/pickers/daterangepicker.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/pickers/datepicker.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/uploaders/dropzone.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/datatables.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/notifications/bootbox.min.js')}}"></script>
<script src="{{URL::asset('assets/demo/pages/components_buttons.js')}}"></script>





@endsection
@section('scripts')
<script src="{{URL::asset('assets/demo/pages/form_validation_library.js')}}"></script>
<script src="{{URL::asset('assets/js/customer.js')}}"></script>
@endsection
