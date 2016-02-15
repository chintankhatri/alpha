<!--
Developer : chintan khatri
Date : 01-10-2016
-->
<!DOCTYPE html>
<?php
include_once './class.php';
session_start();
if ($_SESSION['user']=== TRUE) {
    
} else {
    header('location:login.php');
}
$db = new accounts();
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Alpha</title>

        <!-- CSS  -->
        <?php
        include_once './theme-part/top_head.php';
        ?>
    </head>
    <body>
        <?php
        include_once './theme-part/top_nav.php';
        ?>


        <div class="container">
            <br>
            <div class="row">

                <div class="col s12 m4">
                    <br>
                </div>

                <div class="col s12 m4">
                    <div class="card-panel teal">
                        <span class="white-text">
                            <?php
                            echo $db->get_overall_balance();
                            ?>
                        </span>
                    </div>
                </div>
                <div class="col s12 m4">
                    <br>
                </div>
            </div>

            <div class="row" id="main-part">
                <?php
                $array_accounts = $db->show_accounts();
                foreach ($array_accounts as $data) {
                    ?>
                    <div class='col s12 m6 l4'><a class="waves-effect waves-light btn-large">
                            <i class="material-icons left">insert_chart</i><?php echo $data['ac_name'] ?>
                            <span class='<?php // echo  $color - cur     ?>'>
                                <?php echo $data['ac_opening_balance'] ?> </span></a></div>

                    <?php
                }
                ?>

            </div>
            <br>
        </div>


        <footer class="page-footer orange">

            <?php
            include_once './theme-part/footer_part.php';
            ?>
        </footer>


        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <?php
        ?>
    </body>
</html>
