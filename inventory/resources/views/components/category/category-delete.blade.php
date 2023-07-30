
<div class="modal" id="delete-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="width: 450px;">

            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="d-none" id="deleteID">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close"  class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" onclick="itemDelete()" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
                </div>
            </div>

        </div>
    </div>
</div>

  
<script>

    async function itemDelete() {
        let id = document.getElementById('deleteID').value;
        document.getElementById('delete-modal-close').click();

        showLoader();
        let res = await axios.post("/delete-category", {id:id});
        hideLoader();

        if(res.data === 1){
            successToast("Delete Complete");
            await getList();
        }
        else{
            errorToast("Somthing went wrong");
        }
    }

</script>