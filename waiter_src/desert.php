<?php
$view = "SELECT foodcategory.category_id, foodcategory.category_name, menus.menu_id, menus.category_id, menus.menu_name, menus.menu_desc, menus.menu_price, menus.photo FROM foodcategory JOIN menus USING(category_id) WHERE category_id = '3'";
$sql_view = mysql_query($view);

?>
<div class="row" id="dessert">
    <section id="pricePlans" style="padding-left:32px;"> <!-- Section 1 -->
        <?php 
        while ($data = mysql_fetch_array($sql_view)) {
        ?>
        <form method="post" action="waiter_src/order_process.php?id=<?php echo $idmenu; ?>">
        <ul id="plans">
            <li class="plan">
                <ul class="planContainer">
                    <li class="title">
                    <h2><img src="<?php echo $data['photo']; ?>" width="150" height="100"></h2></li>
                    <li class="price"><p><?php echo $data['menu_name']; ?></p></li>
                    <li>
                        <ul class="options">
                            <li><span> <?php echo $data['menu_desc']; ?></span></li>
                            <li>Price <span><?php echo '$' . $data['menu_price']; ?></span></li>
                            <li><div class="input-field col s12">
                                    <select name="table" type="text">
                                        <option value="" selected>Table Number</option>
                                        <?php 
                                        $avlbl_table = "SELECT * FROM tables WHERE status = 0";
                                        $sql_avlbl = mysql_query($avlbl_table);
                                        while ($table = mysql_fetch_array($sql_avlbl)) {
                                        ?>
                                        <option value="<?php echo $table['table_id']; ?>"><?php echo $table['table_id']; ?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="input-field col s12">
                                    <select name="qty">
                                        <option value="" selected>Quantity</option>
                                        <?php 
                                        for ($i=1; $i <= 10; $i++) { 
                                        ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="switch demo3">
                                    <input type="checkbox" checked disabled>
                                    <label><i></i></label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="button"><a href="#">Order !</a></li>
                </ul>
            </li>
        </ul>
        </form>
        <?php 
        }
        ?>
    </section>
</div>
