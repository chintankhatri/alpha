<!--
Developer : chintan khatri
Date : 01-10-2016
-->
<!DOCTYPE html>
<?php
include_once './class.php';
$db = new accounts();
if ($_POST) {
    $insert_record = new income();
    $insert_record->new_income($_POST['in_date'], $_POST['in_des'], $_POST['in_amount'], $_POST['in_ac_id']);
    $db->debit_account($_POST['in_amount'], $_POST['in_ac_id']);
}
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Alpha</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
                            <input type="date" name="in_date" class="datepicker">
                            <label for="date">Date</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="amount" name="in_amount" type="text" >
                            <label for="amount">amount</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="textarea1" name="in_des" class="materialize-textarea"></textarea>
                            <label for="textarea1">Description</label>
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

            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="orange-text text-lighten-3" href="http://chintankhatri.com">chintan khatri</a>
                </div>
            </div>
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
