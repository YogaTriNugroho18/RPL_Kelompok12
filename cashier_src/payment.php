<?php 
// include('cs_src/insert.php');
// include('cs_src/edit.php');
// include('cs_src/delete.php');

$query = "SELECT payments.payment_id, payments.employee_id, orders.order_id, orders.qty, menus.menu_id, menus.menu_name, menus.menu_price, menus.menu_discount, payments.table_id, payments.total_price, payments.status FROM payments JOIN orders USING (order_id) JOIN menus USING (menu_id)";
$sql = mysql_query($query);
// $sql = mysql_query($query);
?>
<div id="menu-1" class="about content">
    <div class="row">
        <div class="col-md-12">
            <div class="toggle-content">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Manage Payment</h4>
                </div>
                <div class="responsive-table">
                    <table id="datatables-employee" class="table highlight table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Order ID</th>
                                <th class="text-center">Table ID</th>
                                <th class="text-center">Menu</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Discount</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">Total Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($data = mysql_fetch_array($sql)) {
                                $id = $data['payment_id'];
                                if ($data['status'] == '0') {
                                    $status = 'Unpaid';
                                } elseif ($data['status'] == '1') {
                                    $status = 'Paid';
                                }

                                $disc = ($data['menu_discount'] / 100 * $data['menu_price']);
                                $disc_total = $disc * $data['qty'];

                                $total_pay = $data['total_price'] - $disc_total;
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $data['order_id']; ?></td>
                                    <td class="text-center"><?php echo $data['table_id']; ?></td>
                                    <td class="text-center"><?php echo $data['menu_name']; ?></td>
                                    <td class="text-center"><?php echo '$' . $data['menu_price']; ?></td>
                                    <td class="text-center"><?php echo '$' . $disc_total; ?></td>
                                    <td class="text-center"><?php echo $data['qty']; ?></td>
                                    <td class="text-center"><?php echo '$' . $total_pay; ?></td>
                                    <td class="text-center"><?php echo $status; ?></td>
                                    <td class="text-center">
                                        <a data-toggle="modal" data-id="<?php echo $id; ?>" data-name="<?php echo $data['employee_name']; ?>" data-type="<?php echo $data['employee_type']; ?>" class="open-EditEmp btn btn-warning" href="#edit"><span class="fa fa-pencil"></span> Edit</a>
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