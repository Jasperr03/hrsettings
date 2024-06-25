<?php
require_once '../../../../../connection.php';
$positionId = $_POST['positionId'];


try {
    $connHR->beginTransaction();
    
    $selSalaryGrade = $connHR->prepare("DELETE FROM `tbl_positionlist` WHERE positionId=?");
    $selSalaryGrade->execute([$positionId]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>