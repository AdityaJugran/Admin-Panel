<?php
require('./header.php');
require('./sidebar.php');

?>
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Antibody Info table</h6>
                </div>
            </div>
            <div class="card-body">
            <div class="alert alert-danger alert-dismissible text-white" role="alert" id="errorIssue" style="display: none;">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        report
                    </span>
                </span>
                <span class="alert-text" id="errorMessage"><strong>Error!</strong> Something Went Wrong</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="col-12 p-1 mb-2 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" id="openAntiBmodal" onclick="openAntibodySave()">Add Antibodies Data</button>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="antibodiesTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S.no</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Catalog No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Company</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Raised In</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Vail Available</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aliquotes</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Working Dilution</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Remarks</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="antibodiesForm" tabindex="-1" role="dialog" aria-labelledby="antibodiesFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="antibodiesFormLabel">Antibodies</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group input-group-outline mb-3 is-focused">
                    <label class="form-label">Select Antibodies</label>
                    <select class="form-control" id="antibodyName" name="antibodyName" class="form-control">
                    </select>
                </div>
                <div class="input-group input-group-outline mb-3 is-focused">
                    <label class="form-label">Raised In</label>
                    <input type="text" id="raisedIn" name="raisedIn" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-3 is-focused">
                    <label class="form-label">Vail Available</label>
                    <input type="text" id="vail" name="vail" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-3 is-focused">
                    <label class="form-label">Aliquotes</label>
                    <input type="text" id="aliquotes" name="aliquotes" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-3 is-focused">
                    <label class="form-label">Working Dialution</label>
                    <input type="text" id="dilution" name="dilution" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-3 is-focused">
                    <label class="form-label">Remarks</label>
                    <input type="text" id="remarks" name="remarks" class="form-control" required>
                </div>
            </div>
            <input type="hidden" id="antiId" name="antiId" class="form-control">
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-gray" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary" id="saveAntibodies" onclick="saveAntibodies()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php
require('./footer.php');
?>