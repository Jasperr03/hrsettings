<?php 
require_once '../../../connection.php';
$groupname = $_POST['groupname']; 
$grouporder = $_POST['grouporder'];

try {
    $connHR->beginTransaction();

    $insertqry = $connHR->prepare("INSERT INTO tbl_groupsetting (groupsetting, orderNo) VALUES(?,?)");
    $insertqry->execute([$groupname,$grouporder]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>