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

    <!--style of page-->
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
    </style>
</head>

<body style="background-color: rgb(173, 173, 173);">
    <div id="page-container">
        <div class="about_content">
            <h1>About us</h1>
            <h3>Our History</h3>
            <p>
                BS Malaysia believes in developing the culture of reading and aims to promote English
                literacy among people from all walks of life. The urban bookstore chain strives to make
                reading fun, and creating an environment where learning is engagingly fun for everyone.
                This vision is made possible with BS offering beyond quality books, with educational
                and entertainment items housed within a cosy ambience. BS Malaysia also places customer
                service par excellence as one of its key characteristics for customers to enjoy the
                utmost at its stores.
            </p>

            <!--drop down to view FAQ-->
            <h3>Want to know more? Here are some FAQs.</h3>
            <button type="button" class="collapsible">How often do you update?</button>
            <div class="content">
                <p>Our stocks update once a week to bring you a variety of books.
                </p>
            </div>
            <button type="button" class="collapsible">How do I contact you?</button>
            <div class="content">
                <p><a href={{ route('about') }}>Click here to find out.</a></p>
            </div>
            <button type="button" class="collapsible">What Countries do you deliver to?</button>
            <div class="content">
                <p>Our services mainly provided in Malaysia. However, we did support international
                    mailing for the orders made.
                </p>
            </div>
            <button type="button" class="collapsible">Shipping Fees</button>
            <div class="content">
                <p>The shipping fees varies from the order location and the amount of purchases made.
                </p>
            </div>
            <button type="button" class="collapsible">Cookies</button>
            <div class="content">
                <p>
                    To enable our systems to recognize your browser or device and to provide and improve BS Services,
                    we use cookies and other identifiers. For more information about cookies and how we use them, please
                    read our Cookies Notice.
                </p>
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