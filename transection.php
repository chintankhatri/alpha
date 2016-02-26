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
$insert_transection = new transection();
if ($_POST) {

    if ($_POST['tr_type'] === '0') {
        $db->credit_account($_POST['in_amount'], $_POST['in_ac_id']);
        $cat_id = $_POST['exp_cat_id'];
    } else {
        $db->debit_account($_POST['in_amount'], $_POST['in_ac_id']);
        $cat_id = 13;
    }
    $insert_transection->new_transection($_POST['in_date'], $_POST['tr_type'], $_POST['in_des'], $_POST['in_amount'], $cat_id, $_POST['in_ac_id']);
}
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
    <body >
        <?php
        include_once './theme-part/top_nav.php';
        ?>

        <div  class="container">

            <div class="row">  

                <form class="col s12" method="POST" id="staggered-test">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="date" name="in_date" class="datepicker">
                            <label for="date">Date</label>
                        </div>
                        <div class="input-field col s12">
                            <select id="myselect" name="tr_type">
                                <option value="" disabled selected>Choose one</option>
                                <option value="1">Income</option>
                                <option value="0">Expense</option>
                            </select>

                        </div>
                        <div class="input-field col s12">
                            <input id="amount" name="in_amount" type="text" >
                            <label for="amount">amount</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="textarea1" name="in_des" class="materialize-textarea"></textarea>
                            <label for="textarea1">Description</label>
                        </div>
                        <div id="yes" class="input-field col s12 ">
                            <select id="myhidden"  name="exp_cat_id">
                                <option value="13" >Choose Category</option>
                                <?php
                                $array_expense_category = $insert_transection->show_expense_category();
                                foreach ($array_expense_category as $data) {
                                    ?>
                                    <option value="<?php echo $data['exp_cat_id'] ?>"><?php echo $data['exp_cat_name'] ?></option>
                                    <?php
                                }
                                ?>

                            </select>

                        </div>
                        <div class="input-field col s12">
                            <select name="in_ac_id">
                                <option value="" disabled selected>Choose Account</option>
                                <?php
                                $array_accounts = $db->show_accounts();
                                foreach ($array_accounts as $data) {
                                    ?>
                                    <option value="<?php echo $data['ac_id'] ?>"><?php echo $data['ac_name'] ?></option>
                                    <?php
                                }
                                ?>

                            </select>

                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">submit</i>
                        </button>
                    </div>
                </form>
            </div>
            <br><br>

            <br><br>
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
        <script>

            jQuery(function ($) {
                //change event handler for the parent
                $('#myselect').change(function () {
                    var x = $('#myselect').val();

                    if (x == 1) {
                        console.log(x);
                        $("#yes").addClass('cat-hide');
                        $("#yes").removeClass('cat-show');
                        $("#myhidden").val(0);

                    }
                    if (x == 0) {
                        $("#yes").addClass('cat-show');
                        $("#yes").removeClass('cat-hide');
                    }
                });
            });
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year
                format: 'yyyy-mm-dd'
            });

            $(document).ready(function () {
                $('select').material_select();

            });
        </script>
    </body>
</html>
