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
            width: 1800px;
            height: 500px;
            border: 2px solid;
            margin-left: 50px;
            margin-bottom: 30px;
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
            margin-left: 215px;
        }

        .carousel-caption{
            margin-top: 620px;
        }

        .carousel{
            width: 900px; 
            height: 760px; 
            margin-left: 500px; 
            margin-top: 10px;
            margin-bottom: 5px;
            background-color:rgb(66, 66, 66);
            padding-top: 10px;
       }

       table{
            width: 100%;
            border: 2px solid;        
        }

        td{
            font-size: 17px;
            padding-top: 1px;
            border: 2px solid;
        }

        th{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            text-align: center;
            border: 2px solid;
        }

        h3{
            margin-left:76%;
        }
    </style>
</head>
<body>

<?php
    //load if the id is not empty
    if (isset($_GET['id'])) {
        $isbn = $_GET['id'];

        $con = mysqli_connect("localhost", "root", "", "bookstore");

        //delete process
        $deleteitem = "DELETE FROM shoppingcartdetails WHERE ISBN_13=$isbn";

        mysqli_query($con, $deleteitem);

        //exit out to cart
        header("Location:http://127.0.0.1:8000/cart");
        exit();
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
@endsection