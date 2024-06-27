<?php 
require_once '../../../connection.php';
$grpsetid = $_POST['grpsetid'];
$updategrpname = $_POST['updategrpname']; 
$updategrporder = $_POST['updategrporder'];

try {
    $connHR->beginTransaction();
    $updtgrpset = $connHR->prepare("UPDATE tbl_groupsetting SET groupsetting=?, orderNo=?  WHERE groupsettId = ?");
    $updtgrpset->execute([$updategrpname, $updategrporder,$grpsetid]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>