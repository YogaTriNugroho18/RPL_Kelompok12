<?php 
include('admin_src/insert.php');
include('admin_src/edit.php');
include('admin_src/delete.php');

$query = "SELECT * FROM employee WHERE employee_type <> 'Admin' ORDER BY employee_id DESC";
$sql = mysql_query($query);
?>
<div id="menu-1" class="about content">
    <div class="row">
        <div class="col-md-12">
            <div class="toggle-content">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Manage Employee Data</h4>
                </div>
                <div class="responsive-table">
                    <table id="datatables-employee" class="table highlight table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Employee ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Employee Type</th>
                                <th class="text-center"><a class="btn btn-primary" href="#insert" data-toggle="modal">Insert New Employee Data</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($data = mysql_fetch_array($sql)) {
                                $id = $data['employee_id'];
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $id; ?></td>
                                    <td class="text-center"><?php echo $data['employee_name']; ?></td>
                                    <td class="text-center"><?php echo $data['employee_type']; ?></td>
                                    <td class="text-center">
                                        <a data-toggle="modal" data-id="<?php echo $id; ?>" data-name="<?php echo $data['employee_name']; ?>" data-type="<?php echo $data['employee_type']; ?>" class="open-EditEmp btn btn-warning" href="#edit"><span class="fa fa-pencil"></span> Edit</a>
                                        <a data-href="admin_src/deleteprocess.php?id=<?php echo $id; ?>" data-toggle="modal" data-target="#delete" class="btn btn-danger" href="#"><span class="fa fa-times"></span class="fa fa-times"> Delete</a>
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