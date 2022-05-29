@extends('adminFrame')
@section('content')
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

</head>
<body style="background-color: rgb(173, 173, 173);">
    <div class="home">
        <div class="Display">
            <table>                
                <tr>
                    <th colspan="3" style="color: rgb(0, 0, 0); font-size: 30px;text-align:center" >Stock Level</th>
                </tr>
                <tr>
                    <th>IBSN_13</th>
                    <th>Book Title</th>
                    <th>Stock Level</th>
            @foreach ($stock as $row)
                <tr>
                    <td>{{ $row->ISBN_13 }}</td>
                    <td>{{ $row->bookName }}</td>
                    <td style="text-align: center">{{ $row->stockLevel }}</td>
            @endforeach
            </table>
        </div>
    </div>
@endsection
