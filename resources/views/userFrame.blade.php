<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Store</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <style>
        /*
    =====
    DEPENDENCES
    =====
    */

        .r-link {
            display: var(--rLinkDisplay, inline-flex) !important;
        }

        .r-link[href] {
            color: var(--rLinkColor) !important;
            text-decoration: var(--rLinkTextDecoration, none) !important;
        }

        .r-list {
            padding-left: var(--rListPaddingLeft, 0) !important;
            margin-top: var(--rListMarginTop, 0) !important;
            margin-bottom: var(--rListMarginBottom, 0) !important;
            list-style: var(--rListListStyle, none) !important;
        }


        /*
    =====
    CORE STYLES
    =====
    */

        .menu {
            --rLinkColor: var(--menuLinkColor, currentColor);
        }

        .menu__link {
            display: var(--menuLinkDisplay, block);
        }

        /* 
    focus state 
    */

        .menu__link:focus {
            outline: var(--menuLinkOutlineWidth, 2px) solid var(--menuLinkOutlineColor, currentColor);
            outline-offset: var(--menuLinkOutlineOffset);
        }

        /* 
    fading siblings
    */

        .menu:hover .menu__link:not(:hover) {
            --rLinkColor: var(--menuLinkColorUnactive, rgb(226, 226, 226));
        }

        /*
    =====
    PRESENTATION STYLES
    =====
    */

        .menu {
            background-color: var(--menuBackgroundColor, #f0f0f0);
            box-shadow: var(--menuBoxShadow, 0 1px 3px 0 rgba(0, 0, 0, .12), 0 1px 2px 0 rgba(0, 0, 0, .24));
        }

        .menu__list {
            display: flex;
        }

        .menu__link {
            padding: var(--menuLinkPadding, 1.5rem 2.5rem);
            font-weight: 700;
            text-transform: uppercase;
        }

        /* 
    =====
    TEXT UNDERLINED
    =====
    */

        .text-underlined {
            position: relative;
            overflow: hidden;
            will-change: color;
            transition: color .25s ease-out;
        }

        .text-underlined::before,
        .text-underlined::after {
            content: "";
            width: 0;
            height: 3px;
            background-color: var(--textUnderlinedLineColor, currentColor);

            will-change: width;
            transition: width .1s ease-out;

            position: absolute;
            bottom: 0;
        }

        .text-underlined::before {
            left: 50%;
            transform: translateX(-50%);
        }

        .text-underlined::after {
            right: 50%;
            transform: translateX(50%);
        }

        .text-underlined:hover::before,
        .text-underlined:hover::after {
            width: 100%;
            transition-duration: .2s;
        }

        /*
    =====
    SETTINGS
    =====
    */

        .page__custom-settings {
            --menuBackgroundColor: rgb(44, 47, 44);
            --menuLinkColor: rgb(93, 117, 253);
            --menuLinkColorUnactive: rgb(226, 226, 226);
            --menuLinkOutlineOffset: -.5rem;
        }

        /*
    =====
    DEMO
    =====
    */

        body {
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Open Sans, Ubuntu, Fira Sans, Helvetica Neue, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .page {
            box-sizing: border-box;
            margin: 0px;
            position: relative;
            float: left;
        }

        .page__menu:nth-child(n+2) {
            margin-top: 3rem;
        }


        .substack {
            border: 1px solid #EEE;
            background-color: #fff;
            width: 100%;
            max-width: 480px;
            height: 280px;
            margin: 1rem auto;
            ;
        }

        .linktr {
            display: flex;
            justify-content: flex-end;
            padding: 2rem;
            text-align: center;
        }

        .linktr__goal {
            background-color: rgb(209, 246, 255);
            color: rgb(93, 117, 253);
            box-shadow: rgb(93, 117, 253 / 24%) 0px 2px 8px 0px;
            border-radius: 2rem;
            padding: .75rem 1.5rem;
        }

        .r-link {
            --uirLinkDisplay: var(--rLinkDisplay, inline-flex);
            --uirLinkTextColor: var(--rLinkTextColor);
            --uirLinkTextDecoration: var(--rLinkTextDecoration, none);

            display: var(--uirLinkDisplay) !important;
            color: var(--uirLinkTextColor) !important;
            text-decoration: var(--uirLinkTextDecoration) !important;
        }

        .footer {
            position: relative;
            width: 100%;
            bottom: 0;
            padding: 30px 0;
            background-color: rgb(44, 47, 44);
            color: #9d9d9d;
        }

        .footer ul {
            padding: 0;
            list-style: none;
            text-align: center;
            font-size: 18px;
            line-height: 1.0;
            margin-bottom: 0;
        }

        .footer li {
            padding: 0 10px;
        }

        .footer ul a {
            color: inherit;
            text-decoration: none;
            opacity: 0.8;
        }

        .footer ul a:hover {
            opacity: 1;
        }

        .footer .social {
            text-align: center;
            padding-bottom: 20px;
        }

        .footer .social>a {
            font-size: 24px;
            width: 40px;
            height: 40px;
            line-height: 40px;
            display: inline-block;
            text-align: center;
            border-radius: 50%;
            border: 1px solid #ccc;
            margin: 0 8px;
            color: inherit;
            opacity: 0.75;
        }

        .footer .social>a:hover {
            opacity: 0.9;
        }

        .footer .copyright {
            margin-top: 15px;
            text-align: center;
            font-size: 15px;
            color: #9d9d9d;
            margin-bottom: 0;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="{{url ('/Picture/head_logo.png')}}">

</head>

<body style="background-color: rgb(173, 173, 173);">
    <div class="float-container">
        <div class="page" style="width:80%;">
            <!--navigation bar-->
            <nav class="page__menu page__custom-settings menu">
                <ul class="menu__list r-list">
                    <li class="menu__group"><a href="{{  route('userHome') }}" class="menu__link r-link text-underlined"><img src="{{url ('/Picture/logo.png')}}" width="35px" height="24px" /></a></li>
                    <li class="menu__group"><a href="{{  route('userHome') }}" class="menu__link r-link text-underlined">Homepage</a></li>
                    <li class="menu__group"><a href="{{  route('bookDetails') }}" class="menu__link r-link text-underlined">Books</a></li>
                    <?php
                    session_start();
                    if (session()->get('type') != "none") {
                    ?>
                        <li class="menu__group"><a href="{{  route('paymentHistory') }}" class="menu__link r-link text-underlined">Payment History</a></li>
                    <?php
                    }
                    ?>
            </nav>
        </div>
        <div class="page" style="width:20%;">
            <nav class="page_menu page__custom-settings menu">
                <ul class="menu__list r-list">
                    <?php
                    if (session()->get('type') == "none") {
                    ?>
                        <li class="menu__group"><a href="{{  route('login') }}" class="menu__link r-link text-underlined">Sign In</a></li>
                    <?php
                    } else {
                    ?>
                        <li class="menu__group"><a href="{{  route('logout') }}" class="menu__link r-link text-underlined">Log Out</a></li>
                    <?php } ?>
                    <li class="menu__group"><a href="{{  route('cart') }}" class="menu__link r-link text-underlined"><img src="{{url ('/Picture/Shopping Cart.png')}}" width="30px" height="24px" /></a></li>
            </nav>
        </div>
    </div>
    @yield('content')
    </div>
    <div class="footer">
        <footer>
            <!--footer-->
            <div class="social">
                <a href="https://www.instagram.com/" target="_blank"><i class="icon ion-social-instagram"></i></a>
                <a href="https://www.snapchat.com/" target="_blank"><i class="icon ion-social-snapchat"></i></a>
                <a href="https://twitter.com/" target="_blank"><i class="icon ion-social-twitter"></i></a>
                <a href="https://www.facebook.com/" target="_blank"><i class="icon ion-social-facebook"></i></a>
            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href={{ route('contact_us') }}>Contact Us</a></li>
                <li class="list-inline-item"><a href={{ route('about') }}>About</a></li>
            </ul>
            <p class="copyright">Book Booking System © 2022</p>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        </footer>
    </div>

</body>

</html>