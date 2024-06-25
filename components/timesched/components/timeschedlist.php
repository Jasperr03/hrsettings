<?php
require_once '../../../../../connection.php';

$timesched = $connHR->prepare("SELECT * FROM tbl_timeschedule tt ORDER BY shift_id DESC ");
$timesched->execute();
?>

<!--Time Sched input form-->
<tr id="traddsched" hidden>
    <td><input id="timecode" class="form-control form-control-sm" type="text" required></td>
    <td><input id="shiftone_in" class="form-control form-control-sm" type="time" required></td>
    <td><input id="shiftone_out" class="form-control form-control-sm" type="time" required></td>
    <td><input id="shifttwo_in" class="form-control form-control-sm" type="time" required></td>
    <td><input id="shifttwo_out" class="form-control form-control-sm" type="time" required></td>
    <td><input id="shiftthree_in" class="form-control form-control-sm" type="time"></td>
    <td><input id="shiftthree_out" class="form-control form-control-sm" type="time"></td>
    <td><input id="shiftfour_in" class="form-control form-control-sm" type="time"></td>
    <td><input id="shiftfour_out" class="form-control form-control-sm" type="time"></td>
    <td><input id="tdhours" class="form-control form-control-sm" type="number" step="0.01" required></td>
    <td class="text-center pt-2 ">
        <i id="tdsaveBtn" class="cursor-pointer fa-solid fa-save" onclick="$('#saveSchedBtn').click()"></i>
        <i id="tdcancelBtn" class="cursor-pointer fa-solid fa-x" onclick="$('#traddsched').prop('hidden', true)"></i>
    </td>
</tr>
<!--Time Sched List-->
<?php foreach ($timesched->fetchAll() as $row) : ?>
    <tr id="trtimeScheddisplay<?php echo $row['shift_id']; ?>" class="timescheddisplay">
        <td><?php echo $row['timecode'] ?></td>
        <td class="text-center"><?php echo date_format(date_create($row['shif1_in']), "h:i:s A") ?></td>
        <td class="text-center"><?php echo date_format(date_create($row['shift1_out']), "h:i:s A") ?></td>
        <td class="text-center"><?php echo date_format(date_create($row['shift2_in']), "h:i:s A") ?></td>
        <td class="text-center"><?php echo date_format(date_create($row['shift2_out']), "h:i:s A") ?></td>
        <td class="text-center"><?php echo date_format(date_create($row['shift3_in']), "h:i:s A") ?></td>
        <td class="text-center"><?php echo date_format(date_create($row['shift3_out']), "h:i:s A") ?></td>
        <td class="text-center"><?php echo date_format(date_create($row['shift4_in']), "h:i:s A") ?></td>
        <td class="text-center"><?php echo date_format(date_create($row['shift4_out']), "h:i:s A") ?></td>
        <td class="text-center"><?php echo $row['tm_hours'] ?></td>
        <td class="text-center">
            <i class="cursor-pointer fa-solid fa-pen-to-square" onclick="showtime_editinput(<?php echo $row['shift_id'] ?>)"></i>
            <i class="cursor-pointer fa-solid fa-trash text-danger" onclick="delete_timesched(<?php echo $row['shift_id'] ?>)"></i>
        </td>
    </tr>
    <!--Time Sched edit Input-->
    <tr id="trtimeSchedinput<?php echo $row['shift_id']; ?>" class="timeschedinput" aria-required="require" hidden>
        <td><input id="edittimecode_<?php echo $row['shift_id'] ?>" class="form-control form-control-sm" type="text" value="<?php echo $row['timecode'] ?>"></td>
        <td><input id="editshiftone_in_<?php echo $row['shift_id'] ?>" class="form-control form-control-sm" type="time" value="<?php echo $row['shif1_in'] ?>"></td>
        <td><input id="editshiftone_out_<?php echo $row['shift_id'] ?>" class="form-control form-control-sm" type="time" value="<?php echo $row['shift1_out'] ?>"></td>
        <td><input id="editshifttwo_in_<?php echo $row['shift_id'] ?>" class="form-control form-control-sm" type="time" value="<?php echo $row['shift2_in'] ?>"></td>
        <td><input id="editshifttwo_out_<?php echo $row['shift_id'] ?>" class="form-control form-control-sm" type="time" value="<?php echo $row['shift2_out'] ?>"></td>
        <td><input id="editshiftthree_in_<?php echo $row['shift_id'] ?>" class="form-control form-control-sm" type="time" value="<?php echo $row['shift3_in'] ?>"></td>
        <td><input id="editshiftthree_out_<?php echo $row['shift_id'] ?>" class="form-control form-control-sm" type="time" value="<?php echo $row['shift3_out'] ?>"></td>
        <td><input id="editshiftfour_in_<?php echo $row['shift_id'] ?>" class="form-control form-control-sm" type="time" value="<?php echo $row['shift4_in'] ?>"></td>
        <td><input id="editshiftfour_out_<?php echo $row['shift_id'] ?>" class="form-control form-control-sm" type="time" value="<?php echo $row['shift4_out'] ?>"></td>
        <td><input id="edittdhours_<?php echo $row['shift_id'] ?>" class="form-control form-control-sm" type="number" step="0.01" value="<?php echo $row['tm_hours'] ?>"></td>
        <td class="text-center pt-2 ">
            <i id="tdupdateBtn" class="cursor-pointer fa-solid fa-save" onclick="updatetime_sched(<?php echo $row['shift_id'] ?>)"></i>
            <i id="tdcancelBtn" class="cursor-pointer fa-solid fa-x" onclick="close_editinput(<?php echo $row['shift_id'] ?>)"></i>
        </td>
    </tr>
<?php endforeach ?>

<script>
    //action
    function updatetime_sched(shiftid) {
        if ($("#edittimecode_" + shiftid).val() == '' ||
            $("#editshiftone_in_" + shiftid).val() == '' ||
            $("#editshiftone_out_" + shiftid).val() == '' ||
            $("#editshifttwo_in_" + shiftid).val() == '' ||
            $("#editshifttwo_out_" + shiftid).val() == '' ||
            $("#editshiftthree_in_" + shiftid).val() == '' ||
            $("#editshiftthree_out_" + shiftid).val() == '' ||
            $("#editshiftfour_in_" + shiftid).val() == '' ||
            $("#editshiftfour_out_" + shiftid).val() == '' ||
            $("#edittdhours_" + shiftid).val() == '') {
            alert('Input Invalid');
            return;
        }


        $.post("registry/hrsettings/components/timesched/actions/update_timesched.php", {
            shiftid: shiftid,
            updatetimecode: $("#edittimecode_" + shiftid).val(),
            updateshif1_in: $("#editshiftone_in_" + shiftid).val(),
            updateshift1_out: $("#editshiftone_out_" + shiftid).val(),
            updateshift2_in: $("#editshifttwo_in_" + shiftid).val(),
            updateshift2_out: $("#editshifttwo_out_" + shiftid).val(),
            updateshift3_in: $("#editshiftthree_in_" + shiftid).val(),
            updateshift3_out: $("#editshiftthree_out_" + shiftid).val(),
            updateshift4_in: $("#editshiftfour_in_" + shiftid).val(),
            updateshift4_out: $("#editshiftfour_out_" + shiftid).val(),
            updatetm_hours: $("#edittdhours_" + shiftid).val(),
        }, function(data) {
            if (data == 'success') {
                alert('Update successfully');
                loadtimeSched_list();
            } else {
                alert(data)
            }
        });
    }
</script>