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

                <div class="col s12 m4">
                    <br>
                </div>

                <div class="col s12 m4">
                    <div class="card-panel teal">
                        <a href="#" id="check" ><span class="white-text">
                                <?php
                                echo $db->get_overall_balance();
                                ?>
                            </span></a>
                    </div>
                </div>
                <div class="col s12 m4">
                    <br>
                </div>
            </div>


     

        <div  class="row" id="main-part">
            <?php
            $array_accounts = $db->show_accounts();
            foreach ($array_accounts as $data) {
                ?>
                <div class='col s12 m6 l4'>

                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">filter_drama</i><?php echo $data['ac_name'] ?>
                                <span class='<?php // echo  $color - cur   ?>'><?php echo $data['ac_opening_balance'] ?> </span>
                            </div>
                            <div class="collapsible-body"> 

                                <?php $array_income = $db->show_transections_last_month('transection', $data['ac_id']); ?>

                                <table>

                                    <tbody>
                                        <?php foreach ($array_income as $income_data) {
                                            ?>
                                            <tr>
                                                <td><?php echo $income_data['in_date'] ?></td>
                                                <td><?php echo $income_data['in_amount'] ?></td>

                                            </tr> 
                                        <?php } ?>
                                            <tr>
                                                <td><a href="?ac_id=<?php echo $income_data['ac_id'] ?>" >View all</a></td>
                                            </tr>
                                    </tbody>
                                </table>


                            </div>
                        </li>

                    </ul>
                </div>
            <?php } ?>
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
