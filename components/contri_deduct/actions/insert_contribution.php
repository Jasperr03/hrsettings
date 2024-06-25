<?php
require_once '../../../../../connection.php';
$contribution = $_POST['contribution'];
$amount = $_POST['amount'];

try {
    $connHR->beginTransaction();

    $insertqry = $connHR->prepare("INSERT INTO tbl_contrideduct (contribution, amount) VALUES(?,?)");
    $insertqry->execute([$contribution, $amount]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>