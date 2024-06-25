<?php
require_once '../../../../../connection.php';
$contriId = $_POST['contriId'];
$updatecontri = $_POST['updatecontri'];
$updateamount = $_POST['updateamount'];

try {
    $connHR->beginTransaction();
    $updtcontri = $connHR->prepare("UPDATE tbl_contrideduct tc SET contribution=?, amount=?  WHERE contrideduct_id = ?");
    $updtcontri->execute([$updatecontri, $updateamount, $contriId]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>
