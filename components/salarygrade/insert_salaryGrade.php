<?php
require_once '../../../../connection.php';
$salary_grade = $_POST['salary_grade'];
$sgcode = $_POST['sgcode'];
$step1 = $_POST['step1'];
$step2 = $_POST['step2'];
$step3 = $_POST['step3'];
$step4 = $_POST['step4'];
$step5 = $_POST['step5'];
$step6 = $_POST['step6'];
$step7 = $_POST['step7'];
$step8 = $_POST['step8'];


try {
    $connHR->beginTransaction();
    
    $insertSalary = $connHR->prepare("INSERT INTO `tbl_salarygrade`(`salary_grade`, `sgcode`, `step1`, `step2`, `step3`, `step4`, `step5`, `step6`, `step7`, `step8`) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $insertSalary->execute([$salary_grade, $sgcode, $step1, $step2, $step3, $step4, $step5, $step6, $step7, $step8,]);


    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>

<script>
    
function loadupdate_salary() {
        if (confirm("Are you sure you want to update this Salary Grade?")) {
            $.post('registry/hrsettings/components/salarygrade/actions/update_salaryGrade', {
            salary_id: <?php echo $salary_id; ?>,
            salary_grade: $('#update_salary_grade_<?php echo $salary_id; ?>').val(),
            sgcode: $('#update_code_').val(),
            step1: $('#update_step1_').val(),
            step2: $('#update_step2_').val(),
            step3: $('#update_step3_').val(),
            step4: $('#update_step4_').val(),
            step5: $('#update_step5_').val(),
            step6: $('#update_step6_').val(),
            step7: $('#update_step7_').val(),
            step8: $('#update_step8_').val()

        }, function(data) {
            if (data === 'success') {
                alert('Update successfully');
                load_hrsettings_submodule('salarygrade/salarygrade_main.php', this)
            } else {
                alert(data);
            }
        });
    }
}

</script>
