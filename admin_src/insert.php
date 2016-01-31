<?php 
$employee_id = isSecure(@$_POST['employee_id']);
$password = isSecure(@$_POST['password']);
$name = isSecure(@$_POST['name']);
$employee_type = isSecure(@$_POST['employee_type']);
?>
<div class="panel-body">
	<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h5 class="modal-title">Insert New Employee Data</h5>
				</div>
				<div class="modal-body">
					<form class="form-vertical" method="post">
					<?php 
					if (isset($_POST['insertdata'])) {
						if (strlen($employee_id) <= 7) {
							if (strlen($password) > 5) {
								if (strlen($name) > 2 && ! is_numeric($name)) {

									$check_query = "SELECT employee_id FROM employee WHERE employee_id = '$employee_id'";
									$sql_check = mysql_query($check_query);
									$row = mysql_num_rows($sql_check);

									if ($row > 0) {
									echo'<div class="alert alert-danger" role="alert">
                                           <span class="sr-only">Error: </span>
                                           Employee ID already exists.
                                        </div>';
                                    } else {
                                    	$pass = md5($password);
                                    	$insert_query = "INSERT INTO employee (employee_id, password, employee_type, employee_name) VALUES ('$employee_id', '$pass', '$employee_type', '$name')";
                                    	$sql_insert = mysql_query($insert_query);

                                    	if ($sql_insert) {
                                    		echo'<script>alert("Data successfully added.");window.location="admin";</script>';
                                    	} else {
                                    		echo "Error :" . mysql_error();
                                    	}
                                    }

								} else {
									echo'<div class="alert alert-danger" role="alert">
                                           <span class="sr-only">Error: </span>
                                           Please check the name.
                                        </div>';
								}
							} else {
								echo'<div class="alert alert-danger" role="alert">
                                       <span class="sr-only">Error: </span>
                                       Minimum password length is 6 characters.
                                    </div>';
							}
						} else {
							echo'<div class="alert alert-danger" role="alert">
                                   <span class="sr-only">Error: </span>
                                   Employee ID length must 7 characters.
                                </div>';
						}						
					}
					?>
						<div class="form-group">
							<label for="employee_id">Employee ID</label>
							<input type="text" name="employee_id" class="form-control" required value="<?php echo $employee_id; ?>">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" required value="<?php echo $name; ?>">
						</div>
						<div class="form-group">
							<label for="employee_type">Employee Type</label>
							<select name="employee_type" class="form-control">
								<option value="Admin">Admin</option>
								<option value="Waiter">Waiter</option>
								<option value="Chef">Chef</option>
								<option value="Pantry">Pantry</option>
								<option value="Cashier">Cashier</option>
								<option value="CS">Customer Service</option>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-success" type="submit" name="insertdata">Insert Data</button>
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