<?php
$ingredient_name = isSecure(@$_POST['ingredient_name']);
$amount = isSecure(@$_POST['amount']);
$stock = isSecure(@$_POST['stock']);
$min_stock = isSecure(@$_POST['min_stock']);
$entry_date = isSecure(@$_POST['entry_date']);
$expired = isSecure(@$_POST['expired']);

$entry = date('Y-m-d', strtotime(str_replace('-', '/', $entry_date)));
$exp = date('Y-m-d', strtotime(str_replace('-', '/', $expired)));

?>
<div class="panel-body">
	<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h5 class="modal-title">Insert New Material</h5>
				</div>
				<div class="modal-body">
					<form class="form-vertical" method="post">
					<?php 
					if (isset($_POST['insertdata'])) {
						if (strlen($ingredient_name) > 2 && ! is_numeric($ingredient_name)) {
							if (is_numeric($amount)) {
								if (is_numeric($stock)) {
									if (is_numeric($min_stock)) {
										if ($entry_date < $expired) {
											
											$insert_query = "INSERT INTO ingredients (employee_id, material_name, min_stock, stock, entry_date, exp_date, amount) VALUES ('" . $_SESSION['pantry'] . "', '$ingredient_name', '$min_stock', '$stock', '$entry', '$exp', '$amount')";
											$sql_insert = mysql_query($insert_query);

											if ($sql_insert) {
												echo'<script>alert("Data successfully added.");window.location="pantry.php";</script>';
											} else {
												echo "Error :" . mysql_error();
											}
											
										} else {
											echo'<div class="alert alert-danger" role="alert">
		                                           <span class="sr-only">Error: </span>
		                                           Please check expired date.
		                                        </div>';
										}
									} else {
										echo'<div class="alert alert-danger" role="alert">
	                                           <span class="sr-only">Error: </span>
	                                           Min Stock must number.
	                                        </div>';
									}
								} else {
									echo'<div class="alert alert-danger" role="alert">
                                           <span class="sr-only">Error: </span>
                                           Stock must number.
                                        </div>';
								}
							} else {
								echo'<div class="alert alert-danger" role="alert">
                                       <span class="sr-only">Error: </span>
                                       Amount must number.
                                    </div>';
							}
						} else {
							echo'<div class="alert alert-danger" role="alert">
                                   <span class="sr-only">Error: </span>
                                   Please check material name.
                                </div>';
						}
					}
					?>
						<div class="form-group">
							<label for="ingredient_name">Material Name</label>
							<input type="text" name="ingredient_name" class="form-control" required value="<?php echo $ingredient_name; ?>">
						</div>
						<div class="form-group">
							<label for="amount">Amount ($)</label>
							<input type="text" name="amount" class="form-control" required value="<?php echo $amount; ?>">
						</div>
						<div class="form-group">
							<label for="stock">Stock</label>
							<input type="text" name="stock" class="form-control" required value="<?php echo $stock; ?>">
						</div>
						<div class="form-group">
							<label for="min_stock">Minimum Stock</label>
							<input type="text" name="min_stock" class="form-control" required value="<?php echo $min_stock; ?>">
						</div>
						<div class="form-group">
							<label for="entry_date">Entry Date</label>
							<input type="date" name="entry_date" class="form-control" required value="<?php echo $entry_date; ?>">
						</div>
						<div class="form-group">
							<label for="expired">Expired</label>
							<input type="date" name="expired" class="form-control" required value="<?php echo $expired; ?>">
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
