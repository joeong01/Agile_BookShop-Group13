@extends('adminFrame')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .home {
            background-color: grey;
            margin: 1%;
            padding: 1%;
            padding-left: 4%;
            padding-right: 2%;

        }

        #page-container {
            position: relative;
            min-height: 100vh;
        }

        input[type=text] {
            width: 50%;
            padding: 5px;
            margin-bottom: 5px;
        }

        input[type=submit] {
            width: 100px;
            padding: 5px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        textarea[id=desc] {
            width: 50%;
            height: 250px;
        }
    </style>

</head>

<body style="background-color: rgb(173, 173, 173);">

    <div class="home">

        <H1>Add Stock</H1>

        <?php

        $con = mysqli_connect("localhost", "root", "", "bookstore");

        if (array_key_exists('add_stock', $_GET)) {
            add_to_database($con);
        }

        //save edited data to database
        function add_to_database($con)
        {
            $name = $_GET['name'];
            $pub_date = $_GET['pub_date'];
            $desc = $_GET['desc'];
            $ISBN = $_GET['isbn'];
            $author = $_GET['author'];
            $category = $_GET['category'];
            $retail_price = $_GET['retail_price'];
            $trade_price = $_GET['trade_price'];
            $stock_number = $_GET['stockNumber'];

            $add = "INSERT INTO book (bookName, publicationDate, bookDescription, retailPrice, tradePrice, ISBN_13, author, bookCategory)
                    VALUES ('$name', '$pub_date', '$desc', '$retail_price', '$trade_price','$ISBN', '$author', '$category')";

            $stock = "INSERT INTO stock (ISBN_13, stockLevel)
                    VALUES ('$ISBN', $stock_number)";


            if ($con->query($add) === TRUE) {
                mysqli_query($con, $stock);
                header("Location:http://127.0.0.1:8000/stocklevel");
                exit();
            } else {
                echo "Error updating record: ";
            }
        }
        ?>

        <!--addition form-->
        <form method="get">
            <label for="isbn">ISBN:</label><br>
            <input type="text" name="isbn" id="isbn"><br><br>
            <label for="name">Book Name:</label><br>
            <input type="text" name="name" id="name"><br><br>
            <label for="author">Book Author:</label><br>
            <input type="text" name="author" id="author"><br><br>
            <label for="category">Category</label><br>
            <select name="category" id="category">
                <option value="C01">Action and Adventure</option>
                <option value="C02">Classics</option>
                <option value="C03">Comic Book</option>
                <option value="C04">Detective and Mystery</option>
                <option value="C05">Fantasy</option>
                <option value="C06">Horror</option>
                <option value="C07">Romance</option>
                <option value="C08">Education </option>
            </select>
            <br><br>
            <label for="pub_date">Publication Date:</label><br>
            <input type="text" name="pub_date" id="pub_date"><br><br>
            <label for="desc">Description:</label><br>
            <textarea name="desc" id="desc" maxlength="500"></textarea><br><br>
            <label for="retail_price">Retail Price:</label><br>
            <input name="retail_price" type="text" id="retail_price"><br><br>
            <label for="trade_price">Trade Price:</label><br>
            <input name="trade_price" type="text" id="trade_price"><br><br>
            <label for="stockNumber">Stock Number:</label><br>
            <input name="stockNumber" type="text" id="stockNumber"><br><br>

            <button name="add_stock">Add Stock</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
@endsection