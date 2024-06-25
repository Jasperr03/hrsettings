<?php
require_once '../../../../../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['employeeID'])) {
    $employeeID = $_POST['employeeID'];

    $employeeinfo = $connHR->prepare("SELECT employeeID, bioID, department FROM tbl_employeeregistry WHERE employeeregID = ?");
    $employeeinfo->execute([$employeeID]);
    $info = $employeeinfo->fetch();

    if (isset($_POST['update'])) {
        $employeeID = $_POST['update_emprid'];
        $bioID = $_POST['update_emprbioid'];
        $department = $_POST['update_emprdepartment'];
        echo "success";
        exit();
    }
}
?>




<div class="modal-header">
    <h5 class="modal-title" id="staticBackdropLabel">Modal</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-4 mt-2">
            <h6 class="mb-1">Employee Name</h6>
            <table class="w-100">
                <tbody>
                    <tr>
                        <td><label>First Name:</label></td>
                        <td><input id="update_emprfirstname" value="" class="form-control form-control-sm" type="text" required="" disabled=""></td>
                    </tr>
                    <tr>
                        <td><label>Middle Name:</label></td>
                        <td><input id="update_emprmiddlename" value="" class="form-control form-control-sm" type="text" required="" disabled=""></td>
                    </tr>
                    <tr>
                        <td><label>Last Name:</label></td>
                        <td><input id="update_emprlastname" value="" class="form-control form-control-sm" type="text" required="" disabled=""></td>
                    </tr>
                    <tr>
                        <td><label>Name Extension:</label></td>
                        <td><input id="update_emprnameextension" value="" class="form-control form-control-sm" type="text" disabled=""></td>
                    </tr>
                    <tr>
                        <td><label>Employee ID:</label></td>
                        <td><input id="update_emprid" value="<?php echo htmlspecialchars($employeeID); ?>" class="form-control form-control-sm" type="text"></td>
                    </tr>
                    <tr>
                        <td><label>BIO ID:</label></td>
                        <td><input id="update_emprbioid" value="<?php echo htmlspecialchars($bioID); ?>" class="form-control form-control-sm" type="text" disabled=""></td>
                    </tr>
                    <tr>
                        <td><label>Department</label></td>
                        <td><input id="update_emprdepartment" value="" class="form-control form-control-sm" type="text"></td>
                    </tr>
                    <tr>
                        <td><label>Current Position</label></td>
                        <td><input id="update_emprcurrPosition" value="" class="form-control form-control-sm" type="text"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 mt-2">
            <h6 class="mb-1">Contact Information</h6>
            <table class="w-100">
                <tbody>
                    <tr>
                        <td><label>Telephone No:</label></td>
                        <td><input id="update_emprtelephoneno" value="" class="form-control form-control-sm" type="number"></td>
                    </tr>
                    <tr>
                        <td><label>Mobile No:</label></td>
                        <td><input id="update_emprmobileno" value="" class="form-control form-control-sm" type="number" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Email Address:</label></td>
                        <td><input id="update_empremailaddress" value="" class="form-control form-control-sm" type="email" required="" disabled=""></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 mt-2">
            <h6 class="mb-1">Basic Information</h6>
            <table class="w-100">
                <tbody>
                    <tr>
                        <td><label>Date of Birth:</label></td>
                        <td><input id="update_emprdateofbirth" value="" class="form-control form-control-sm" type="date" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Place of Birth:</label></td>
                        <td><input id="update_emprplaceofbirth" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Gender:</label></td>
                        <td>
                            <select id="update_emprgender" class="form-select form-select-sm" required="">
                                <option value="">[Select Gender]</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Civil Status:</label></td>
                        <td>
                            <select id="update_emprcivilstatus" class="form-select form-select-sm" required="">
                                <option selected="" value="">[Select Civil Status]</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widow</option>
                                <option value="Separated">Separated</option>
                                <option value="Others">Others</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Height (m):</label></td>
                        <td><input id="update_emprheight" value="" class="form-control form-control-sm" type="date" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Weight (kg):</label></td>
                        <td><input id="update_emprweight" value="" class="form-control form-control-sm" type="date" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Blood Type:</label></td>
                        <td><input id="update_emprbloodtype" value="" class="form-control form-control-sm" type="date" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Agency Employee No.:</label></td>
                        <td><input id="update_empragencyno" value="" class="form-control form-control-sm" type="date" required=""></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><br><br>
    <div class="row">
        <div class="col-md-4 mt-2">
            <h6 class="mb-1">Citizenship</h6>
            <table class="w-100">
                <tbody>
                    <tr>
                        <td><label>Filipino:</label></td>
                        <td><input id="update_emprisfilipino" value="" type="checkbox" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Dual Citizenship:</label></td>
                        <td><input id="update_emprdualcitizen" onclick="enableDualCitizenship(this)" value=""type="checkbox"></td>
                    </tr>
                    <tr>
                        <td><label>By birth:</label></td>
                        <td><input id="update_emprbybirth" value=""type="checkbox" disabled="" class="dualcitizenship"></td>
                    </tr>
                    <tr>
                        <td><label>By Naturalizatio:</label></td>
                        <td><input id="update_emprnaturalization"type="checkbox" disabled="" class="dualcitizenship"></td>
                    </tr>
                    <tr>
                        <td><label>Please indicate Country:</label></td>
                        <td><input id="update_emprcountry" value="" class="form-control form-control-sm" type="text" disabled="" class="dualcitizenship"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 mt-2">
            <h6 class="mb-1">Government Issued ID</h6>
            <table class="w-100">
                <tbody>
                    <tr>
                        <td><label>Government Issued ID:</label></td>
                        <td><input id="update_emprgovernmentid" value="" class="form-control form-control-sm" type="number"></td>
                    </tr>
                    <tr>
                        <td><label>ID/License/Passport No:</label></td>
                        <td><input id="update_emprpassportnum" value="" class="form-control form-control-sm" type="number" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Date of Issuance:</label></td>
                        <td><input id="update_emprissuancedate" type="date" value="" class="form-control form-control-sm" type="email" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Place of Issuance:</label></td>
                        <td><input id="update_emprissuanceplace" value="" class="form-control form-control-sm" type="email" required=""></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 mt-2">
            <h6 class="mb-1">Taxes Insurance</h6>
            <table class="w-100">
                <tbody>
                    <tr>
                        <td><label>GSIS ID No:</label></td>
                        <td><input id="update_emprgsis" value="" class="form-control form-control-sm" type="date" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Pagibig ID No:</label></td>
                        <td><input id="update_emprpagibig" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Philhealth No:</label></td>
                        <td><input id="update_emprphilhealth" value="" class="form-control form-control-sm" type="text" require></td>
                    </tr>
                    <tr>
                        <td><label>SSS No:</label></td>
                        <td><input id="update_emprsss" value="" class="form-control form-control-sm" type="text" require></td>
                    </tr>
                    <tr>
                        <td><label>TIN No:</label></td>
                        <td><input id="update_emprtin" value="" class="form-control form-control-sm" type="text" require></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-6 mt-2">
            <h6 id="employeeaddress" class="mb-1">Residential Address</h6>
            <table class="w-100">
                <tbody>
                    <tr>
                        <td><label>House/Block/Lot No:</label></td>
                        <td><input id="update_empresidenthouse" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Street:</label></td>
                        <td><input id="update_empresidentStreet" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Subdivision/Village:</label></td>
                        <td><input id="update_empresidentvillage" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Barangay:</label></td>
                        <td><input id="update_empresidentbarangay" value="" class="form-control form-control-sm" type="text"></td>
                    </tr>
                    <tr>
                        <td><label>City/Municipality:</label></td>
                        <td><input id="update_empresidentmunicipality" value="" class="form-control form-control-sm" type="text"></td>
                    </tr>
                    <tr>
                        <td><label>Province:</label></td>
                        <td><input id="update_empresidentprovince" value="" class="form-control form-control-sm" type="text"></td>
                    </tr>
                    <tr>
                        <td><label>Zip Code:</label></td>
                        <td><input id="update_empresidentzipcode" value="" class="form-control form-control-sm" type="text"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 mt-2">
            <h6 class="mb-1">Permanent Address</h6>
            <div class="d-inline-block float-end">
                <input onclick="toggleSameAsResidential(this)" id="inchksameresidential" type="checkbox">
                <label for="inchksameresidential"><small>Same as Residential Address</small></label>
            </div>
            <table class="w-100">
                <tbody>
                    <tr>
                        <td><label>House/Block/Lot No:</label></td>
                        <td><input id="update_emppermahouse" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Street:</label></td>
                        <td><input id="update_emppermaStreet" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Subdivision/Village:</label></td>
                        <td><input id="update_emppermavillage" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr>
                        <td><label>Barangay:</label></td>
                        <td><input id="update_emppermabarangay" value="" class="form-control form-control-sm" type="text"></td>
                    </tr>
                    <tr>
                        <td><label>City/Municipality:</label></td>
                        <td><input id="update_emppermamunicipality" value="" class="form-control form-control-sm" type="text"></td>
                    </tr>
                    <tr>
                        <td><label>Province:</label></td>
                        <td><input id="update_emppermaprovince" value="" class="form-control form-control-sm" type="text"></td>
                    </tr>
                    <tr>
                        <td><label>Zip Code:</label></td>
                        <td><input id="update_emppermazipcode" value="" class="form-control form-control-sm" type="text"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save</button>
</div>

<script>

    // components
        function toggleSameAsResidential(element) {
        if ($(element).is(':checked')) {
            $('.employeeaddress').prop('', true);
            $('#update_emppermahouse').val($('#update_empresidenthouse').val())
            $('#update_emppermaStreet').val($('#update_empresidentStreet').val())
            $('#update_emppermavillage').val($('#update_empresidentvillage').val())
            $('#update_emppermabarangay').val($('#update_empresidentbarangay').val())
            $('#update_emppermamunicipality').val($('#update_empresidentmunicipality').val())
            $('#update_emppermaprovince').val($('#update_empresidentprovince').val())
            $('#update_emppermazipcode').val($('#update_empresidentzipcode').val())
        } else {
            $('.employeeaddress').prop('', false);
            $('#update_emppermahouse').val('');
            $('#update_emppermaStreet').val('');
            $('#update_emppermavillage').val('');
            $('#update_emppermabarangay').val('');
            $('#update_emppermamunicipality').val('');
            $('#update_emppermaprovince').val('');
            $('#update_emppermazipcode').val('');
        }
    }

    function enableDualCitizenship(element) {
        if ($(element).is(':checked')) {
            $('.dualcitizenship').prop('disabled', false);
            $('#update_emprcountry').prop('disabled', false);
        } else {
            $('.dualcitizenship').prop('disabled', true);

            $('#update_emprcountry').val('');
            $('#update_emprcountry').prop('required', false);
            $('#update_emprnaturalization').prop('checked', false);
            $('#update_emprbybirth').prop('checked', false);
        }
    }
</script>