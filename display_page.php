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
                <table class="">
                    <thead>
                        <tr>
                            <th data-field="id">Name</th>
                            <th data-field="name">Item Name</th>
                            <th data-field="price">Item Price</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php
                            $transection_query = mysql_query("SELECT
`in_id`, `in_date`, `tr_type`, `in_description`, `in_amount`, `tr_cat_id`, `ac_id` FROM
    
`alpha`.`transection`
    INNER JOIN `alpha`.`expense_category` 
        ON (`transection`.`ex_cat_id` = `expense_category`.`exp_cat_id`)
    INNER JOIN `alpha`.`accounts` 
        ON (`expense`.`ac_id` = `accounts`.`ac_id`);
FROM
    `alpha`.`transection`
    INNER JOIN `alpha`.`expense_category` 
        ON (`transection`.`ex_cat_id` = `expense_category`.`exp_cat_id`)
    INNER JOIN `alpha`.`accounts` 
        ON (`transection`.`ac_id` = `accounts`.`ac_id`)");
                            while ($data = mysql_fetch_array($$transection_query)) {
                                ?>
                                <td><?php echo $data['in_date'] ?></td>
                                <td><?php echo $data['in_description'] ?></td>
                                <td><?php echo $data['exp_cate_name'] ?></td>
<?php }
?>  
                        </tr>
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
