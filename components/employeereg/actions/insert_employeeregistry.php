<?php
require_once '../../../../../connection.php';
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$nameExtension = $_POST['nameExtension'];
$employeeID = $_POST['employeeID'];
$bioID = $_POST['bioID'];
$department = $_POST['department'];
$telnum = $_POST['telnum'];
$mobileNum = $_POST['mobileNum'];
$emailAdd = $_POST['emailAdd'];
$birthDate = $_POST['birthDate'];
$birthPlace = $_POST['birthPlace'];
$gender = $_POST['gender'];
$civStatus = $_POST['civStatus'];


try {
    $connHR->beginTransaction();
    
    $inseryemployeeregistry = $connHR->prepare("INSERT INTO `tbl_employeeregistry`(`fname`, `mname`, `lname`, `nameExtension`, `employeeID`, `bioID`, `department`, `telnum`, `mobileNum`, `emailAdd` , `birthDate` , `birthPlace` , `gender` , `civStatus`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $inseryemployeeregistry->execute([$fname, $mname, $lname, $nameExtension, $employeeID, $bioID, $department, $telnum, $mobileNum, $emailAdd, $birthDate, $birthPlace, $gender, $civStatus]);


    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); //undo
}
?>

