@extends('adminFrame')
@section('content')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

<body  style="background-color: rgb(173, 173, 173);">
    /display all the transaction history 
    <div id="page-container">
        <div class="about_content">   
        @foreach ($payment as $row)
            <button type="button" class="collapsible">Payment ID: {{ $row->paymentID }}</button>
                <div class="content">
                    <p>Date: {{ $row->timeStamp }}</p>
                    <p>UserId: {{ $row->userID }}</p>
                    <p>Total Price: RM{{ $row->totalPrice }}</p>
                </div>
        @endforeach
        </div>
    </div>
    /script that allow user to click on the payment ID to showmore detail
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