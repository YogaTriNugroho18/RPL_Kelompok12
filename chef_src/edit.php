<!-- Modal EDIT -->
<div class="panel-body">
    <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h5 class="modal-title">Edit Menu</h5>
                </div>
                <div class="modal-body">
                    <form class="form-vertical" method="post" enctype="multipart/form-data">
                    <?php 
                    if (isset($_POST['editdata'])) {
                        $menuId = $_POST['menuId'];
                        $menuCategory = $_POST['menuCategory'];
                        $menuName = $_POST['menuName'];
                        $menuDesc = $_POST['menuDesc'];
                        $menuPrice = $_POST['menuPrice'];
                        $discount = $_POST['discount'];

                        if (strlen($menuName) > 2 && ! is_numeric($menuName)) {
                            if (strlen($menuDesc) > 2 && ! is_numeric($menuDesc)) {
                                if (is_numeric($menuPrice) && $menuPrice != 0) {
                                    if ($menuCategory != '0') {
                                        if (is_numeric($discount) && ($discount > 0 && $discount < 100)) {
                                            $file_name = $_FILES['photo']['name'];
                                            $file_size = $_FILES['photo']['size'];
                                            $file_type = $_FILES['photo']['type'];
                                            $tmp_file = $_FILES['photo']['tmp_name'];

                                            $path = 'assets/images/menu';

                                            $upload = move_uploaded_file($tmp_file, $path . '/' . $file_name);
                                            $update_query = mysql_query("UPDATE menus SET category_id = '$menuCategory', menu_name = '$menuName', menu_desc = '$menuDesc', menu_price = '$menuPrice', menu_discount = '$discount' WHERE menu_id = '$menuId'");

                                            if (isset($_FILES['photo'])) {
                                                $update_photo = mysql_query("UPDATE menus SET photo = '" . $path . "/" . $file_name . "' WHERE menu_id = '$menuId'");
                                            } else {

                                            }

                                            if ($update_query) {
                                                echo'<script>alert("Data successfully updated.");window.location="chef";</script>';
                                            } else {
                                                echo "Error :" . mysql_error();
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
                                               Category cannot be empty.
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
                        <input type="hidden"  name="menuId" id="menuId" class="form-control" required>
                        <div class="form-group">
                            <label for="menuCategory">Category</label>
                            <select name="menuCategory" id="menuCategorye" class="form-control">
                                <option value="0">Category</option>
                                <option value="1">Pizza</option>
                                <option value="2">Drink</option>
                                <option value="3">Dessert</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="menuName">Name</label>
                            <input type="text" name="menuName" id="menuName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="menuDesc">Description</label>
                            <input type="text" name="menuDesc" id="menuDesc" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="menuPrice">Price</label>
                            <input type="text" name="menuPrice" id="menuPrice" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" name="discount" id="discount" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="" id="menuPhoto" width="100" height="100">
                                </div>
                                <div class="col-md-6">
                                    <span class="btn btn-file">Upload <input type="file" name="photo" required></span>
                                </div>
                            </div>   
                        </div>
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="editdata">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>