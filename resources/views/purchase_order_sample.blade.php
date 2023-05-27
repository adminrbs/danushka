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
                <div class="card-header bg-dark text d-flex align-items-center" style="color: white;">
                    <h5 class="mb-0">Purchase Order</h5>
                    <div class="d-inline-flex ms-auto"></div>
                </div>

                <form id="form" class="form-validate-jquery">
                    <div class="card-body border-top">
                        <div class="mb-4">

                            <div class="row mb-1">

                                <div class="col-md-4">
                                    <label class="badge transaction-lbl mb-0" style="width: 100%;text-align: left;"><span><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Referance No</span></label>
                                    <input type="text" name="customer_id" id="customer_id" class="form-control form-control-sm" required placeholder="Referance No" autocomplete="off">
                                </div>


                                <div class="col-md-4">
                                    <label class="badge transaction-lbl mb-0" style="width: 100%;text-align: left;"><span><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Date</span></label>
                                    <input type="text" name="date" id="date" class="form-control form-control-sm" required placeholder="Date" autocomplete="off">
                                </div>


                                <div class="col-md-4">
                                    <label class="badge transaction-lbl mb-0" style="width: 100%;text-align: left;"><span><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Supplier</span></label>
                                    <input type="text" name="supplier" id="supplier" class="form-control form-control-sm" required placeholder="Supplier" autocomplete="off">
                                </div>
                            </div>

                            <div class="row mb-1">

                                <div class="col-md-4">
                                    <label class="badge transaction-lbl mb-0" style="width: 100%;text-align: left;"><span><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Order By</span></label>
                                    <input type="text" name="order_by" id="order_by" class="form-control form-control-sm" required placeholder="Order By" autocomplete="off">
                                </div>


                                <div class="col-md-4">
                                    <label class="badge transaction-lbl mb-0" style="width: 100%;text-align: left;"><span><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Store</span></label>
                                    <select name="cmbStore" id="cmbStore" class="form-control form-control-sm" required>
                                        <option value="1">Abc</option>
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <label class="badge transaction-lbl mb-0" style="width: 100%;text-align: left;"><span><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Pay Term</span></label>
                                    <select name="cmbPayTurm" id="cmbPayTurm" class="form-control form-control-sm" required>
                                        <option value="1">Abc</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-1">

                                <div class="col-md-4">
                                    <label class="badge transaction-lbl mb-0" style="width: 100%;text-align: left;"><span><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Delivery Before</span></label>
                                    <input type="text" name="deliver_before" id="deliver_before" class="form-control form-control-sm" required placeholder="ID" autocomplete="off">
                                </div>


                                <div class="col-md-4">
                                    <label class="badge transaction-lbl mb-0" style="width: 100%;text-align: left;"><span><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Order Type</span></label>
                                    <input type="text" name="order_type" id="order_type" class="form-control form-control-sm" required placeholder="ID" autocomplete="off">
                                </div>


                                <div class="col-md-4">
                                    <label class="badge transaction-lbl mb-0" style="width: 100%;text-align: left;"><span><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Currency</span></label>
                                    <select name="cmbCurrency" id="cmbCurrency" class="form-control form-control-sm" required>
                                        <option value="1">Abc</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <hr>


                        <ul class="nav nav-tabs mb-0" id="tabs">
                            <li class="nav-item rbs-nav-item">
                                <a href="#product" class="nav-link active" aria-selected="true">Product</a>
                            </li>
                            <li class="nav-item rbs-nav-item">
                                <a href="#tother" class="nav-link" aria-selected="false">Other</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-striped" id="tblData">
                                                <thead>
                                                    <tr>
                                                        <th><span class="badge transaction-lbl" style="width: 100%;"><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Label</span></th>
                                                        <th><span class="badge transaction-lbl" style="width: 100%;"><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Text</span></th>
                                                        <th><span class="badge transaction-lbl" style="width: 100%;"><i class="fa fa-pencil fa-lg" aria-hidden="true">&#160</i>Select</span></th>
                                                        <th style="width: 120px;"><span class="badge transaction-lbl" style="width: 100%;">Button</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="other">
                                <h1>Tab2</h1>
                            </div>
                            <div class="tab-pane fade" id="tb3">
                                <h1>Tab3</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Total(before tax) :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="text-align: right;width: 100%;">0.00</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Total Tax :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="text-align: right;width: 100%;">0.00</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Total(after tax) :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="text-align: right;width: 100%;">0.00</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <strong class="font-weight-bold">Grand Total :</strong>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="text-align: right;width: 100%;">0.00</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-primary" id="btnSave" style="width: 100%;">Save Draft</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-info" style="width: 100%;">Save and Send</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                </form>
                <hr>

            </div>
        </div>
    </div>
</div>
<!-- /dashboard content -->




@include('datachooser.data-chooser')


</div>
<!-- /content area -->


@endsection
@section('center-scripts')
<!-- Javascript -->
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
<script src="{{URL::asset('assets/demo/pages/form_validation_library.js')}}"></script>
<script src="{{URL::asset('assets/rbs-js/transaction_table.min.js')}}"></script>
<script src="{{URL::asset('assets/js/purchase_order.js')}}"></script>
@endsection