<?php
require_once '../../../../../connection.php';

if (!isset($_POST['employeeID']) || $_POST['employeeID'] == '') {
    exit();
}

$employeeID = $_POST['employeeID'];

$employeeinfo = $connHR->prepare("SELECT spouseSurname, spouseFname, spouseMname, spouseLname, spouseNameExtension, spouseOccupation, spouseEmployerBusinessname, spouseBusinessAdd, spousetelnum, fatherSurname, fatherMname, fatherFname, fatherNextension, motherSurname, motherFname, motherMname  FROM tbl_employeeregistry WHERE employeeID = ?");
$employeeinfo->execute([$employeeID]);
$info = $employeeinfo->fetch();
?>
<div class="col-md-4 col-sm-12 mt-2">
    <table class="w-100">
        <colgroup>
            <col width="40%">
            <col width="60%">
        </colgroup>
        <tbody>
            <tr>
                <td colspan="2">
                    <h6>Spouse</h6>
                </td>
            </tr>
            <tr class="align-top">
                <td>Spouse Surname</td>
                <td>: <?php echo $info['spouseSurname']?></td>
            </tr>
            <tr class="align-top">
                <td>First Name</td>
                <td>: <?php echo $info['spouseFname']?></td>
            </tr>
            <tr class="align-top">
                <td>Middle Name</td>
                <td>: <?php echo $info['spouseMname']?></td>
            </tr>
            <tr class="align-top">
                <td>Name Extension</td>
                <td>: <?php echo $info['spouseNameExtension']?></td>
            </tr>
            <tr class="align-top">
                <td>Occupation</td>
                <td>: <?php echo $info['spouseOccupation']?></td>
            </tr>
            <tr class="align-top">
                <td>Employer Business Name</td>
                <td>: <?php echo $info['spouseEmployerBusinessname']?></td>
            </tr>
            <tr class="align-top">
                <td>Business Address</td>
                <td>: <?php echo $info['spouseBusinessAdd']?></td>
            </tr>
            <tr class="align-top">
                <td>Telephone Number</td>
                <td>: <?php echo $info['spousetelnum']?></td>
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
                    <h6>Father</h6>
                </td>
            </tr>
            <tr class="align-top">
                <td>Father's Surname</td>
                <td>: <?php echo $info['fatherSurname']?></td>
            </tr>
            <tr class="align-top">
                <td>First Name</td>
                <td>: <?php echo $info['fatherFname']?></td>
            </tr>
            <tr class="align-top">
                <td>Middle Name</td>
                <td>: <?php echo $info['fatherMname']?></td>
            </tr>
            <tr class="align-top">
                <td>Name Extension</td>
                <td>: <?php echo $info['fatherNextension']?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <h6>Mother's Maiden Name</h6>
                </td>
            <tr class="align-top">
                <td>Surname</td>
                <td>: <?php echo $info['motherSurname']?> </td>
            </tr>
            <tr class="align-top">
                <td>First Name</td>
                <td>: <?php echo $info['motherFname']?> </td>
            </tr>
            <tr class="align-top">
                <td>Middle Name
                </td>
                <td>: <?php echo $info['motherMname']?></td>
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
                    <h6>Children</h6>
                </td>
            </tr>
            <tr class="align-top">
                <td>Name</td>
                <td>Date of Birth</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
        function toggleSameAsResidential(element) {
        if ($(element).is(':checked')) {
            $('.empaddress').prop('readonly', true);
            $('#inemppermanenthouseno').val($('#inempresidentialhouseno').val())
            $('#inemppermanentstreet').val($('#inempresidentialstreet').val())
            $('#inemppermanentvillage').val($('#inempresidentialvillage').val())
            $('#inemppermanentbarangay').val($('#inempresidentialbarangay').val())
            $('#inemppermanentcity').val($('#inempresidentialcity').val())
            $('#inemppermanentprovince').val($('#inempresidentialprovince').val())
            $('#inemppermanentzipcode').val($('#inempresidentialzipcode').val())
        } else {
            $('.empaddress').prop('readonly', false);
            $('#inemppermanenthouseno').val('');
            $('#inemppermanentstreet').val('');
            $('#inemppermanentvillage').val('');
            $('#inemppermanentbarangay').val('');
            $('#inemppermanentcity').val('');
            $('#inemppermanentprovince').val('');
            $('#inemppermanentzipcode').val('');
        }
    }
</script>