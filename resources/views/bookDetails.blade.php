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
        a {
            text-decoration: none; 
            color: black; 
        }

        /* Modal Section */
        .bg-modal{
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0,7);
            opacity: 0.7;
            position: absolute;
            top: 0;
            display:flex;
            justify-content: center;
            align-items: center;
            display: none;
        }


        input{
            width: 50%;
            display: block;
            margin: 15px auto;
        }

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: red;
        cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
        from {-webkit-transform: scale(0)} 
        to {-webkit-transform: scale(1)}
        }
        
        @keyframes animatezoom {
        from {transform: scale(0)} 
        to {transform: scale(1)}
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
        }


    /* Set a style for all buttons */
    button {
    background-color: #aa5f04;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    padding: 20px;
    }

    button:hover {
    opacity: 0.8;
    }

    /* Extra styles for the add to cart button */
    .addCartbtn{
    width: auto;
    padding: 10px 18px;
    background-color: #0451aa;
    margin: 4px;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
    margin: 4px;
    }

    /* Center the image and position the close button */
    .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
    }

    .container {

    text-align: center;
    width: parent;
    float: left;
    }

    span.psw {
    float: right;
    padding-top: 16px;
    }

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .wrapper{
        height: 60px;
        min-width: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FFF;
        border-radius: 12px;
        box-shadow: 0px 5px 10px rgba(0,0,0,0.2);
    }

    .wrapper span{
        width: 30%;
        text-align: center;
        font-size: 30px;
        font-weight: 100;
        cursor: pointer;
    }

    .wrapper span.num{
        font-size: 30px;
        border-right: 2px solid rgba(0,0,0,0.2);
        border-left: 2px solid rgba(0,0,0,0.2);
        pointer-events: none;
    }

    .pBookDetail{
        padding-left: 20px;
        padding-right: 10%;
    }
    </style>

</head>
<body style="background-color: rgb(173, 173, 173);">
    <div class="home">

    <?php
        // $sql= "SELECT * FROM book ";
        
        // $search = "SELECT * FROM book WHERE ISBN_13= 1543953615468";
        // $con = mysqli_connect("localhost","root","","bookstore");
        // $books = mysqli_query($con, $search);

        if(isset($_GET['btnDetails'])){
            $bookISBN_13 = $_GET['ISBN_13'];
            echo $bookISBN_13;
            $con = mysqli_connect("localhost","root","","bookstore");

            $search = "SELECT * FROM book WHERE ISBN_13= $bookISBN_13";
            
            $books = mysqli_query($con, $search);
        }  

    ?>
    <!-- single product details -->

        <div class="row">
            <div class="col">
            <?php
            // $id = $_GET['ISBN_13'];

            //put in server address, then username, then password, then database name
            $db = mysqli_connect("localhost","root","","bookstore");
            $sql= "SELECT * FROM book ";
            $sth = $db->query($sql);
            $id = "SELECT ISBN_13 FROM book"
            ?>
            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];

                    $con = mysqli_connect("localhost","root","","bookstore");

                    $search = "SELECT * FROM book WHERE ISBN_13=$id";
                    
                    $books = mysqli_query($con, $search);
                }  
            ?>
            @foreach ($books as $row)
            <form role="form" method="GET" id="btnDetails" name="details">
                <?php
                // {{$row->bookCover}}
                $result = mysqli_fetch_array($sth);
                echo '<image src="data:image/jpeg;base64,'.base64_encode($result['bookCover']).'"/>';?>

                <h1>{{$row->bookName}}</h1>
                <h4>RM {{$row->tradePrice}}</h4>

                <!-- <button>Add To Cart</button> -->

                <!-- button popup book's details -->
                <input type="hidden" id="btnISBN_13" name="ISBN_13" value={{$row->ISBN_13}}>
                <button onclick="document.getElementById('bookDetailsBtn').style.display='block'" style="width:auto;" name="btnDetails">Details</button>
                <br>
                <br>
            </form>
            @endforeach
            
            <!-- Modal -->
            <div id="bookDetailsBtn" class="modal">
            
            <form class="modal-content animate" action="/action_page.php" method="post">
                <div class="imgcontainer">
                <span onclick="document.getElementById('bookDetailsBtn').style.display='none'" class="close" title="Close Modal">&times;</span>
                <?php
                
                
                ?>
                </div>

                <!-- <div class="container"> -->
                <div id = "modal-body">
                

                        <!-- Display the fields that will be displayed in pop-up -->
                        <p class="pBookDetail">Book Name: {{$row->bookName}}</p>
                        <p class="pBookDetail">Author: {{$row->author}}</span></p>
                        <p class="pBookDetail">Publication Date: {{$row->publicationDate}}</span></p>
                        <p class="pBookDetail">Book Description: {{$row->bookDescription}}></span></p>
                        <p class="pBookDetail">Price: {{$row->tradePrice}}</span></p>
                        <p class="pBookDetail">Book Category: {{$row->bookCategory}}</span></p>

                        <!-- quantity button -->
                        <div class="wrapper">
                            <span class="minus">-</span>
                            <span class="num">01</span>
                            <span class="plus">+</span>
                        </div>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('bookDetailsBtn').style.display='none'" class="addCartbtn" style="width: 50%">Add To Cart</button>
                <button type="button" onclick="document.getElementById('bookDetailsBtn').style.display='none'" class="cancelbtn" style="width: 50%">Cancel</button>
                <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
                </div>
            </form>
            </div><!-- /.modal -->

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

    <script>
            // Get the modal
            var modal = document.getElementById('bookDetailsBtn');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

        <script>
            const plus = document.querySelector(".plus"),
            minus = document.querySelector(".minus"),
            num = document.querySelector(".num");

            let a = 1;

            plus.addEventListener("click", ()=>{
                a++;
                a =(a < 10) ? "0" + a: a;
                num.innerText = a;
                console.log("a");
            })

            minus.addEventListener("click", ()=>{
                if(a >1){
                    a--;
                    a = (a<10)? "0" + a: a;
                    num.innerText = a;
                }
            })
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        
</body>
</html>
@endsection