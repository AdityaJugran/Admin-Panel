<?php
require('./header.php');
require('./sidebar.php');

?>
<div class="row">
    <div class="col-12">
    <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Settings</h6>
                </div>
            </div>
            <div class="card-body">
            <div class="col-6 p-1 mb-2">
          <div class="input-group is-focused input-group-static mb-4 col-6">
            <p>Please select the catagories related to Antibodies</p>
            <select multiple="multiple" multiple id="categoryIds" name="categoryIds[]" data-placeholder="Select Category">>          

            </select> 
          </div>
        <input type="hidden" id="antiId" name="antiId" />
          <button class="btn btn-outline-primary btn-sm mb-0" onclick="saveSettings()">Filter</button>
        </div>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-success alert-dismissible text-white" role="alert" id="alertSucces" style="display: none;">
        <span class="alert-icon align-middle">
          <span class="material-icons text-md">
          thumb_up_off_alt
          </span>
        </span>
        <span class="alert-text"><strong>Success!</strong> Settings Saved!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="alert alert-danger alert-dismissible text-white" role="alert" id="errorIssue" style="display: none;">
        <span class="alert-icon align-middle">
          <span class="material-icons text-md">
          report
          </span>
        </span>
        <span class="alert-text"><strong>Error!</strong> Settings Not Saved!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php
require('./footer.php');
?>