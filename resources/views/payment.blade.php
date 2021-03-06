{{-- 
@if (Auth::user-())
@extends('userFrame')
 --}}
 @extends('userFrame')
 @section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>

    <style>
        .contact_content{
            margin: 1%;
            padding: 1%;
            padding-left: 4%;
            padding-right: 2%;
        }
        
        #page-container{
            position: relative;
            min-height: 100px;
        }

        input[type=text]{
            width: 25%;
            padding: 5px;
            margin-bottom: 5px; 
        }

        input[name=cvv]{
            width: 5%;
            padding: 5px;
            margin-bottom: 5px;
        }

        input[name=epdate]{
            width: 5%;
            padding: 5px;
            margin-bottom: 5px;
        }
        
        input[type=submit]{
            width: 100px;
            padding: 5px;
            margin-top: 5px;
            margin-bottom: 5px; 
        }

        textarea[id=inquiry]{
            width: 35%;
            height: 250px;
        }

    </style>

</head>
<body style="background-color: gainsboro;">
    <div id="page-container">    
        
        <div class='contact_content'>
            <h1>Payment</h1>
            
            
            <?php
                $id = session()->get('id', '0');

                $con = mysqli_connect("localhost","root","","bookstore");

                $search = "SELECT * FROM shoppingcart WHERE userID='$id'";

                $results = mysqli_query($con, $search);

                foreach($results as $result){
                    $amount = $result['totalPrice'];
                }

                $valid = true;
                //if the form is submited
                if(isset($_GET['submit'])){

                    $name = $_GET['cname'];
                    //checking for cardholder name
                    //makes sure that the name is not empty or contains numbers
                    if(empty($name)||1 === preg_match('~[0-9]~', $name )){
                        $valid = false;

            ?>
                <p>Invalid Name</p>
            <?php         
                    }

                    $cardNumber = $_GET['cardNum'];
                    //checking for card number
                    //make sure that the card number is not empty or is not equal to 16 charcters
                    if(empty($cardNumber)||strlen($cardNumber)!= 16){
                        $valid = false;
            ?>
                <p>Invalid Card Number</p>
            <?php 
                    }

                    $cvv = $_GET['cvv'];
                    //checking for card cvv
                    //make sure that card cvv is not empty or not equal to 3 characters
                    if(empty($cvv)||strlen($cvv)!= 3){
                        $valid = false;
            ?>
                <p>Invalid Card CVV</p>
            <?php
                    }

                    $epdate = $_GET['epdate'];
                    //checking for expiriry date
                    //make sure that expiriry date is not empty
                    if(empty($epdate)){
                        $valid = false;
            ?>
                <p>No date is selected</p>
            <?php
                    }
                
                if($valid){
            ?>
                    
                <h4>Your payment has been completed.</h4><br>
            <?php
                }
                else{
            ?>
                <h4>Your payment is incomplete.</h4><br>
                <h4>Your total amount is: RM{{ $amount }}</h4><br>

            <form>
                <label for="cname">Cardholder Name:</label><br>
                <input type="text" id="cname" name="cname"><br>
                <label for="cardname">Card Number:</label><br>
                <input type="text" id="cardNum" name="cardNum"><br>
                <label for="cvv">CVV:</label><br>
                <input type="text" id="cvv" name="cvv"><br>
                <label for="cardType">Card type:</label><br>
                <input type="radio" id="visa" name="cardType" value="visa" checked='checked'>
                <label for="id">VISA</label><br>
                <input type="radio" id="mastercard" name="cardType" value="mastercard">
                <label for="id">Mastercard</label><br>
                <label for="epdate">Expiration Date:</label><br>
                <input type="text" id="epdate" name="epdate"><br>
                <input type="submit" name="submit" value="Submit">
            </form>

            <?php
                }
            }
            else{
            ?>

            <h4>Your total amount is: RM{{ $amount }}</h4><br>

            <h6>Order details:</h6>
                
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
                        <table style="display:contents">
                            <tr>
                                <th>ISBN_13</th>
                                <th>Book Name</th>
                                <th>Price</th>
                            </tr>
                            <!-- display table -->
                                <?php
                                foreach($products_run as $proditems){
                                    ?>
                                    
                                    <tr>
                                        <th>{{ $proditems['ISBN_13']; }}</th>
                                        <th>{{ $proditems['bookName'] }}</th>
                                        <th>RM{{ $proditems['retailPrice']}}</th>
                                </tr>
                                <?php                              
                            }?>
                            </table>
                       <?php }?>

            <form>
                <label for="cname">Cardholder Name:</label><br>
                <input type="text" id="cname" name="cname"><br>
                <label for="cardname">Card Number:</label><br>
                <input type="text" id="cardNum" name="cardNum"><br>
                <label for="cvv">CVV:</label><br>
                <input type="text" id="cvv" name="cvv"><br>
                <label for="cardType">Card type:</label><br>
                <input type="radio" id="visa" name="cardType" value="visa" checked='checked'>
                <label for="id">VISA</label><br>
                <input type="radio" id="mastercard" name="cardType" value="mastercard">
                <label for="id">Mastercard</label><br>
                <label for="epdate">Expiration Date:</label><br>
                <input type="text" id="epdate" name="epdate"><br>
                <input type="submit" name="submit" value="Submit">
            </form>

            <?php
                }
            ?>

        

        </div>
    </div>
</body>

@endsection
