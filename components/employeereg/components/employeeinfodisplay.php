<?php
require_once '../../../../../connection.php';

if (!isset($_POST['employeeID']) || $_POST['employeeID'] == '') {
    exit();
}

$employeeID = $_POST['employeeID'];

$employeeinfo = $connHR->prepare("SELECT employeeID, bioID, department, telNum, mobileNum, emailAdd, birthDate, birthPlace, gender, civStatus, height, permaProvince, weight, bloodType, agencyEmployeeNum, nationality, dualCitizen, byBirth, byNaturalization, details, governmentId, otherID, issuanceDate, issuancePlace, gsisID, pagibigID, philhealthID, sssNo, tinNo, resHouseNum, resStreet, resSubdivision, resBarangay, resMunicipality, resProvince, resZipCode, permaHouseNum, permaStreet, permasubdivision, permaBarangay, permaMunicipality, permaZipCode  FROM tbl_employeeregistry WHERE employeeID = ?");
$employeeinfo->execute([$employeeID]);
$info = $employeeinfo->fetch();
?>

<div class="row mt-2" id="employeedisplay">
    <div class="col-md-3 col-sm-12 text-center align-middle mt-2">
        <img src="assets/img/nbsclogo.png" width="100">
    </div>
    <div class="col-md-5 mt-2">
        <h5 class="mb-0"> </h5>
        <p class="mb-2"></p>
        <table class="w-100 align-top">

            <colgroup>
                <col width="25%">
                <col width="75%">
            </colgroup>
            <tbody id="employeeDetails">
                <tr class="align-top">
                    <td>Employee ID</td>
                    <td>: <?php echo $info['employeeID']?></td>
                </tr>
                <tr class="align-top">
                    <td>Bio ID</td>
                    <td>: <?php echo $info['bioID']?> </td>
                </tr>
                <tr class="align-top">
                    <td>Department</td>
                    <td>: <?php echo $info['department']?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4 mt-2">
        <table class="w-100">
            <colgroup>
                <col width="40%">
                <col width="60%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="2">
                        <h6>Contact Information</h6>
                    </td>
                </tr>
                <tr class="align-top">
                    <td>Telephone No</td>
                    <td>: <?php echo $info['telNum']?></td>
                </tr>
                <tr class="align-top">
                    <td>Mobile No</td>
                    <td>: <?php echo $info['mobileNum']?></td>
                </tr>
                <tr class="align-top">
                    <td>Email Address</td>
                    <td>:<?php echo $info['emailAdd']?></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-12 mt-2">
        <table class="w-100">
            <colgroup>
                <col width="50%">
                <col width="50%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="2">
                        <h6>Basic Information</h6>
                    </td>
                </tr>
                <tr class="align-top">
                    <td>Date of Birth</td>
                    <td>: <?php echo $info['birthDate']?></td>
                </tr>
                <tr class="align-top">
                    <td>Place of Birth</td>
                    <td>: <?php echo $info['birthPlace']?></td>
                </tr>
                <tr class="align-top">
                    <td>Gender</td>
                    <td>: <?php echo $info['gender']?></td>
                </tr>
                <tr class="align-top">
                    <td>Civil Status</td>
                    <td>: <?php echo $info['civStatus']?></td>
                </tr>
                <tr class="align-top">
                    <td>Height</td>
                    <td>: <?php echo $info['height']?></td>
                </tr>
                <tr class="align-top">
                    <td>Weight</td>
                    <td>: <?php echo $info['weight']?></td>
                </tr>
                <tr class="align-top">
                    <td>Blood Type</td>
                    <td>: <?php echo $info['bloodType']?></td>
                </tr>
                <tr class="align-top">
                    <td>Agency Employee No</td>
                    <td>: <?php echo $info['agencyEmployeeNum']?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4 col-sm-12 mt-2">
        <table class="w-100">
            <colgroup>
                <col width="40%">
                <col width="60%">

            </colgroup>
            <tbody>
                <tr>
                    <td colspan="2">
                        <h6>Citizenship</h6>
                    </td>
                </tr>
                <tr class="align-top">
                    <td>Nationality</td>
                    <td>: <?php echo $info['nationality']?></td>
                </tr>
                <tr class="align-top">
                    <td>Dual Citizenship</td>
                    <td>: <?php echo $info['dualCitizen']?></td>
                </tr>
                <tr class="align-top">
                    <td>By Birth</td>
                    <td>: <?php echo $info['byBirth']?></td>
                </tr>
                <tr class="align-top">
                    <td>By Naturalization</td>
                    <td>:<?php echo $info['byNaturalization']?></td>
                </tr>
                <tr class="align-top">
                    <td>Details</td>
                    <td>: <?php echo $info['details']?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4 col-sm-12 mt-2">
        <table class="w-100">
            <colgroup>
                <col width="50%">
                <col width="50%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="2">
                        <h6>Government Issued ID</h6>
                    </td>
                </tr>
                <tr class="align-top">
                    <td>Government Issued ID</td>
                    <td>: <?php echo $info['governmentId']?></td>
                </tr>
                <tr class="align-top">
                    <td>ID/License/Passport No</td>
                    <td>: <?php echo $info['otherID']?></td>
                </tr>
                <tr class="align-top">
                    <td>Date of Issuance</td>
                    <td>: <?php echo $info['issuanceDate']?></td>
                </tr>
                <tr class="align-top">
                    <td>Place of Issuance</td>
                    <td>: <?php echo $info['issuancePlace']?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-12 mt-2">
        <table class="w-100">
            <colgroup>
                <col width="40%">
                <col width="60%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="2">
                        <h6>Taxes/Insurance</h6>
                    </td>
                </tr>
                <tr class="align-top">
                    <td>GSIS ID No</td>
                    <td>: <?php echo $info['gsisID']?></td>
                </tr>
                <tr class="align-top">
                    <td>PAG-IBIG ID No</td>
                    <td>: <?php echo $info['pagibigID']?></td>
                </tr>
                <tr class="align-top">
                    <td>PHILHEALTH No</td>
                    <td>: <?php echo $info['philhealthID']?></td>
                </tr>
                <tr class="align-top">
                    <td>SSS No</td>
                    <td>: <?php echo $info['sssNo']?></td>
                </tr>
                <tr class="align-top">
                    <td>TIN No</td>
                    <td>: <?php echo $info['tinNo']?></td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="col-md-4 col-sm-12 mt-2">
        <table class="w-100">
            <colgroup>
                <col width="50%">
                <col width="50%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="2">
                        <h6>Residential Address</h6>
                    </td>
                </tr>
                <tr class="align-top">
                    <td>House/Block/Lot No</td>
                    <td>:<?php echo $info['resHouseNum']?> </td>
                </tr>
                <tr class="align-top">
                    <td>Street</td>
                    <td>: <?php echo $info['resStreet']?></td>
                </tr>
                <tr class="align-top">
                    <td>Subdivision/Village</td>
                    <td>: <?php echo $info['resSubdivision']?></td>
                </tr>
                <tr class="align-top">
                    <td>Barangay</td>
                    <td>: <?php echo $info['resBarangay']?></td>
                </tr>
                <tr class="align-top">
                    <td>City/Municipality</td>
                    <td>: <?php echo $info['resMunicipality']?></td>
                </tr>
                <tr class="align-top">
                    <td>Province</td>
                    <td>: <?php echo $info['resProvince']?></td>
                </tr>
                <tr class="align-top">
                    <td>Zip Code</td>
                    <td>: <?php echo $info['resZipCode']?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4 col-sm-12 mt-2">
        <table class="w-100">
            <colgroup>
                <col width="50%">
                <col width="50%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="2">
                        <h6>Permanent Address</h6>
                    </td>
                </tr>
                <tr class="align-top">
                    <td>House/Block/Lot No</td>
                    <td>: <?php echo $info['permaHouseNum']?></td>
                </tr>
                <tr class="align-top">
                    <td>Street</td>
                    <td>: <?php echo $info['permaStreet']?></td>
                </tr>
                <tr class="align-top">
                    <td>Subdivision/Village</td>
                    <td>: <?php echo $info['permasubdivision']?></td>
                </tr>
                <tr class="align-top">
                    <td>Barangay</td>
                    <td>: <?php echo $info['permaBarangay']?></td>
                </tr>
                <tr class="align-top">
                    <td>City/Municipality</td>
                    <td>: <?php echo $info['permaMunicipality']?></td>
                </tr>
                <tr class="align-top">
                    <td>Province</td>
                    <td>: <?php echo $info['permaProvince']?></td>
                </tr>
                <tr class="align-top">
                    <td>Zip Code</td>
                    <td>: <?php echo $info['permaZipCode']?></td>
                </tr>
            </tbody>
        </table>
    </div>