<!-- Modal Dstric-->
<div class="modal fade" id="modelDistric" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">District</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


                <div class="modal-body p-4 bg-light">
                    <form id="" class="form-validate-jquery">
                    <div class="row">
                        <div class="col-lg">
                            <label for="fname">District<span
                                class="text-danger">*</span></label>
                            <input type="text" name="district" id="txtDistrict" class="form-control validate" required>
                        </div>
                    </div>


                </div>


        </div>
        <div class="modal-footer">
            <input type="hidden" id="id">
          <button type="close" id="btnClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="btnSaveDistric" class="btn btn-primary btnSaveDistric">Save</button>
          <button type="submit" id="btnUpdateDistrict" class="btn btn-primary updateDistrict">Update</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- Modal -->




  <!-- Modal Town-->
<div class="modal fade" id="modelTown" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Town</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


                <div class="modal-body p-4 bg-light">
                    <form id="" class="form-validate-jquery">
                    <div class="row">
                        <div class="col-lg">
                            <label for="fname">District</label>
                            <select class="form-select" aria-label="Default select example" id="cmbDistrict">
                                @foreach ($data as $data )
                                <option value="{{ $data->district_id }}">{{ $data->district_name}}</option>
                                @endforeach


                              </select>
                        </div>
                        <div class="col-lg">
                            <label for="fname">Town<span
                                class="text-danger">*</span></label>
                            <input type="text" name="Town" id="txtTown" class="form-control validate" required>

                        </div>

                    </div>


                </div>


        </div>
        <div class="modal-footer">
            <input type="hidden" id="id">
          <button type="close" id="btnClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="btnSaveTown" class="btn btn-primary ">Save</button>
          <button type="submit" id="btnUpdateTown" class="btn btn-primary updateTown">Update</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- Modal -->



  <!-- Modal Group -->
<div class="modal fade" id="modalGroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Group</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


                <div class="modal-body p-4 bg-light">
                    <form id="" class="form-validate-jquery">
                    <div class="row">
                        <div class="col-lg">
                            <label for="fname">Group<span
                                class="text-danger">*</span></label>
                            <input type="text" name="group" id="txtGroup" class="form-control validate" required>

                        </div>
                    </div>


                </div>


        </div>
        <div class="modal-footer">
            <input type="hidden" id="id">
          <button type="close" id="btnClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="btnSaveGroup" class="btn btn-primary ">Save</button>
          <button type="submit" id="btnUpdateGroup" class="btn btn-primary updategroup">Update</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- Modal -->



  <!-- Modal grade-->
<div class="modal fade" id="modalGrade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Grade</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


                <div class="modal-body p-4 bg-light">
                    <form id="" class="form-validate-jquery">
                    <div class="row">
                        <div class="col-lg">
                            <label for="fname">Grade <span
                                class="text-danger">*</span></label>
                            <input type="text" name="grade" id="txtgrade" class="form-control  txtgrede validate" required>
                        </div>
                    </div>


                </div>


        </div>
        <div class="modal-footer">
             <input type="hidden" id="id">
          <button type="close" id="btnClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="btnSavegrade" class="btn btn-primary ">Save</button>
          <button type="submit" id="btnUpdateGrade" class="btn btn-primary updateGrade">Update</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- Modal -->











