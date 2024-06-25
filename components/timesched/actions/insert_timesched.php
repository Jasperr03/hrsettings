<?php
require_once '../../../../../connection.php';
$timecode = $_POST['timecode']; 
$shiftoneIn = $_POST['shiftoneIn'];
$shiftoneOut = $_POST['shiftoneOut'];
$shiftTwooIn = $_POST['shiftTwooIn'];
$shiftTwooOut = $_POST['shiftTwooOut'];
$shiftThreeIn = $_POST['shiftThreeIn'];
$shiftThreeOut = $_POST['shiftThreeOut'];
$shiftFourIn = $_POST['shiftFourIn'];
$shiftFourOut = $_POST['shiftFourOut'];
$time_hours = $_POST['time_hours'];


try {
    $connHR->beginTransaction();

    $insertqry = $connHR->prepare("INSERT INTO tbl_timeschedule (timecode, shif1_in, shift1_out, shift2_in, shift2_out, shift3_in, shift3_out, shift4_in, shift4_out, tm_hours ) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $insertqry->execute([$timecode,$shiftoneIn,$shiftoneOut,$shiftTwooIn,$shiftTwooOut,$shiftThreeIn,$shiftThreeOut,$shiftFourIn,$shiftFourOut,$time_hours]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>