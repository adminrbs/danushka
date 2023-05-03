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
                <div class="card-header d-flex align-items-center" style="background-color: #252b36; color: white;">
                    <h5 class="mb-0">Common Setting</h5>
                    <div class="d-inline-flex ms-auto"></div>
                </div>

                <div class="card-body border-top">

                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header" id="headingDesignation">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-bs-toggle="collapse" href="#district" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="">
                                        <i class="ti-settings mr-2"></i> District
                                    </button>
                                </h5>
                            </div>
                            <div id="district" class="collapse" aria-labelledby="headingDesignation" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modelDistric">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="query" id="search" placeholder="Search...">
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
                                                    <th class="disable disable_bank">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableDistrict">
                                               {{--<tr>
                                                    <td>0001</td>
                                                    <td>BOC</td>
                                                    <td><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                                    <td>
                                                        <label class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" name="switch_single" required>
                                                        </label>
                                                    </td>
                                                </tr>--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

{{--.........Town..........--}}

                        <div class="card">
                            <div class="card-header" id="headingDesignation">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-bs-toggle="collapse" href="#town" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="">
                                        <i class="ti-settings mr-2"></i> Town
                                    </button>
                                </h5>
                            </div>
                            <div id="town" class="collapse" aria-labelledby="headingDesignation" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modelTown">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>

                                    </div>
                                    <div class="table-responsive">
                                        <!-- Required for Responsive -->
                                        <table class="table table-striped table-responsive-stack">
                                            <thead>
                                                <tr>
                                                    <th class="id">ID#</th>
                                                    <th>District Name</th>
                                                    <th>Town Name</th>
                                                    <th class="edit edit_bank">Edit</th>
                                                    <th class="disable disable_bank">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyTown">
                                               {{--<tr>
                                                    <td>0001</td>
                                                    <td>BOC</td>
                                                    <td><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                                    <td>
                                                        <label class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" name="switch_single" required>
                                                        </label>
                                                    </td>
                                                </tr>--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

{{--.........Group..........--}}
                        <div class="card">
                            <div class="card-header" id="headingDesignation">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-bs-toggle="collapse" href="#group" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="">
                                        <i class="ti-settings mr-2"></i> Group
                                    </button>
                                </h5>
                            </div>
                            <div id="group" class="collapse" aria-labelledby="headingDesignation" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalGroup">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>

                                    </div>
                                    <div class="table-responsive">
                                        <!-- Required for Responsive -->
                                        <table class="table table-striped table-responsive-stack">
                                            <thead>
                                                <tr>
                                                    <th class="id">ID#</th>
                                                    <th>Name</th>
                                                    <th class="edit edit_bank">Edit</th>
                                                    <th class="disable disable_bank">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyGrouo">
                                               {{--<tr>
                                                    <td>0001</td>
                                                    <td>BOC</td>
                                                    <td><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                                    <td>
                                                        <label class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" name="switch_single" required>
                                                        </label>
                                                    </td>
                                                </tr>--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



{{--.........Grade..........--}}



                        <div class="card">
                            <div class="card-header" id="headingDesignation">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-bs-toggle="collapse" href="#grade" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="">
                                        <i class="ti-settings mr-2"></i> Grade
                                    </button>
                                </h5>
                            </div>
                            <div id="grade" class="collapse" aria-labelledby="headingDesignation" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalGrade">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>

                                    </div>
                                    <div class="table-responsive">
                                        <!-- Required for Responsive -->
                                        <table class="table table-striped table-responsive-stack">
                                            <thead>
                                                <tr>
                                                    <th class="id">ID#</th>
                                                    <th>Name</th>
                                                    <th class="edit edit_bank">Edit</th>
                                                    <th class="disable disable_bank">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabalGroup">
                                               {{--<tr>
                                                    <td>0001</td>
                                                    <td>BOC</td>
                                                    <td><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                                    <td>
                                                        <label class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" name="switch_single" required>
                                                        </label>
                                                    </td>
                                                </tr>--}}
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

@endsection
@section('center-scripts')
<!-- Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Theme JS files -->
<script src="{{URL::asset('assets/js/vendor/visualization/d3/d3.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/visualization/d3/d3_tooltip.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/forms/validation/validate.min.js')}}"></script>


@endsection
@section('scripts')
<script src="{{URL::asset('assets/demo/pages/form_validation_library.js')}}"></script>
<script src="{{ URL::asset('assets/js/commonSetting.js') }}"></script>
@endsection
