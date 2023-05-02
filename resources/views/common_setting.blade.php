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
                                    <button class="btn btn-link" data-bs-toggle="collapse" href="#collapseBank" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="">
                                        <i class="ti-settings mr-2"></i> Bank
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseBank" class="collapse" aria-labelledby="headingDesignation" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                            <tbody id="tblbank">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Common Setting</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


                <div class="modal-body p-4 bg-light">
                    <form id="" class="form-validate-jquery">
                    <div class="row">
                        <div class="col-lg">
                            <label for="fname">District</label>
                            <input type="text" name="district" id="txtDistrict" class="form-control"
                                required>
                        </div>
                    </div>

                   <div class="my-2">
                        <label for="email">Town</label>
                        <input type="text" name="town" id="txtTown" class="form-control"
                           >
                    </div>

                   <div class="my-2">
                        <label for="phone">Group</label>
                        <input type="tel" name="group" id="txtGroup" class="form-control"
                           >
                    </div>

                    <div class="my-2">
                        <label for="post">Grade</label>
                        <input type="text" name="grade" id="txtGrade" class="form-control">
                    </div>
                </div>


        </div>
        <div class="modal-footer">
          <button type="close" id="btnClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="btnSave_commonSetting" class="btn btn-primary ">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- Modal -->

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
