<!--
Developer : chintan khatri
Date : 01-10-2016
-->
<!DOCTYPE html>
<?php
include_once './class.php';
session_start();
if ($_SESSION['user'] === TRUE) {
    
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


            </div>




            <div  class="row" id="main-part">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th >Description</th>

                            <th >Expense</th>
                            <th >Debit</th>
                            <th >Credit</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $transection_query = $db->show_transection_details($_GET['ac_id']);
                        foreach ($transection_query as $data) {
                            ?>
                            <tr>
                                <td><?php echo $data['in_date'] ?></td>
                                <td><?php echo $data['in_description'] ?></td>
                                <td><?php echo $data['exp_cat_name'] ?></td>

                                <?php
                                if ($data['tr_type'] === '1') {
                                    ?> <td><?php echo $data['in_amount'] ?></td><td></td>
                                <?php
                                } else {
                                    ?><td></td><td><?php echo $data['in_amount'] ?></td>
                                <?php }
                                ?>





                            </tr>
                        <?php }
                        ?>  

                    </tbody>
                </table>
            </div>

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
        <?php ?>
        <script>
            $(document).ready(function () {
                $('.collapsible').collapsible({
                    accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
                });
            });
        </script>   



    </body>
</html>
