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
$transfer_records = new tranfer();
if ($_POST) {

    $transfer_records->new_transfer($_POST['tr_date'], $_POST['tr_amount'], $_POST['tr_des'], $_POST['tr_ac_id_from'], $_POST['tr_ac_id_to']);
    $db->credit_account($_POST['tr_amount'], $_POST['tr_ac_id_from']);
    $db->debit_account($_POST['tr_amount'], $_POST['tr_ac_id_to']);
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
    <body>
        <?php
        include_once './theme-part/top_nav.php';
        ?>

        <div class="container">
            <div class="row">
                <form class="col s12" method="POST">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="date" name="tr_date" class="datepicker">
                            <label for="date">Date</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="amount" name="tr_amount" type="text" >
                            <label for="amount">amount</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="textarea1" name="tr_des" class="materialize-textarea"></textarea>
                            <label for="textarea1">Description</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="tr_ac_id_from">
                                <option value="" disabled selected>Choose Account From</option>
                                <?php
                                $array_accounts_from = $db->show_accounts();
                                foreach ($array_accounts_from as $data) {
                                    ?>
                                    <option value="<?php echo $data['ac_id'] ?>"><?php echo $data['ac_name'] ?></option>
                                    <?php
                                }
                                ?>

                            </select>

                        </div>
                        <div class="input-field col s12">
                            <select name="tr_ac_id_to">
                                <option value="" disabled selected>Choose Account To</option>
                                <?php
                                $array_accounts_to = $db->show_accounts();
                                foreach ($array_accounts_to as $data) {
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

