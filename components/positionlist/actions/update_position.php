<?php
require_once '../../../../../connection.php';
$positionId = $_POST['positionId'];
$salaryGrade = $_POST['salaryGrade'];
$positionCode = $_POST['positionCode'];
$position = $_POST['position'];



try {
    $connHR->beginTransaction();
    
    // Update tbldepartment
    $updatePosition = $connHR->prepare("UPDATE tbl_positionlist SET salaryGrade=?, positionCode=?, position=? WHERE positionId=?");
    $updatePosition->execute([$salaryGrade, $positionCode, $position, $positionId]);


    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); 
}

?>