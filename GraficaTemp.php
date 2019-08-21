<?php

include ("conexion.php");
$mysqli = new mysqli($host, $user, $pw, $db);

	$sql = "SELECT avg(temperatura) as count FROM datos WHERE id_mod=1 AND hora BETWEEN DATE_SUB(TIME(NOW()), INTERVAL 1 HOUR) AND TIME(NOW())";
    $viewer = mysqli_query($mysqli,$sql);
	$viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
	$viewer = json_encode(array_column($viewer, 'count'),JSON_NUMERIC_CHECK);

	/* Getting demo_click table data */
	$sql = "SELECT avg(temperatura) as count FROM datos WHERE id_mod=0 AND hora BETWEEN DATE_SUB(TIME(NOW()), INTERVAL 1 HOUR) AND TIME(NOW())";
	$click = mysqli_query($mysqli,$sql);
	$click = mysqli_fetch_all($click,MYSQLI_ASSOC);
	$click = json_encode(array_column($click, 'count'),JSON_NUMERIC_CHECK);

?>

<!DOCTYPE html>
<html>
<head>
	<title>TEMPERATURA</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

<script type="text/javascript">

$(function () { 

    var data_click = <?php echo $click; ?>;
    var data_viewer = <?php echo $viewer; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Temperatura por hora'
        },
        xAxis: {
            categories: ['sitio 1','sitio 0']
        },
        yAxis: {
            title: {
                text: 'Temperatura'
            }
        },
        series: [{
            name: 'Click',
            data: data_click
        }, {
            name: 'View',
            data: data_viewer
        }]
    });
});

</script>

<div class="container">
	<br/>
	<h2 class="text-center">Temperatura</h2>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>      