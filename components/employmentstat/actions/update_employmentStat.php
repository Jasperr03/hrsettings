<?php
require_once '../../../../../connection.php';
$employmentid = $_POST['employmentid'];
$edtinputEmpStat = $_POST['edtinputEmpStat'];

try {
    $connHR->beginTransaction();
    $updateQry = $connHR->prepare(" UPDATE tbl_employmentstatus SET employment_status = ? WHERE employment_id = ?");
    $updateQry->execute([$employmentid,$edtinputEmpStat]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
   echo $th;
   $connHR->rollBack(); //undo
}
?>