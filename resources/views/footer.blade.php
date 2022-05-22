<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <style>
    .footer {
        position: relative;
        width: 100%;
        bottom: 0;
        padding:40px 0;
        background-color: rgb(44, 47, 44);
        color:#9d9d9d;
    }

    .footer ul {
        padding:0;
        list-style:none;
        text-align:center;
        font-size:18px;
        line-height:1.0;
        margin-bottom:0;
    }

    .footer li {
        padding:0 10px;
    }

    .footer ul a {
        color:inherit;
        text-decoration:none;
        opacity:0.8;
    }

    .footer ul a:hover {
        opacity:1;
    }

    .footer .social {
        text-align:center;
        padding-bottom:25px;
    }

    .footer .social > a {
        font-size:24px;
        width:40px;
        height:40px;
        line-height:40px;
        display:inline-block;
        text-align:center;
        border-radius:50%;
        border:1px solid #ccc;
        margin:0 8px;
        color:inherit;
        opacity:0.75;
    }

    .footer .social > a:hover {   
        opacity:0.9;
    }

    .footer .copyright {
        margin-top:15px;
        text-align:center;
        font-size:15px;
        color: #9d9d9d;
        margin-bottom:0;
    }
    </style>    
</head>

    <div class="footer">
        <footer>
            <div class="social">
                <a href="https://www.instagram.com/" target="_blank"><i class="icon ion-social-instagram"></i></a>
                <a href="https://www.snapchat.com/" target="_blank"><i class="icon ion-social-snapchat"></i></a>
                <a href="https://twitter.com/" target="_blank"><i class="icon ion-social-twitter"></i></a>
                <a href="https://www.facebook.com/" target="_blank"><i class="icon ion-social-facebook"></i></a>
            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href={{ route('about') }}>About</a></li>
            </ul>
            <p class="copyright">Book Booking System © 2022</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>