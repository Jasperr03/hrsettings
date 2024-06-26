<?php
require_once '../../../connection.php';

$schoolsett = $connHR->prepare("SELECT * FROM tbl_groupsetting ORDER BY orderNo");
$schoolsett->execute();

?>
<!--Group Setting Row-->
<div class="col-lg-12 col-md-12 col-sm-12">
    <form id="addsubsettfrm">
        <div class="row">
            <?php foreach ($schoolsett->fetchAll() as $row) : ?>
                <div class="col-lg-4 col-md-6 col- p-3">
                    <div class="card shadow">
                        <div id="groupsettcard<?php echo $row['groupsettId']; ?>" class="groupSett card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <div id="grpsetName"><?php echo $row['groupsetting'] ?></div>
                            <div><i class="cursor-pointer fa-solid fa-pen-to-square" onclick="load_editgroupset_modal(<?php echo $row['groupsettId'] ?>)"></i></div>
                        </div>
                        <div class="card-body table-responsive px-2 pt-1">
                            <table id="tblsubsetting" class="table table-sm">
                                <thead>
                                    <tr class="align-middle">
                                        <th scope="col" class="text-start">Settings Name</th>
                                        <th scope="col" class="text-center">Value</th>
                                        <th scope="col" class="text-center">Remarks</th>
                                        <th scope="col" class="text-center">Order No</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbsubsettings">
                                    <?php
                                    $subsett = $connHR->prepare("SELECT * FROM tblsettings a WHERE a.groupsettId = ? ORDER BY orderNo");
                                    $subsett->execute([$row['groupsettId']]);
                                    ?>
                                    <!--Subsetting input form-->
                                    <tr id="traddsubsett_<?php echo $row['groupsettId'] ?>" class="add_subsett" hidden>
                                        <td><input id="ingrpset_settingsName_<?php echo $row['groupsettId'] ?>" class="form-control form-control-sm" type="text" required></td>
                                        <td><input id="ingrpset_value_<?php echo $row['groupsettId'] ?>" class="form-control form-control-sm" type="text" required></td>
                                        <td><input id="ingrpset_remarks_<?php echo $row['groupsettId'] ?>" class="form-control form-control-sm" type="text" required></td>
                                        <td><input id="ingrpset_orderNo_<?php echo $row['groupsettId'] ?>" class="form-control form-control-sm" type="number" required></td>
                                        <td class="text-center pt-2 ">
                                            <i id="tdsaveBtn" onclick="$('#addsubset_btn').click()" class="cursor-pointer fa-solid fa-save"></i>
                                            <i id="tdcancelBtn" class="cursor-pointer fa-solid fa-x" onclick="$('#traddsubsett_<?php echo $row['groupsettId'] ?>').prop('hidden', true)"></i>
                                        </td>
                                    </tr>
                                    <!--Subsettings List display-->
                                    <?php foreach ($subsett->fetchall() as $row2) : ?>
                                        <tr id="trsettingdisplay<?php echo $row2['settingsId']; ?>" class="settingdisplay">
                                            <td id="disgrpser_settingName_<?php echo $row2['groupsettId'] ?>" class="text-start"><?php echo $row2['settingsName'] ?></td>
                                            <td id="disgrpser_value_<?php echo $row2['groupsettId'] ?>" class="text-center"><?php echo $row2['setvalue'] ?></td>
                                            <td id="disgrpser_remarks_<?php echo $row2['groupsettId'] ?>" class="text-center"><?php echo $row2['remarks'] ?></td>
                                            <td id="disgrpser_orderNO_<?php echo $row2['groupsettId'] ?>" class="text-center"><?php echo $row2['orderNo'] ?></td>
                                            <td class="text-center">
                                                <i class="cursor-pointer fa-solid fa-pen-to-square" onclick="show_editsetinput(<?php echo $row2['settingsId'] ?>)"></i>
                                            </td>
                                        </tr>
                                        <!--Subsetting Edit Input-->
                                        <tr id="treditsubset_<?php echo $row2['settingsId'] ?>" class="edit_setting" hidden>
                                            <td><input id="edit_settingsName_<?php echo $row2['settingsId'] ?>" class="form-control form-control-sm" type="text" value="<?php echo $row2['settingsName'] ?>" required></td>
                                            <td><input id="edit_value_<?php echo $row2['settingsId'] ?>" class="form-control form-control-sm" type="text" value="<?php echo $row2['setvalue'] ?>" required></td>
                                            <td><input id="edit_remarks_<?php echo $row2['settingsId'] ?>" class="form-control form-control-sm" type="text" value="<?php echo $row2['remarks'] ?>" required></td>
                                            <td><input id="edit_orderNo_<?php echo $row2['settingsId'] ?>" class="form-control form-control-sm" type="number" value="<?php echo $row2['orderNo'] ?>" required></td>
                                            <td class="text-center pt-2 ">
                                                <i id="tdsaveBtn" onclick="update_setting(<?php echo $row2['settingsId'] ?>)" class="cursor-pointer fa-solid fa-save"></i>
                                                <i id="tdcancelBtn" class="cursor-pointer fa-solid fa-x" onclick="close_editsetinput(<?php echo $row2['settingsId'] ?>)"></i>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <button class="btn btn-sm btn-primary" type="button" onclick="toggleAddSubsett(<?php echo $row['groupsettId'] ?>)"><i class="fa fa-plus" aria-hidden="true"></i> Add Settings</button>
                            <!--Hidden button For adding Subsetting-->
                            <button id="addsubset_btn" hidden type="submit" form="addsubsettfrm" class="addsubset_btn btn btn-sm px-4 rounded btn-primary">Save SubSet </button>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </form>
</div>


<script>
    //action
    $(document).ready(function() {
        $('#addsubsettfrm').submit(function(e) {
            e.preventDefault();
            var groupsetid = $('#addsubsettfrm').attr('groupsetid');

            $.post("registry/schoolsett/actions/insert_settings.php", {
                groupsetid: groupsetid,
                settingsName_: $('#ingrpset_settingsName_' + groupsetid).val(),
                value_: $('#ingrpset_value_' + groupsetid).val(),
                remarks_: $('#ingrpset_remarks_' + groupsetid).val(),
                orderNo_: $('#ingrpset_orderNo_' + groupsetid).val(),
            }, function(data) {
                if (data == 'success') {
                    alert('Save successfully');
                    loadgroupsetting_list();
                } else {
                    alert('insert failed: ' + data)
                }
            });

        });
    });

    function update_setting(setid) {

        if ($("#edit_settingsName_" + setid).val() == '' ||
            $("#edit_value_" + setid).val() == '' ||
            $("#edit_remarks_" + setid).val() == '' ||
            $("#edit_orderNo_" + setid).val() == '') {
            alert('Input Invalid');
            return;
        }

        $.post("registry/schoolsett/actions/update_subset.php", {
            setid: setid,
            updatesetname: $('#edit_settingsName_' + setid).val(),
            updatevalue: $('#edit_value_' + setid).val(),
            updateremarks: $('#edit_remarks_' + setid).val(),
            updateorderno: $('#edit_orderNo_' + setid).val(),
        }, function(data) {
            if (data == 'success') {
                alert('Updated successfully');
                loadgroupsetting_list();
            } else {
                alert('update failed: ' + data)
            }
        });
    }


    function toggleAddSubsett(groupid) {
        $('.add_subsett').prop('hidden', true);
        $('.edit_setting').prop('hidden', true);
        $('.settingdisplay').prop('hidden', false);

        $('#traddsubsett_' + groupid).prop('hidden', false);
        $('#tbsubsettings input').prop('required', false);
        $('#traddsubsett_' + groupid + ' input').prop('required', true);
        $('#addsubsettfrm').attr('groupsetid', groupid);
    }

    function show_editsetinput(setid) {
        $('.add_subsett').prop('hidden', true);
        $('.edit_setting').prop('hidden', true);
        $('.settingdisplay').prop('hidden', false);

        $('#trsettingdisplay' + setid).prop('hidden', true);
        $('#treditsubset_' + setid).prop('hidden', false);
    }

    function close_editsetinput(setid) {
        $('#trsettingdisplay' + setid).prop('hidden', false);
        $('#treditsubset_' + setid).prop('hidden', true);
    }
</script>