<?php 
$query = "SELECT orders.order_id, employee.employee_id, employee.employee_name, tables.table_id, menus.menu_id, menus.menu_name, orders.qty FROM orders JOIN employee USING(employee_id) JOIN tables USING (table_id) JOIN menus USING(menu_id) WHERE done = '0' ORDER BY order_id DESC";
$sql = mysql_query($query);
?>

<div id="menu-2" class="about content">
    <div class="row">
        <div class="col-md-12">
            <div class="toggle-content">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Manage Menu</h4>
                </div>
                <div class="responsive-table">
                    <table id="datatables-orders" class="table highlight table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Employee Name</th>
                                <th class="text-center">Table ID</th>
                                <th class="text-center">Menu</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($data = mysql_fetch_array($sql)) {
                                $id = $data['order_id'];
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $data['employee_name']; ?></td>
                                    <td class="text-center"><?php echo $data['table_id']; ?></td>
                                    <td class="text-center"><?php echo $data['menu_name']; ?></td>
                                    <td class="text-center"><?php echo $data['qty']; ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-success" href="chef_src/done.php?id=<?php echo $id; ?>"><span class="fa fa-check"></span> Done</a>
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