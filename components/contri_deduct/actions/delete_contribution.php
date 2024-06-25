<?php
require_once '../../../../../connection.php';
$delcontri = $_POST['delcontri'];

try {
    $connHR->beginTransaction();
    $deletecontri = $connHR->prepare("DELETE FROM tbl_contrideduct WHERE contrideduct_id = ?");
    $deletecontri->execute([$delcontri]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>
