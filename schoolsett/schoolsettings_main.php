<?php
require_once '../../connection.php';
?>

<!-- Add Group Setting Modal -->
<div class="modal fade" id="addgrpsettModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addgrpsettModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  text-primary" id="addgrpsettModalLabel">Group Setting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmaddgroupsett">
                    <div class="row g-3 align-items-center">
                        <div class="input-group">
                            <label class="form-label p-2">Group Setting Name:</label>
                            <input id="addgroupname" value="" class="form-control form-control-sm" type="text" required>
                            <label class="form-label p-2">Order No:</label>
                            <input id="addgrouporder" value="" class="form-control form-control-sm" type="number" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="frmaddgroupsett" class="btn btn-primary">Save Setting</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Group Setting Modal -->
<div class="row">
    <div class="p-4 pb-0">
        <h5 class="d-inline mb-0">School Settings</h5>
        <button id="" type="button" class="btn btn-sm btn-primary float-end px-4 rounded" data-bs-toggle="modal" data-bs-target="#addgrpsettModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Group Setting</button>
    </div>
</div>
<div id="rowgroupsett" class="row">
    <!--Load Here Group Setting List -->
</div>
<script>
    //load
    $(document).ready(function() {
        loadgroupsetting_list();
    });

    function loadgroupsetting_list() {
        showloadingdiv('#rowgroupsett');
        $.post("registry/schoolsett/components/groupsetting_list.php", {}, function(data) {
            $('#rowgroupsett').html(data);
        });
    }

    //action
    $('#frmaddgroupsett').submit(function(e) {
        e.preventDefault();
        insert_groupsetting();
    });

    function insert_groupsetting() {
        $.post("registry/schoolsett/actions/insert_groupsetting.php", {
            groupname: $('#addgroupname').val(),
            grouporder: $('#addgrouporder').val(),
        }, function(data) {
            if (data == 'success') {
                alert('Save successfully');
                $('#addgrpsettModal').modal('hide');
                loadgroupsetting_list();
            } else {
                alert('insert failed: ' + data)
            }
        });
    }
</script>