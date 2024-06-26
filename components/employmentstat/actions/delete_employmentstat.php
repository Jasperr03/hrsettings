<?php
require_once '../../../../../connection.php';
$delemployStat = $_POST['delemployStat'];

try {
    $connHR->beginTransaction();
    $deleteQry= $connHR->prepare("DELETE FROM tbl_employmentstatus WHERE employment_id = ?");
    $deleteQry->execute([$delemployStat]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
   $connHR->rollBack(); //undo
}
?>