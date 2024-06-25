<!-- update family modal -->
<div class="modal-header">
    <h5 class="modal-title" id="staticBackdropLabel">Modal</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
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
                            <h6>Spouse</h6>
                        </td>
                    </tr>
                    <tr class="align-top">
                        <td>Spouse Surname</td>
                        <td><input id="emprspouse" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>First Name</td>
                        <td><input id="emprspousefirstname" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>Middle Name</td>
                        <td><input id="emprspousemiddlename" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>Name Extension</td>
                        <td><input id="emprspousenameextension" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>Occupation</td>
                        <td><input id="emprspouseoccupation" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>Employer Business Name</td>
                        <td><input id="emprbusinessname" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>Business Address</td>
                        <td><input id="emprbusinessaddress" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>Telephone Number</td>
                        <td><input id="emprtellno" value="" class="form-control form-control-sm" type="text" required=""></td>
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
                        <td><input id="emprfathersurname" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>First Name</td>
                        <td><input id="emprfatherfirstname" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>Middle Name</td>
                        <td><input id="emprfathermiddlename" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>Name Extension</td>
                        <td><input id="emprfatherextension" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h6>Mother's Maiden Name</h6>
                        </td>
                    <tr class="align-top">
                        <td>Surname</td>
                        <td><input id="emprmothersurname" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>First Name</td>
                        <td><input id="emprnmotherfirstnamne" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                    <tr class="align-top">
                        <td>Middle Name
                        </td>
                        <td><input id="emprmothermiddlename" value="" class="form-control form-control-sm" type="text" required=""></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 mt-2">
            <table class="w-100 mb-2">
                <thead>
                    <tr>
                        <td>
                            <h6 class="mb-1">Name of Children</h6>
                        </td>
                        <td>
                            <h6 class="mb-1">Date of Birth</h6>
                        </td>
                        <td></td>
                    </tr>
                    <tr id="trhiddenchildreninputs" hidden="">
                        <td><input class="inempchildren form-control form-control-sm" type="text"></td>
                        <td><input class="inempchildrenbirthdate form-control form-control-sm" type="date"></td>
                        <td><i class="cursor-pointer fa-solid fa-trash text-danger" onclick="deletechild(this)"></i></td>
                    </tr>
                </thead>
                <tbody id="tbodyempchildreninput">
                </tbody>

            </table>
            <a onclick="addemployeechildrow()" class="text-decoration-none cursor-pointer"><svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                </svg>Add children</a>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save Changes</button>
</div>

<script>
    function addemployeechildrow() {
        $('#tbodyempchildreninput').append('<tr>' + $('#trhiddenchildreninputs').html() + '</tr>');
        $('#tbodyempchildreninput input').prop('required', true);
    }

    function deletechild(row) {
        $(row).closest('tr').remove();
    }
</script>
