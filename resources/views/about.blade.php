{{-- 
@if(Auth::user-())
@extends('userFrame')
 --}}
@extends('adminFrame')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About us</title>

    <style>
        .about_content{
            margin: 1%;
            padding: 1%;
            padding-left: 2%;
            padding-right: 2%;
        
        }

        #page-container{
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

        .active, .collapsible:hover {
            background-color: #555;
        }

        .content {
            padding: 18px;
            display: none;
            overflow: hidden;
            background-color: #c2c2c2;
        }
    </style>

</head>
<body style="background-color: rgb(173, 173, 173);">
    <div id="page-container">

        <div class="about_content">
            <h1>About us</h1>
            <h3>Our History</h3>
            <p>Sed suscipit aliquet condimentum. Aliquam commodo, lectus sed tincidunt congue, eros lacus efficitur quam, nec ornare ipsum diam at nulla. Ut vestibulum ligula pulvinar, maximus dolor sollicitudin, dignissim velit. Nunc est massa, ullamcorper nec eleifend et, semper sit amet purus. Ut et blandit lacus. Vestibulum aliquam id nisi ut varius. Vivamus placerat nibh quis tristique tincidunt.<br><br>

            Aenean luctus ex mi. Vestibulum urna nunc, rutrum quis tempus at, maximus sit amet nibh. Donec consectetur scelerisque neque, sed volutpat neque lacinia ullamcorper. Praesent et aliquet dolor. Etiam suscipit, sem eget iaculis pharetra, metus erat blandit ipsum, id dictum nibh tellus eu purus. Mauris scelerisque odio in erat dapibus sollicitudin. Etiam blandit mollis quam sed sagittis. Ut ut elit nec arcu auctor euismod. Morbi fermentum purus nec ante sollicitudin, eget fermentum purus porta. Maecenas tristique non elit sit amet fringilla. Duis aliquam vulputate pellentesque. Phasellus sit amet ex vitae orci lobortis ultricies eu et purus.<br><br>
                
            Maecenas quis congue urna. Curabitur et auctor leo. In sit amet pretium metus. Aenean tempus vel nisi id sodales. Sed et est sagittis elit commodo pharetra. Sed feugiat, enim et cursus congue, felis tellus euismod augue, at sagittis nisi massa nec massa. Suspendisse aliquet enim ac metus vulputate, non auctor metus bibendum. Suspendisse tempor venenatis tincidunt. Vivamus sit amet urna non elit placerat congue sit amet eu nunc. Donec egestas diam et ipsum eleifend venenatis. Sed molestie consequat vestibulum.</p>

            <h3>Want to know more? Here are some FAQs.</h3>
            <button type="button" class="collapsible">How often do you update?</button>
            <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse volutpat neque quis diam pulvinar maximus. Nulla feugiat placerat eros, id varius velit mollis eu. Mauris id posuere nisi. Sed nec eleifend ligula, at fermentum orci. Vivamus malesuada, nibh id imperdiet auctor, lectus arcu condimentum libero, in venenatis nisi dui eget ex. Phasellus arcu mi, varius sit amet faucibus eleifend, ultrices in lacus. Mauris id viverra massa, vitae finibus lectus.</p>
            </div>
            <button type="button" class="collapsible">How do I contact you?</button>
            <div class="content">
                <p><a href={{ route('about') }}>Click here to find out.</a></p>
            </div>
            <button type="button" class="collapsible">What Countries do you deliver to?</button>
            <div class="content">
                <p>Maecenas rhoncus odio non velit efficitur cursus. Nulla tristique arcu et diam mollis, ac pulvinar augue tempor. Phasellus quis metus nec nunc condimentum viverra id ut tellus. Mauris sagittis faucibus posuere. Curabitur ultricies leo quis nunc varius dapibus. Vivamus pulvinar placerat cursus. Phasellus eu congue lorem. Sed pretium eget eros et ornare. Sed mauris velit, vestibulum ac nibh et, vehicula luctus purus. Proin maximus faucibus turpis ut molestie.</p>
            </div>
            <button type="button" class="collapsible">Shipping Fees</button>
            <div class="content">
                <p>Ut magna felis, tincidunt non augue nec, mollis ultrices tellus. Fusce turpis nunc, feugiat vitae lacus et, aliquet sollicitudin risus. Proin luctus nunc orci, at ultrices lectus rhoncus et. Praesent accumsan mauris aliquam eros dictum, vel auctor dui volutpat. Nam elementum in risus quis ullamcorper. Aenean sodales est est, ac elementum diam aliquam quis. Nullam sodales, augue in faucibus pulvinar, ex dui rutrum est, quis vehicula sem mi id felis. Sed laoreet augue eu nisi mollis facilisis. Praesent eget risus nec dui congue facilisis. Aliquam a orci sodales, sagittis quam eu, sodales libero. Integer mattis hendrerit nibh, quis maximus lectus aliquam sed. Pellentesque vel malesuada sem.</p>
            </div>
            <button type="button" class="collapsible">Cookies</button>
            <div class="content">
                <p>Maecenas non libero nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean faucibus erat eu lectus consequat malesuada. Curabitur aliquam nisl id nunc tempor tristique. Etiam ut arcu consequat, sodales ante a, suscipit orci. Pellentesque et dui nisi. Nam vestibulum ligula placerat metus viverra venenatis faucibus ac ex. Cras eget enim in diam consequat posuere. Nullam convallis commodo mi eu vestibulum. Mauris sagittis facilisis nisi. Cras ultrices ex at neque mattis vehicula. Curabitur sit amet ligula dolor. Donec eleifend sapien sed dolor blandit consectetur. Nam suscipit non ipsum in feugiat.</p>
            </div>
        </div>

    </div>

    <script>
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