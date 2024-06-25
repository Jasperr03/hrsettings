<?php
require_once '../../../../connection.php';
$employeeall = $connHR->prepare("SELECT employeeID, CONCAT(lname, ' ', fname, ' ', mname) AS name FROM tbl_employeeregistry");
$employeeall->execute();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['employeeID'])) {
    $employeeID = $_POST['employeeID'];

    $employeeinfo = $connHR->prepare("SELECT employeeID, bioID, department FROM tbl_employeeregistry WHERE employeeID = ?");
    $employeeinfo->execute([$employeeID]);
    $info = $employeeinfo->fetch();
}
?>


<div class="row justify-content-md-center my-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="p-3 pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Employee Registry List</h5>
                    <div class="d-flex align-items-center">
                        <select id="employeeSelect" class="form-select form-select-sm me-2" onchange="loadEmployeeinfodisplay()">
                            <!-- diri ang dropdown sa employees -->
                        </select>
                    </div>
                    <button class="btn-sm btn-primary rounded ms-2" onclick="loadmodalemployee_insert()">
                        Add Employee
                    </button>
                </div>
            </div><br>
            <button class="btn btn-sm btn-primary rounded col-md-1 col-sm-12 align-left mt-2" onclick="loadmodalemployee_update()">
                Edit
            </button>
            <div class="card-body pt-0 px-1">
                <div class="container-fluid bd-example-row" id="employeedisplay2">
                    <!-- load diri ang display sa employee information -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-md-center my-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="p-3 pb-0">
            </div><br>
            <div class="card-body pt-0 px-1">
                <div class="container-fluid bd-example-row">
                    <h5 class="mb-0">Employee Family Background</h5><br><br>
                    <button class="btn btn-sm btn-primary px-4 rounded" onclick="loadmodalemployeefamily_update()">
                        Edit
                    </button>

                    <div class="row" id="employeefamilydisplay">

                        <!-- load diri  ang employee family details -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Insert Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- update modal -->
<div class="modal fade" id="editemployee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editemployeeLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
        </div>
    </div>
</div>
<!-- update family modal -->
<div class="modal fade" id="editemployeefamily" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editemployeeLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // loadEmployeefamilydisplay();
        // loadEmployeeinfodisplay();
        loadEmployeedropdown();
    });

    function loadEmployeedropdown() {
        $.post("registry/hrsettings/components/employeereg/components/employeedropdown.php", {}, function(data) {
            $('#employeeSelect').html(data);
        });
    }

    // COMPONENTS
    function loadEmployeeinfodisplay() {
        loadEmployeefamilydisplay();
        $.post("registry/hrsettings/components/employeereg/components/employeeinfodisplay.php", {
            employeeID: $('#employeeSelect').val()
        }, function(data) {
            $('#employeedisplay2').html(data);
        });
    }

    function loadEmployeefamilydisplay() {
        $.post("registry/hrsettings/components/employeereg/components/employeefamilydisplay.php", {
            employeeID: $('#employeeSelect').val()
        }, function(data) {
            $('#employeefamilydisplay').html(data);
        });
    }







    // ACTIONS
    function loadmodalemployee_insert() {
        $.post("registry/hrsettings/components/employeereg/components/modals.php", {}, function(data) {
            $('#staticBackdrop .modal-content').html(data)
            $('#staticBackdrop').modal('show');
        });
    }

    function loadmodalemployee_update() {
        var employeeID = $('#employeeSelect').val();
        if (employeeID) {
            $.post("registry/hrsettings/components/employeereg/components/edit_modal.php", {
                employeeID: employeeID
            }, function(data) {
                $('#editemployee .modal-content').html(data);
                $('#editemployee').modal('show');
            });
        } else {
            alert("Please select an employee first.");
        }
    }


    function loadmodalemployee_update() {
        $.post("registry/hrsettings/components/employeereg/components/edit_modal.php", {}, function(data) {
            $('#editemployee .modal-content').html(data)
            $('#editemployee').modal('show');
        });
    }

    function loadmodalemployeefamily_update() {
        $.post("registry/hrsettings/components/employeereg/components/edit_familymodal.php", {}, function(data) {
            $('#editemployee .modal-content').html(data)
            $('#editemployee').modal('show');
        });
    }

    function insertemployeeregistry() {
        if (confirm("Are you sure you want to insert this employee information?")) {
            $.post('registry/hrsettings/components/employeereg/actions/insert_employeeregistry.php', {
                fname: $('#insertemprfirstname').val(),
                mname: $('#insertemprmiddlename').val(),
                lname: $('#insertemprlastname').val(),
                nameExtension: $('#insertemprnameextension').val(),
                employeeID: $('#insertemprid').val(),
                bioID: $('#insertemprbioid').val(),
                department: $('#insertemprdepartment').val(),
                telnum: $('#insertemprtelephoneno').val(),
                mobileNum: $('#insertemprmobileno').val(),
                emailAdd: $('#insertempremailaddress').val(),
                birthDate: $('#insertemprdateofbirth').val(),
                birthPlace: $('#insertemprplaceofbirth').val(),
                gender: $('#insertemprgender').val(),
                civStatus: $('#insertemprcivilstatus').val(),

            }, function(data) {
                if (data.trim() === 'success') {
                    alert('Insert successfully');
                    $('#staticBackdrop').modal('hide')
                    loadEmployeedropdown();
                } else {
                    alert('Insert failed: ' + data);
                }
            });
        }
    }
</script>