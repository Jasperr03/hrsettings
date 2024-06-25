<?php
require_once '../../../connection.php';
$groupsetid = $_POST['groupsetid'];
$settingsName_ = $_POST['settingsName_'];
$value_ = $_POST['value_'];
$remarks_ = $_POST['remarks_'];
$orderNo_ = $_POST['orderNo_'];

try {
    $connHR->beginTransaction();

    $insertqry = $connHR->prepare("INSERT INTO tblsettings (groupsettId,settingsName, setvalue, remarks, orderNo) VALUES(?,?,?,?,?)");
    $insertqry->execute([$groupsetid, $settingsName_, $value_, $remarks_, $orderNo_]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
