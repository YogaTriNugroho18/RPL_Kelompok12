<?php 
// include('cs_src/insert.php');
// include('cashier_src/bill.php');
// include('cs_src/delete.php');

$query = "SELECT * FROM payments";
$sql = mysql_query($query);
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
                    <table id="datatables-payment" class="table highlight table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Payment ID</th>
                                <th class="text-center">Employee ID</th>
                                <th class="text-center">Table ID</th>
                                <th class="text-center">Ordered Menu</th>
                                <th class="text-center">Subtotal</th>
                                <th class="text-center">Tax</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">Print</th>
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

                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $data['payment_id']; ?></td>
                                    <td class="text-center"><?php echo $data['employee_id']; ?></td>
                                    <td class="text-center"><?php echo $data['table_id']; ?></td>
                                    <td class="text-center"><?php echo $data['menu']; ?></td>
                                    <td class="text-center"><?php echo '$' . $data['subtotal']; ?></td>
                                    <td class="text-center"><?php echo ($data['tax'] * 100) . '%'; ?></td>
                                    <td class="text-center"><?php echo '$' . $data['total']; ?></td>
                                    <td class="text-center"><?php echo $status; ?></td>
                                    <td class="text-center">
                                    <?php 
                                        if ($data['status'] == '0') {
                                        ?>
                                            <form method="post" action="cashier_src/paid.php?id=<?php echo $id; ?>">
                                                <button type="submit" class="btn btn-warning" name="paid">Pay</button>
                                            </form>
                                        <?php
                                        } else {
                                            echo'<button class="btn btn-success">Paid</button>';
                                        }
                                    ?>
                                    </td>
                                    <td>
                                        <form method="post" action="cashier_src/print.php?id=<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-primary" name="print"><span class="fa fa-print"></span></button>  
                                        </form>
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