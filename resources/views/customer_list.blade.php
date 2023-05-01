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

    <!-- Multiple fixed columns -->
    <div class="card mt-2">
        <div class="card-header">
            <h5 class="mb-0">Customer List</h5>
        </div>

        <table class="table datatable-fixed-both" id="myTable">
            <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    <th>Extn.</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">$320,800</span></td>
                    <td>5421</td>
                    <td><a href="#">t.nixon@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Garrett</td>
                    <td>Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger">$170,750</span></td>
                    <td>8422</td>
                    <td><a href="#">g.winters@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Ashton</td>
                    <td>Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td><span class="badge bg-secondary bg-opacity-10 text-secondary">$86,000</span></td>
                    <td>1562</td>
                    <td><a href="#">a.cox@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Cedric</td>
                    <td>Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td><span class="badge bg-success bg-opacity-10 text-success">$433,060</span></td>
                    <td>6224</td>
                    <td><a href="#">c.kelly@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Airi</td>
                    <td>Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger">$162,700</span></td>
                    <td>5407</td>
                    <td><a href="#">a.satou@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Brielle</td>
                    <td>Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">$372,000</span></td>
                    <td>4804</td>
                    <td><a href="#">b.williamson@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Herrod</td>
                    <td>Chandler</td>
                    <td>Sales Assistant</td>
                    <td>San Francisco</td>
                    <td>59</td>
                    <td>2012/08/06</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger">$137,500</span></td>
                    <td>9608</td>
                    <td><a href="#">h.chandler@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Rhona</td>
                    <td>Davidson</td>
                    <td>Integration Specialist</td>
                    <td>Tokyo</td>
                    <td>55</td>
                    <td>2010/10/14</td>
                    <td><span class="badge bg-secondary bg-opacity-10 text-secondary">$97,900</span></td>
                    <td>6200</td>
                    <td><a href="#">r.davidson@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Colleen</td>
                    <td>Hurst</td>
                    <td>Javascript Developer</td>
                    <td>San Francisco</td>
                    <td>39</td>
                    <td>2009/09/15</td>
                    <td><span class="badge bg-success bg-opacity-10 text-success">$405,500</span></td>
                    <td>2360</td>
                    <td><a href="#">c.hurst@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Sonya</td>
                    <td>Frost</td>
                    <td>Software Engineer</td>
                    <td>Edinburgh</td>
                    <td>23</td>
                    <td>2008/12/13</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger">$103,600</span></td>
                    <td>1667</td>
                    <td><a href="#">s.frost@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Jena</td>
                    <td>Gaines</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>30</td>
                    <td>2008/12/19</td>
                    <td><span class="badge bg-secondary bg-opacity-10 text-secondary">$90,560</span></td>
                    <td>3814</td>
                    <td><a href="#">j.gaines@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Quinn</td>
                    <td>Flynn</td>
                    <td>Support Lead</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2013/03/03</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">$342,000</span></td>
                    <td>9497</td>
                    <td><a href="#">q.flynn@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Charde</td>
                    <td>Marshall</td>
                    <td>Regional Director</td>
                    <td>San Francisco</td>
                    <td>36</td>
                    <td>2008/10/16</td>
                    <td><span class="badge bg-success bg-opacity-10 text-success">$470,600</span></td>
                    <td>6741</td>
                    <td><a href="#">c.marshall@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Haley</td>
                    <td>Kennedy</td>
                    <td>Senior Marketing Designer</td>
                    <td>London</td>
                    <td>43</td>
                    <td>2012/12/18</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger">$113,500</span></td>
                    <td>3597</td>
                    <td><a href="#">h.kennedy@datatables.net</a></td>
                </tr>
                <tr>
                    <td>Tatyana</td>
                    <td>Fitzpatrick</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>19</td>
                    <td>2010/03/17</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">$385,750</span></td>
                    <td>1965</td>
                    <td><a href="#">t.fitzpatrick@datatables.net</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /multiple fixed columns -->

</div>
<!-- /content area -->

@endsection
@section('center-scripts')
<!-- Javascript -->
<script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>
<!-- Theme JS files -->
<script src="{{URL::asset('assets/js/vendor/tables/datatables/datatables.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/fixed_columns.min.js')}}"></script>

@endsection
@section('scripts')
<script src="{{URL::asset('assets/demo/pages/form_validation_library.js')}}"></script>
<script src="{{URL::asset('assets/js/customer_list.js')}}"></script>
@endsection