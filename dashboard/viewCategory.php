<?php
require('./header.php');
require('./sidebar.php');

?>
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Category table</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="col-12 p-1 mb-2 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0" onclick="openAddCategory()">Add Category</button>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="categoryTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Desc</th>
                                <th class="text-secondary opacity-7"></th>
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
<div class="modal fade" id="categoryForm" tabindex="-1" role="dialog" aria-labelledby="categoryFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="categoryFormLabel">Category</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Name</label>
                    <input type="name" id="name" name="name" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" id="desc" name="desc" class="form-control" required>
                </div>
                <div class="mb-3">
                    <p class="text-danger" id="errorText"></p>
                </div>
            </div>
            <input type="hidden" id="catId" name="catId" class="form-control">
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-gray" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary" id="saveCategory" onclick="saveCategory()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php
require('./footer.php');
?>