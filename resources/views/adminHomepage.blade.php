@extends('adminFrame')
@section('content')

@php
$lowStock =0;

foreach ($stock as $row){
    if ( $row->stockLevel < 5){
        $lowStock += 1;   
    }
}
$totalBook = count($stock);

$dataPoints
foreach ($dataPoints as $key => $value) {
}

$dataPoints = array( 
    array("label"=>"Action and Adventure", "y"=>0),
    array("label"=>"Classics", "y"=>0),
    array("label"=>"Comic Book or Graphic Novel", "y"=>0),
    array("label"=>"Detective and Mystery", "y"=>0),
    array("label"=>"Fantasy", "y"=>0),
    array("label"=>"Historical Fiction","y"=>0),
    array("label"=>"Horror", "y"=>0),
    array("label"=>"Romance", "y"=>0),
    array("label"=>"Education", "y"=>0),
)
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .home{
            background-color: grey;
            margin: 1%;
            padding: 1%;
            padding-left: 2%;
            padding-right: 2%;
        
        }

        #page-container{
            position: relative;
            min-height: 100vh;
        }

        .Display table{
            width: 1800px;
            height: 550px;
            margin-left: 10px;
            border: 2px solid;        
        }

        
        .Display td{
            font-size: 23px;
            padding-top: 1px;
            border: 2px solid;
        }

        .Display th{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 24px;
            text-align: center;
            border: 2px solid;
        }
    </style>
    <script> 
        window.onload = function() {
            var categories = new CanvasJS.Chart("categories", {
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "Categories of book"
                },
                data: [{
                    type: "doughnut",
                    indexLabel: "{label} - {y}",
                    yValueFormatString: "#,##0.0\"%\"",
                    showInLegend: true,
                    legendText: "{label} : {y}",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            categories.render();
        }
    </script>
</head>
<body style="background-color: rgb(173, 173, 173);">
    <div class="home">
        <table>
            <tr>
                <th>Total of Books : </th>
                <th>Book that are low stock : </th>
        <div id="categories" style="height: 370px; width: 350px;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
@endsection
