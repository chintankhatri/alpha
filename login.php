<!--
Developer : chintan khatri
Date : 01-10-2016
-->
<!DOCTYPE html>
<?php
include_once './class.php';
$logincheck = new login();
if ($_POST) {
    if ($logincheck->checkuser($_POST['username'], $_POST['password']) > 0) {
        header('location:index.php');
    } else {
        echo "<script> $('#modal1').openModal();</script>";
    }
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
        <nav class="cyan darken-3" role="navigation">

            <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">aLpha</a>


                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>



        <div class="container">
            <br>
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
            <div class="row">
                <div class="col s12 m6" style="margin-left: 25%">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Login</span>
                            <p><div class="row">
                                <form class="col s12" method="POST">

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input  value=""  type="text" name="username" class="validate">
                                            <label for="disabled">Username</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="password" type="password" name="password" class="validate">
                                            <label for="password">Password</label>
                                        </div>
                                    </div>

                                    <button class="btn waves-effect waves-light" type="submit" name="action">Login
                                        <i class="material-icons right">send</i>
                                    </button>
                                </form>
                            </div></p>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <!-- Modal Structure -->
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <h4>Modal Header</h4>
                    <p>A bunch of text</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                </div>
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
        <script>
            $(document).ready(function () {
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
            });
            $('#modal1').openModal();
            $('#modal1').closeModal();
        </script>
        <?php ?>
    </body>
</html>
