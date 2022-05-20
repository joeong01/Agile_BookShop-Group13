<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Booking System-Admin</title>
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

    </style>

</head>
<body style="background-color: rgb(173, 173, 173);">
    {{ View::make('adminHeader') }}
    <div class="home">
        <h1>Welcome it's time for work!!!!!</h1>
        <h2>Will update later, still elearning about the Database</h2>
    </div>
    {{ View::make('footer') }}
</body>
</html>