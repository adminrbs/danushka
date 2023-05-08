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

                    <div class="card-body border-top">

                        <div class="mb-4">
                            <div class="card">
                                <div class="card-header " id="headingDesignation">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link " data-bs-toggle="collapse" href="#district"
                                            role="button" aria-expanded="false" aria-controls="collapseExample"
                                            onclick="">
                                            <i class="bi bi-gear" style="margin-right: 5px"></i>District
                                        </button>
                                    </h5>
                                </div>
                                <div id="district" class="collapse" aria-labelledby="headingDesignation"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modelDistric">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <div class="mr-3" style="margin-left: 80%">

                                                <input type="search" name="distsearch" id="distSearch"
                                                    class="form-control mr-5" placeholder="Search">
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <!-- Required for Responsive -->
                                            <table class="table table-striped table-responsive-stack">
                                                <thead>
                                                    <tr>
                                                        <th class="id">ID#</th>
                                                        <th>Name</th>
                                                        <th class="edit edit_bank">Edit</th>
                                                        <th class="edit edit_bank btn-danger">Delete</th>
                                                        <th class="disable disable_bank">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableDistrict">
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
                                                <tbody id="content3" class="districtSer"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- .........Town.......... --}}

                            <div class="card">
                                <div class="card-header" id="headingDesignation">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-bs-toggle="collapse" href="#town" role="button"
                                            aria-expanded="false" aria-controls="collapseExample" onclick="">
                                            <i class="bi bi-gear" style="margin-right: 5px"></i> Town
                                        </button>
                                    </h5>
                                </div>
                                <div id="town" class="collapse" aria-labelledby="headingDesignation"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modelTown">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <div class="search" style="margin-left: 80%">

                                                <input type="search" name="townsearch" id="townSearch" class="form-control"
                                                    placeholder="Search">
                                            </div>

                                        </div>
                                        <div class="table-responsive">
                                            <!-- Required for Responsive -->
                                            <table class="table table-striped table-responsive-stack">
                                                <thead>
                                                    <tr>
                                                        <th class="id">ID#</th>
                                                        <th>Town Name</th>
                                                        <th>District Name</th>
                                                        <th class="edit edit_bank">Edit</th>
                                                        <th class="edit edit_bank btn-danger">Delete</th>
                                                        <th class="disable disable_bank">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyTown">
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
                                                <tbody id="content2" class="townSer"></tbody>
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
                                            aria-expanded="false" aria-controls="collapseExample" onclick="">
                                            <i class="bi bi-gear" style="margin-right: 5px"></i> Group
                                        </button>
                                    </h5>
                                </div>
                                <div id="group" class="collapse" aria-labelledby="headingDesignation"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalGroup">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <div class="search" style="margin-left: 80%">

                                                <input type="search" name="groupsearch" id="groupSearch"
                                                    class="form-control" placeholder="Search">
                                            </div>

                                        </div>
                                        <div class="table-responsive">
                                            <!-- Required for Responsive -->
                                            <table class="table table-striped table-responsive-stack">
                                                <thead>
                                                    <tr>
                                                        <th class="id">ID#</th>
                                                        <th>Name</th>
                                                        <th class="edit edit_bank">Edit</th>
                                                        <th class="edit edit_bank btn-danger">Delete</th>
                                                        <th class="disable disable_bank">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyGrouo">
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
                                                <tbody id="content1" class="groupSer"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            {{-- .........Grade.......... --}}



                            <div class="card">
                                <div class="card-header" id="headingDesignation">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-bs-toggle="collapse" href="#grade"
                                            role="button" aria-expanded="false" aria-controls="collapseExample"
                                            onclick="">
                                            <i class="bi bi-gear" style="margin-right: 5px"></i> Grade
                                        </button>
                                    </h5>
                                </div>
                                <div id="grade" class="collapse" aria-labelledby="headingDesignation"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalGrade">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <div class="search" style="margin-left: 80%">

                                                <input type="search" name="search" id="gradeSearch"
                                                    class="form-control" placeholder="Search">
                                            </div>




                                        </div>
                                        <div class="table-responsive">
                                            <!-- Required for Responsive -->
                                            <table id="gradeTable"
                                                class="table table-striped table-responsive-stack datatbothable-fixed-">
                                                <thead>
                                                    <tr>
                                                        <th class="id">ID</th>
                                                        <th>Grade</th>
                                                        <th class="edit edit_bank">Edit</th>
                                                        <th class="edit edit_bank btn-danger">Delete</th>
                                                        <th class="disable disable_bank">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabalGroup">
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
                                                <tbody id="content" class="searhdata"></tbody>
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
                                            role="button" aria-expanded="false" aria-controls="collapseExample"
                                            onclick="">
                                            <i class="bi bi-gear" style="margin-right: 5px"></i> Item Category Level 1
                                        </button>
                                    </h5>
                                </div>
                                <div id="categoryLevel1" class="collapse" aria-labelledby="headingDesignation"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modelcategoryLevel">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <div class="search" style="margin-left: 80%">

                                                <input type="search" name="search" id="categoryLevel1Search"
                                                    class="form-control" placeholder="Search">
                                            </div>




                                        </div>
                                        <div class="table-responsive">
                                            <!-- Required for Responsive -->
                                            <table id="categoryLevel1"
                                                class="table table-striped table-responsive-stack datatbothable-fixed-">
                                                <thead>
                                                    <tr>
                                                        <th class="id">ID</th>
                                                        <th>Item Category Level 1 </th>
                                                        <th class="edit edit_bank">Edit</th>
                                                        <th class="edit edit_bank btn-danger">Delete</th>
                                                        <th class="disable disable_bank">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabalCategoryLevel1">



                                                </tbody>
                                                <tbody id="contentl1" class="catLevel1"></tbody>
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
                                            role="button" aria-expanded="false" aria-controls="collapseExample"
                                            onclick="">
                                            <i class="bi bi-gear" style="margin-right: 5px"></i> Item Category Level  2
                                        </button>
                                    </h5>
                                </div>
                                <div id="categoryLevel2" class="collapse" aria-labelledby="headingDesignation"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modelcategoryLeve2">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <div class="search" style="margin-left: 80%">

                                                <input type="search" name="search" id="categoryLevel2Search"
                                                    class="form-control" placeholder="Search">
                                            </div>




                                        </div>
                                        <div class="table-responsive">
                                            <!-- Required for Responsive -->
                                            <table id="categoryLevel1Table"
                                                class="table table-striped table-responsive-stack datatbothable-fixed-">
                                                <thead>
                                                    <tr>
                                                        <th class="id">ID</th>
                                                        <th>Item Category level 1</th>
                                                        <th>Item Category Level  2</th>
                                                        <th class="edit edit_bank">Edit</th>
                                                        <th class="edit edit_bank btn-danger">Delete</th>
                                                        <th class="disable disable_bank">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabalCategoryLevel2">



                                                </tbody>
                                                <tbody id="contentl2" class="catLevel2"></tbody>
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
                                            role="button" aria-expanded="false" aria-controls="collapseExample"
                                            onclick="">
                                            <i class="bi bi-gear" style="margin-right: 5px"></i> Item Category Level 3
                                        </button>
                                    </h5>
                                </div>
                                <div id="categoryLevel3" class="collapse" aria-labelledby="headingDesignation"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modelcategoryLeve3">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <div class="search" style="margin-left: 80%">

                                                <input type="search" name="search" id="categoryLevel3Search"
                                                    class="form-control" placeholder="Search">
                                            </div>




                                        </div>
                                        <div class="table-responsive">
                                            <!-- Required for Responsive -->
                                            <table id="categoryLevel1Table"
                                                class="table table-striped table-responsive-stack datatbothable-fixed-">
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
                                                <tbody id="tabalCategoryLevel3">



                                                </tbody>
                                                <tbody id="contentl3" class="catLevel3"></tbody>
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
                                            role="button" aria-expanded="false" aria-controls="collapseExample"
                                            onclick="">
                                            <i class="bi bi-gear" style="margin-right: 5px"></i> Desgination
                                        </button>
                                    </h5>
                                </div>
                                <div id="desgination" class="collapse" aria-labelledby="headingDesignation"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modelDesgination">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <div class="search" style="margin-left: 80%">

                                                <input type="search" name="search" id="desginationSearch"
                                                    class="form-control" placeholder="Search">
                                            </div>




                                        </div>
                                        <div class="table-responsive">
                                            <!-- Required for Responsive -->
                                            <table id="desginationTable"
                                                class="table table-striped table-responsive-stack datatbothable-fixed-">
                                                <thead>
                                                    <tr>
                                                        <th class="id">ID</th>
                                                        <th>Desgination</th>
                                                        <th class="edit edit_bank">Edit</th>
                                                        <th class="edit edit_bank btn-danger">Delete</th>
                                                        <th class="disable disable_bank">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabalDesgination">



                                                </tbody>
                                                <tbody id="contentDesgination" class="desgination"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>





                            {{-- .........Status.......... --}}



                            <div class="card">
                                <div class="card-header" id="headingDesignation">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-bs-toggle="collapse" href="#status1M"
                                            role="button" aria-expanded="false" aria-controls="collapseExample"
                                            onclick="">
                                            <i class="bi bi-gear" style="margin-right: 5px"></i> Status
                                        </button>
                                    </h5>
                                </div>
                                <div id="status1M" class="collapse" aria-labelledby="headingDesignation"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modelStatus1">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <div class="search" style="margin-left: 80%">

                                                <input type="search" name="search" id="status1Search"
                                                    class="form-control" placeholder="Search">
                                            </div>




                                        </div>
                                        <div class="table-responsive">
                                            <!-- Required for Responsive -->
                                            <table id="status1Table"
                                                class="table table-striped table-responsive-stack datatbothable-fixed-">
                                                <thead>
                                                    <tr>
                                                        <th class="id">ID</th>
                                                        <th>Status</th>

                                                        <th class="edit edit_bank">Edit</th>
                                                        <th class="edit edit_bank btn-danger">Delete</th>
                                                        <th class="disable disable_bank">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabalStatus1">



                                                </tbody>
                                                <tbody id="contentStatus" class="status1"></tbody>
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


@endsection
@section('scripts')

    <script src="{{ URL::asset('assets/demo/pages/form_validation_library.js') }}"></script>
    <script src="{{ URL::asset('assets/js/commonSetting.js') }}"></script>
    <script src="{{ URL::asset('assets/js/categoryLevel.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


@endsection
