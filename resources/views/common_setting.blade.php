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
                    <div class="card-header d-flex align-items-center" style="background-color: #252b36; color: white;">
                        <h5 class="mb-0">Common Setting</h5>
                        <div class="d-inline-flex ms-auto"></div>
                    </div>


                    <div class="card">

                        <div class="card-header " id="headingDesignation">
                            <h5 class="mb-0">
                                <button class="btn btn-link " data-bs-toggle="collapse" href="#district" role="button"
                                    aria-expanded="false" aria-controls="collapseExample" onclick="districtTableRefresh()">
                                    <i class="bi bi-gear" style="margin-right: 5px"></i>District
                                </button>
                            </h5>
                        </div>


                        <div id="district" class="collapse" aria-labelledby="headingDesignation"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>

                                    <button id="btnDistrict" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modelDistric">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>

                                </div>
                            </div>

                            <div class="table-responsive">
                                <!-- Required for Responsive -->
                                <table class="table   datatable-fixed-both table-striped" id="tableDistrict">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th>Name</th>
                                            <th class="edit edit_bank">Edit</th>
                                            <th class="edit edit_bank btn-danger">Delete</th>
                                            <th class="disable disable_bank">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>


                    {{-- .........Town.......... --}}

                    <div class="card">
                        <div class="card-header" id="headingDesignation">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-bs-toggle="collapse" href="#town" role="button"
                                    aria-expanded="false" aria-controls="collapseExample" onclick="townTableRefresh()">
                                    <i class="bi bi-gear" style="margin-right: 5px"></i> Town
                                </button>
                            </h5>
                        </div>
                        <div id="town" class="collapse" aria-labelledby="headingDesignation"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>

                                    <button id="btnTown" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modelTown" onclick="loadDistrict()">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>


                                </div>
                                <div class="table-responsive">
                                    <!-- Required for Responsive -->
                                    <table class="table datatable-fixed-both-town table-striped" id="tbodyTown">
                                        <thead>
                                            <tr>
                                                <th class="id">ID#</th>
                                                <th>District Name</th>
                                                <th>Town Name</th>

                                                <th class="edit edit_bank">Edit</th>
                                                <th class="edit edit_bank btn-danger">Delete</th>
                                                <th class="disable disable_bank">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>
                                                    <td>0001</td>
                                                    <td>BOC</td>
                                                    <td><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                                    <td>
                                                        <label class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" name="switch_single" required>
                                                        </label>
                                                    </td>
                                                </tr> --}}
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- .........Group.......... --}}
                    <div class="card">
                        <div class="card-header" id="headingDesignation">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-bs-toggle="collapse" href="#group" role="button"
                                    aria-expanded="false" aria-controls="collapseExample" onclick="groupTableRefresh()">
                                    <i class="bi bi-gear" style="margin-right: 5px"></i>Customer Group
                                </button>
                            </h5>
                        </div>
                        <div id="group" class="collapse" aria-labelledby="headingDesignation"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>

                                    <button id="btnGroup" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalGroup">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>


                                </div>
                                <div class="table-responsive">
                                    <!-- Required for Responsive -->
                                    <table class="table datatable-fixed-both-group table-striped" id="tbodyGroup">
                                        <thead>
                                            <tr>
                                                <th class="id">ID#</th>
                                                <th>Customer Group</th>
                                                <th class="edit edit_bank">Edit</th>
                                                <th class="edit edit_bank btn-danger">Delete</th>
                                                <th class="disable disable_bank">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>
                                                    <td>0001</td>
                                                    <td>BOC</td>
                                                    <td><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                                    <td>
                                                        <label class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" name="switch_single" required>
                                                        </label>
                                                    </td>
                                                </tr> --}}
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    {{-- .........Grade.......... --}}



                    <div class="card">
                        <div class="card-header" id="headingDesignation">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-bs-toggle="collapse" href="#grade" role="button"
                                    aria-expanded="false" aria-controls="collapseExample" onclick="gradeTableRefresh()">
                                    <i class="bi bi-gear" style="margin-right: 5px"></i>Customer Grade
                                </button>
                            </h5>
                        </div>
                        <div id="grade" class="collapse" aria-labelledby="headingDesignation"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>

                                    <button id="btnGrade" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalGrade">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>




                                </div>
                                <div class="table-responsive">
                                    <!-- Required for Responsive -->
                                    <table class="table datatable-fixed-both-grade table-striped" id="tabalGrade">

                                        <thead>
                                            <tr>
                                                <th class="id">ID</th>
                                                <th>Customer Grade</th>
                                                <th class="edit edit_bank">Edit</th>
                                                <th class="edit edit_bank btn-danger">Delete</th>
                                                <th class="disable disable_bank">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>
                                                    <td>0001</td>
                                                    <td>BOC</td>
                                                    <td><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                                    <td>
                                                        <label class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" name="switch_single" required>
                                                        </label>
                                                    </td>
                                                </tr> --}}
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>




                    {{-- .........category_level_1.......... --}}



                    <div class="card">
                        <div class="card-header" id="headingDesignation">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-bs-toggle="collapse" href="#categoryLevel1"
                                    role="button" aria-expanded="false" aria-controls="collapseExample" onclick="categorytabal1TableRefresh()">
                                    <i class="bi bi-gear" style="margin-right: 5px"></i> Item Category Level 1
                                </button>
                            </h5>
                        </div>
                        <div id="categoryLevel1" class="collapse" aria-labelledby="headingDesignation"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>

                                    <button id="btnCategory1" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modelcategoryLevel">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>




                                </div>
                                <div class="table-responsive">
                                    <!-- Required for Responsive -->
                                    <table class="table datatable-fixed-both-lsa table-striped" id="categoryLevell">

                                        <thead>
                                            <tr>
                                                <th class="">ID</th>
                                                <th>Item Category Level 1 </th>
                                                <th class="">Edit</th>
                                                <th class="">Delete</th>
                                                <th class="">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>



                    {{-- .........category_level_2.......... --}}



                    <div class="card">
                        <div class="card-header" id="headingDesignation">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-bs-toggle="collapse" href="#categoryLevel2"
                                    role="button" aria-expanded="false" aria-controls="collapseExample" onclick="categorytabal2TableRefresh()">
                                    <i class="bi bi-gear" style="margin-right: 5px"></i> Item Category Level 2
                                </button>
                            </h5>
                        </div>
                        <div id="categoryLevel2" class="collapse" aria-labelledby="headingDesignation"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>

                                    <button id="btnCategory2" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modelcategoryLeve2"
                                        onclick="loadcategory2()">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>


                                </div>
                                <div class="table-responsive">
                                    <!-- Required for Responsive -->
                                    <table id="categoryLevel2Table" class="table datatable-fixed-bothll table-striped">
                                        <thead>
                                            <tr>
                                                <th class="id">ID</th>
                                                <th>Item Category level 1</th>
                                                <th>Item Category Level 2</th>
                                                <th class="edit edit_bank">Edit</th>
                                                <th class="edit edit_bank btn-danger">Delete</th>
                                                <th class="disable disable_bank">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>





                    {{-- .........category_level_3.......... --}}



                    <div class="card">
                        <div class="card-header" id="headingDesignation">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-bs-toggle="collapse" href="#categoryLevel3"
                                    role="button" aria-expanded="false" aria-controls="collapseExample" onclick="categorytabal3TableRefresh()">
                                    <i class="bi bi-gear" style="margin-right: 5px"></i> Item Category Level 3
                                </button>
                            </h5>
                        </div>
                        <div id="categoryLevel3" class="collapse" aria-labelledby="headingDesignation"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>

                                    <button id="btnCategory3" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modelcategoryLeve3"
                                        onclick="loadcategory3()">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>





                                </div>
                                <div class="table-responsive">
                                    <!-- Required for Responsive -->
                                    <table class="table datatable-fixed-both-l3 table-striped" id="tabalCategoryLevel3">
                                        <thead>
                                            <tr>
                                                <th class="id">ID</th>
                                                <th>Item Category level 2</th>
                                                <th>Item Category Level 3</th>
                                                <th class="edit edit_bank">Edit</th>
                                                <th class="edit edit_bank btn-danger">Delete</th>
                                                <th class="disable disable_bank">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>




                    {{-- ........Desgination.......... --}}



                    <div class="card">
                        <div class="card-header" id="headingDesignation">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-bs-toggle="collapse" href="#desgination"
                                    role="button" aria-expanded="false" aria-controls="collapseExample" onclick="desginationTableRefresh()">
                                    <i class="bi bi-gear" style="margin-right: 5px"></i>Employee Desgination
                                </button>
                            </h5>
                        </div>
                        <div id="desgination" class="collapse" aria-labelledby="headingDesignation"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>

                                    <button id="btnDesgination" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modelDesgination">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>



                                </div>
                                <div class="table-responsive">
                                    <!-- Required for Responsive -->
                                    <table class="table datatable-fixed-both-des table-striped" id="tabalDesgination">
                                        <thead>
                                            <tr>
                                                <th class="id">ID</th>
                                                <th>Employee Desgination</th>
                                                <th class="edit edit_bank">Edit</th>
                                                <th class="edit edit_bank btn-danger">Delete</th>
                                                <th class="disable disable_bank">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>





                    {{-- .........Status.......... --}}



                    <div class="card">
                        <div class="card-header" id="headingDesignation">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-bs-toggle="collapse" href="#status1M" role="button"
                                    aria-expanded="false" aria-controls="collapseExample" onclick="employeestatusTableRefresh()">
                                    <i class="bi bi-gear" style="margin-right: 5px"></i>Employee Status
                                </button>
                            </h5>
                        </div>
                        <div id="status1M" class="collapse" aria-labelledby="headingDesignation"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>

                                    <button id="btnStatuss" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modelStatus1">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>




                                </div>
                                <div class="table-responsive">
                                    <!-- Required for Responsive -->
                                    <table class="table datatable-fixed-both-st table-striped" id="tabalStatus1">
                                        <thead>
                                            <tr>
                                                <th class="id">ID</th>
                                                <th>Employee Status</th>

                                                <th class="edit edit_bank">Edit</th>
                                                <th class="edit edit_bank btn-danger">Delete</th>
                                                <th class="disable disable_bank">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>



                     {{-- .........vehicle_type.......... --}}



                     <div class="card">
                        <div class="card-header" id="headingVehicletype">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-bs-toggle="collapse" href="#vahiclt" role="button"
                                    aria-expanded="false" aria-controls="collapseExample" onclick="vehicletypeTableRefresh()">
                                    <i class="bi bi-gear" style="margin-right: 5px"></i>Vehicle type
                                </button>
                            </h5>
                        </div>
                        <div id="vahiclt" class="collapse" aria-labelledby="headingVehicletype"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div>

                                    <button id="btnVehicle" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modeVehicletype">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>




                                </div>
                                <div class="table-responsive">
                                    <!-- Required for Responsive -->
                                    <table class="table datatable-fixed-both-st table-striped" id="tabalVehicle">
                                        <thead>
                                            <tr>
                                                <th class="id">ID</th>
                                                <th>Vehicle type</th>

                                                <th class="edit edit_bank">Edit</th>
                                                <th class="edit edit_bank btn-danger">Delete</th>
                                                <th class="disable disable_bank">Status</th>
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
            </div>
        </div>
    </div>
    </div>
    <!-- /dashboard content -->

    </div>
    <!-- /content area -->

    @include('commonsettinModal')
    @include('categoryLevelModal')





@endsection
@section('center-scripts')
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Theme JS files -->
    <script src="{{ URL::asset('assets/js/vendor/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/forms/validation/validate.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/notifications/bootbox.min.js') }}"></script>
<script src="{{ URL::asset('assets/demo/pages/components_buttons.js') }}"></script>
<script src="{{URL::asset('assets/demo/pages/components_modals.js')}}"></script>

    <script src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/fixed_columns.min.js') }}"></script>


@endsection
@section('scripts')

    <script src="{{ URL::asset('assets/demo/pages/form_validation_library.js') }}"></script>
    <script src="{{ URL::asset('assets/js/commonSetting.js') }}?random=<?php echo uniqid(); ?>"></script>
    <script src="{{ URL::asset('assets/js/categoryLevel.js') }}?random=<?php echo uniqid(); ?>"></script>

    <script src="{{ URL::asset('assets/js/web-rd-fromValidation.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


@endsection
