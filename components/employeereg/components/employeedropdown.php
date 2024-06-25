<?php
require_once '../../../../../connection.php';
$employeeall = $connHR->prepare("SELECT employeeID, CONCAT(lname, ' ', fname, ' ', mname) AS name FROM tbl_employeeregistry");
$employeeall->execute();
?>
<option value="">[Select Employee]</option>
<?php foreach ($employeeall as $employee) : ?>
    <option value="<?php echo htmlspecialchars($employee['employeeID']) ?>"><?php echo htmlspecialchars($employee['name']) ?></option>
<?php endforeach; ?>