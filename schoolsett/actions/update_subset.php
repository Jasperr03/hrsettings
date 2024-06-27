<?php 
require_once '../../../connection.php';
$setid = $_POST['setid'];
$updatesetname = $_POST['updatesetname']; 
$updatevalue = $_POST['updatevalue'];
$updateremarks = $_POST['updateremarks'];
$updateorderno = $_POST['updateorderno'];

try {
    $connHR->beginTransaction();
    $updtsett = $connHR->prepare("UPDATE tblsettings SET settingsName=?, setvalue=?, remarks=?, orderNo=?  WHERE settingsId = ?");
    $updtsett->execute([$updatesetname, $updatevalue,$updateremarks,$updateorderno,$setid]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>