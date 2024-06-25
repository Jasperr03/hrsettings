<?php
require_once '../../../../../connection.php';
$positionCode = $_POST['positionCode'];
$position = $_POST['position'];
$salaryGrade = $_POST['salaryGrade'];


try {
    $connHR->beginTransaction();
    
    $insertPosition = $connHR->prepare("INSERT INTO `tbl_positionlist`(`positionCode`, `position`, `salaryGrade`) VALUES (?,?,?)");
    $insertPosition->execute([$positionCode, $position, $salaryGrade]);


    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>
