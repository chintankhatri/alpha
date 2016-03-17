<?php
include_once './class.php';

$db = new reports();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">

        </style>
        <script type="text/javascript">
            $(function () {
                $('#container').highcharts({
                    chart: {
                        type: 'pie',
                        options3d: {
                            enabled: true,
                            alpha: 45,
                            beta: 0
                        }
                    },
                    title: {
                        text: 'Browser market shares at a specific website, 2014'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            depth: 35,
                            dataLabels: {
                                enabled: true,
                                format: '{point.name}'
                            }
                        }
                    },
                    series: [{
                            type: 'pie',
                            name: 'Browser share',
                            
                            <?php
                          
                            $report_data=$db->show_cat_wise_amount();
                            echo'data:[';
                            foreach ($report_data as $data){
                                echo "['$data[4]',$data[2]],";
                            }
                            echo ']';
                            ?>
                            /*data: [
                                ['Firefox', 45.0],
                                ['IE', 26.8],
                                ['Chrome', 12.8],
                                ['Safari', 8.5],
                                ['Opera', 6.2],
                                ['Others', 0.7]
                            ]*/
                        }]
                });
            });
        </script>
    </head>
    <body>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        <div id="container" style="height: 400px"></div>
    </body>
</html>
