<?php
require_once '../../../../connection.php';

if (isset($_POST['employeeID'])) {
    $employeeID = $_POST['employeeID'];

    $employeeinfo = $connHR->prepare("SELECT employeeID, bioID, department FROM tbl_employeeregistry WHERE employeeID = ?");
    $employeeinfo->execute([$employeeID]);
    $info = $employeeinfo->fetch(PDO::FETCH_ASSOC);

    if ($info) {
        echo json_encode($info);
    } else {
        echo json_encode(['error' => 'Employee not found']);
    }
}
?>

<?php
require_once '../../../../connection.php';

if (isset($_POST['employeeID'])) {
    $employeeID = $_POST['employeeID'];

    $employeeinfo = $connHR->prepare("SELECT employeeID, bioID, department FROM tbl_employeeregistry WHERE employeeID = ?");
    $employeeinfo->execute([$employeeID]);
    $info = $employeeinfo->fetch(PDO::FETCH_ASSOC);

    if ($info) {
        echo json_encode($info);
    } else {
        echo json_encode(['error' => 'Employee not found']);
    }
}
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
                    <td>: <span id="employeeID"></span></td>
                </tr>
                <tr class="align-top">
                    <td>Bio ID</td>
                    <td>: <span id="bioID"></span></td>
                </tr>
                <tr class="align-top">
                    <td>Department</td>
                    <td>: <span id="department"></span></td>
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
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Mobile No</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Email Address</td>
                    <td>:</td>
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
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Place of Birth</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Gender</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Civil Status</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Height</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Weight</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Blood Type</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Agency Employee No</td>
                    <td>: </td>
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
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Dual Citizenship</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>By Birth</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>By Naturalization</td>
                    <td>:</td>
                </tr>
                <tr class="align-top">
                    <td>Details</td>
                    <td>: </td>
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
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>ID/License/Passport No</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Date of Issuance</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Place of Issuance</td>
                    <td>: </td>
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
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>PAG-IBIG ID No</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>PHILHEALTH No</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>SSS No</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>TIN No</td>
                    <td>: </td>
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
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Street</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Subdivision/Village</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Barangay</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>City/Municipality</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Province</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Zip Code</td>
                    <td>: </td>
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
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Street</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Subdivision/Village</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Barangay</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>City/Municipality</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Province</td>
                    <td>: </td>
                </tr>
                <tr class="align-top">
                    <td>Zip Code</td>
                    <td>: </td>
                </tr>
            </tbody>
        </table>
    </div>



