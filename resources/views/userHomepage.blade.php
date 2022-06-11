@extends('userFrame')
@section('content')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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

        h1{
            font-family: Arial, Helvetica, sans-serif;
            color: blue;
            text-align: center;

        }

        .Display table{
            width: 1500px;
            height: 500px;
            border: 2px solid;
            margin-left: 0.8%;
            margin-bottom: 2%;]
        }

        .Display img{
            width: 350px;
            height: 450px;
            display: inline-block;
            padding: 25px;
        }

        .Display td{
            font-size: 15px;
            color: #30BCED;
            text-align: center;
            padding-top: 0px;

        }

        .Display th{
            font-family: Arial, Helvetica, sans-serif;
            color: #191D32;
            font-size: 18px;
            text-align: left;;
        }

        .carousel-inner img {
            width: 480px;
            height: 610px;
            margin-left: 170px;
        }

        .carousel-caption{
            margin-top: 550px;
        }

        .carousel{
            width: 800px; 
            height: 760px; 
            margin-left: 23%; 
            margin-top: 10px;
            margin-bottom: 5px;
            background-color:rgb(66, 66, 66);
            padding-top: 10px;
       }
    </style>

</head>
<body>

    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1" class="active"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="{{ url('/Picture/Dark Psycho.jpg') }}" >
            <br><br><br><br><br><br><br>
            <div class="carousel-caption">
                <h3>Top Sale</h3>
                <p>DARK PSYCHOLOGY: Dark Hypnosis Technique To Manipulation Human Psychology, Deception, Subliminal Persuasion And Mind Control</p>
            </div>   
            </div>
            <div class="carousel-item">
            <img src="{{ url('/Picture/Screenshot 2022-05-20 103621.png') }}">
            <br><br><br><br><br><br><br>
            <div class="carousel-caption">
                <h3>New Release</h3>
                <p>THE ART OF A LAWYER - CROSS EXAMINATION | ADVOCACY | COURTMANSHIP</p>
            </div>   
            </div> 
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <br>
    <div class="Display">
        <table >
            <tr>
                <th colspan="4" style="color: rgb(0, 0, 0); font-size: 30px;text-align:center">Discount</th>
            </tr>
            <tr>
                <td rowspan="3"><img src="{{ url('/Picture/Screenshot 2022-05-20 104415.png') }}" /></td>
                <th>MODERN ADVOCACY - MORE PERSPECTIVES FROM<br> SINGAPORE</th>
                <td rowspan="3"><img src="{{ url('/Picture/Screenshot 2022-05-20 104600.png') }}" /></td>
                <th>FUNDAMENTALS OF TRIAL TECHNIQUE 4TH AUSTRALIAN ED</th>
            </tr>
            <tr>
                <th>By :Elearnor Wong, Lok Vi Ming,<br> The Honourable Justice Vinodh Coomaraswamy</th>
                <th>By : Thomas A Mauet, Les A. McCrimmon</th>
            </tr>
            <tr>
                <th>Original Price : RM<s>310.00</s> RM 260.00</th>
                <th>Price : RM<s>350.00</s> RM 300.00</th>
            </tr>   
        </table>
    </div>
</body>
@endsection