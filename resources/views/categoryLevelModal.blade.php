<!-- Modal categoryLevel 1-->
<div class="modal fade" id="modelcategoryLevel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Item Category Level 1 </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="modal-body p-4 bg-light">
                    <form id="" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Item Category Level 1 <span class="text-danger">*</span></label>
                                <input type="text" name="categoryLevel1" id="txtCategorylevel1" class="form-control"
                                    required>
                                    <span class="text-danger font-weight-bold category1"></span>
                            </div>
                        </div>


                </div>


            </div>
            <div class="modal-footer">
                <input type="hidden" id="id">
                <button type="submit" id="btnClose1" class="btn btn-secondary" >Close</button>
                <button type="submit" id="btnSaveCategorylevel1"
                    class="btn btn-primary btnSaveCategorylevel1">Save</button>
                <button type="submit" id="btnUpdateCategorylevel1"
                    class="btn btn-primary categorylevel1">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->


<!-- Modal categoryLevel 2-->
<div class="modal fade" id="modelcategoryLeve2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Item Category Level 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="modal-body p-4 bg-light">
                    <form id="" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Item Category level 1<span class="text-danger">*</span></label>
                                <select class="form-select" aria-label="Default select example" id="cmbLeve1">
                                    @foreach ($level1 as $level1)
                                        <option value="{{ $level1->item_category_level_1_id }}">
                                            {{ $level1->category_level_1 }}</option>
                                    @endforeach


                                </select>

                                <label for="fname">Item Category Level 2<span class="text-danger">*</span></label>
                                <input type="text" name="categoryLevel2" id="txtCategorylevel2"
                                    class="form-control validate" required>
                                    <span class="text-danger font-weight-bold category2"></span>
                            </div>
                        </div>


                </div>


            </div>
            <div class="modal-footer">
                <input type="hidden" id="id">
                <button type="submit" id="btnClose2" class="btn btn-secondary" >Close</button>
                <button type="submit" id="btnSaveCategorylevel2"
                    class="btn btn-primary btnSaveCategorylevel2">Save</button>
                <button type="submit" id="btnUpdateCategorylevel2"
                    class="btn btn-primary categorylevel2">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->



<!-- Modal categoryLevel 3-->
<div class="modal fade" id="modelcategoryLeve3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Item Category Level 3</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="modal-body p-4 bg-light">
                    <form id="" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Item Category level 2<span class="text-danger">*</span></label>
                                <select class="form-select" aria-label="Default select example" id="cmbLeve2">
                                    @foreach ($level2 as $level2)
                                        <option value="{{ $level2->Item_category_level_2_id }}">
                                            {{ $level2->category_level_2 }}</option>
                                    @endforeach


                                </select>
                                <label for="fname">Item Category Level 3<span class="text-danger">*</span></label>
                                <input type="text" name="categoryLevel3" id="txtCategorylevel3"
                                    class="form-control validate" required>
                                    <span class="text-danger font-weight-bold category3"></span>

                            </div>
                        </div>


                </div>


            </div>
            <div class="modal-footer">
                <input type="hidden" id="id">
                <button type="submit" id="btnClose3" class="btn btn-secondary" >Close</button>
                <button type="submit" id="btnSaveCategorylevel3"
                    class="btn btn-primary btnSaveCategorylevel3">Save</button>
                <button type="submit" id="btnUpdateCategorylevel3"
                    class="btn btn-primary categorylevel3">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->





<!-- Modal Distination-->
<div class="modal fade" id="modelDesgination" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Desgination</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="modal-body p-4 bg-light">
                    <form id="" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-lg">

                                <label for="fname">Desgination<span class="text-danger">*</span></label>
                                <input type="text" name="desgination" id="txtDesgination"
                                    class="form-control validate" required>
                                    <span class="text-danger font-weight-bold desgination"></span>

                            </div>
                        </div>


                </div>


            </div>
            <div class="modal-footer">
                <input type="hidden" id="id">
                <button type="submit" id="btnClose4" class="btn btn-secondary" >Close</button>
                <button type="submit" id="btnSaveDesgination"
                    class="btn btn-primary btnSaveCategorylevel3">Save</button>
                <button type="submit" id="btnUpdateDesgination"
                    class="btn btn-primary categorylevel3">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->





<!-- Modal Status -->
<div class="modal fade" id="modelStatus1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="modal-body p-4 bg-light">
                    <form id="" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-lg">

                                <label for="fname">Status<span class="text-danger">*</span></label>
                                <input type="text" name="status" id="txtStatus" class="form-control validate"
                                    required>
                                    <span class="text-danger font-weight-bold status"></span>
                            </div>
                        </div>


                </div>


            </div>
            <div class="modal-footer">
                <input type="hidden" id="id">
                <button type="submit" id="btnClose5" class="btn btn-secondary" >Close</button>
                <button type="submit" id="btnSaveStatus" class="btn btn-primary btnSaveCategorylevel3">Save</button>
                <button type="submit" id="btnUpdateStatus" class="btn btn-primary categorylevel3">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->



<script src="{{URL::asset('assets/js/vendor/tables/datatables/datatables.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/fixed_columns.min.js')}}"></script>
