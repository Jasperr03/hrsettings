<?php
require_once '../../../../../connection.php';
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

