<div class="animated fadeInUp">
	<div class="col-xs-12">
        <div class="chart">
		    <canvas id="myChart"></canvas>
        </div>
	</div>
</div>
<?php

$labels = array();
$datasets = array();

$numRows = mysqli_num_rows($r);
$numVoti = mysqli_num_rows($voti);
if (($numRows <= 0) or ($numVoti <= 0)) {
    $message = "No data";
    include('popup.php');
    die();
}

while ($row = mysqli_fetch_assoc($r)) {
    array_push($labels, $row['Data']);
}
// mysqli_data_seek(result,offset); => put the index pointer to the offset
mysqli_data_seek($r, 0);

$row = mysqli_fetch_assoc($r);
$dataset = array();
$dataset['label'] = $row['Materia'];
$dataset['fillColor'] = "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",0.2)";
$dataset['strokeColor'] = "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",1)";
$dataset['pointColor'] = "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",1)";
$dataset['pointStrokeColor'] = "#fff";
$dataset['pointHighlightFill'] = "#fff";
$dataset['pointHighlightStroke'] = "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",1)";
$dataset['data'] = array();
while ($voto = mysqli_fetch_row($voti)) {
    array_push($dataset['data'], $voto[0]);
}
array_push($datasets, $dataset);


$jsonStr = array(
    "labels" => $labels,
    "datasets" => $datasets
);

?>
<script>
    showChartLine(JSON.parse('<?php echo json_encode($jsonStr); ?>'));
</script>