@extends('adminFrame')
@section('content')

@php
    $lowStock =0;
    $x=0;
    $y=0;
    $value = array(0,0,0,0,0,0,0,0,0);
    $dataPoints = array( 
        array("label"=>"Action and Adventure", "y"=>0),
        array("label"=>"Classics", "y"=>0),
        array("label"=>"Comic Book or Graphic Novel", "y"=>0),
        array("label"=>"Detective and Mystery", "y"=>0),
        array("label"=>"Fantasy", "y"=>0),
        array("label"=>"Historical Fiction","y"=>0),
        array("label"=>"Horror", "y"=>0),
        array("label"=>"Romance", "y"=>0),
        array("label"=>"Education", "y"=>0));
    
    foreach ($totalStock as $row){
        if ( $row->stockLevel < 20){
            $lowStock += 1;   
        }
    }

    $totalBook = count($totalStock);

    foreach($categories as $row) {
        $value[$x] = $row->book;
        $x++;
    }

    foreach($dataPoints as &$row) {
        $row['y'] = $value[$y];
        $y++;
    }
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #page-container{
            position: relative;
            min-height: 100vh;
        }

        .Display table{
            width: 800px;
            height: 550px;
            border: 3px solid;        
        }

        
        .Display td{
            font-size: 19px;
            padding-top: 1px;
            border: 3px solid;
        }

        .Display th{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 26px;
            text-align: center;
            border: 3px solid;
        }
    </style>
</head>

<body style="background-color: rgb(173, 173, 173);" >
    
    <table class="Display" style="margin-left: 22%;margin-top: 1%;margin-bottom: 1% ">
        <tr style="height: 100px">
            <th>Total of Books : {{ $totalBook }}</th>
            <th>Books that are low stock : <span style="color: red;"">{{ $lowStock }} </span></th>
        </tr>
        <tr>
            <td colspan="2">
                <div id="categories" style="height: 600px; width: 900px;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            </td>
        </tr>
    </table>
</body>
<script> 
    window.onload = function() {
        var category = new CanvasJS.Chart("categories", {
            theme: "dark2",
            animationEnabled: false,
            title: { text: "Categories of book" },
            data: [{
                type: "pie",
                indexLabel: "{label} - {y}",
                yValueFormatString: "#,##0.0\"%\"",
                showInLegend: true,
                legendText: "{label} : {y}",
                dataPoints: @php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); @endphp
            }]
        });
    category.render();
    }
</script>

@endsection