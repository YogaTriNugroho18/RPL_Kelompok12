<?php 
include('pantry_src/insert.php');
include('pantry_src/edit.php');
include('pantry_src/delete.php');

$query = "SELECT * FROM ingredients ORDER BY ingredient_id DESC";
$sql = mysql_query($query);
?>
<div id="menu-1" class="about content">
    <div class="row">
        <div class="col-md-12">
            <div class="toggle-content">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Manage Ingredients</h4>
                    <p>
                        Now: <?php 
                            date_default_timezone_set('Asia/Jakarta');
                            $now = date('d-F-Y');
                            echo $now;
                        ?>
                    </p>
                </div>
                <div class="responsive-table">
                    <table id="datatables-ingredients" class="table highlight table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Material</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Stock Minimum</th>
                                <th class="text-center">Entry Date</th>
                                <th class="text-center">Expired</th>
                                <th class="text-center"><a class="btn btn-primary" href="#insert" data-toggle="modal"><span class="fa fa-plus"></span></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($data = mysql_fetch_array($sql)) {
                                $id = $data['ingredient_id'];
                                $diff = ((abs(strtotime ($now) - strtotime ($data['exp_date'])))/(60*60*24));
                                
                                if ($diff > 3 && $diff <= 5) {
                                    $style = "background:#FFEB3B;color:#fff;";
                                } elseif ($diff <= 3 ) {
                                    $style = "background:#F44336;color:#fff;";
                                }
                            ?>
                                <tr style="<?php echo $style; ?>">
                                    <td class="text-center"><?php echo $data['material_name']; ?></td>
                                    <td class="text-center"><?php echo $data['stock']; ?></td>
                                    <td class="text-center"><?php echo $data['min_stock']; ?></td>
                                    <td class="text-center"><?php echo date('d-F-Y', strtotime($data['entry_date'])); ?></td>
                                    <td class="text-center"><?php echo date('d-F-Y', strtotime($data['exp_date'])); ?></td>
                                    <td class="text-center">
                                        <a data-toggle="modal" data-id="<?php echo $id; ?>" data-stock="<?php echo $data['stock']; ?>" data-exp="<?php echo $data['exp_date']; ?>" class="open-EditIng btn btn-warning" href="#edit"><span class="fa fa-pencil"></span></a>
                                        <a data-href="pantry_src/deleteprocess.php?id=<?php echo $id; ?>" data-toggle="modal" data-target="#delete" class="btn btn-danger" href="#"><span class="fa fa-times"></span class="fa fa-times"></a>
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