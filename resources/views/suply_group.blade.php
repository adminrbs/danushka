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
        <div class="card-header bg-dark text d-flex align-items-center" style="color: white;">
            <h5 class="mb-0">Supply group</h5>
            <div class="d-inline-flex ms-auto"></div>
        </div>


                <div class="card-body">
                    <div>

                        <button id="btnSuplyGroup" type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalSuplyGroup">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <div class="search" style="margin-left: 80%">

                            <input type="text" name="search" id="suplyGroupSearch"
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
                                    <th>Supply group</th>

                                    <th class="edit edit_bank">Edit</th>
                                    <th class="edit edit_bank btn-danger">Delete</th>
                                    <th class="disable disable_bank">Status</th>
                                </tr>
                            </thead>
                            <tbody id="tableSuplyGroup">


                            </tbody>

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
<div class="modal fade" id="modalSuplyGroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supply group</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


              <div class="modal-body p-4 bg-light">
                  <form id="" class="needs-validation" novalidate>
                  <div class="row">
                      <div class="col-lg">
                          <label for="fname">Supply group<span
                              class="text-danger">*</span></label>
                          <input type="text" name="supplygroup" id="txtSupplygroup" class="form-control validate" required>
                          <span class="text-danger font-weight-bold Supplygroup"></span>
                      </div>
                  </div>


              </div>


      </div>
      <div class="modal-footer">
          <input type="hidden" id="id">
        <button type="submit" id="btnCloseupdate" class="btn btn-secondary">Close</button>
        <button type="submit" id="btnSupplygroup" class="btn btn-primary ">Save</button>
        <button type="submit" id="btnUpdateSupplygroup" class="btn btn-primary updategroup">Update</button>
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
  <script src="{{ URL::asset('assets/js/suply_group.js') }}"></script>
  <script src="{{ URL::asset('assets/js/web-rd-fromValidation.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


@endsection
