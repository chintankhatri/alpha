<!--
Developer : chintan khatri
Date : 01-10-2016
-->
<!DOCTYPE html>
<?php
include_once './class.php';


$db = new reports();
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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
            html, body {
                height:100%;
            }
            #box {
                height:80%;
                background:#331266;
            }
            #container {
                position:relative;
                height:100%;
            }

        </style>
    </head>
    <body>
        <?php
        include_once './theme-part/top_nav.php';
        ?>


        <div class="container">





            <div  class="row" id="main-part">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">

                            <li class="tab col s3"><a  href="#test2">Income Report</a></li>
                            <li class="tab col s3 "><a href="#test3">Expense Report</a></li>
                            <li class="tab col s3"><a  href="#test1">Assets Report</a></li>
                        </ul>
                    </div>
                    <div id="test1" class="col s12">
                        <script type="text/javascript">
                                    var chart1;
                                    $(function () {
                                    var newh = $("#box1").height();
                                            $(window).resize(function () {

                                    newh = $("#box1").height();
                                            chart1.redraw();
                                            chart1.reflow();
                                    });
                                            chart1 = new Highcharts.Chart({
                                            chart: {
                                            renderTo: 'container1',
                                                    type: 'area'
                                            },
                                                    title: {
                                                    text: 'Assets chart'
                                                    },
                                                    subtitle: {
                                                    text: ''
                                                    },
                                                    
                                                    
                                                    
                                                    xAxis: {
                                                    categories: [ 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                                                    },
                                                    credits: {
                                                    enabled: false
                                                    },
                                                    series:  [{
                                                    name: 'Assets',
                                                            data: [
                                                                <?php  
                                                                $report_data3 = $db->assets_count();
                                                                foreach ($report_data3 as $data){
                                                                    echo $data[3].',';
                                                                }
                                                                ?>
                                                            
                                                    ]}, {
                                                    name: 'Liabilitys',
                                                            data: [
                                                                      <?php  
                                                              
                                                                foreach ($report_data3 as $data){
                                                                    echo $data[2].',';
                                                                }
                                                                ?>
                                                            ]
                                                    }]
                                            });
                                    });</script>
                        <div id="box1">
                            <div id="container1"></div>
                        </div>     
                    </div>
                </div>
                <div id="test2" class="col s12">
                    <script type="text/javascript">
                                var chart1;
                                $(function () {
                                var newh = $("#box2").height();
                                        $(window).resize(function () {

                                newh = $("#box2").height();
                                        chart1.redraw();
                                        chart1.reflow();
                                });
                                        chart1 = new Highcharts.Chart({
                                        chart: {
                                        renderTo: 'container2',
                                                type: 'line'
                                        },
                                                title: {
                                                text: 'Monthly Income chart'
                                                },
                                                subtitle: {
                                                text: ''
                                                },
                                                xAxis: {
                                                categories: [ 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                                                },
                                                yAxis: {
                                                title: {
                                                text: 'Monthly Income'
                                                }
                                                },
                                                plotOptions: {
                                                line: {
                                                dataLabels: {
                                                enabled: true
                                                },
                                                        enableMouseTracking: false
                                                }
                                                },
                                                series: [{
                                                name: 'Income',
<?php
$report_data = $db->show_income_month_wise();
echo'data:[';
foreach ($report_data as $data) {
    echo "[$data[3]],";
}
echo ']';
?>                        }]
                                        });
                                });</script>
                    <div id="box2">
                        <div id="container2"></div>
                    </div>     
                </div>
                <div id="test3" class="col s12">
                    <script type="text/javascript">
                                var chart1;
                                $(function () {
                                var newh = $("#box3").height();
                                        $(window).resize(function () {

                                newh = $("#box3").height();
                                        chart1.redraw();
                                        chart1.reflow();
                                });
                                        chart1 = new Highcharts.Chart({
                                        chart: {
                                        renderTo: 'container3',
                                                type: 'line'
                                        },
                                                title: {
                                                text: 'Monthly Expense chart'
                                                },
                                                subtitle: {
                                                text: ''
                                                },
                                                xAxis: {
                                                categories: [ 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                                                },
                                                yAxis: {
                                                title: {
                                                text: 'Monthly Income'
                                                }
                                                },
                                                plotOptions: {
                                                line: {
                                                dataLabels: {
                                                enabled: true
                                                },
                                                        enableMouseTracking: false
                                                }
                                                },
                                                series: [{
                                                name: 'Expense',
<?php
$report_data1 = $db->show_expense_month_wise();
echo'data:[';
foreach ($report_data1 as $data) {
    echo "[$data[3]],";
}
echo ']';
?>                        }]
                                        });
                                });</script>
                    <div id="box3">
                        <div id="container3"></div>
                    </div>     
                </div>
            </div>
        </div>

    </div>


    <footer class="page-footer orange">

        <?php
        include_once './theme-part/footer_part.php';
        ?>
    </footer>

</body>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<?php ?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


<script>

                                $(document).ready(function () {
                        $('ul.tabs').tabs('select_tab', 'tab_id');
                        });

</script>   


</html>