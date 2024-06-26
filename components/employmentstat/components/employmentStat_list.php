<?php
require_once '../../../../../connection.php';
//Connection to use $connHR
$selempstat = $connHR->prepare("SELECT * FROM tbl_employmentstatus te ORDER BY employment_id DESC");
$selempstat->execute();
?>
    <!--Add Employment status Form-->
            <tr id="traddEmpStat" hidden>
                <td></td>
                <td><input id="insert_employmentStatus" class="form-control form-control-sm" type="text" required></td>
                <td class="text-center pt-2 ">
                    <i class="cursor-pointer fa-solid fa-save" onclick="$('#insertEmpBtn').click()"></i>
                    <i class="cursor-pointer fa-solid fa-x" onclick="$('#traddEmpStat').prop('hidden', true);"></i>
                </td>
            </tr>

    <!-- Employment status display-->
<?php foreach ($selempstat->fetchAll() as $row) : ?>
    <tr id="tremstat_display_<?php echo $row['employment_id'] ?>" class="tremdisplay">
        <td><?php echo $row['employment_id'] ?></td>
        <td><?php echo $row['employment_status'] ?></td>
        <td class="text-center">
            <i class="cursor-pointer fa-solid fa-pen-to-square" onclick="showes_editinput(<?php echo $row['employment_id'] ?>)"></i>
            <i class="cursor-pointer fa-solid fa-trash text-danger" onclick="delete_empstatus(<?php echo $row['employment_id'] ?>)"></i>
        </td>
    </tr>
     <!-- Employment status input-->
    <tr id="tremstat_editin_<?php echo $row['employment_id'] ?>"  class="trem_editinput" aria-required="require" hidden>
        <td class="pt-2"><?php echo $row['employment_id'] ?></td>
        <td ><input id="edtinputEmpStat_<?php echo $row['employment_id'] ?>" class="form-control form-control-sm" type="text" value="<?php echo $row['employment_status'] ?>"></td>
        <td class="text-center pt-2">
            <i class="cursor-pointer fa-solid fa-save" onclick="updateEmployment_status(<?php echo $row['employment_id'] ?>)"></i>
            <i class="cursor-pointer fa-solid fa-x" onclick="closees_input(<?php echo $row['employment_id'] ?>)"></i>
        </td>
    </tr>
<?php endforeach ?>

<script>
    function updateEmployment_status(employmentid) {
        if ($("#edtinputEmpStat_" + employmentid).val() == '') {
            alert('Input Invalid');
            return;
        }

        $.post("registry/hrsettings/components/employmentstat/actions/update_employmentStat.php", {
            employmentid: employmentid,
            edtinputEmpStat: $("#edtinputEmpStat_" + employmentid).val(),
        }, function(data) {
            if (data == 'success') {
                alert('Update successfully');
                loadEmploymentStat_list()
            } else {
                alert(data)
            }
        });
    }
</script>