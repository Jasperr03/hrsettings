<?php
require_once '../../../../connection.php';
?>

<div class="row justify-content-md-center my-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="p-3 pb-0">
                <h5 class="d-inline mb-0">Time Schedule</h5>
                <button id="addtimeshiftBtn" class="btn btn-sm btn-primary float-end px-4 rounded" onclick="addtimeshift()"><i class="fa fa-plus" aria-hidden="true"></i> Add Time Schedule</button>
            </div>
            <div class="card-body table-responsive px-2 pt-1">
                <form id="addschedfrm">
                    <table id="tblshiftlist" class="table table-sm table-bordered border-dark">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="5%">
                        <col width="5%">
                        <thead>
                            <tr class="align-middle">
                                <th rowspan="2" class="text-start">Time Code</th>
                                <th colspan="2" class="text-center">Shift 1</th>
                                <th colspan="2" class="text-center">Shift 2</th>
                                <th colspan="2" class="text-center">Shift 3</th>
                                <th colspan="2" class="text-center">Shift 4</th>
                                <th rowspan="2" class="text-center" title="Number of hourse">Hours</th>
                                <th rowspan="2" class="text-center">Action</th>
                            </tr>
                            <tr class="text-center">
                                <th>In</th>
                                <th>Out</th>
                                <th>In</th>
                                <th>Out</th>
                                <th>In</th>
                                <th>Out</th>
                                <th>In</th>
                                <th>Out</th>
                            </tr>
                        </thead>
                        <tbody id="tbtimesched">
                            <!--Load Time Shift Form and sched LIst-->

                        </tbody>
                    </table>
                </form>
                <form id="updateschedfrm" hidden>
                    <table id="updttblshiftlist" class="table table-sm table-bordered border-dark">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="5%">
                        <col width="5%">
                        <thead>
                            <tr class="align-middle">
                                <th rowspan="2" class="text-start">Time Code</th>
                                <th colspan="2" class="text-center">Shift 1</th>
                                <th colspan="2" class="text-center">Shift 2</th>
                                <th colspan="2" class="text-center">Shift 3</th>
                                <th colspan="2" class="text-center">Shift 4</th>
                                <th rowspan="2" class="text-center" title="Number of hourse">Hours</th>
                                <th rowspan="2" class="text-center">Action</th>
                            </tr>
                            <tr class="text-center">
                                <th>In</th>
                                <th>Out</th>
                                <th>In</th>
                                <th>Out</th>
                                <th>In</th>
                                <th>Out</th>
                                <th>In</th>
                                <th>Out</th>
                            </tr>
                        </thead>
                        <tbody id="updttbtimesched">
                            <!--Load Time Shift Form and sched LIst-->

                        </tbody>
                    </table>
                </form>
                <div>
                    <button id="saveSchedBtn" hidden type="submit" form="addschedfrm" class="btn btn-sm px-4 rounded btn-primary">Save </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //load

    function addtimeshift() {
        $('#traddsched').prop('hidden', false);
        $('.timeschedinput').prop('hidden', true);
        $('.timescheddisplay').prop('hidden', false);
    }

    $(document).ready(function() {
        loadtimeSched_list();

        $('#addschedfrm').submit(function(e) {
            e.preventDefault();
            addtimesched();
        });
    });

    function loadtimeSched_list() {
        showloadingdiv('#tbtimesched');
        $.post("registry/hrsettings/components/timesched/components/timeschedlist.php", {}, function(data) {
            $('#tbtimesched').html(data);
        });
    }

    //Action
    function addtimesched() {
        $.post("registry/hrsettings/components/timesched/actions/insert_timesched.php", {
            timecode: $('#timecode').val(),
            shiftoneIn: $('#shiftone_in').val(),
            shiftoneOut: $('#shiftone_out').val(),
            shiftTwooIn: $('#shifttwo_in').val(),
            shiftTwooOut: $('#shifttwo_out').val(),
            shiftThreeIn: $('#shiftthree_in').val(),
            shiftThreeOut: $('#shiftthree_out').val(),
            shiftFourIn: $('#shiftfour_in').val(),
            shiftFourOut: $('#shiftfour_out').val(),
            time_hours: $('#tdhours').val(),
        }, function(data) {
            if (data == 'success') {
                alert('Save successfully');
                loadtimeSched_list()
            } else {
                alert(data)
            }
        });
    }

    function delete_timesched(deltimeSched) {

        if (confirm('Are you sure you want to delete?')) {
            $.post("registry/hrsettings/components/timesched/actions/delete_timesched.php", {
                deltimeSched: deltimeSched,

            }, function(data) {
                if (data == 'success') {
                    alert('Deleted successfully');
                    loadtimeSched_list()
                } else {
                    alert(data)
                }
            });
        }
    }


    function showtime_editinput(shiftid) {
        $('.timeschedinput').prop('hidden', true);
        $('.timescheddisplay').prop('hidden', false);

        $('#trtimeScheddisplay' + shiftid).prop('hidden', true);
        $('#trtimeSchedinput' + shiftid).prop('hidden', false);

        $('#traddsched').prop('hidden', true);
    }

    function close_editinput(shiftid) {
        $('#trtimeScheddisplay' + shiftid).prop('hidden', false)
        $('#trtimeSchedinput' + shiftid).prop('hidden', true);
    }
</script>