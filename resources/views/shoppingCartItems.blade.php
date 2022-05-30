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
    </style>
</head>
<body>

<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="50" height="50" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['name']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">&dollar;<?=$product['price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&dollar;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <!--<span class="price">&dollar;<?=$subtotal?></span>-->
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>
</body>
@endsection