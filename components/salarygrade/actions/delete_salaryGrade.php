<?php
require_once '../../../../../connection.php';
$salary_id = $_POST['salary_id'];


try {
    $connHR->beginTransaction();
    
    $selSalaryGrade = $connHR->prepare("DELETE FROM `tbl_salarygrade` WHERE salary_id=?");
    $selSalaryGrade->execute([$salary_id]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>