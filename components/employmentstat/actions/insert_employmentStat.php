<?php
require_once '../../../../../connection.php';
$emplStatus = $_POST['emplStatus'];

try {
    $connHR->beginTransaction();

    $insertqry = $connHR->prepare("INSERT INTO tbl_employmentstatus (employment_status) VALUES(?)");
    $insertqry->execute([$emplStatus]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>