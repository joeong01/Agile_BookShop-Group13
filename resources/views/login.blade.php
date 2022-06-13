{{--
@if(Auth::user-())--}}
@extends('userFrame')

{{-- @extends('adminFrame') --}}
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <style>
        .about_content {
            margin: 1%;
            padding: 1%;
            padding-left: 2%;
            padding-right: 2%;

        }

        #page-container {
            position: relative;
            min-height: 100px;
        }

        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active,
        .collapsible:hover {
            background-color: #555;
        }

        .content {
            padding: 18px;
            display: none;
            overflow: hidden;
            background-color: #c2c2c2;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        /* Add a background color when the inputs get focus */
        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for all buttons */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        button:hover {
            opacity: 1;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            padding: 14px 20px;
            background-color: #f44336;
        }

        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn,
        .signupbtn {
            float: left;
            width: 50%;
        }

        /* Add padding to container elements */
        .container {
            padding: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: #474e5d;
            padding-top: 50px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* Style the horizontal ruler */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 35px;
            top: 15px;
            font-size: 40px;
            font-weight: bold;
            color: #f1f1f1;
        }

        .close:hover,
        .close:focus {
            color: #f44336;
            cursor: pointer;
        }

        /* Clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {

            .cancelbtn,
            .signupbtn {
                width: 100%;
            }
        }
    </style>

</head>

<body style="background-color: rgb(173, 173, 173);">
    <div id="page-container">
        <?php
        $msg = "";
        $con = mysqli_connect("localhost", "root", "", "bookstore");
        if (isset($_GET['submit'])) {
            $userID = $_GET['userID'];
            $password = $_GET['password'];
            $query = mysqli_query($con, "SELECT userID FROM users WHERE userID='$userID' AND password='$password' ");
            $ret = mysqli_fetch_array($query);

            $query1 = mysqli_query($con, "SELECT userType FROM users WHERE userID='$userID' AND password='$password' ");
            $ret1 = mysqli_fetch_array($query1);

            if ($ret > 0) {
                $_SESSION['uid'] = $ret['userID'];
                $string1 = $ret1['userType'];
                $string2 = "customer";

                if (strcmp($string1, $string2) == 0) {
                    header("Location: http://127.0.0.1:8000/");
                    exit();
                } else {
                    header("Location: http://127.0.0.1:8000/admin");
                    exit();
                }
            } else {
                $msg = "Invalid Details.";
            }
        }
        ?>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="margin: auto">
            <div class="login-panel panel panel-default">
                <div class="panel-heading" style="text-align: center;">Log In</div>
                <div class="panel-body">
                    <form role="form" method="GET" id="" name="login">
                        <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                    echo $msg;
                                                                                }  ?> </p>
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="userID" name="userID" type="text" autofocus="" required="true">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
                            </div>
                            <div class="checkbox">
                                <button type="submit" value="Login" name="submit" class="btn btn-primary" style="width: 100%;">LOGIN</button><br><br>
                            </div>

                            <p>Haven't create account?? Click <a href="{{  route('register') }}">here</a> to register account</p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>

</body>
@endsection