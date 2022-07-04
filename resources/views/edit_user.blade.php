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
    
            $con = mysqli_connect("localhost","root","","bookstore");

            $search = "SELECT * FROM users WHERE userID=$userID";

            $user = mysqli_query($con, $search);
        
    ?>

    <div class="home">

    <?php
    //Edit user password function
        foreach($user as $users){
            $userID =  $users['userID'];
            $password =  $users['password'];
        }

        if(array_key_exists('submit_changes', $_GET)){
            edit_to_database($userID, $con);
        }

        function edit_to_database($userID, $con){
            $userID = session()->get('id');
            $password = $_GET['password'];

            $edit = "UPDATE users SET password='$password' WHERE userID = $userID";

            if ($con->query($edit) === TRUE) {
                header("Location:http://127.0.0.1:8000/login");
                exit();
            } else {
                echo "Error updating record: ";
            }
        }
    ?>

    <?php
        $user
    ?>

    <form method="get">
        <label for="name">Name:</label><br>
        <input type="text" name="userID" id="userID" value="{{ $userID }} "readonly><br><br>
        <label for="name">Password:</label><br>
        <input type="text" name="password" id="password" value='{{ $password }}'><br><br>

        <button name="submit_changes">Submit Changes</button>
    </form>
    
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endsection