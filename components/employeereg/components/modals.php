<!-- add new modal -->
<div class="modal-header">
    <h5 class="modal-title" id="staticBackdropLabel">Modal</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="frminsertemployee">
        <div class="row">
            <div class="col-md-4 mt-2">
                <h6 class="mb-1">Employee Name</h6>
                <table class="w-100">
                    <tbody>
                        <tr>
                            <td><label>First Name:</label></td>
                            <td><input id="insertemprfirstname" value="" class="form-control form-control-sm" type="text" required=""></td>
                        </tr>
                        <tr>
                            <td><label>Middle Name:</label></td>
                            <td><input id="insertemprmiddlename" value="" class="form-control form-control-sm" type="text" required=""></td>
                        </tr>
                        <tr>
                            <td><label>Last Name:</label></td>
                            <td><input id="insertemprlastname" value="" class="form-control form-control-sm" type="text" required=""></td>
                        </tr>
                        <tr>
                            <td><label>Name Extension:</label></td>
                            <td><input id="insertemprnameextension" value="" class="form-control form-control-sm" type="text"></td>
                        </tr>
                        <tr>
                            <td><label>Employee ID:</label></td>
                            <td><input id="insertemprid" value="" class="form-control form-control-sm" type="text"></td>
                        </tr>
                        <tr>
                            <td><label>BIO ID:</label></td>
                            <td><input id="insertemprbioid" value="" class="form-control form-control-sm" type="text"></td>
                        </tr>
                        <tr>
                            <td><label>department</label></td>
                            <td><input id="insertemprdepartment" value="" class="form-control form-control-sm" type="text"></td>
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
                            <td><input id="insertemprtelephoneno" value="" class="form-control form-control-sm" type="number"></td>
                        </tr>
                        <tr>
                            <td><label>Mobile No:</label></td>
                            <td><input id="insertemprmobileno" value="" class="form-control form-control-sm" type="number" required=""></td>
                        </tr>
                        <tr>
                            <td><label>Email Address:</label></td>
                            <td><input id="insertempremailaddress" value="" class="form-control form-control-sm" type="email" required=""></td>
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
                            <td><input id="insertemprdateofbirth" value="" class="form-control form-control-sm" type="date" required=""></td>
                        </tr>
                        <tr>
                            <td><label>Place of Birth:</label></td>
                            <td><input id="insertemprplaceofbirth" value="" class="form-control form-control-sm" type="text" required=""></td>
                        </tr>
                        <tr>
                            <td><label>Gender:</label></td>
                            <td>
                                <select id="insertemprgender" class="form-select form-select-sm" required="">
                                    <option value="">[Select Gender]</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Civil Status:</label></td>
                            <td>
                                <select id="insertemprcivilstatus" class="form-select form-select-sm" required="">
                                    <option selected="" value="">[Select Civil Status]</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widow</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Others">Others</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" form="frminsertemployee" class="btn btn-primary">Save</button>
</div>
<script>
    $('#frminsertemployee').submit(function(e) {
        e.preventDefault();
        insertemployeeregistry();
    });
</script>







