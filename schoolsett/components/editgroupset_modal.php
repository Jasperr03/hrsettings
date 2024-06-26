<div class="modal-header">
    <h5 class="modal-title  text-primary" id="editgrpsettModalLabel">Edit Group Setting</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="frmeditgroupsett">
        <div class="row g-3 align-items-center">
            <div class="input-group">
                <label class="form-label p-2">Group Setting Name:</label>
                <input id="editgroupname" value="" class="form-control form-control-sm" type="text" required>
                <label class="form-label p-2">Order No:</label>
                <input id="editgrouporder" value="" class="form-control form-control-sm" type="number" required>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" form="frmaddgroupsett" class="btn btn-primary">Save Changes</button>
</div>
<script>
    $('#frmeditgroupsett').submit(function(e) {
        e.preventDefault();
        edit_groupsetting();
    });
</script>