@extends('userFrame')
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

<body>
    <div id="page-container">
        <div class="about_content"> 
            {{-- use loop to display all history of current log in user --}}
        @foreach ($history as $row)
        {{-- display payment ID and Date as title --}}
            <button type="button" class="collapsible">Payment ID: {{ $row->invoiceID }}, Date: {{ $row->invoiceDate }}</button>
                <div class="content">
                    {{-- after usre click on the title it will show more detail about the payment history --}}
                    <p>Total Price: {{ $row->totalPrice }}</p>
                    <p>Address: {{ $row->postageAddress }}</p>
                    <?php
                        $num =1;
                    ?>

                    <table style="width: 60%">
                        <tr>
                            <th style="width: 10%;">No.</th>
                            <th style="width: 60%;">Book Name</th>
                            <th style="width: 30%;">Total Bought</th>
                        </tr>
                    @foreach ($books as $data)
                        @if ( $data->invoiceID == $row->invoiceID)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->bookName }}</td>
                                <td>{{ $data->numberOfBook }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </table>
                </div>
        @endforeach
        </div>
    </div>
    {{-- script that allow user to click on the payment ID to showmore detail --}}
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