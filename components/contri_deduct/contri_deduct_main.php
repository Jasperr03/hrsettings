<?php
require_once '../../../../connection.php';
?>

<div class="row justify-content-md-center my-4">
    <div class="col-6">
        <div class="card shadow">
            <div class="p-3 pb-0">
                <h5 class="d-inline mb-0">Contribution/ Deductions</h5>
                <button id="addcontriBtn" class="btn btn-sm btn-primary float-end px-4 rounded" onclick="addcontrib()"><i class="fa fa-plus" aria-hidden="true"></i> Add Contribution/Deduction</button>
            </div>
            <div class="card-body table-responsive px-2 pt-1">
                <form id="addcontrifrm">
                    <table id="tblcontilist" class="table table-sm">
                        <col width="1%">
                        <col width="10%">
                        <col width="1%">
                        <thead>
                            <tr class="align-middle">
                                <th rowspan="1" class="text-start">Contribution/Deduction</th>
                                <th rowspan="1" class="text-center">Amount</th>
                                <th rowspan="1" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbcontri">
                            <!--Contribution list -->

                        </tbody>
                    </table>
                </form>
                <div>
                    <button id="insrtcontridBtn" type="submit" hidden form="addcontrifrm" class="btn btn-sm px-4 rounded btn-primary">Insert </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //load
    function addcontrib() {
        $('#traddcontri').prop('hidden', false);
        $('.contriinput').prop('hidden', true);
        $('.contridisplay').prop('hidden', false);
    }

    $(document).ready(function() {
        loadcontributionlist();

        $('#addcontrifrm').submit(function(e) {
            e.preventDefault();
            addcontriDeduct();
        });
    });

    function loadcontributionlist() {
        showloadingdiv('#tbcontri');
        $.post("registry/hrsettings/components/contri_deduct/components/contributionlist.php", {}, function(data) {
            $('#tbcontri').html(data);
        });
    }

    //Actions
    function addcontriDeduct() {
        $.post("registry/hrsettings/components/contri_deduct/actions/insert_contribution.php", {
            contribution: $('#contribution').val(),
            amount: $('#amount').val(),
        }, function(data) {
            if (data == 'success') {
                alert('Save successfully');
                loadcontributionlist();
            } else {
                alert(data)
            }
        });
    }

    function delete_contribution(delcontri) {
        if (confirm('Are you sure you want to delete?')) {
            $.post("registry/hrsettings/components/contri_deduct/actions/delete_contribution.php", {
                delcontri: delcontri,

            }, function(data) {
                if (data == 'success') {
                    alert('Deleted successfully');
                    loadcontributionlist();
                } else {
                    alert(data)
                }
            });
        }
    }

    function show_contriinput(contribId) {
        $('.contriinput').prop('hidden', true);
        $('.contridisplay').prop('hidden', false);

        $('#trcontridisplay' + contribId).prop('hidden', true);
        $('#trcontriinput' + contribId).prop('hidden', false);

        $('#traddcontri').prop('hidden', true);
    }

    function close_contriinput(contribId) {

        $('#trcontridisplay' + contribId).prop('hidden', false);
        $('#trcontriinput' + contribId).prop('hidden', true);
    }
</script>