<?php 
include('chef_src/edit.php');
include('chef_src/insert.php');
include('chef_src/delete.php');

$query = "SELECT menus.menu_id, foodcategory.category_id, foodcategory.category_name, menus.menu_name, menus.menu_desc, menus.menu_price, menus.menu_discount, menus.photo FROM menus JOIN foodcategory USING (category_id) ORDER BY menu_id DESC";
$sql = mysql_query($query);
?>
<div id="menu-3" class="about content">
    <div class="row">
        <div class="col-md-12">
            <div class="toggle-content">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Manage List Menu</h4>
                </div>
                <div class="responsive-table">
                    <table id="datatables-menus" class="table highlight table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Category</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Discount</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center"><a class="btn btn-primary" href="#insert" data-toggle="modal"><span class="fa fa-plus"></span></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($data = mysql_fetch_array($sql)) {
                                $id = $data['menu_id'];
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $data['category_name']; ?></td>
                                    <td class="text-center"><?php echo $data['menu_name']; ?></td>
                                    <td class="text-center"><?php echo $data['menu_desc']; ?></td>
                                    <td class="text-center"><?php echo '$' . $data['menu_price']; ?></td>
                                    <td class="text-center"><?php echo $data['menu_discount'] . '%'; ?></td>
                                    <td class="text-center"><img id="imagesource" src="<?php echo $data['photo']; ?>" width="100" height="100"></td>
                                    <td class="text-center">
                                        <a data-toggle="modal" data-id="<?php echo $id; ?>" data-category="<?php echo $data['category_name']; ?>" data-name="<?php echo $data['menu_name']; ?>" data-desc="<?php echo $data['menu_desc']; ?>" data-price="<?php echo $data['menu_price']; ?>" data-discount="<?php echo $data['menu_discount']; ?>" data-photo="<?php echo $data['photo']; ?>" class="open-EditMenu btn btn-warning" href="#edit"><span class="fa fa-pencil"></span></a>
                                        <a data-href="chef_src/deleteprocess.php?id=<?php echo $id; ?>" data-toggle="modal" data-target="#delete" class="btn btn-danger" href="#"><span class="fa fa-times"></span class="fa fa-times"></a>
                                    </td>
                                </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div> <!-- toggle content -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.about -->