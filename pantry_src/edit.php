<!-- Modal EDIT -->
<div class="panel-body">
    <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h5 class="modal-title">Edit Material</h5>
                </div>
                <div class="modal-body">
                    <form class="form-vertical" method="post" enctype="multipart/form-data">
                    <?php 
                    if (isset($_POST['editdata'])) {
                        $ingredientId = isSecure($_POST['ingredientId']);
                        $stock = isSecure($_POST['stock']);
                        $expired = isSecure($_POST['expired']);
                        $exp = date('Y-m-d', strtotime(str_replace('-', '/', $expired)));

                        $check_query = "SELECT entry_date FROM ingredients WHERE ingredient_id = '$ingredientId'";
                        $sql_check = mysql_query($check_query);

                        $data = mysql_fetch_array($sql_check);

                        if (is_numeric($stock)) {
                            if ($exp > $data['entry_date']) {
                                $update_query = mysql_query("UPDATE ingredients SET stock = '$stock', exp_date = '$exp' WHERE ingredient_id = '$ingredientId'");
                                if ($update_query) {
                                    echo'<script>alert("Data successfully updated.");window.location="pantry";</script>';
                                } else {
                                    echo 'Error: ' . mysql_error();
                                }
                            } else {
                                echo'<div class="alert alert-danger" role="alert">
                                       <span class="sr-only">Error: </span>
                                       Expiration date must be greater than the date of entry.
                                    </div>';
                            }
                        } else {
                            echo'<div class="alert alert-danger" role="alert">
                                       <span class="sr-only">Error: </span>
                                       Stock must be a number.
                                    </div>';
                        }
                    }
                    ?>
                        <input type="hidden"  name="ingredientId" id="ingredientId" class="form-control" required>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" name="stock" id="stock" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="expired">Expired</label>
                            <input type="date" name="expired" id="expired" class="form-control" required>
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