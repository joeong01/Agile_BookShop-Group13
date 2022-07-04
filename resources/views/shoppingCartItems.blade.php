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

<div class="cart content-wrapper">

    <?php
    //add
                    $con = mysqli_connect("localhost", "root", "", "bookstore");

        $id = session()->get('id') ;

$results = mysqli_query($con, "SELECT cartID FROM shoppingcart WHERE userID = $id");

foreach($results as $result){
                    $cartID = $result['cartID'];
                }


        $msg = "";
        if (isset($_GET['add_button'])) {
            $isbn = $_GET['ISBN_13'];

            //$product = mysqli_query($con, "SELECT shoppingcartdetails.ISBN_13 FROM shoppingcartdetails JOIN book ON shoppingcartdetails.ISBN_13 = book.ISBN_13");

            $fetch = mysqli_fetch_array($product);

            
                //insert product
                $query = mysqli_query($con, "INSERT INTO shoppingcartdetails(cartID, ISBN_13) VALUE($cartID, $isbn) ");

                if ($query) {
                    //display message
                    $msg = "Added to cart!";
                } else {
                    $msg = "Something Went Wrong! Please try again";
                }
            
        }
        ?>



<div class="content">
    <h1>Shopping Cart</h1>
    
    <form method="GET">
        <p style="font-size:16px; color:red" align="center">
            <?php
            //display message
            if ($msg) {
                echo $msg;
            }
            ?>
        </p>
        <table>
            <tr>
                <th>ISBN_13</th>
                <th>Book Name</th>
                <th>Price</th>
            </tr>
    <?php
            $products = "";
            //connect to database
            $con = mysqli_connect("localhost","root","","bookstore");
            $quantity=1;
            $subtotal=0;

            //Get current session ID
            $id = session()->get('id') ;

            //Check cartID is linked with userID
            $query = mysqli_query($con, "SELECT cartID FROM shoppingcart WHERE userID = '$id'");

            foreach($query as $result){
                    $cartID= $result['cartID'];
                }
                ?>
                
                            <?php
            //Get book details from book database
            $products = "SELECT shoppingcartdetails.ISBN_13, book.bookName, book.retailPrice FROM shoppingcartdetails JOIN book ON shoppingcartdetails.ISBN_13 = book.ISBN_13 AND shoppingcartdetails.cartID = $cartID";            

                    $products_run = mysqli_query($con, $products);
                    if(mysqli_num_rows($products_run) > 0){
                    ?>  
                        <!-- display table -->
                            <?php
                            foreach($products_run as $proditems){
                                ?>
                                
                                <tr>
                                    <th>{{ $proditems['ISBN_13']; }}</th>
                                    <th>{{ $proditems['bookName'] }}</th>
                                    <th>RM{{ $proditems['retailPrice']}}</th>
                                    <td><a href="http://127.0.0.1:8000/delete_item?id={{ $proditems['ISBN_13'] }}"><img src="{{ url('/Picture/delete.png') }}" width="50px" height="50px"></a>
                            </tr>
                            <?php
                            $ttlprodPrice = $proditems['retailPrice'];
                            $subtotal+=$ttlprodPrice;

                            $updatePrice = "UPDATE shoppingcart SET totalPrice=$subtotal WHERE cartID=$cartID"; 
                            $updatePriceQuery = mysqli_query($con, $updatePrice);

                        }
                    }?>

                        </table>
                        <?php
                        //display price
                        echo "<h3>Total Price : RM" .number_format($subtotal,2)."</h3>";


                        //button to take user to payment page
                        ?>                       
                        <button type = "button" name = "purchase" class = "button" ><a href={{ route('payment') }}>Purchase</a></button>
    </form>
</div>
</body>
@endsection