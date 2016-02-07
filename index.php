<!--
Developer : chintan khatri
Date : 01-10-2016
-->
<!DOCTYPE html>
<?php
include_once './class.php';
$db = new database();
$db->connect();
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
            <br>
            <div class="row">

                <div class="col s12 m4">
                    <br>
                </div>
                <div class="col s12 m4">
                    <div class="card-panel teal">
                        <span class="white-text">
                        
                        </span>
                    </div>
                </div>
                <div class="col s12 m4">
                    <br>
                </div>
            </div>

            <div class="row">

      
            </div>
            <br>
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

    </body>
</html>
