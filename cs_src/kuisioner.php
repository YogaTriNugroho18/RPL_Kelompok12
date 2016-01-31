<?php 
$query = "SELECT * FROM questions WHERE employee_id = '" . $_SESSION['cs'] . "' LIMIT 6";
$sql = mysql_query($query);

?>
<!-- Isi Kuisioner -->
<div id="menu-3" class="contact content">

    <div class="row">
        <div class="col-md-12 col-sm-12">
        
        <section>
            <form id="theForm" class="simform" autocomplete="off" method="post">
            <?php 
            if (isset($_POST['send'])) {
                $answer = $_POST['answer'];

                $insert_query = mysql_query("INSERT INTO questions(quest) VALUES('$answer')");
                if ($insert_query) {
                    echo "Good";
                } else {
                    echo "Shit";
                }
            }
            ?>
                <div class="simform-inner">
                <?php 
                while ($data = mysql_fetch_array($sql)) {
                    $id = $data['quest_id'];
                ?>
                    <ol class="questions">
                        <li>
                            <span><label for="quest"><?php echo $data['quest']; ?></label></span>
                            <input id="answer" name="answer" type="text"/>
                        </li>
                    </ol><!-- /questions -->
                <?php
                }
                ?>
                    <button class="submit" type="submit" name="send">Send answers</button>
                        <div class="controls">
                            <button class="next"></button>
                            <div class="progress"></div>
                            <span class="number">
                                <span class="number-current"></span>
                                <span class="number-total"></span>
                        </span>
                        <span class="error-message"></span>
                        </div><!-- / controls -->
                    </div><!-- /simform-inner -->
                    <span class="final-message"></span>
                </form><!-- /simform -->            
            </section>    

        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.about -->