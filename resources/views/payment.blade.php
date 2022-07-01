{{-- 
@if(Auth::user-())
@extends('userFrame')
 --}}
 @extends('adminFrame')
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
            <?php
                if(isset($_GET['submit'])){
            ?>
            
            <h1>Payment</h1>
            <h4>Your payment has been completed.</h4><br>

            <?php
                }
                else{
            ?>

            <h1>Payment</h1>
            <h4>Your total amount is: "amount"</h4><br>

            <form>
                <label for="cname">Cardholder Name:</label><br>
                <input type="text" id="cname" name="cname"><br>
                <label for="cardname">Card Number:</label><br>
                <input type="text" id="cardName" name="cardName"><br>
                <label for="cvv">CVV:</label><br>
                <input type="text" id="cvv" name="cvv"><br>
                <label for="cvv">Card type:</label><br>
                <input type="radio" id="visa" name="cardType" value="visa">
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