<?php
require_once '../../../../../connection.php';
$shiftid = $_POST['shiftid'];
$updatetimecode = $_POST['updatetimecode'];
$updateshif1_in = $_POST['updateshif1_in'];
$updateshift1_out = $_POST['updateshift1_out'];
$updateshift2_in = $_POST['updateshift2_in'];
$updateshift2_out = $_POST['updateshift2_out'];
$updateshift3_in = $_POST['updateshift3_in'];
$updateshift3_out = $_POST['updateshift3_out'];
$updateshift4_in = $_POST['updateshift4_in'];
$updateshift4_out = $_POST['updateshift4_out'];
$updatetm_hours = $_POST['updatetm_hours'];


try {
    $connHR->beginTransaction();
    $updatetime = $connHR->prepare("UPDATE tbl_timeschedule tt SET timecode=?, shif1_in=?, shift1_out=?, shift2_in=?, shift2_out=?, shift3_in=?, shift3_out=?, shift4_in=?, shift4_out=?, tm_hours=?  WHERE shift_id = ?");
    $updatetime->execute([$updatetimecode, $updateshif1_in, $updateshift1_out, $updateshift2_in, $updateshift2_out, $updateshift3_in, $updateshift3_out, $updateshift4_in, $updateshift4_out, $updatetm_hours, $shiftid]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>