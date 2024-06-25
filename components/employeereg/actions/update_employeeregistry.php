<?php
require_once '../../../../../connection.php';
$employeeID = $_POST['employeeID'];
$bioID = $_POST['bioID'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$nameExtension = $_POST['nameExtension'];
$department = $_POST['department'];
$telnum = $_POST['telnum'];
$mobileNum = $_POST['mobileNum'];
$emailAdd = $_POST['emailAdd'];
$birthDate = $_POST['birthDate'];
$birthPlace = $_POST['birthPlace'];
$gender = $_POST['gender'];
$civStatus = $_POST['civStatus'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$bloodType = $_POST['bloodType'];
$agencyEmployeeNum = $_POST['agencyEmployeeNum'];
$nationality = $_POST['nationality'];
$dualCitizen = $_POST['dualCitizen'];
$byBirth = $_POST['byBirth'];
$byNaturalization = $_POST['byNaturalization'];
$details = $_POST['details'];
$governmentId = $_POST['governmentId'];
$otherID = $_POST['otherID'];
$issuanceDate = $_POST['issuanceDate'];
$gsisID = $_POST['gsisID'];
$pagibigID = $_POST['pagibigID'];
$philhealthID = $_POST['philhealthID'];
$sssNo = $_POST['sssNo'];
$tinNo = $_POST['tinNo'];
$resHouseNum = $_POST['resHouseNum'];
$resStreet = $_POST['resStreet'];
$resSubdivision = $_POST['resSubdivision'];
$resbarangay = $_POST['resbarangay'];
$resMunicipality = $_POST['resMunicipality'];
$resProvince = $_POST['resProvince'];
$resZipCode = $_POST['resZipCode'];
$permaHouseNum = $_POST['permaHouseNum'];
$permaStreet = $_POST['permaStreet'];
$permasubdivision = $_POST['permasubdivision'];
$permaBarangay = $_POST['permaBarangay'];
$permaMunicipality = $_POST['permaMunicipality'];
$permaZipCode = $_POST['permaZipCode'];
$spouseSurname = $_POST['spouseSurname'];
$spouseFname = $_POST['spouseFname'];
$spouseMname = $_POST['spouseMname'];
$spouseLname = $_POST['spouseLname'];
$spouseNameExtension = $_POST['spouseNameExtension'];
$spouseOccupation = $_POST['spouseOccupation'];
$spouseEmployerBusinessname = $_POST['spouseEmployerBusinessname'];
$spouseBusinessAdd = $_POST['spouseBusinessAdd'];
$fatherSurname = $_POST['fatherSurname'];
$fatherMname = $_POST['fatherMname'];
$fatherFname = $_POST['fatherFname'];
$fatherNextension = $_POST['fatherNextension'];
$motherSurname = $_POST['motherSurname'];
$motherFname = $_POST['motherFname'];
$motherMname = $_POST['motherMname'];
$spouseTelno = $_POST['spouseTelno'];
$permaProvince = $_POST['permaProvince'];

try {
    $connHR->beginTransaction();
    
    // Update tbldepartment
    $updateemployee = $connHR->prepare("UPDATE tbl_employeeregistry SET bioID=?, fname=?, mname=?, lname=?, nameExtension=?, department=?, telnum=?, mobileNum=?, emailAdd=?, birthDate=?, birthPlace=?, gender=?, civStatus=?, height=?, weight=?, bloodType=?, agencyEmployeeNum=?, nationality=?, dualCitizen=?, byBirth=?, byNaturalization=?, details=?, governmentId=?, otherID=?, issuanceDate=?, gsisID=?, pagibigID=?, philhealthID=?, sssNo=?, tinNo=?, resHouseNum=?, resStreet=?, resSubdivision=?, resbarangay=?, resMunicipality=?, resProvince=?, resZipCode=?, permaHouseNum=?, permaStreet=?, permasubdivision=?, permaBarangay=?, permaMunicipality=?, permaProvince=?, permaZipCode=?, spouseSurname=?, spouseFname=?, spouseMname=?, spouseNameExtension=?, spouseOccupation=?, spouseEmployerBusinessname=?, spouseBusinessAdd=?, spouseTelno=?, fatherSurname=?, fatherMname=?, fatherFname=?, fatherNextension=?, motherSurname=?, motherFname=?, motherMname=?, employeeID=? WHERE employeeregID=?");
    $updateemployee->execute([$bioID, $fname, $mname, $lname, $nameExtension, $department, $telnum, $mobileNum, $emailAdd, $birthDate, $birthPlace, $gender, $civStatus, $height, $weight, $bloodType, $agencyEmployeeNum, $nationality, $dualCitizen, $byBirth, $byNaturalization, $details, $governmentId, $otherID, $issuanceDate, $gsisID, $pagibigID, $philhealthID, $sssNo, $tinNo, $resHouseNum, $resStreet, $resSubdivision, $resbarangay, $resMunicipality, $resProvince, $resZipCode, $permaHouseNum, $permaStreet, $permasubdivision, $permaBarangay, $permaMunicipality, $permaProvince, $permaZipCode, $spouseSurname, $spouseFname, $spouseMname, $spouseNameExtension, $spouseOccupation, $spouseEmployerBusinessname, $spouseBusinessAdd, $spouseTelno, $fatherSurname, $fatherMname, $fatherFname, $fatherNextension, $motherSurname, $motherFname, $motherMname, $employeeID]);

    $connHR->commit();
    echo 'success';
} catch (\Throwable $th) {
    echo $th;
    $connHR->rollBack(); 
}
?>
