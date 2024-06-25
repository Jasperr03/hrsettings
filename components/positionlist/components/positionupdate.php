<?php
require_once '../../../../connection.php';

$position_all = $connHR->prepare("SELECT positionId, salaryGrade, positionCode, position FROM tbl_positionlist");
$position_all->execute();
$salary_all = $connHR->prepare("SELECT sgcode FROM tbl_salarygrade");
$salary_all->execute();

// mao ni siya ang pag fetch sa update dropdwown
$salary_rows = $salary_all->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_positionButton'])) {
    $positionId = $_POST['positionId'];
    $positionCode = $_POST['update_positionCode' . $positionId];
    $position = $_POST['update_position' . $positionId];
    $salaryGrade = $_POST['update_salaryGrade' . $positionId];
    echo "success";
    exit();
}
?>


<div class="row justify-content-md-center my-4">
    <div class="col-8">
        <div class="card shadow">
            <div class="p-3 pb-0">
                <h5 class="d-inline mb-0">Position List</h5>
                <button class="btn btn-sm btn-primary float-end px-4 rounded" id="addPositionButton" onclick="showpositionaddinput()"><i class="fa fa-plus" aria-hidden="true"></i> Add Position</button>
            </div>
            <div class="card-body table-responsive px-2 pt-1">
                <form id="frminput_position">
                    <table class="table table-sm">
                        <col width="5%">
                        <col width="15%">
                        <col width="60%">
                        <col width="15%">
                        <col width="5%">
                        <thead>
                            <tr>
                                <th class="text-start">No</th>
                                <th>Code</th>
                                <th>Position</th>
                                <th>Salary Grade</th>
                                <th class="text-center">Action</th>
                            </tr>

                            <tr id="positioninput" hidden>
                                <td></td>
                                <td><input id="insert_positionCode" class="form-control form-control-sm" type="text" required></td>
                                <td><input id="insert_position" class="form-control form-control-sm" type="text" required></td>
                                <td required>
                                    <select id="insert_salaryGrade" class="form-select form-select-sm" required>
                                        <option value="">[Select Salary Grade]</option>
                                        <?php foreach ($salary_rows as $salary_row) : ?>
                                            <option value="<?php echo htmlspecialchars($salary_row['sgcode']) ?>"><?php echo htmlspecialchars($salary_row['sgcode']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>

                                <td class="text-center pt-2 ">
                                    <i class="fa-solid fa-save" onclick="$('#save_positionButton').click()"></i>
                                    <i class="cursor-pointer fa-solid fa-x" onclick="position_closeinputedit()"></i>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <button type="submit" id="save_positionButton" class="btn btn-primary" hidden></button>
                            <?php
                            $counter = 1; 
                            foreach ($position_all as $position_row) :
                            ?>
                                <tr id="trpositiondisplay_<?php echo $position_row['positionId'] ?>" class="grpositiondisplay">
                                    <td><?php echo $counter; ?></td> 
                                    <td class="text-left"><?php echo $position_row['positionCode'] ?></td>
                                    <td class="text-left"><?php echo $position_row['position'] ?></td>
                                    <td class="text-left"><?php echo $position_row['salaryGrade'] ?></td>
                                    <td class="text-center">
                                        <i class="cursor-pointer fa-solid fa-pen-to-square" onclick="updateposition(<?php echo $position_row['positionId'] ?>)"></i>
                                        <i class="cursor-pointer fa-solid fa-trash text-danger" onclick="deleteposition(<?php echo $position_row['positionId'] ?>)"></i>
                                    </td>
                                </tr>
                                <tr id="trpositionupdate_input_<?php echo $position_row['positionId'] ?>" class="positioneditiput" hidden>
                                    <td></td>
                                    <td><input id="update_positionCode<?php echo $position_row['positionId'] ?>" class="form-control form-control-sm" type="text" required value="<?php echo htmlspecialchars($position_row['positionCode']) ?>"></td>
                                    <td><input id="update_position<?php echo $position_row['positionId'] ?>" class="editinputsg form-control form-control-sm" type="text" required value="<?php echo htmlspecialchars($position_row['position']) ?>"></td>
                                    <td>
                                        <select id="update_salaryGrade<?php echo $position_row['positionId'] ?>" class="form-select form-select-sm">
                                            <option value="">[Select Salary Grade]</option>
                                            <?php foreach ($salary_rows as $salary_row) : ?>
                                                <option value="<?php echo htmlspecialchars($salary_row['sgcode']) ?>" <?php echo ($position_row['salaryGrade'] == $salary_row['sgcode']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($salary_row['sgcode']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class="text-center pt-2">
                                        <form id="update_form_<?php echo $position_row['positionId'] ?>">
                                            <button type="submit" class="btn btn-primary" hidden></button>
                                            <i class="cursor-pointer fa-solid fa-save" onclick="loadupdate_position('<?php echo $position_row['positionId'] ?>')"></i>
                                            <i class="cursor-pointer fa-solid fa-x" onclick="position_editclose('<?php echo $position_row['positionId'] ?>')"></i>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                $counter++; 
                            endforeach;
                            ?>

                        </tbody>



                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#frminput_position').submit(function(e) {
            e.preventDefault();
            insert_position();
        });
        $('#frmupdate_position').submit(function(e) {
            e.preventDefault();
            loadupdate_position();
        });
    });



    function showpositionaddinput() {
        $('#positioninput').prop('hidden', false);
        $('.positioneditiput').prop('hidden', true);
        $('.grpositiondisplay').prop('hidden', false);

    }

    function position_closeinputedit() {
        $('#positioninput').prop('hidden', true);
    }

    function insert_position() {
        if (confirm("Are you sure you want to insert this Position?")) {
            $.post('registry/hrsettings/components/positionlist/actions/insert_position.php', {
                positionCode: $('#insert_positionCode').val(),
                position: $('#insert_position').val(),
                salaryGrade: $('#insert_salaryGrade').val(),
            }, function(data) {
                if (data.trim() === 'success') {
                    alert('Insert successfully');
                    load_hrsettings_submodule('positionlist/positionlist_main.php', this)
                } else {
                    alert('Insert failed: ' + data);
                }
            });
        }
    }

    function deleteposition(positionId) {
        if (confirm("Are you sure you want to delete this Position?")) {
            $.post('registry/hrsettings/components/positionlist/actions/delete_position.php', {
                positionId: positionId
            }, function(data) {
                if (data == 'success') {
                    load_hrsettings_submodule('positionlist/positionlist_main.php', this)
                } else {
                    alert(data)
                }
            });
        }
    }


    function loadupdate_position(positionId) {
        positionCode = $('#update_positionCode' + positionId).val();
        position = $('#update_position' + positionId).val();
        salaryGrade = $('#update_salaryGrade' + positionId).val();

        if (positionCode === '') {
            alert('Please fill in Position Code');
            return;
        }
        if (position === '') {
            alert('Please fill in Position');
            return;
        }
        if (salaryGrade === '') {
            alert('Please fill in Salary Grade');
            return;
        }

        if (confirm("Are you sure you want to update this Salary Grade?")) {
            $.post('registry/hrsettings/components/positionlist/actions/update_position.php', {
                positionId: positionId,
                positionCode: positionCode,
                position: position,
                salaryGrade: salaryGrade
            }, function(data) {
                if (data === 'success') {
                    alert('Update successfully');
                    load_hrsettings_submodule('positionlist/positionlist_main.php', this)
                } else {
                    alert(data);
                }
            });
        }
    }


    function position_editclose(positionId) {
        $("#trpositiondisplay_" + positionId).prop('hidden', false);
        $("#trpositionupdate_input_" + positionId).prop('hidden', true);

    }

    function updateposition(positionId) {
        $('.positioneditiput').prop('hidden', true);
        $('.grpositiondisplay').prop('hidden', false);
        $("#trpositiondisplay_" + positionId).prop('hidden', true);
        $("#trpositionupdate_input_" + positionId).prop('hidden', false);
        $('#positioninput').prop('hidden', true);
        $('#positioninput').removeAttr("required")
        $('.positioneditiput').prop('required', true);
    }
</script>





<!-- <tr>
                            <td>1</td>
                            <td>ADAS I</td>
                            <td>Admin Assistant I</td>
                            <td>SG 8</td>
                            <td class="text-center">
                                <i class="cursor-pointer fa-solid fa-pen-to-square"></i>
                                <i class="cursor-pointer fa-solid fa-trash text-danger"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>ADAS I</td>
                            <td>Admin Assistant I</td>
                            <td>SG 8</td>
                            <td class="text-center">
                                <i class="cursor-pointer fa-solid fa-pen-to-square"></i>
                                <i class="cursor-pointer fa-solid fa-trash text-danger"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>ADAS I</td>
                            <td>Admin Assistant I</td>
                            <td>SG 8</td>
                            <td class="text-center">
                                <i class="cursor-pointer fa-solid fa-pen-to-square"></i>
                                <i class="cursor-pointer fa-solid fa-trash text-danger"></i>
                            </td>
                        </tr> -->