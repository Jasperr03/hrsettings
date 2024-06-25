<?php
require_once '../../../../../connection.php';

$contrideduct = $connHR->prepare("SELECT * FROM tbl_contrideduct tc  ORDER BY contrideduct_id DESC ");
$contrideduct->execute();
?>

<!--ADD contri form-->
<tr id="traddcontri" hidden>
    <td class="text-start"><input id="contribution" class="form-control form-control-sm" type="text" required></td>
    <td class="text-center"><input id="amount" class="form-control form-control-sm" type="float" required></td>
    <td class="text-center pt-2">
        <i id="tdsaveBtn" class="cursor-pointer fa-solid fa-save" onclick="$('#insrtcontridBtn').click()"></i>
        <i id="tdcancelBtn" class="cursor-pointer fa-solid fa-x" onclick="$('#traddcontri').prop('hidden', true)"></i>
    </td>
</tr>
<!-- contri List display-->
<?php foreach ($contrideduct->fetchAll() as $row) : ?>
    <tr id="trcontridisplay<?php echo $row['contrideduct_id']; ?>" class="contridisplay">
        <td class="text-start"><?php echo $row['contribution'] ?></td>
        <td class="text-center">
            <span style="<?php echo ($row['amount'] > 0 ? 'color:green;' : 'color:red;'); ?>">
                <?php echo $row['amount'] ?>
            </span>
        </td>
        <td class="text-center">
            <i class="cursor-pointer fa-solid fa-pen-to-square" onclick="show_contriinput(<?php echo $row['contrideduct_id'] ?>)"></i>
            <i class="cursor-pointer fa-solid fa-trash text-danger" onclick="delete_contribution(<?php echo $row['contrideduct_id'] ?>)"></i>
        </td>
    </tr>
    <!-- contri edit input-->
    <tr id="trcontriinput<?php echo $row['contrideduct_id']; ?>" class="contriinput" aria-required="require" hidden>
        <td><input id="editcontribution_<?php echo $row['contrideduct_id'] ?>" class="form-control form-control-sm" type="text" value="<?php echo $row['contribution'] ?>" required></td>
        <td><input id="editamount_<?php echo $row['contrideduct_id'] ?>" class="form-control form-control-sm" type="number" value="<?php echo $row['amount'] ?>" required></td>
        <td class="text-center pt-2">
            <i id="tdsaveBtn" class="cursor-pointer fa-solid fa-save" onclick="update_contri(<?php echo $row['contrideduct_id'] ?>)"></i>
            <i id="tdcancelBtn" class="cursor-pointer fa-solid fa-x" onclick="close_contriinput(<?php echo $row['contrideduct_id'] ?>)"></i>
        </td>
    </tr>
<?php endforeach ?>
<script>
    //action
    function update_contri(contriId) {
        if ($("#editcontribution_" + contriId).val() == '' ||
            $("#editamount_" + contriId).val() == '') {
            alert('Input Invalid');
            return;
        }

        $.post("registry/hrsettings/components/contri_deduct/actions/update_contribution.php", {
            contriId: contriId,
            updatecontri: $("#editcontribution_" + contriId).val(),
            updateamount: $("#editamount_" + contriId).val(),
        }, function(data) {
            if (data == 'success') {
                alert('Update successfully');
                loadcontributionlist();
            } else {
                alert(data)
            }
        });
    }
</script>