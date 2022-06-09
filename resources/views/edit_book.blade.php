@extends('userFrame')
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
        /* ds */
        .single-product{
            margin-top: 80px;

        }
        .single-product .col-2 img{
            padding: 0;
        }
        .single-product .col-2{
            padding: 20px;
        }
        .single-product .col-2 img{
            margin: 20px 0;
            font-size: 22px;
            font-weight: bold;
        }
        .single-product select{
            display:block;
            padding:10px;
            margin-top: 20px;
        }
        .single-product input{
            width: 50px;
            height: 40px;
            padding-left: 10px;
            font-size: 20px;
            margin-right: 10px;
            border: 1px solid #3bf8ff;
        }
        input:focus{
            outline: none;
        }
        .single-product .fa{
            color: #3bf8ff;
            margin-left: 10px;
        }
        .small-img-row{
            display: flex;
            justify-content: space-between;
        }
        .small-img-col{
            flex-basis: 24%;
            cursor: pointer;
        }

    </style>

</head>
<body style="background-color: rgb(173, 173, 173);">
    <div class="home">

    <!-- single product details -->
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="{{ url('/Picture/Screenshot 2022-05-20 104415.png') }}" width="100%" id="ProductImg">

            </div>
            <div class="col-2">
                <p>Home / Books</p>
                <h1>Modern Advocancy</h1>
                <h4>RM30</h4>
                <!-- <input type="number" value="1"> -->
                <h3>Product Details <i class="fa fa-ident"></i></h3>
                <th>By :Elearnor Wong, Lok Vi Ming,<br> The Honourable Justice Vinodh Coomaraswamy</th>
                <br>
                <a href="" class="btn" style="color: black">Add To Cart</a>
                <!-- <p>Empty Book, A-Z</p> -->
            </div>
        </div>
    </div>
    <!-- title -->

</div>


    <!-- js for toggle menu -->
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems,style.maxHeight = "0px";
        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px")
            {
                MenuItems.style.maxHeight= "200px";
            }
            else{
                MenuItems.style.maxHeight = "0px"
            }
        }     

    </script>
    <!-- js for product gallery -->
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function(){
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function(){
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function(){
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function(){
            ProductImg.src = SmallImg[3].src;
        }
    </script>

    
</body>
</html>
@endsection