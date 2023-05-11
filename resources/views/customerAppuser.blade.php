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
        <div class="card">
            <div class="card-header" id="headingDesignation">
                <h5 class="mb-0">

                        <i class="bi bi-gear text-primary" style="margin-right: 5px"></i>Customer Name

                </h5>
            </div>


                <div class="card-body">
                    <div>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalCustomerApp">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <div class="search" style="margin-left: 80%">

                            <input type="search" name="search" id="customerAppSearch"
                                class="form-control" placeholder="search">
                        </div>




                    </div>
                    <div class="table-responsive">
                        <!--Required for Responsive-->
                        <table id="customerAppTable"
                            class="table table-striped table-responsive-stack datatbothable-fixed-">
                            <thead>
                                <tr>
                                    <th class="id">ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Mobile Phone</th>
                                    <th>Password</th>

                                    <th class="edit edit_bank">Edit</th>
                                    <th class="edit edit_bank btn-danger">Delete</th>
                                    <th class="disable disable_bank">Status</th>
                                </tr>
                            </thead>
                            <tbody id="tableCustomerApp">


                            </tbody>
                            <tbody id="contentCustomerApp" class="customerApp"></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- Dashboard content -->


        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /content area -->


{{--.........Model.......--}}

<!-- suply Group -->
<div class="modal fade" id="modalCustomerApp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


              <div class="modal-body p-4 bg-light">
                  <form id="" class="form-validate-jquery">
                  <div class="row">
                      <div class="col-lg">
                        <div class="row mb-1">
                            <div class="mb-3 row mb">
                                <label class="col-form-label col-md-2 mb-0">Customer Name <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <select class="form-control  form-control-sm select" data-placeholder="Select Here...." required id="cmbcustomerApp">
                                        <optgroup label="Mountain Time Zone">
                                            <option value="" disabled selected></option>
                                            @foreach ($data as $data)
                                            <option value="{{ $data->customer_id  }}">
                                                {{ $data->customer_name}}</option>
                                        @endforeach


                                        </optgroup>

                                    </select>
                                </div>
                            </div>
                        </div>
                          <label for="fname">Email<span
                              class="text-danger">*</span></label>
                          <input type="text" id="txtEmailcustomer" class="form-control validate" required>
                          <span class="text-danger font-weight-bold CustomerApp"></span>
                          <label for="fname">Mobile Phone<span
                            class="text-danger">*</span></label>
                        <input type="text" id="txtMobilphonecustomer" class="form-control validate" required>
                        <span class="text-danger font-weight-bold CustomerApp"></span>
                        <label for="fname">Password<span
                            class="text-danger">*</span></label>
                        <input type="password"  id="txtPasswordcustomer" class="form-control validate" required>
                        <span class="text-danger font-weight-bold CustomerApp"></span>
                      </div>
                  </div>


              </div>


      </div>
      <div class="modal-footer">
          <input type="hidden" id="id">

        <button type="submit" id="btnCloseCustomerApp" class="btn btn-secondary">Close</button>
        <button type="submit" id="btncustomeruserApp" class="btn btn-primary ">Save</button>
        <button type="submit" id="btnUpdatecustomeruserApp" class="btn btn-primary updategroup">Update</button>
      </div>
  </form>
    </div>
  </div>
</div>
<!-- Modal -->

{{--........End.Model.......--}}




@endsection
@section('center-scripts')
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Theme JS files -->
    <script src="{{ URL::asset('assets/js/vendor/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/forms/validation/validate.min.js') }}"></script>
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



@endsection
@section('scripts')

    <script src="{{ URL::asset('assets/demo/pages/form_validation_library.js') }}"></script>
  <script src="{{ URL::asset('assets/js/customer_app_user.js') }}"></script>
  <script src="{{URL::asset('assets/js/form.js')}}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


@endsection
