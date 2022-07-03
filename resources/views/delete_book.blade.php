@extends('userFrame')
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

<body>
    <?php
    //load if the id is not empty
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $con = mysqli_connect("localhost", "root", "", "bookstore");

        //delete process
        $delete1 = "DELETE FROM stock WHERE ISBN_13=$id";

        mysqli_query($con, $delete1);

        $delete2 = "DELETE FROM book WHERE ISBN_13=$id";

        mysqli_query($con, $delete2);

        //exit out to stock level
        header("Location:http://127.0.0.1:8000/stocklevel");
        exit();
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
@endsection