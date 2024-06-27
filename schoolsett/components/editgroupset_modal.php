<?php
require_once '../../../connection.php';

$grpsetid = $_POST['grpsetid'];
$schoolsett = $connHR->prepare("SELECT * FROM tbl_groupsetting where groupsettId = ?");
$schoolsett->execute([$grpsetid]);
$schoolsett = $schoolsett->fetch();
?>
<div class="modal-header py-2">
    <h5 class="modal-title  text-primary" id="editgrpsettModalLabel">Edit <?php echo $schoolsett['groupsetting'] ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="frmeditgroupsett">
        <div class="row g-3 align-items-center">
            <label>Group Setting Name:</label>
            <input id="editgroupname<?php echo $grpsetid ?>" value="<?php echo $schoolsett['groupsetting'] ?>" class="form-control form-control-sm mt-0" type="text" required>
            <label class="mt-2">Order No:</label>
            <input id="editgrouporder<?php echo $grpsetid ?>" value="<?php echo $schoolsett['orderNo'] ?>" class="form-control form-control-sm mt-0" type="number" required min="0">
        </div>
    </form>
</div>
<div class="modal-footer py-2">
    <button type="button" class="btn btn-secondary btn-sm px-4 rounded" data-bs-dismiss="modal">Close</button>
    <button type="submit" form="frmeditgroupsett" class="btn btn-primary btn-sm px-4 rounded">Save Changes</button>
</div>
<script>
    $('#frmeditgroupsett').submit(function(e) {
        e.preventDefault();
        edit_groupsetting(<?php echo $schoolsett['groupsettId'] ?>)
    });
</script>