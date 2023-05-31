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
    <div class="content">
        <div class="card">
            <div class="card-header bg-dark text d-flex align-items-center" style="color: white;">
                <h5 class="mb-0">Change Password</h5>
                <div class="d-inline-flex ms-auto"></div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">

                        <form class="bg-white p-4 needs-validation" novalidate id="form">


                            <div class="form-group">
                                <label >User Name </label>
                                <input type="text" class="form-control" id="txtusername" name="username" required>
                            </div>
                            <div class="form-group">
                                <label >Current Password</label>
                                <input type="password" class="form-control" id="txtcurrentPassword" name="currentPassword">
                            </div>
                            <div class="form-group">
                                <label >New Password</label>
                                <input type="password" class="form-control" id="txtnewPassword" name="newPassword">
                            </div>
                            <div class="form-group" id="conformPassword">
                                <label for="password">Confirm New Password</label>
                                <input type="password" class="form-control" id="txtConformPassword" name="conformpassword">
                            </div>

                            <div class="mt-3">
                               
                                <button type="button" id="btnsaveChange" class="btn btn-primary">Save Changes</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('center-scripts')
    <!-- Javascript -->
    <script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>
    <!-- Theme JS files -->
    <script src="{{ URL::asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/fixed_columns.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/notifications/bootbox.min.js') }}"></script>
    <script src="{{ URL::asset('assets/demo/pages/components_buttons.js') }}"></script>
    <script src="{{ URL::asset('assets/demo/pages/components_modals.js') }}"></script>
    <script src="{{ URL::asset('assets/js/vendor/forms/selects/select2.min.js') }}"></script>


@endsection
@section('scripts')
    <script src="{{ URL::asset('assets/demo/pages/form_validation_library.js') }}"></script>
    <script src="{{ URL::asset('assets/js/web-rd-fromValidation.js') }}"></script>
    <script src="{{ URL::asset('assets/js/changePassword.js') }}?random=<?php echo uniqid(); ?>"></script>
@endsection
