<?php
require_once '../../../../../connection.php';

$salary_id = $_POST['salary_id'];

$salary_query = $connHR->prepare("SELECT salary_grade, code, step1, step2, step3, step4, step5, step6, step7, step8  FROM tbl_salarygrade WHERE salary_id = ?");
$salary_query->execute([$salary_id]);


$dept_data = $salary_query->fetch();
$salary_grade = $dept_data['salary_grade'];
$code = $dept_data['code'];
$step1 = $dept_data['step1'];
$step2 = $dept_data['step2'];
$step3 = $dept_data['step3'];
$step4 = $dept_data['step4'];
$step5 = $dept_data['step5'];
$step6 = $dept_data['step6'];
$step7 = $dept_data['step7'];
$step8 = $dept_data['step8'];

if ($dept_data) {

} else {
    echo "No data Available";
}
?>

                            <tr id="salaryupdate">
                                <td><input id="update_salary_grade <?php echo $salary_id ?>" class="form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($salary_grade) ?>"></td>
                                <td><input id="update_code <?php echo $salary_id ?>" class="form-control form-control-sm" type="text" required value="<?php echo htmlspecialchars($code) ?>"></td>
                                <td><input id="update_step1 <?php echo $salary_id ?>" class="form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($step1) ?>"></td>
                                <td><input id="update_step2 <?php echo $salary_id ?>" class="form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($step2) ?>"></td>
                                <td><input id="update_step3 <?php echo $salary_id ?>" class="form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($step3) ?>"></td>
                                <td><input id="update_step4 <?php echo $salary_id ?>" class="form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($step4) ?>"></td>
                                <td><input id="update_step5 <?php echo $salary_id ?>" class="form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($step5) ?>"></td>
                                <td><input id="update_step6 <?php echo $salary_id ?>" class="form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($step6) ?>"></td>
                                <td><input id="update_step7 <?php echo $salary_id ?>" class="form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($step7) ?>"></td>
                                <td><input id="update_step8 <?php echo $salary_id ?>" class="form-control form-control-sm" type="number" required value="<?php echo htmlspecialchars($step8) ?>"></td>
                                <td class="text-center pt-2 ">
                                    <button type="submit" id="save_salaryButton" class="btn btn-primary">
                                        <i class="fa-solid fa-save"></i>
                                    </button>
                                    <i id="exitButton" class="cursor-pointer fa-solid fa-x"></i>
                                </td>
                            </tr>
                            <?php foreach ($salary_all->fetchAll() as $row) : //all rows kuahon ?>
                                    <tr>
                                            <td class="text-left pt-3"><?php echo $row['salary_grade'] ?></td>
                                            <td class="text-left pt-3"><?php echo $row['code'] ?></td>
                                            <td class="text-left pt-3"><?php echo $row['step1'] ?></td>
                                            <td class="text-left pt-3"><?php echo $row['step2'] ?></td>
                                            <td class="text-left pt-3"><?php echo $row['step3'] ?></td>
                                            <td class="text-left pt-3"><?php echo $row['step4'] ?></td>
                                            <td class="text-left pt-3"><?php echo $row['step5'] ?></td>
                                            <td class="text-left pt-3"><?php echo $row['step6'] ?></td>
                                            <td class="text-left pt-3"><?php echo $row['step7'] ?></td>
                                            <td class="text-left pt-3"><?php echo $row['step8'] ?></td>
                                            <td class="text-left">
                                                <i class="cursor-pointer fa-solid fa-pen-to-square"></i>
                                                <i class="cursor-pointer fa-solid fa-trash text-danger" onclick="deleteSalary(<?php echo $row['salary_id'] ?>)"></i>
                                            </td>
                                    </tr> 
                            <?php endforeach; ?>

<script>
    // Load data
    $('#salaryupdate').submit(function(e) {
        e.preventDefault();
        loadupdate_salary();
    });

    // Action
    function loadupdate_salary() {
        $.post('registry/hrsettings/components/salarygrade/actions/update_salaryGrade.php', {
            salary_id: <?php echo $salary_id; ?>,
            salary_grade: $('#update_salary_grade<?php echo $salary_id; ?>').val(),
            code: $('#update_code').val(),
            step1: $('#update_step1').val(),
            step2: $('#update_step2').val(),
            step3: $('#update_step3').val(),
            step4: $('#update_step4').val(),
            step5: $('#update_step5').val(),
            step6: $('#update_step6').val(),
            step7: $('#update_step7').val(),
            step8: $('#update_step8').val()

        }, function(data) {
            if (data === 'success') {
                alert('Update successfully');
                load_hrsettings_submodule('salarygrade/salarygrade_main.php', this)
            } else {
                alert(data);
            }
        });
    }
</script>