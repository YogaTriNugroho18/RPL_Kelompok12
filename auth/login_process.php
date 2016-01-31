<?php
session_start();

include('../config/config.php');
include('../function/isSecure.php');

if (isset($_POST['login'])) {
    $employee_id = isSecure($_POST['employee_id']);
    $password = isSecure(md5($_POST['password']));

    $query = "SELECT * FROM employee WHERE employee_id = '$employee_id'";
    $sql = mysql_query($query);
    $data = mysql_fetch_array($sql);
    $row = mysql_num_rows($sql);

    $employee_type = $data['employee_type'];

    if (($row == 1) && $data['password'] == $password) {
        if ($employee_type == 'Admin') {
            $_SESSION['admin'] = $data['employee_id'];
            echo '<script>window.location="../admin";</script>';
        } elseif ($employee_type == 'Waiter') {
            $_SESSION['waiter'] = $data['employee_id'];
            echo '<script>window.location="../waiter";</script>';
        } elseif ($employee_type == 'Chef') {
            $_SESSION['chef'] = $data['employee_id'];
            echo '<script>window.location="../chef";</script>';
        } elseif ($employee_type == 'CS') {
           $_SESSION['cs'] = $data['employee_id'];
           echo '<script>window.location="../customerservice";</script>';
        } elseif ($employee_type == 'Pantry') {
            $_SESSION['pantry'] = $data['employee_id'];
            echo '<script>window.location="../pantry";</script>';
        } elseif ($employee_type == 'Cashier') {
            $_SESSION['cashier'] = $data['employee_id'];
            echo '<script>window.location="../cashier";</script>';
        }
    } else {
        echo '<script>alert("Invalid username or password");window.location="../home";</script>';
    }
}
?>