<?php
require_once '../../../../connection.php';

$salary_all = $connHR->prepare("SELECT salary_id, salary_grade, sgcode, step1, step2, step3, step4, step5, step6, step7, step8 FROM tbl_salarygrade");
$salary_all->execute();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_salaryButton'])) {
    $salary_id = $_POST['salary_id'];
    $salary_grade = $_POST['update_salary_grade_' . $salary_id];
    $sgcode = $_POST['update_sgcode_' . $salary_id];
    $step1_ = $_POST['update_step1_' . $salary_id];
    $step2 = $_POST['update_step2_' . $salary_id];
    $step3 = $_POST['update_step3_' . $salary_id];
    $step4 = $_POST['update_step4_' . $salary_id];
    $step5 = $_POST['update_step5_' . $salary_id];
    $step6 = $_POST['update_step6_' . $salary_id];
    $step7 = $_POST['update_step7_' . $salary_id];
    $step8 = $_POST['update_step8_' . $salary_id];


    echo "success";
    exit();
}
?>







<div class="row justify-content-md-center my-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="p-3 pb-0">
                <h5 class="d-inline mb-0">Salary Grade List</h5>
                <button class="btn btn-sm btn-primary float-end px-4 rounded" id="addSalaryButton" onclick="showsgaddinput()"><i class="fa fa-plus" aria-hidden="true"></i> Add Salary Grade</button>
            </div>
            <div class="card-body table-responsive px-2 pt-1">
                <form id="frminput_salary">
                    <table class="table table-sm">
                        <col width="5%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="5%">
                        <thead>
                            <tr>
                                <th class="text-start">SG</th>
                                <th>Code</th>
                                <th>Step 1</th>
                                <th>Step 2</th>
                                <th>Step 3</th>
                                <th>Step 4</th>
                                <th>Step 5</th>
                                <th>Step 6</th>
                                <th>Step 7</th>
                                <th>Step 8</th>
                                <th class="text-center">Action</th>
                            </tr>
                            <tr id="salaryinput" hidden>
                                <td><input id="insert_salary_grade" class="addinputsg form-control form-control-sm" type="number" required></td>
                                <td><input id="insert_sgcode" class="addinputsg form-control form-control-sm" type="text" required></td>
                                <td><input id="insert_step1" class="addinputsg form-control form-control-sm" type="number" required></td>
                                <td><input id="insert_step2" class="addinputsg form-control form-control-sm" type="number" required></td>
                                <td><input id="insert_step3" class="addinputsg form-control form-control-sm" type="number" required></td>
                                <td><input id="insert_step4" class="addinputsg form-control form-control-sm" type="number" required></td>
                                <td><input id="insert_step5" class="addinputsg form-control form-control-sm" type="number" required></td>
                                <td><input id="insert_step6" class="addinputsg form-control form-control-sm" type="number" required></td>
                                <td><input id="insert_step7" class="addinputsg form-control form-control-sm" type="number" required></td>
                                <td><input id="insert_step8" class="addinputsg form-control form-control-sm" type="number" required></td>
                                <td class="text-center pt-2 ">
                                    <i class="fa-solid fa-save" onclick="$('#save_salaryButton').click()"></i>
                                    <i id="exitButton" class="cursor-pointer fa-solid fa-x"></i>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <button type="submit" id="save_salaryButton" class="btn btn-primary" hidden></button>

                            <?php foreach ($salary_all->fetchAll() as $row) : //all rows kuahon 
                            ?>
                                <tr id="trsalarydisplay_<?php echo $row['salary_id'] ?>" class="grpsgdisplay">
                                    <td class="text-left"><?php echo $row['salary_grade'] ?></td>
                                    <td class="text-left"><?php echo $row['sgcode'] ?></td>
                                    <td class="text-left"><?php echo number_format($row['step1']) ?></td>
                                    <td class="text-left"><?php echo number_format($row['step2']) ?></td>
                                    <td class="text-left"><?php echo number_format($row['step3']) ?></td>
                                    <td class="text-left"><?php echo number_format($row['step4']) ?></td>
                                    <td class="text-left"><?php echo number_format($row['step5']) ?></td>
                                    <td class="text-left"><?php echo number_format($row['step6']) ?></td>
                                    <td class="text-left"><?php echo number_format($row['step7']) ?></td>
                                    <td class="text-left"><?php echo number_format($row['step8']) ?></td>
                                    <td class="text-center">
                                        <i class="cursor-pointer fa-solid fa-pen-to-square" onclick="updatesalary(<?php echo $row['salary_id'] ?>)"></i>
                                        <i class="cursor-pointer fa-solid fa-trash text-danger" onclick="deleteSalary(<?php echo $row['salary_id'] ?>)"></i>
                                    </td>
                                </tr>

                                <tr id="trsalaryupdate_input_<?php echo $row['salary_id'] ?>" class="grpsgeditiput" hidden>
                                    <td><input id="update_salary_grade_<?php echo $row['salary_id'] ?>" class="form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($row['salary_grade'])  ?>"></td>
                                    <td><input id="update_sgcode_<?php echo $row['salary_id'] ?>" class="editinputsg form-control form-control-sm" type="text" required value="<?php echo htmlspecialchars($row['sgcode']) ?>"></td>
                                    <td><input id="update_step1_<?php echo $row['salary_id'] ?>" class="editinputsg form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($row['step1']) ?>"></td>
                                    <td><input id="update_step2_<?php echo $row['salary_id'] ?>" class="editinputsg form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($row['step2']) ?>"></td>
                                    <td><input id="update_step3_<?php echo $row['salary_id'] ?>" class="editinputsg form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($row['step3']) ?>"></td>
                                    <td><input id="update_step4_<?php echo $row['salary_id'] ?>" class="editinputsg form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($row['step4']) ?>"></td>
                                    <td><input id="update_step5_<?php echo $row['salary_id'] ?>" class="editinputsg form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($row['step5']) ?>"></td>
                                    <td><input id="update_step6_<?php echo $row['salary_id'] ?>" class="editinputsg form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($row['step6']) ?>"></td>
                                    <td><input id="update_step7_<?php echo $row['salary_id'] ?>" class="editinputsg form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($row['step7']) ?>"></td>
                                    <td><input id="update_step8_<?php echo $row['salary_id'] ?>" class="editinputsg form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($row['step8']) ?>"></td>
                                    <td class="text-center pt-2 ">
                                        <form id="update_form_<?php echo $row['salary_id'] ?>">
                                            <button type="submit" class="btn btn-primary" hidden></button>
                                            <i class="cursor-pointer fa-solid fa-save" onclick="loadupdate_salary('<?php echo $row['salary_id'] ?>')"></i>
                                            <!-- <i class="cursor-pointer fa-solid fa-save" onclick="$('#update_button_<?php echo $row['salary_id'] ?>').click()"></i> -->
                                            <i class="cursor-pointer fa-solid fa-x" onclick="sg_closeinputedit('<?php echo $row['salary_id'] ?>')"></i>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#frminput_salary').submit(function(e) {
            e.preventDefault();
            insert_salary();
        });

        $('#frmupdate_salary').submit(function(e) {
            e.preventDefault();
            loadupdate_salary();
        });

        // $("#addSalaryButton").click(function() {
        //     $("tr[id^='trsalarydisplay_']").hide();
        //     $("#salaryinput").show();
        // });

        $("#exitButton").click(function() {
            $("#salaryinput").prop('hidden', true);
            // $("tr[id^='trsalarydisplay_']").show();
        });
    });

    function insert_salary() {
        if (confirm("Are you sure you want to insert this Salary Grade?")) {
            $.post('registry/hrsettings/components/salarygrade/actions/insert_salaryGrade.php', {
                salary_grade: $('#insert_salary_grade').val(),
                sgcode: $('#insert_sgcode').val(),
                step1: $('#insert_step1').val(),
                step2: $('#insert_step2').val(),
                step3: $('#insert_step3').val(),
                step4: $('#insert_step4').val(),
                step5: $('#insert_step5').val(),
                step6: $('#insert_step6').val(),
                step7: $('#insert_step7').val(),
                step8: $('#insert_step8').val()
            }, function(data) {
                if (data.trim() === 'success') {
                    alert('Insert successfully');
                    load_hrsettings_submodule('salarygrade/salarygrade_main.php', this)
                } else {
                    alert('Insert failed: ' + data);
                }
            });
        }
    }

    function deleteSalary(salary_id) {
        if (confirm("Are you sure you want to delete this Salary Grade?")) {
            $.post('registry/hrsettings/components/salarygrade/actions/delete_salaryGrade.php', {
                salary_id: salary_id
            }, function(data) {
                if (data == 'success') {
                    load_hrsettings_submodule('salarygrade/salarygrade_main.php', this)
                } else {
                    alert(data)
                }
            });
        }
    }

    function loadupdate_salary(salary_id) {
        salary_grade = $('#update_salary_grade_' + salary_id).val();
        sgcode = $('#update_sgcode_' + salary_id).val();
        step1 = $('#update_step1_' + salary_id).val();
        step2 = $('#update_step2_' + salary_id).val();
        step3 = $('#update_step3_' + salary_id).val();
        step4 = $('#update_step4_' + salary_id).val();
        step5 = $('#update_step5_' + salary_id).val();
        step6 = $('#update_step6_' + salary_id).val();
        step7 = $('#update_step7_' + salary_id).val();
        step8 = $('#update_step8_' + salary_id).val();

        if (salary_grade === '' || sgcode === '' || step1 === '' || step2 === '' || step3 === '' || step4 === '' || step5 === '' || step6 === '' || step7 === '' || step8 === '') {
            alert('Please fill in Rows');
            return;
        }


        if (confirm("Are you sure you want to update this Salary Grade?")) {
            $.post('registry/hrsettings/components/salarygrade/actions/update_salaryGrade.php', {
                salary_id: salary_id,
                salary_grade: salary_grade,
                sgcode: sgcode,
                step1: step1,
                step2: step2,
                step3: step3,
                step4: step4,
                step5: step5,
                step6: step6,
                step7: step7,
                step8: step8
            }, function(data) {
                if (data === 'success') {
                    alert('Update successfully');
                    load_hrsettings_submodule('salarygrade/salarygrade_main.php', this);
                } else {
                    alert(data);
                }
            });
        }
    }
    // function loadupdate_salary(salary_id) {
    //     if (confirm("Are you sure you want to update this Salary Grade?")) {
    //         $.post('registry/hrsettings/components/salarygrade/actions/update_salaryGrade.php', {
    //             salary_id: salary_id,
    //             salary_grade: $('#update_salary_grade_' + salary_id).val(),
    //             sgcode: $('#update_sgcode_' + salary_id).val(),
    //             step1: $('#update_step1_' + salary_id).val(),
    //             step2: $('#update_step2_' + salary_id).val(),
    //             step3: $('#update_step3_' + salary_id).val(),
    //             step4: $('#update_step4_' + salary_id).val(),
    //             step5: $('#update_step5_' + salary_id).val(),
    //             step6: $('#update_step6_' + salary_id).val(),
    //             step7: $('#update_step7_' + salary_id).val(),
    //             step8: $('#update_step8_' + salary_id).val()
    //         }, function(data) {
    //             if (data === 'success') {
    //                 alert('Update successfully');
    //                 load_hrsettings_submodule('salarygrade/salarygrade_main.php', this);
    //             } else {
    //                 alert(data);
    //             }
    //         });
    //     }
    // }

    function showsgaddinput() {
        $('#salaryinput').prop('hidden', false);
        $('.grpsgeditiput').prop('hidden', true);
        $('.grpsgdisplay').prop('hidden', false);
    }

    function updatesalary(salary_id) {
        $('.grpsgeditiput').prop('hidden', true);
        $('.grpsgdisplay').prop('hidden', false);
        $("#trsalarydisplay_" + salary_id).prop('hidden', true);
        $("#trsalaryupdate_input_" + salary_id).prop('hidden', false);
        $('#salaryinput').prop('hidden', true);
        $('#salaryinput').removeAttr("required")
        $('.grpsgeditiput').prop('required', true);
        // attr
        // prop
        // addClass
        // removeClass
        // css
        // click
    }

    function sg_closeinputedit(sgid) {
        $("#trsalarydisplay_" + sgid).prop('hidden', false);
        $("#trsalaryupdate_input_" + sgid).prop('hidden', true);

    }
</script>