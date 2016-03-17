<?php
include_once './class.php';

$db = new reports();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>aLpha</title>

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
            tspan{
                font-size: 100% !important;
            }
        </style>
        <script type="text/javascript">
            var chart1;
            $(function () {
                var newh = $("#box").height();

                $(window).resize(function () {

                    newh = $("#box").height();
                    chart1.redraw();
                    chart1.reflow();
                });
                chart1 = new Highcharts.Chart({
                    chart: {
                          renderTo: 'container',
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
$report_data = $db->show_expense_month_wise();
echo'data:[';
foreach ($report_data as $data) {
    echo "[$data[3]],";
}
echo ']';
?>                        }]
                });
            });

        </script>
    </head>
    <body>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <div id="box">
            <div id="container"></div>
        </div>

    </body>
</html>
