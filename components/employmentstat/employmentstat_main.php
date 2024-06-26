<?php
require_once '../../../../connection.php';
?>

<div class="row justify-content-md-center my-4">
    <div class="col-5">
        <div class="card shadow">
            <!--Add Employment Status button-->
            <div class="p-3 pb-0">
                <h5 class="d-inline mb-0">Employment Status</h5>
                <button id="addEmpStatBtn" type=" button " class="btn btn-sm btn-primary float-end px-4 rounded"><i class="fa fa-plus" aria-hidden="true"></i> Add EMployement Status</button>
            </div>
            <div class="card-body table-responsive px-2 pt-1">
                <form id="addEmploymentfrm">
                    <table id="tblEmployment_table" class="table table-sm">
                        <col width="10%">
                        <col width="80%">
                        <col width="10%">
                        <thead>
                            <tr>
                                <th class="text-start">No</th>
                                <th>Employement Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tblempStatList">
                            <!-- Load Employment Status List-->

                        </tbody>
                    </table>
                </form>
                <form id="updateEmploymentfrm" hidden>
                    <table id="updttblEmployment_table" class="table table-sm">
                        <col width="10%">
                        <col width="80%">
                        <col width="10%">
                        <thead>
                            <tr>
                                <th class="text-start">No</th>
                                <th>Employement Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="updttblempStatList">
                            <!-- Load Employment Status List-->

                        </tbody>
                    </table>
                </form>
                <div>
                    <button id="insertEmpBtn" hidden type="submit" form="addEmploymentfrm" class="btn btn-sm px-4 rounded btn-primary">Add </button>
                    <button id="cancelEmpBtn" hidden type="submit" form="addEmploymentfrm" class="btn btn-sm px-4 rounded btn-primary">Cancel </button>
                    <button id="editEmpBtn" hidden type="submit" form="addEmploymentfrm" class="btn btn-sm px-4 rounded btn-primary">Edit </button>
                    <!-- <button id="updtEmpBtn" hidden type="submit" form="updateEmploymentfrm" class="btn btn-sm px-4 rounded btn-primary">Update </button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //load
    $(document).ready(function() {
        $('#addEmpStatBtn').click(function() {
            $('#traddEmpStat').prop('hidden', false),
                $('.trem_editinput').prop('hidden', true)
            $('.tremdisplay').prop('hidden', false);
        });
    });

    $(document).ready(function() {
        $('#editEmpBtn').click(function() {
            $('#tremstat_display_').toggle('hide'),
                $('#tremstat_editin_').prop('hidden', false);
        });
    });

    $(document).ready(function() {
        loadEmploymentStat_list();

        $('#addEmploymentfrm').submit(function(e) {
            e.preventDefault();
            employment_insertStatus();
        });
    });

    function loadEmploymentStat_list() {
        showloadingdiv('#tblempStatList');
        $.post("registry/hrsettings/components/employmentstat/components/employmentStat_list.php", {}, function(data) {
            $('#tblempStatList').html(data);
        });
    }

    $(document).ready(function() {
        loadEmploymentStat_list();

        $('#updateEmploymentfrm').submit(function(e) {
            e.preventDefault();
            updateEmployment_status();
        });
    });
    //action
    function employment_insertStatus() {
        $.post("registry/hrsettings/components/employmentstat/actions/insert_employmentStat.php", {
            emplStatus: $('#insert_employmentStatus').val(),
        }, function(data) {
            if (data == 'success') {
                alert('Insert successfully');
                // $('#addEmploymentfrm').prop('hidden', true);
                loadEmploymentStat_list()
            } else {
                alert(data)
            }
        });
    }

    function delete_empstatus(delemployStat) {
        if (confirm('Are you sure you want to delete?')) {
            $.post("registry/hrsettings/components/employmentstat/actions/delete_employmentstat.php", {
                delemployStat: delemployStat,
            }, function(data) {
                if (data == 'success') {
                    alert('Deleted successfully');
                    loadEmploymentStat_list()
                } else {
                    alert(data)
                }
            });

        }
    }

    function showes_editinput(id) {
        $('.trem_editinput').prop('hidden', true)
        $('.tremdisplay').prop('hidden', false)

        $('#tremstat_display_' + id).prop('hidden', true)
        $('#tremstat_editin_' + id).prop('hidden', false)
        $('#traddEmpStat').prop('hidden', true)
    }

    function closees_input(id) {
        $('#tremstat_display_' + id).prop('hidden', false)
        $('#tremstat_editin_' + id).prop('hidden', true)
    }
</script>