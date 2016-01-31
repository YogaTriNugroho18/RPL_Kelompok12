<?php 
$category = isSecure(@$_POST['category']);
$name = isSecure(@$_POST['name']);
$desc = isSecure(@$_POST['desc']);
$price = isSecure(@$_POST['price']);
$discount = isSecure(@$_POST['discount']);
?>
<div class="panel-body">
	<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h5 class="modal-title">Insert New Menu</h5>
				</div>
				<div class="modal-body">
					<form class="form-vertical" method="post" enctype="multipart/form-data">
					<?php 
					if (isset($_POST['insertdata'])) {
						if (strlen($name) > 2 && ! is_numeric($name)) {
							if (strlen($desc) > 2 && ! is_numeric($desc)) {
								if (is_numeric($price)) {
									if (is_numeric($discount) && $discount > 0 && $discount < 100) {
										$file_name = $_FILES['photo']['name'];
										$file_size = $_FILES['photo']['size'];
										$file_type = $_FILES['photo']['type'];
										$tmp_file = $_FILES['photo']['tmp_name'];

										$path = 'assets/images/menu';

										$check_query = "SELECT menu_id FROM menus WHERE menu_id = '$menu_id'";
										$sql_check = mysql_query($check_query);
										$row = mysql_num_rows($sql_check);

										if ($row > 0) {
											echo'<div class="alert alert-danger" role="alert">
		                                           <span class="sr-only">Error: </span>
		                                           Menu ID already exists.
		                                        </div>';
										} else {

											$upload = move_uploaded_file($tmp_file, $path . '/' . $file_name);

											$insert_query = mysql_query("INSERT INTO menus (category_id, menu_name, menu_desc, menu_price, menu_discount, photo) VALUES ('$category', '$name', '$desc', '$price', '$discount', '" . $path . "/" . $file_name . "')");

											if ($insert_query) {
												echo'<script>alert("Data successfully added.");window.location="chef";</script>';
											} else {
												echo "Error :" . mysql_error();
											}
										}
									} else {
										echo'<div class="alert alert-danger" role="alert">
	                                           <span class="sr-only">Error: </span>
	                                           Please check the discount.
	                                        </div>';
									}
								} else {
									echo'<div class="alert alert-danger" role="alert">
                                           <span class="sr-only">Error: </span>
                                           Please check the price.
                                        </div>';
								}
							} else {
								echo'<div class="alert alert-danger" role="alert">
                                       <span class="sr-only">Error: </span>
                                       Please check the description.
                                    </div>';
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
							<label for="category">Category</label>
							<select name="category" class="form-control">
								<option value="1">Pizza</option>
								<option value="2">Drink</option>
								<option value="3">Desert</option>
							</select>
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" required value="<?php echo $name; ?>">
						</div>
						<div class="form-group">
							<label for="desc">Desc</label>
							<input type="text" name="desc" class="form-control" required value="<?php echo $desc; ?>">
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input type="text" name="price" class="form-control" required value="<?php echo $price; ?>">
						</div>
						<div class="form-group">
							<label for="discount">Discount</label>
							<input type="text" name="discount" class="form-control" required value="<?php echo $price; ?>">
						</div>
						<div class="form-group">
							<label for="photo">Upload Image</label>
							<input type="file" name="photo">
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