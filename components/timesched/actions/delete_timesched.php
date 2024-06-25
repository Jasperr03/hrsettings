<?php
require_once '../../../../../connection.php';
$deltimeSched = $_POST['deltimeSched'];

try {
    $connHR->beginTransaction();
    $deletetime = $connHR->prepare("DELETE FROM tbl_timeschedule WHERE shift_id = ?");
    $deletetime->execute([$deltimeSched]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>