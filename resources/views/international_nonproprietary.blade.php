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

                        <i class="bi bi-gear" style="margin-right: 5px"></i>International nonproprietary name (INN)

                </h5>
            </div>


                <div class="card-body">
                    <div>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalNonproprietary">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <div class="search" style="margin-left: 80%">

                            <input type="search" name="search" id="nonproprietarySearch"
                                class="form-control" placeholder="Search">
                        </div>




                    </div>
                    <div class="table-responsive">
                        <!--Required for Responsive-->
                        <table id="status1Table"
                            class="table table-striped table-responsive-stack datatbothable-fixed-">
                            <thead>
                                <tr>
                                    <th class="id">ID</th>
                                    <th>International nonproprietary name (INN)</th>

                                    <th class="edit edit_bank">Edit</th>
                                    <th class="edit edit_bank btn-danger">Delete</th>
                                    <th class="disable disable_bank">Status</th>
                                </tr>
                            </thead>
                            <tbody id="tableNonproprietary">


                            </tbody>
                            <tbody id="contentNonproprietary" class="nonproprietary"></tbody>
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
<div class="modal fade" id="modalNonproprietary" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">International nonproprietary name (INN)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


              <div class="modal-body p-4 bg-light">
                  <form id="" class="form-validate-jquery">
                  <div class="row">
                      <div class="col-lg">
                          <label for="fname">International nonproprietary name (INN)<span
                              class="text-danger">*</span></label>
                          <input type="text" name="supplygroup" id="txtNonproprietary" class="form-control validate" required>
                          <span class="text-danger font-weight-bold Nonproprietary"></span>
                      </div>
                  </div>


              </div>


      </div>
      <div class="modal-footer">
          <input type="hidden" id="id">
        <button type="close" id="btnClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="btnNonproprietary" class="btn btn-primary ">Save</button>
        <button type="submit" id="btnUpdateNonproprietary" class="btn btn-primary updategroup">Update</button>
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


@endsection
@section('scripts')

    <script src="{{ URL::asset('assets/demo/pages/form_validation_library.js') }}"></script>
  <script src="{{ URL::asset('assets/js/international_nonproprietary.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


@endsection
