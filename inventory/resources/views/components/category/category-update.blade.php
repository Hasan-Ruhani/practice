<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category Name *</label>
                                <input type="text" class="form-control" id="categryNameUpdate">
                                <input id="UpdateID">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="update-modal-close" class="btn  btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</a>
                    <button id="update-btn" onclick="update()" type="submit" class="btn btn-sm  btn-success" >update</button>
                </div>
            </div>
        </form>
    </div>
</div>
