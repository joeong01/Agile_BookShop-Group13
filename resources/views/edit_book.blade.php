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
            padding-left: 4%;
            padding-right: 2%;
        
        }

        #page-container{
            position: relative;
            min-height: 100vh;
        }

        input[type=text]{
            width: 50%;
            padding: 5px;
            margin-bottom: 5px; 
        }
        
        input[type=submit]{
            width: 100px;
            padding: 5px;
            margin-top: 5px;
            margin-bottom: 5px; 
        }

        textarea[id=desc]{
            width: 50%;
            height: 250px;
        }


    </style>

</head>
<body style="background-color: rgb(173, 173, 173);">
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $con = mysqli_connect("localhost","root","","bookstore");

            $search = "SELECT * FROM book WHERE ISBN_13=$id";

            $books = mysqli_query($con, $search);
        }  
    ?>

    <div class="home">

    <?php
        foreach($books as $book){
            $ISBN =  $book['ISBN_13'];
            $name =  $book['bookName'];
            $pub_date =  $book['publicationDate'];
            $desc =  $book['bookDescription'];
            $retail_price =  $book['retailPrice'];
            $trade_price =  $book['tradePrice'];
        }

        if(array_key_exists('submit_changes', $_GET)){
            edit_to_database($ISBN, $con);
        }

        function edit_to_database($ISBN, $con){
            $name = $_GET['name'];
            $pub_date = $_GET['pub_date'];
            $desc = $_GET['desc'];
            $retail_price = $_GET['retail_price'];
            $trade_price = $_GET['trade_price'];

            $edit = "UPDATE book SET bookName='$name', publicationDate='$pub_date', bookDescription='$desc', retailPrice='$retail_price', tradePrice='$trade_price' WHERE ISBN_13='$ISBN'";

            if ($con->query($edit) === TRUE) {
                header("Location:http://127.0.0.1:8000/stocklevel");
                exit();
            } else {
                echo "Error updating record: ";
            }
        }
    ?>

    

    <form method="get">
        <label for="name">ISBN:</label><br>
        <input type="text" name="id" id="id" value={{ $ISBN }} readonly><br><br>
        <label for="name">Book Name:</label><br>
        <input type="text" name="name" id="name" value='{{ $name }}'><br><br>
        <label for="pub_date">Publication Date:</label><br>
        <input type="text" name="pub_date" id="pub_date" value={{ $pub_date }}><br><br>
        <label for="desc">Description:</label><br>
        <textarea name="desc" id="desc" maxlength="500">{{ $desc }}</textarea><br><br>
        <label for="isbn">Retail Price:</label><br>
        <input name="retail_price" type="text" id="retail_price" value={{ $retail_price }}><br><br>
        <label for="isbn">Trade Price:</label><br>
        <input name="trade_price" type="text" id="trade_price" value={{ $trade_price }}><br><br>

        <button name="submit_changes">Submit Changes</button>
    </form>
    
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endsection