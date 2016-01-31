<?php 
$empId = $_SESSION['waiter'];
$query = "SELECT orders.order_id, employee.employee_id, employee.employee_name, tables.table_id, menus.menu_id, menus.menu_name, menus.menu_price, orders.qty, orders.done FROM orders JOIN employee USING(employee_id) JOIN tables USING (table_id) JOIN menus USING(menu_id) WHERE employee_id = '$empId' AND deleted = '0' ORDER BY order_id DESC";
$sql = mysql_query($query);
?>

<div id="menu-4" class="about content">
    <div class="row">
        <div class="col-md-12">
            <div class="toggle-content">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Check Orders</h4>
                </div>
                <div class="responsive-table">
                    <table id="datatables-orders" class="table highlight table-bordered" cellspacing="0">
                        <thead>
                            <tr>
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
                                $table_id = $data['table_id'];
                                $menu_id = $data['menu_id'];
                                $qty = $data['qty'];
                                $price = $data['menu_price'];
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $table_id; ?></td>
                                    <td class="text-center"><?php echo $data['menu_name']; ?></td>
                                    <td class="text-center"><?php echo $qty; ?></td>
                                    <?php
                                    if ($data['done'] == '1') {
                                    ?>
                                    <form method="post" action="waiter_src/paymentprocess.php?id=<?php echo $id; ?>&table_id=<?php echo $table_id; ?>&qty=<?php echo $qty; ?>&price=<?php echo $price; ?>">
                                        <td class='textcenter'><button class='btn btn-success' name="send">Done</button></td>
                                    </form>
                                    <?php
                                    } elseif ($data['done'] == '0') {
                                        echo "<td class='textcenter'><button class='btn btn-danger'>Undone</button></td>";
                                    }
                                    ?>
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