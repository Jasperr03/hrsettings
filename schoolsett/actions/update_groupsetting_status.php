<?php 
require_once '../../../connection.php';
$grpsetid = $_POST['grpsetid'];

try {
    $connHR->beginTransaction();
    $updtgrpset = $connHR->prepare("UPDATE tbl_groupsetting SET grpstatus=0  WHERE groupsettId = ?");
    $updtgrpset->execute([$grpsetid]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>