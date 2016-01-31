<!-- Modal EDIT -->
<div class="panel-body">
    <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h5 class="modal-title">Edit Employee Data</h5>
                </div>
                <div class="modal-body">
                    <form class="form-vertical" method="post">
                    <?php 
					if (isset($_POST['editdata'])) {
						$empId = isSecure($_POST['empId']);
						$empName = isSecure($_POST['empName']);
						$empType = isSecure($_POST['empType']);
						if (strlen($empName) > 2 && ! is_numeric($empName)) {

                        	$update_query = "UPDATE employee SET employee_name = '$empName', employee_type = '$empType' WHERE employee_id = '$empId';";
                        	$sql_update = mysql_query($update_query);

                        	if ($sql_update) {
                        		echo'<script>alert("Data successfully updated.");window.location="admin.php";</script>';
                        	} else {
                        		echo "Error :" . mysql_error();
                        	}

						} else {
							echo'<div class="alert alert-danger" role="alert">
                                   <span class="sr-only">Error: </span>
                                   Please check the name.
                                </div>';
						}						
					}
					?>
                        <div class="form-group">
                            <label for="empId">Employee ID</label>
                            <input type="text" readonly="readonly" name="empId" id="empId" class="form-control" value="" required>
                        </div>                        
                        <div class="form-group">
                            <label for="empName">Name</label>
                            <input type="text" name="empName" id="empName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="empType">Employee Type</label>
                            <select name="empType" id="empType" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Waiter">Waiter</option>
                                <option value="Chef">Chef</option>
                                <option value="Pantry">Pantry</option>
                                <option value="Cashier">Cashier</option>
                                <option value="CS">Customer Service</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="editdata">Save Changes</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
