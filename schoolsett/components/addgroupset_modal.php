<div class="modal-header">
    <h5 class="modal-title  text-primary" id="addgrpsettModalLabel">Group Setting</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="frmaddgroupsett">
        <div class="row g-3 align-items-center">
                <label class="mt-2">Group Setting Name:</label>
                <input id="addgroupname" value="" class="form-control form-control-sm mt-0" type="text" required>
                <label class="mt-2">Order No:</label>
                <input id="addgrouporder" value="" class="form-control form-control-sm mt-0" type="number" required>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" form="frmaddgroupsett" class="btn btn-primary">Save Setting</button>
</div>
<script>
    //actions
    $('#frmaddgroupsett').submit(function(e) {
        e.preventDefault();
        insert_groupsetting();
    });
</script>