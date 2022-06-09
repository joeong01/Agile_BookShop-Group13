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


    </style>

</head>
<body style="background-color: rgb(173, 173, 173);">
    <?php
        $con = mysqli_connect("localhost","root","","bookstore");

        $search = "SELECT * FROM book LIMIT 1";

        $books = mysqli_query($con, $search);
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
            edit_to_database($name, $pub_date, $desc, $retail_price, $trade_price, $ISBN, $con);
        }

        function edit_to_database($name, $pub_date, $desc, $retail_price, $trade_price, $ISBN, $con){
            $edit = "UPDATE book SET bookName='$name', publicationDate='$pub_date', bookDescription='$desc', retailPrice='$retail_price', tradePrice='$trade_price' WHERE ISBN_13='$ISBN'";

            if ($con->query($edit) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: ";
            }
        }
    ?>

    <form method="head">
        <p>ISBN:</p>
        <p>{{ $ISBN }}</p>
        <label for="name">Book Name:</label><br>
        <input type="text" id="name" value={{ $name }}><br><br>
        <label for="pub_date">Publication Date:</label><br>
        <input type="text" id="pub_date" value={{ $pub_date }}><br><br>
        <label for="desc">Description:</label><br>
        <textarea id="desc">{{ $desc }}</textarea><br><br>
        <label for="isbn">Retail Price:</label><br>
        <input type="text" id="isbn" value={{ $retail_price }}><br><br>
        <label for="isbn">Trade Price:</label><br>
        <input type="text" id="isbn" value={{ $trade_price }}><br><br>

        <button name="submit_changes">Submit Changes</button>
    </form>
    
    </div>
</body>
</html>
@endsection