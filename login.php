<!--
Developer : chintan khatri
Date : 01-10-2016
-->
<!DOCTYPE html>
<?php
session_start();
include_once './class.php';
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
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>

        <?php
        $logincheck = new login();
        if ($_POST) {
            if ($logincheck->checkuser($_POST['username'], $_POST['password']) > 0) {
                $_SESSION['user'] = TRUE;
                header('location:index.php');
            } else {
                ?>
                <script>
                    $(document).ready(function () {
                        $('#modal1').openModal();
                    });

                </script>
        <?php
    }
}
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
            <div class="row">
                <div class="col s12 m6" >
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Login</span>
                            <p><div class="row">
                                <form class="col s12" method="POST">

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input  value="" autocomplete="off" type="password" name="username" class="validate">
                                            <label for="username">Username</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="password" autocomplete="off" value="" type="password" name="password" class="validate">
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
                    <h4>Access Denied</h4>
                    <p>Incorrect username or password !</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Try again</a>
                </div>
            </div>
        </div>


        <footer class="page-footer orange">

<?php
include_once './theme-part/footer_part.php';
?>
        </footer>


        <!--  Scripts-->

<?php ?>
    </body>
</html>
