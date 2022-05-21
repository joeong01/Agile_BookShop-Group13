<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Bokking System-Admin</title>

    <style>
        .contact_content{
            background-color: grey;
            margin: 1%;
            margin-bottom: 240px;
            padding: 1%;
            padding-left: 4%;
            padding-right: 2%;
        }
        
        #page-container{
            position: relative;
            min-height: 100vh;
        }

        input[type=text]{
            width: 25%;
            padding: 5px;
            margin-bottom: 5px; 
        }

        input[type=submit]{
            width: 100px;
            padding: 5px;
            margin-top: 5px;
            margin-bottom: 5px; 
        }

        textarea[id=inquiry]{
            width: 35%;
            height: 250px;
        }

    </style>

</head>
<body style="background-color: gainsboro;">
    <div id="page-container">
    {{ View::make('userHeader') }}
    
    <div class='contact_content'>
        <h1>Contact Us</h1>
        <h4>Have a question to ask us? Fill up the form below to contact us.</h4><br>

        <form>
            <label for="fname">First Name:</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">Last Name:</label><br>
            <input type="text" id="lname" name="lname"><br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="inquiry">Your inquiry:</label><br>
            <textarea style="resize: none" id="inquiry" name="inquiry"></textarea><br>
            <input type="submit" value="Submit">
        </form>

    </div>

    {{ View::make('footer') }}
    </div>
</body>
</html>