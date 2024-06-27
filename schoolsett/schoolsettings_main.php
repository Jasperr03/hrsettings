<!-- Add & Edit Group Setting Modal -->
<div class="modal fade" id="addgrpsettModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addgrpsettModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div id="grpsetModalContent" class="modal-content">
            <!-- ========== load add group setting modal ========== -->
            <!-- ========== load edit group setting modal ========== -->
        </div>
    </div>
</div>
<!-- Add & Edit Group Setting Modal -->

<div class="row">
    <div class="p-4 pb-0">
        <h5 class="d-inline mb-0">School Settings</h5>
        <button id="" type="button" class="btn btn-sm btn-primary float-end px-4 rounded" onclick="load_addgroupset_modal()"><i class="fa fa-plus" aria-hidden="true"></i> Add Group Setting</button>
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

    function load_addgroupset_modal() {
        $.post("registry/schoolsett/components/addgroupset_modal.php", {}, function(data) {
            $('#grpsetModalContent').html(data);
            $('#addgrpsettModal').modal('show');
        });
    }

    function load_editgroupset_modal(grpsetid) {
        $.post("registry/schoolsett/components/editgroupset_modal.php", {
            grpsetid: grpsetid,
        }, function(data) {
            $('#grpsetModalContent').html(data);
            $('#addgrpsettModal').modal('show');
        });
    }

    //action
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

    function edit_groupsetting(grpsetid) {
        $.post("registry/schoolsett/actions/update_groupsetting.php", {
            grpsetid: grpsetid,
            updategrpname: $('#editgroupname' + grpsetid).val(),
            updategrporder: $('#editgrouporder' + grpsetid).val(),
        }, function(data) {
            if (data == 'success') {
                alert('Updated successfully');
                $('#addgrpsettModal').modal('hide');
                loadgroupsetting_list();
            } else {
                alert('update failed: ' + data)
            }
        });
    }
</script>