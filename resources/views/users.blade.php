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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <form class="bg-white p-4 needs-validation" novalidate id="userform" id="form">
                <div class="mb-3"> <label for="name">User</label></div>

                <div class="form-group">
                    <label for="name">Username </label>
                    <input type="text" class="form-control" id="txtname" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="txtEmail" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="txtPassword" name="password">
                </div>
                <div class="form-group">
                    <label for="password">Conform Password</label>
                    <input type="password" class="form-control" id="txtConformPassword" name="conformpassword">
                </div>
                <div class="form-group">
                    <label for="role">User Role </label>
                    <select id="cmbuserRole" class="form-control form-control-sm select2"
                    style="width: 100%" data-placeholder="Select Here....">

                </select>
                </div>
                <div class="form-group">
                    <label for="role">User Type </label>
                    <select id="cmbuserTypeRole" class="form-control form-control-sm"
                    >
                    <option value="0">Guest</option>
                    <option value="1">Employee</option>

                </select>
                </div>
                <div class="form-group" id="empshow">
                    <label for="role">Select Employee </label>
                    <select id="cmbuEmployee" class="form-control form-control-sm "
                    >
                    <option value="0">Guest</option>
                    <option value="1">Employee</option>

                </select>
                </div>
                <div class="mt-3">
                    <button type="button" id="btnusersave" class="btn btn-primary">Save</button>
                </div>

            </form>
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
        <script src="{{ URL::asset('assets/js/users.js') }}?random=<?php echo uniqid(); ?>"></script>
    @endsection
