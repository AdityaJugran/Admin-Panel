<?php
require('./header.php');
require('./sidebar.php');

?>

<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Material table</h6>
        </div>
      </div>
      <div class="card-body">
        <div class="col-12 p-1 mb-2 text-end">
          <button class="btn btn-outline-primary btn-sm mb-0" onclick="openAddCatalog()">Add Material</button>
        </div>
        <hr style="border:1px solid #000" />
        <div class="col-6 p-1 mb-2" id="filterTab">
          <h4>Filter Material</h4>
          <div class="input-group is-focused input-group-static mb-4 col-6">
            <label>Location</label>
            <select class="form-control" id="location" name="location" class="form-control">
              <option value="">All</option>
            </select>
          </div>
          <div class="input-group is-focused input-group-static mb-4 col-6">
            <label>Material Category</label>
            <select class="form-control" id="category" name="category" class="form-control">
              <option value="">All</option>
            </select>
          </div>
          <button class="btn btn-outline-primary btn-sm mb-0" onclick="fetchCatalog({})">Filter</button>
        </div>
        <hr style="border:1px solid #000" />

        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0 stripe cell-border" id="catalogTable">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Catalog no.</th>
                <th>Category</th>
                <th>Location</th>
                <th>Sub-Location</th>
                <th>Remarks</th>
                <th>Company Name</th>
                <th>Date of Refill/Stock</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="catalogBody">

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="CatalogForm" tabindex="-1" role="dialog" aria-labelledby="CatalogFormLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="CatalogFormLabel">Catalog</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group is-focused input-group-outline mb-3">
          <label class="form-label">Name</label>
          <input type="name" id="catalogName" name="catalogname" class="form-control" required>
        </div>
        <div class="input-group is-focused input-group-outline mb-3">
          <label class="form-label">Quantity</label>
          <input type="number" id="catalogQuantity" name="catalogQuantity" class="form-control" required>
        </div>
        <div class="input-group is-focused input-group-outline mb-3">
          <label class="form-label">Units</label>
          <input type="text" id="units" name="units" class="form-control" required>
        </div>
        <div class="input-group is-focused input-group-outline mb-3">
          <label class="form-label">Catalog Number</label>
          <input type="name" id="catalogNo" name="catalogNo" class="form-control" required>
        </div>
        <div class="input-group is-focused input-group-outline mb-3">
          <label class="form-label">Category</label>
          <select class="form-control" id="addCategory" name="addCategory" class="form-control">
          </select>
        </div>
        <div class="input-group is-focused input-group-outline mb-3">
          <label class="form-label">Location</label>
          <select class="form-control" id="addLocation" name="addLocation" class="form-control">
          </select>
        </div>
        <div class="input-group is-focused input-group-outline mb-3">
          <label class="form-label">Sub Location</label>
          <input type="text" id="catalogsubloc" name="catalogsubloc" class="form-control" required>
        </div>
        <div class="input-group is-focused input-group-outline mb-3">
          <label class="form-label">Remarks</label>
          <input type="text" id="remarks" name="remarks" class="form-control" required>
        </div>
        <div class="input-group is-focused input-group-outline mb-3">
          <label class="form-label">Company Name</label>
          <input type="name" id="companyName" name="companyName" class="form-control" required>
        </div>
        <div class="input-group is-focused input-group-outline mb-3">
          <label class="form-label">Date of Refill</label>
          <input type="date" id="catalogRefill" name="catalogRefill" class="form-control datepicker" required>
        </div>
        <div class="mb-3">
          <p class="text-danger" id="errorText"></p>
        </div>
      </div>
      <input type="hidden" id="catalogId" name="catalogId" class="form-control">
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-gray" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn bg-gradient-primary" id="saveCatalog" onclick="saveCatalog()">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php
require('./footer.php');
?>