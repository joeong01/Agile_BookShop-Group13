<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Bokking System-Admin</title>

    <style>
        .about{
            background-color: grey;
            margin: 1%;
            margin-bottom: 240px;
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
<body style="background-color: gainsboro;">
    <div id="page-container">
    {{ View::make('userHeader') }}

    <div class="about">
        <h1>About us</h1>
        <h3>Our History</h3>
        <p>Sed suscipit aliquet condimentum. Aliquam commodo, lectus sed tincidunt congue, eros lacus efficitur quam, nec ornare ipsum diam at nulla. Ut vestibulum ligula pulvinar, maximus dolor sollicitudin, dignissim velit. Nunc est massa, ullamcorper nec eleifend et, semper sit amet purus. Ut et blandit lacus. Vestibulum aliquam id nisi ut varius. Vivamus placerat nibh quis tristique tincidunt.<br><br>

        Aenean luctus ex mi. Vestibulum urna nunc, rutrum quis tempus at, maximus sit amet nibh. Donec consectetur scelerisque neque, sed volutpat neque lacinia ullamcorper. Praesent et aliquet dolor. Etiam suscipit, sem eget iaculis pharetra, metus erat blandit ipsum, id dictum nibh tellus eu purus. Mauris scelerisque odio in erat dapibus sollicitudin. Etiam blandit mollis quam sed sagittis. Ut ut elit nec arcu auctor euismod. Morbi fermentum purus nec ante sollicitudin, eget fermentum purus porta. Maecenas tristique non elit sit amet fringilla. Duis aliquam vulputate pellentesque. Phasellus sit amet ex vitae orci lobortis ultricies eu et purus.<br><br>
            
        Maecenas quis congue urna. Curabitur et auctor leo. In sit amet pretium metus. Aenean tempus vel nisi id sodales. Sed et est sagittis elit commodo pharetra. Sed feugiat, enim et cursus congue, felis tellus euismod augue, at sagittis nisi massa nec massa. Suspendisse aliquet enim ac metus vulputate, non auctor metus bibendum. Suspendisse tempor venenatis tincidunt. Vivamus sit amet urna non elit placerat congue sit amet eu nunc. Donec egestas diam et ipsum eleifend venenatis. Sed molestie consequat vestibulum.</p>

        <h3>Want to know more?</h3>
        <p>Sed suscipit aliquet condimentum. Aliquam commodo, lectus sed tincidunt congue, eros lacus efficitur quam, nec ornare ipsum diam at nulla. Ut vestibulum ligula pulvinar, maximus dolor sollicitudin, dignissim velit. Nunc est massa, ullamcorper nec eleifend et, semper sit amet purus. Ut et blandit lacus. Vestibulum aliquam id nisi ut varius. Vivamus placerat nibh quis tristique tincidunt.<br><br>

        Aenean luctus ex mi. Vestibulum urna nunc, rutrum quis tempus at, maximus sit amet nibh. Donec consectetur scelerisque neque, sed volutpat neque lacinia ullamcorper. Praesent et aliquet dolor. Etiam suscipit, sem eget iaculis pharetra, metus erat blandit ipsum, id dictum nibh tellus eu purus. Mauris scelerisque odio in erat dapibus sollicitudin. Etiam blandit mollis quam sed sagittis. Ut ut elit nec arcu auctor euismod. Morbi fermentum purus nec ante sollicitudin, eget fermentum purus porta. Maecenas tristique non elit sit amet fringilla. Duis aliquam vulputate pellentesque. Phasellus sit amet ex vitae orci lobortis ultricies eu et purus.<br><br>
                
        Maecenas quis congue urna. Curabitur et auctor leo. In sit amet pretium metus. Aenean tempus vel nisi id sodales. Sed et est sagittis elit commodo pharetra. Sed feugiat, enim et cursus congue, felis tellus euismod augue, at sagittis nisi massa nec massa. Suspendisse aliquet enim ac metus vulputate, non auctor metus bibendum. Suspendisse tempor venenatis tincidunt. Vivamus sit amet urna non elit placerat congue sit amet eu nunc. Donec egestas diam et ipsum eleifend venenatis. Sed molestie consequat vestibulum.</p>
    </div>
    

    {{ View::make('footer') }}
    </div>
</body>



</html>