<?php 
$query = "SELECT * FROM tables";
$sql = mysql_query($query);
?>
<!-- Table -->
<div id="menu-2" class="about content">

    <div class="row">
        <section id="pricePlans"> <!-- Section 1 -->
        <ul id="plans">
        <?php 
        while ($data = mysql_fetch_array($sql)) {
            $id = $data['table_id'];
        ?>
            <form method="post" action="waiter_src/update_table.php?id=<?php echo $id; ?>">
                <li class="plan">
                    <ul class="planContainer">
                        <li class="title"></li>
                        <li class="price"><p><?php echo 'Table ' . $id; ?></p></li>
                        <li>
                            <ul class="options">
                                <li><div class="input-field col s12"></div>
                                </li>
                                <li>
                                <?php 
                                    if ($data['status'] == '1') {
                                        $checked = 'checked';
                                    } else {
                                        $checked = '';
                                    }
                                ?>
                                    <div class="switch demo3 table">
                                        <input type="checkbox" <?php echo $checked; ?> disabled>
                                        <label><i></i></label>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                           <button type="submit" class="btn btn-primary" style="margin-bottom:8px;">Update Table</button> 
                           <br>
                        </li>
                    </ul>
                </li>
            </form>
            <?php 
        }
            ?>
            </ul> <!-- End ul#plans -->
        </section>
    </div>
</div>