@section('content')
    @extends('layouts.master')

    @component('components.page-header')
        @slot('title')
            Home
        @endslot
        @slot('subtitle')
            Dashboard
        @endslot
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
                    <div class="card-header bg-dark text d-flex align-items-center" style="color: white;">
                        <h5 class="mb-0">Employee</h5>
                        <div class="d-inline-flex ms-auto"></div>
                    </div>

                    <div class="card card-body">
                        <!--tabs -->
                        <ul class="nav nav-tabs mb-0" id="tabs">
                            <li class="nav-item rbs-nav-item">
                                <a href="#general" class="nav-link active" aria-selected="true">General</a>
                            </li>

                            <li class="nav-item rbs-nav-item">
                                <a href="#settings" class="nav-link" aria-selected="false">Settings</a>
                            </li>
                            <li class="nav-item rbs-nav-item">
                                <a href="#note" class="nav-link" aria-selected="false">Note</a>
                            </li>


                        </ul>
                        <!--enf of tabs -->
                        <!-- staring of form -->
                        <form id="frmEmployee" class="needs-validation" novalidate>

                            <div class="tab-content">
                                <!-- General tab -->

                                <div class="tab-pane fade show active" id="general">
                                    <div class="row">

                                        <div class="row">
                                            <h1>General</h1>

                                            <div class="col-md-6 mb-4">
                                                <div class="mb-1">

                                                    <label class="col-form-label mb-0"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Name <span
                                                            class="text-danger">*</span></label>

                                                    <div>
                                                        <input class="form-control form-control-sm validate" type="text"
                                                            id="txtName" name="Name" required>


                                                    </div>

                                                    <label class="col-form-label mb-0"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Office mobile No </label>

                                                    <div class="mt-1">
                                                        <input class="form-control form-control-sm" type="tel"
                                                            id="txtOfficemobileno" name="officeMobile" >

                                                    </div>
                                                </div>
                                                <div class="mb-1">

                                                    <label class="col-form-label mb-0"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Office email </label>

                                                    <div>
                                                        <input class="form-control form-control-sm validate" type="email"
                                                            id="txtOfficeemail" name="txtOfficeemail">

                                                    </div>
                                                    <label class="col-form-label mb-0 mt-1"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Persional mobile No </label>
                                                    <div>
                                                        <input class="form-control form-control-sm validate  mt-1" type="tel"
                                                            id="txtPersionalmobile" name="numbers" >

                                                    </div >

                                                </div>

                                                <div class="mb-1">

                                                    <label class="col-form-label mb-0"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Persional fixed No </label>

                                                    <div>
                                                        <input class="form-control form-control-sm validate" type="text"
                                                            id="txtPersionalfixedno" name="numbers" >

                                                    </div>
                                                    <label class="col-form-label mb-0"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Persional email</label>

                                                    <div>
                                                        <input class="form-control form-control-sm validate" type="email"
                                                            id="txtPersionalemail" name="persionalEmail" >

                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="mb-1">


                                                    <label class="col-form-label mb-0"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Address</label>
                                                    <div>
                                                        <input type="text" class="form-control validate" id="txtAddress" name="address" >
                                                    </div>

                                                </div>
                                                <div class="mb-1">

                                                    <label class="col-form-label mb-0 "><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Designation <span
                                                            class="text-danger">*</span></label>

                                                    <div>
                                                        <div>
                                                            <select class="form-select" id="cmbDesgination">

                                                            </select>

                                                        </div>
                                                    </div>

                                                    <label class="col-form-label mb-0 mt-1"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Report to<span
                                                            class="text-danger">*</span></label>
                                                    <div>
                                                        <select class="form-select" id="cmbReport">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-1">

                                                    <label class="col-form-label mb-0 mt-1"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Date of Joined </label>

                                                    <div>
                                                        <input class="form-control form-control-sm validate"
                                                            type="date" id="txtDateofjoined" name="dateofjoined"
                                                            required>

                                                    </div>

                                                    <label class="col-form-label mb-0 mt-1"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Date of resign </label>
                                                    <div>
                                                        <input class="form-control form-control-sm validate "
                                                            type="date" id="txtDateofresign" name="dateofresign"
                                                            >

                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <!-- End of general tab -->


                                <div class="tab-pane fade" id="settings">
                                    <div class="row">

                                        <div class="row">
                                            <h1>Settings</h1>

                                            <div class="col-md-6 mb-4">
                                                <div class="mb-1">

                                                    <label class="col-form-label mb-0"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Status<span
                                                            class="text-danger">*</span></label>


                                                    <div>
                                                        <select class="form-control  form-control-sm" required
                                                            id="cmbStatus" name="status">
                                                            <optgroup>

                                                                <option value="0">No</option>
                                                                <option value="1">yes</option>

                                                            </optgroup>

                                                        </select>
                                                    </div>




                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                                 <!-- End of Setting tab -->

                                 <div class="tab-pane fade" id="note">
                                    <div class="row">

                                        <div class="row">
                                            <h1>Note</h1>

                                            <div class="col-md-6 mb-4">
                                                <div class="mb-1">

                                                    <label class="col-form-label mb-0"><i
                                                            class="fa fa-address-card-o fa-lg text-info"
                                                            aria-hidden="true">&#160</i>Note</label>


                                                    <div>
                                                        <div class="form-outline mb-4">
                                                            <textarea class="form-control validate" id="txtNote" rows="4" required></textarea>

                                                          </div>
                                                    </div>




                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="row mb-1">
                                <div class="col-md-4 mb-2">
                                    <input type="hidden" id="id">
                                    <button type="button" id="btnupdate" class="btn btn-primary form-btn btn-sm">Update</button>
                                    <button type="button" id="btnSave"  class="btn btn-primary form-btn btn-sm">Save</button>
                                    <button type="button" id="btnReset" class="btn btn-warning form-btn btn-sm">Reset</button>
                                </div>
                            </div>
                    </div>


                </div>


                </form>
                <!-- end of form -->

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
    <script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>


    <!-- Theme JS files -->
    <script src="{{ URL::asset('assets/js/vendor/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/forms/validation/validate.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/ui/moment/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/pickers/daterangepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/pickers/datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/uploaders/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/notifications/bootbox.min.js') }}"></script>
    <script src="{{ URL::asset('assets/demo/pages/components_buttons.js') }}"></script>
    <script src="{{URL::asset('assets/demo/pages/components_modals.js')}}"></script>











@endsection
@section('scripts')
    <script src="{{ URL::asset('assets/demo/pages/form_validation_library.js') }}"></script>
    <script src="{{ URL::asset('assets/js/employee.js') }}?random=<?php echo uniqid(); ?>"></script>
    <script src="{{ URL::asset('assets/js/employeeList.js') }}?random=<?php echo uniqid(); ?>"></script>

    <script src="{{ URL::asset('assets/js/web-rd-fromValidation.js') }}"></script>

@endsection
